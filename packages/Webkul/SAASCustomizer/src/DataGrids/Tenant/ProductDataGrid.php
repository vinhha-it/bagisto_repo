<?php

namespace Webkul\SAASCustomizer\DataGrids\Tenant;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Core\Models\Channel;
use Webkul\Core\Models\Locale;
use Webkul\Inventory\Repositories\InventorySourceRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\SAASCustomizer\Models\Product\Product;

class ProductDataGrid extends DataGrid
{
    /**
     * Primary column.
     *
     * @var string
     */
    protected $primaryColumn = 'product_id';

    /**
     * Constructor for the class.
     *
     * @return void
     */
    public function __construct(
        protected AttributeFamilyRepository $attributeFamilyRepository,
        protected ProductRepository $productRepository,
        protected InventorySourceRepository $inventorySourceRepository
    ) {
    }

    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $whereInChannels = Channel::query()->pluck('code')->toArray();

        if (company()->getRequestedLocaleCode() === 'all') {
            $whereInLocales = Locale::query()->pluck('code')->toArray();
        } else {
            $whereInLocales = [env('APP_LOCALE')];
        }

        $tablePrefix = DB::getTablePrefix();

        /**
         * Query Builder to fetch records from `product_flat` table
         */
        $queryBuilder = DB::table('product_flat')
            ->leftJoin('attribute_families', 'product_flat.attribute_family_id', '=', 'attribute_families.id')
            ->leftJoin('product_inventories', 'product_flat.product_id', '=', 'product_inventories.product_id')
            ->leftJoin('product_images', 'product_flat.product_id', '=', 'product_images.product_id')
            ->distinct()
            ->leftJoin('product_categories as pc', 'product_flat.product_id', '=', 'pc.product_id')
            ->leftJoin('category_translations as ct', function ($leftJoin) use ($whereInLocales) {
                $leftJoin->on('pc.category_id', '=', 'ct.category_id')
                    ->whereIn('ct.locale', $whereInLocales);
            })
            ->leftJoin('companies', 'product_flat.company_id', '=', 'companies.id')
            ->select(
                'product_flat.locale',
                'product_flat.channel',
                'product_images.path as base_image',
                'pc.category_id',
                'ct.name as category_name',
                'product_flat.product_id',
                'product_flat.sku',
                'product_flat.name',
                'product_flat.type',
                'product_flat.status',
                'product_flat.price',
                'product_flat.url_key',
                'product_flat.visible_individually',
                'attribute_families.name as attribute_family_name',
                'companies.name as company_name',
                'companies.domain',
                DB::raw('SUM(DISTINCT '.$tablePrefix.'product_inventories.qty) as quantity')
            )
            ->addSelect(DB::raw('COUNT(DISTINCT '.$tablePrefix.'product_images.id) as images_count'));

        $queryBuilder->groupBy(
            'product_flat.product_id',
            'product_flat.locale',
            'product_flat.channel'
        );

        $queryBuilder->whereIn('product_flat.locale', $whereInLocales);
        $queryBuilder->whereIn('product_flat.channel', $whereInChannels);

        $this->addFilter('product_id', 'product_flat.product_id');
        $this->addFilter('name', 'product_flat.name');
        $this->addFilter('type', 'product_flat.type');
        $this->addFilter('status', 'product_flat.status');
        $this->addFilter('attribute_family_name', DB::raw('CONCAT('.DB::getTablePrefix().'attribute_families.name, " ", '.DB::getTablePrefix().'companies.domain)'));
        $this->addFilter('company_name', 'companies.name');
        $this->addFilter('domain', 'companies.domain');

        return $queryBuilder;
    }

    /**
     * Prepare columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'name',
            'label'      => trans('saas::app.super.tenants.products.index.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'         => 'domain',
            'label'         => trans('saas::app.super.tenants.products.index.datagrid.domain'),
            'type'          => 'string',
            'searchable'    => true,
            'sortable'      => true,
            'filterable'    => true,
        ]);

        $this->addColumn([
            'index'      => 'sku',
            'label'      => trans('saas::app.super.tenants.products.index.datagrid.sku'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'              => 'attribute_family_name',
            'label'              => trans('saas::app.super.tenants.products.index.datagrid.attribute-family'),
            'type'               => 'string',
            'searchable'         => false,
            'sortable'           => true,
            'filterable'         => true,
            'filterable_type'    => 'dropdown',
            'filterable_options' => $this->attributeFamilyRepository->all()
                ->map(fn ($attributeFamily) => ['label' => $attributeFamily['name'].' - '.$attributeFamily['company']['domain'], 'value' => $attributeFamily['name'].' '.$attributeFamily['company']['domain']])
                ->values()
                ->toArray(),
        ]);

        $this->addColumn([
            'index'      => 'base_image',
            'label'      => trans('saas::app.super.tenants.products.index.datagrid.image'),
            'type'       => 'string',
            'searchable' => false,
            'filterable' => false,
            'sortable'   => false,
        ]);

        $this->addColumn([
            'index'      => 'price',
            'label'      => trans('saas::app.super.tenants.products.index.datagrid.price'),
            'type'       => 'integer',
            'searchable' => false,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'quantity',
            'label'      => trans('saas::app.super.tenants.products.index.datagrid.qty'),
            'type'       => 'integer',
            'searchable' => false,
            'filterable' => false,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'product_id',
            'label'      => trans('saas::app.super.tenants.products.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'           => 'status',
            'label'           => trans('saas::app.super.tenants.products.index.datagrid.status'),
            'type'            => 'integer',
            'searchable'      => false,
            'sortable'        => true,
            'filterable'      => true,
            'filterable_type' => 'dropdown',
            'filterable_options' => [
                [
                    'label' => trans('saas::app.super.tenants.products.index.datagrid.active'),
                    'value' => Product::STATUS_ACTIVE,
                ], [
                    'label' => trans('saas::app.super.tenants.products.index.datagrid.inactive'),
                    'value' => Product::STATUS_INACTIVE,
                ],
            ],
        ]);

        $this->addColumn([
            'index'      => 'category_name',
            'label'      => trans('saas::app.super.tenants.products.index.datagrid.category'),
            'type'       => 'string',
            'searchable' => false,
            'filterable' => false,
            'sortable'   => false,
        ]);

        $this->addColumn([
            'index'              => 'type',
            'label'              => trans('saas::app.super.tenants.products.index.datagrid.type'),
            'type'               => 'string',
            'searchable'         => true,
            'sortable'           => true,
            'filterable'         => true,
            'filterable_type'    => 'dropdown',
            'filterable_options' => collect(config('product_types'))
                ->map(fn ($type) => ['label' => trans($type['name']), 'value' => $type['key']])
                ->values()
                ->toArray(),
        ]);
    }
}