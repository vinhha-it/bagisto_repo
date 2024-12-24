<?php

namespace Webkul\SAASCustomizer\Helpers\Importers\Product;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Webkul\Product\Models\Product as ProductModel;
use Webkul\DataTransfer\Helpers\Importers\Product\Importer as BaseImporter;
use Webkul\SAASCustomizer\Facades\Company;

class Importer extends BaseImporter
{
    /**
     * Save validated batches
     */
    protected function saveValidatedBatches(): self
    {
        $source = $this->getSource();

        $source->rewind();

        $this->skuStorage->init();

        while ($source->valid()) {
            try {
                $rowData = $source->current();
                
                $rowData['company_id'] = Company::getCurrent()->id;
            } catch (\InvalidArgumentException $e) {
                $source->next();

                continue;
            }

            $this->validateRow($rowData, $source->getCurrentRowNumber());

            $source->next();
        }

        $this->checkForDuplicateUrlKeys();

        parent::saveValidatedBatches();

        return $this;
    }

    /**
     * Prepare products from current batch
     */
    public function prepareProducts(array $rowData, array &$products): void
    {
        $attributeFamilyId = $this->attributeFamilies
            ->where('code', $rowData['attribute_family_code'])
            ->first()->id;

        if ($this->isSKUExist($rowData['sku'])) {
            $products['update'][$rowData['sku']] = [
                'type'                => $rowData['type'],
                'sku'                 => $rowData['sku'],
                'attribute_family_id' => $attributeFamilyId,
                'company_id'          => $rowData['company_id'],
            ];
        } else {
            $products['insert'][$rowData['sku']] = [
                'type'                => $rowData['type'],
                'sku'                 => $rowData['sku'],
                'attribute_family_id' => $attributeFamilyId,
                'created_at'          => $rowData['created_at'] ?? now(),
                'updated_at'          => $rowData['updated_at'] ?? now(),
                'company_id'          => $rowData['company_id'],
            ];
        }
    }

    /**
     * Save products from current batch
     */
    public function saveProducts(array $products): void
    {
        if (! empty($products['update'])) {
            $this->updatedItemsCount += count($products['update']);

            $this->productRepository->upsert(
                $products['update'],
                $this->masterAttributeCode
            );
        }

        if (! empty($products['insert'])) {
            $this->createdItemsCount += count($products['insert']);

            $this->productRepository->insert($products['insert']);

            /**
             * Update the sku storage with newly created products
             */
            $newProducts = $this->productRepository->findWhereIn(
                'sku',
                array_keys($products['insert']),
                [
                    'id',
                    'type',
                    'sku',
                    'attribute_family_id',
                    'company_id',
                ]
            );

            foreach ($newProducts as $product) {
                $this->skuStorage->set($product->sku, [
                    'id'                  => $product->id,
                    'type'                => $product->type,
                    'attribute_family_id' => $product->attribute_family_id,
                    'company_id'          => $product->company_id,
                ]);
            }
        }
    }

    /**
     * Save products from current batch
     */
    public function prepareAttributeValues(array $rowData, array &$attributeValues): void
    {
        $data = [];

        $familyAttributes = $this->getProductTypeFamilyAttributes($rowData['type'], $rowData['attribute_family_code']);

        foreach ($rowData as $attributeCode => $value) {
            if (is_null($value)) {
                continue;
            }

            $attribute = $familyAttributes->where('code', $attributeCode)->first();

            if (! $attribute) {
                continue;
            }

            $attributeTypeValues = array_fill_keys(array_values($attribute->attributeTypeFields), null);

            $attributeValues[$rowData['sku']][] = array_merge($attributeTypeValues, [
                'attribute_id'          => $attribute->id,
                $attribute->column_name => $value,
                'channel'               => $attribute->value_per_channel ? $rowData['channel'] : null,
                'locale'                => $attribute->value_per_locale ? $rowData['locale'] : null,
                'company_id'            => $rowData['company_id'],
            ]);
        }
    }

    /**
     * Save products from current batch
     */
    public function saveAttributeValues(array $attributeValues): void
    {
        $productAttributeValues = [];

        foreach ($attributeValues as $sku => $skuAttributes) {
            foreach ($skuAttributes as $attribute) {
                $product = $this->skuStorage->get($sku);

                $attribute['product_id'] = (int) $product['id'];

                $attribute['unique_id'] = implode('|', array_filter([
                    $attribute['channel'],
                    $attribute['locale'],
                    $attribute['product_id'],
                    $attribute['attribute_id'],
                    $attribute['company_id'],
                ]));

                $productAttributeValues[$attribute['unique_id']] = $attribute;
            }
        }

        $this->productAttributeValueRepository->upsert($productAttributeValues, 'unique_id');
    }

