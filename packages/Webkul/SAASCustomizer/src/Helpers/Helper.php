<?php

namespace Webkul\SAASCustomizer\Helpers;

use Webkul\Product\Helpers\Review;
use Webkul\Product\Models\Product as ProductModel;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Product\Repositories\ProductFlatRepository;
// use Webkul\Velocity\Repositories\OrderBrandsRepository;
use Webkul\Attribute\Repositories\AttributeOptionRepository;
use Webkul\Product\Repositories\ProductReviewRepository;
// use Webkul\Velocity\Repositories\VelocityMetadataRepository;
use Webkul\SAASCustomizer\Facades\Company;

class Helper extends Review
{
    /**
     * Create a helper instance
     *
     * @param  \Webkul\Product\Contracts\Product  $productModel
     * @param  \Webkul\Product\Repositories\ProductRepository  $productRepository
     * @param  \Webkul\Product\Repositories\ProductFlatRepository  $productFlatRepository
     * @param  \Webkul\Velocity\Repositories\OrderBrandsRepository  $orderBrandsRepository
     * @param  \Webkul\Attribute\Repositories\AttributeOptionRepository  $attributeOptionRepository
     * @param  \Webkul\Product\Repositories\ProductReviewRepository  $productReviewRepository
     * @param  \Webkul\Velocity\Repositories\VelocityMetadataRepository  $velocityMetadataRepository
     *
     * @return void
     */
    public function __construct(
        protected ProductModel $productModel,
        protected ProductRepository $productRepository,
        protected ProductFlatRepository $productFlatRepository,
        // protected OrderBrandsRepository $orderBrandsRepository,
        protected AttributeOptionRepository $attributeOptionRepository,
        protected ProductReviewRepository $productReviewRepository,
        // protected VelocityMetadataRepository $velocityMetadataRepository
    )
    {
    }

    /**
     * Returns the count rating of the product
     *
     * @param string|null $locale
     * @param string|null $channel
     * @param boolean $default
     * @return array
     */
    public function getVelocityMetaData($locale = null, $channel = null, $default = true)
    {
        $company = Company::getCurrent();

        if (isset($company->id)) {
            
            if (! $locale) {
                $locale = request()->get('locale') ?: app()->getLocale();
            }
    
            if (! $channel) {
                $channel = request()->get('channel') ?: (isset($company->username) ? $company->username : core()->getCurrentChannelCode());
            }
    
            try {
                // $metaData = $this->velocityMetadataRepository->findOneWhere([
                //     'company_id'    => $company->id,
                //     'locale'        => $locale,
                //     'channel'       => $channel
                // ]);
    
                // if (! $metaData && $default) {
                //     $metaData = $this->velocityMetadataRepository->findOneWhere([
                //         'company_id'    => $company->id,
                //         'locale'        => app()->getLocale(),
                //         'channel'       => (isset($company->username) ? $company->username : core()->getCurrentChannelCode())
                //     ]);
                // }
    
                // return $metaData;
            } catch (\Exception $exception) {
            }
        }
    }
}