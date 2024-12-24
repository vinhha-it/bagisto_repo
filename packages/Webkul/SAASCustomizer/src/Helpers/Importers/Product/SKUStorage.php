<?php

namespace Webkul\SAASCustomizer\Helpers\Importers\Product;

use Webkul\DataTransfer\Helpers\Importers\Product\SKUStorage as BaseSKUStorage;

class SKUStorage extends BaseSKUStorage
{
    /**
     * Delimiter for SKU information
     */
    private const DELIMITER = '|';

    /**
     * Columns which will be selected from database
     */
    protected array $selectColumns = [
        'id',
        'type',
        'sku',
        'attribute_family_id',
        'company_id',
    ];

    /**
     * Load the SKU
     */
    public function load(array $skus = []): void
    {
        if (empty($skus)) {
            $products = $this->productRepository->all($this->selectColumns);
        } else {
            $products = $this->productRepository->findWhereIn('sku', $skus, $this->selectColumns);
        }

        foreach ($products as $product) {
            $this->set($product->sku, [
                'id'                  => $product->id,
                'type'                => $product->type,
                'attribute_family_id' => $product->attribute_family_id,
                'company_id'          => $product->company_id,
            ]);
        }
    }

    /**
     * Get SKU information
     */
    public function set(string $sku, array $data): self
    {
        $this->items[$sku] = implode(self::DELIMITER, [
            $data['id'],
            $data['type'],
            $data['attribute_family_id'],
            $data['company_id'],
        ]);

        return $this;
    }

    /**
     * Get SKU information
     */
    public function get(string $sku): ?array
    {
        if (! $this->has($sku)) {
            return null;
        }

        $data = explode(self::DELIMITER, $this->items[$sku]);

        return [
            'id'                  => $data[0],
            'type'                => $data[1],
            'attribute_family_id' => $data[2],
            'company_id'          => $data[3],
        ];
    }
}