    /**
     * Save inventories from current batch
     */
    public function saveInventories(array $inventories): void
    {
        if (empty($inventories)) {
            return;
        }

        $inventorySources = $this->inventorySourceRepository
            ->findWhereIn('code', Arr::flatten(Arr::pluck($inventories, '*.source')));

        $productInventories = [];

        foreach ($inventories as $sku => $skuInventories) {
            $product = $this->skuStorage->get($sku);

            foreach ($skuInventories as $inventory) {
                $inventorySource = $inventorySources
                    ->where('code', $inventory['source'])
                    ->where('company_id', $product['company_id'])
                    ->first();

                if (! $inventorySource) {
                    continue;
                }

                $productInventories[] = [
                    'inventory_source_id' => $inventorySource->id,
                    'product_id'          => $product['id'],
                    'qty'                 => $inventory['qty'],
                    'vendor_id'           => 0,
                    'company_id'          => $product['company_id'],
                ];
            }
        }

        $this->productInventoryRepository->upsert(
            $productInventories,
            [
                'product_id',
                'inventory_source_id',
                'vendor_id',
                'company_id',
            ],
        );
    }

    /**
     * Retrieve product type family attributes
     */
    public function getProductTypeFamilyAttributes(string $type, string $attributeFamilyCode): mixed
    {
        if (isset($this->typeFamilyAttributes[$type][$attributeFamilyCode])) {
            return $this->typeFamilyAttributes[$type][$attributeFamilyCode];
        }

        $attributeFamily = $this->attributeFamilies->where('code', $attributeFamilyCode)->first();

        $product = ProductModel::make([
            'type'                => $type,
            'attribute_family_id' => $attributeFamily->id,
            'company_id'          => $attributeFamily->company_id,
        ]);

        return $this->typeFamilyAttributes[$type][$attributeFamilyCode] = $product->getEditableAttributes();
    }

    /**
     * Save configurable variants from current batch
     */
    public function saveConfigurableVariants(array $configurableVariants): void
    {
        if (empty($configurableVariants)) {
            return;
        }

        $variantSkus = array_map('array_keys', $configurableVariants);

        /**
         * Load not loaded SKUs to the sku storage
         */
        $this->loadUnloadedSKUs(array_unique(Arr::flatten($variantSkus)));

        $superAttributeOptions = $this->getSuperAttributeOptions($configurableVariants);

        $parentAssociations = [];

        $superAttributes = [];

        $superAttributeValues = [];

        foreach ($configurableVariants as $sku => $variants) {
            $product = $this->skuStorage->get($sku);

            foreach ($variants as $variantSku => $variantSuperAttributes) {
                $variant = $this->skuStorage->get($variantSku);

                $parentAssociations[] = [
                    'sku'       => $variantSku,
                    'parent_id' => $product['id'],
                    'company_id' => $product['company_id'],
                ];

                foreach ($variantSuperAttributes as $superAttributeCode => $optionLabel) {
                    $attribute = $this->attributes->where('code', $superAttributeCode)->first();

                    $attributeOption = $superAttributeOptions->where('attribute_id', $attribute->id)
                        ->where('admin_name', $optionLabel)
                        ->first();

                    $attributeTypeValues = array_fill_keys(array_values($attribute->attributeTypeFields), null);

                    $attributeTypeValues = array_merge($attributeTypeValues, [
                        'product_id'            => $variant['id'],
                        'attribute_id'          => $attribute->id,
                        $attribute->column_name => $attributeOption->id,
                        'channel'               => null,
                        'locale'                => null,
                        'company_id'            => $product['company_id'],
                    ]);

                    $attributeTypeValues['unique_id'] = implode('|', array_filter([
                        $attributeTypeValues['channel'],
                        $attributeTypeValues['locale'],
                        $attributeTypeValues['product_id'],
                        $attributeTypeValues['attribute_id'],
                    ]));

                    $superAttributeValues[] = $attributeTypeValues;
                }
            }

            $superAttributeCodes = array_keys(current($variants));

            foreach ($superAttributeCodes as $attributeCode) {
                $attribute = $this->attributes->where('code', $attributeCode)->first();

                $superAttributes[] = [
                    'product_id'   => $product['id'],
                    'attribute_id' => $attribute->id,
                ];
            }
        }

        /**
         * Save the variants parent associations
         */
        $this->productRepository->upsert($parentAssociations, 'sku');

        /**
         * Save super attributes associations for configurable products
         */
        DB::table('product_super_attributes')->upsert(
            $superAttributes,
            [
                'product_id',
                'attribute_id',
            ],
        );

        /**
         * Save variants super attributes option values
         */
        $this->productAttributeValueRepository->upsert($superAttributeValues, 'unique_id');
    }
}