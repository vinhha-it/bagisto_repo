<x-marketplace::shop.layouts>
    <x-slot:title>
        @lang('marketplace::app.shop.sellers.account.product-reviews.index.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-marketplace::shop.breadcrumbs name="seller_product_reviews" />
    @endSection

    <div class="flex items-center justify-between">
        <div class="">
            <h2 class="text-2xl font-medium">
                @lang('marketplace::app.shop.sellers.account.product-reviews.index.title')
            </h2>
        </div>
    </div>

    <!-- Datagrid -->
    <x-shop::datagrid
        :src="route('shop.marketplace.seller.account.products.review')"
        :isMultiRow="true"
    >
        <!-- Datagrid Header -->
        <template #header="{ columns, records, sortPage, selectAllRecords, applied, isLoading }">
            <template v-if="! isLoading">
                <div class="row grid grid-cols-[1fr_1fr_2fr] grid-rows-1 items-center border-b px-4 py-2.5">
                    <div
                        class="flex items-center gap-2.5"
                        v-for="(columnGroup, index) in [['customer_full_name', 'email'], ['product_name', 'created_at', 'product_review_status'], ['rating', 'title', 'comment']]"
                    >
                        <!-- Product Name, Review Status -->
                        <p class="text-sm font-medium leading-5">
                            <span class="[&>*]:after:content-['_/_']">
                                <template v-for="column in columnGroup">
                                    <span
                                        class="after:content-['/'] last:after:content-['']"
                                        :class="{
                                            'font-medium': applied.sort.column == column,
                                            'cursor-pointer': columns.find(columnTemp => columnTemp.index === column)?.sortable,
                                        }"
                                        @click="
                                            columns.find(columnTemp => columnTemp.index === column)?.sortable ? sortPage(columns.find(columnTemp => columnTemp.index === column)): {}
                                        "
                                    >
                                        @{{ columns.find(columnTemp => columnTemp.index === column)?.label }}
                                    </span>
                                </template>
                            </span>

                            <i
                                class="align-text-bottom text-base text-gray-800 ltr:ml-1 rtl:mr-1"
                                :class="[applied.sort.order === 'asc' ? 'icon-down-stat': 'icon-up-stat']"
                                v-if="columnGroup.includes(applied.sort.column)"
                            ></i>
                        </p>
                    </div>
                </div>
            </template>               

            <!-- Datagrid Head Shimmer -->
            <template v-else>
                <x-shop::shimmer.datagrid.table.head :isMultiRow="true"></x-shop::shimmer.datagrid.table.head>
            </template>
        </template>

        <template #body="{ columns, records, setCurrentSelectionMode, applied, performAction, isLoading }">
            <template v-if="! isLoading">
                <div
                    class="row grid grid-cols-[1fr_1fr_2fr] grid-rows-1 border-b px-4 py-2.5"
                    v-for="record in records"
                >
                    <!-- customer Name, Email -->
                    <div class="grid content-baseline gap-y-1.5">
                        <p
                            class="text-sm font-semibold leading-5 text-gray-800"
                            v-text="record.customer_full_name"
                        >
                        </p>

                        <p
                            class="text-sm leading-5 text-gray-600"
                            v-text="record.email"
                        >
                        </p>
                    </div>

                    <!-- Product Name, Date, Status -->
                    <div class="grid content-baseline gap-y-1.5">
                        <p
                            class="text-sm font-semibold leading-5 text-[#2F80ED]"
                            v-html="record.product_name"
                        >
                        </p>

                        <p
                            class="text-sm leading-5 text-gray-600"
                            v-text="record.created_at"
                        >
                        </p>

                        <p
                            class="text-sm leading-5 text-gray-600"
                            v-html="record.product_review_status"
                        >
                        </p>
                    </div>

                    <!-- Rating, Review Title, Comment -->
                    <div class="grid content-baseline gap-y-1.5">
                        <div class="flex">
                            <x-shop::products.star-rating 
                                :is-editable="false"
                                ::value="record.rating"
                            >
                            </x-shop::products.star-rating>
                        </div>

                        <p
                            class="text-sm font-semibold leading-5 text-gray-600"
                            v-text="record.title"
                        >
                        </p>

                        <p
                            class="text-sm leading-5 text-gray-600"
                            v-text="record.comment"
                        >
                        </p>
                    </div>
                </div>
            </template>

            <!-- Datagrid Body Shimmer -->
            <template v-else>
                <x-shop::shimmer.datagrid.table.body :isMultiRow="true"></x-shop::shimmer.datagrid.table.body>
            </template>
        </template>
    </x-shop::datagrid>
</x-marketplace::shop.layouts>
