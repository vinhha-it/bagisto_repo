<x-saas::layouts>
    <x-slot:title>
        @lang('saas::app.super.tenants.products.index.title')
    </x-slot:title>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="text-xl font-bold text-gray-800 dark:text-white">
            @lang('saas::app.super.tenants.products.index.title')
        </p>

        <div class="flex items-center gap-x-2.5">
            <!-- Dropdown -->
            <x-admin::dropdown position="bottom-right">
                <x-slot:toggle>
                    <span class="icon-setting flex cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 dark:hover:bg-gray-800"></span>
                </x-slot:toggle>

                <x-slot:content class="z-10 w-[174px] max-w-full rounded border bg-white !p-2 shadow-[0px_8px_10px_0px_rgba(0,_0,_0,_0.2)] dark:border-gray-800 dark:bg-gray-900">
                    <div class="grid gap-0.5">
                        <!-- Current Channel -->
                        <div class="cursor-pointer items-center p-1.5 transition-all hover:rounded-md hover:bg-gray-100 dark:hover:bg-gray-950">
                            <p class="font-semibold leading-6 text-gray-600 dark:text-gray-300">
                                Channel - {{ core()->getCurrentChannel()?->name }}
                            </p>
                        </div>

                        <!-- Current Locale -->
                        <div class="cursor-pointer items-center p-1.5 transition-all hover:rounded-md hover:bg-gray-100 dark:hover:bg-gray-950">
                            <p class="font-semibold leading-6 text-gray-600 dark:text-gray-300">
                                Language - {{ core()->getCurrentLocale()?->name }}
                            </p>
                        </div>
                    </div>
                </x-slot:content>
            </x-admin::dropdown>

            <!-- Export Modal -->
            <x-admin::datagrid.export src="{{ route('super.tenants.products.index') }}"></x-admin::datagrid.export>
        </div>
    </div>

    {!! view_render_event('bagisto.super.tenants.products.list.before') !!}

    {{-- Datagrid --}}
    <x-saas::datagrid src="{{ route('super.tenants.products.index') }}" :isMultiRow="true">
        <template #header="{
            isLoading,
            available,
            applied,
            selectAll,
            sort,
            performAction
        }">
            <template v-if="! isLoading">
                <div class="row grid grid-cols-4 grid-rows-1 items-center border-b px-4 py-2.5 dark:border-gray-800">
                    <div
                        class="flex select-none items-center gap-2.5"
                        v-for="(columnGroup, index) in [['name', 'sku', 'attribute_family_name'], ['domain'], ['base_image', 'price', 'quantity', 'product_id'], ['status', 'category_name', 'type']]"
                    >
                        <p class="text-gray-600 dark:text-gray-300">
                            <span class="[&>*]:after:content-['_/_']">
                                <template v-for="column in columnGroup">
                                    <span
                                        class="after:content-['/'] last:after:content-['']"
                                        :class="{
                                            'text-gray-800 dark:text-white font-medium': applied.sort.column == column,
                                            'cursor-pointer hover:text-gray-800 dark:hover:text-white': available.columns.find(columnTemp => columnTemp.index === column)?.sortable,
                                        }"
                                        @click="
                                            available.columns.find(columnTemp => columnTemp.index === column)?.sortable ? sort(available.columns.find(columnTemp => columnTemp.index === column)): {}
                                        "
                                    >
                                        @{{ available.columns.find(columnTemp => columnTemp.index === column)?.label }}
                                    </span>
                                </template>
                            </span>

                            <i
                                class="align-text-bottom text-base text-gray-800 ltr:ml-1.5 rtl:mr-1.5 dark:text-white"
                                :class="[applied.sort.order === 'asc' ? 'icon-down-stat': 'icon-up-stat']"
                                v-if="columnGroup.includes(applied.sort.column)"
                            ></i>
                        </p>
                    </div>
                </div>
            </template>

            {{-- Datagrid Head Shimmer --}}
            <template v-else>
                <x-admin::shimmer.datagrid.table.head :isMultiRow="true"></x-admin::shimmer.datagrid.table.head>
            </template>
        </template>

        {{-- Datagrid Body --}}
        <template #body="{
            isLoading,
            available,
            applied,
            selectAll,
            sort,
            performAction
        }">
            <template v-if="! isLoading">
                <div
                    class="row grid grid-cols-4 grid-rows-1 border-b px-4 py-2.5 transition-all hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-950"
                    v-for="record in available.records"
                >
                    {{-- Name, SKU, Attribute Family Columns --}}
                    <div class="flex gap-2.5">

                        <div class="flex flex-col gap-1.5">
                            <p
                                class="text-base font-semibold text-gray-800 dark:text-white"
                                v-text="record.name"
                            >
                            </p>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                            >
                                @{{ "@lang('admin::app.catalog.products.index.datagrid.sku-value')".replace(':sku', record.sku) }}
                            </p>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                            >
                                @{{ "@lang('admin::app.catalog.products.index.datagrid.attribute-family-value')".replace(':attribute_family', record.attribute_family_name) }}
                            </p>
                        </div>
                    </div>

                    {{-- Domain --}}
                    <div class="">
                        <div class="flex gap-2.5">
                            <div class="flex flex-col gap-1.5">
                                <p
                                    class="text-base font-semibold text-gray-800 dark:text-white"
                                    v-text="record.domain"
                                >
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Image, Price, Id, Stock Columns --}}
                    <div class="flex gap-1.5">
                        <div class="relative">
                            <template v-if="record.base_image">
                                <img
                                    class="max-h-[65px] min-h-[65px] min-w-[65px] max-w-[65px] rounded"
                                    :src=`{{ Storage::url('') }}${record.base_image}`
                                />

                                <span
                                    class="bg-darkPink absolute bottom-px rounded-full px-1.5 text-xs font-bold text-white ltr:left-px rtl:right-px"
                                    v-text="record.images_count"
                                >
                                </span>
                            </template>

                            <template v-else>
                                <div class="relative h-[60px] max-h-[60px] w-full max-w-[60px] rounded border border-dashed border-gray-300 dark:border-gray-800 dark:mix-blend-exclusion dark:invert">
                                    <img
                                        src="{{ bagisto_asset('images/product-placeholders/front.svg', 'admin') }}"
                                    >

                                    <p class="absolute bottom-1.5 w-full text-center text-xs font-semibold text-gray-400">
                                        @lang('admin::app.catalog.products.index.datagrid.product-image')
                                    </p>
                                </div>
                            </template>
                        </div>

                        <div class="flex flex-col gap-1.5">
                            <p
                                class="text-base font-semibold text-gray-800 dark:text-white"
                                v-text="$admin.formatPrice(record.price)"
                            >
                            </p>
                            
                            <!-- Parent Product Quantity -->
                            <div  v-if="['configurable', 'bundle', 'grouped'].includes(record.type)">
                                <p class="text-gray-600 dark:text-gray-300">
                                    <span class="text-red-600" v-text="'N/A'"></span>
                                </p>
                            </div>

                            <div v-else>
                                <p
                                    class="text-gray-600 dark:text-gray-300"
                                    v-if="record.quantity > 0"
                                >
                                    <span class="text-green-600">
                                        @{{ "@lang('admin::app.catalog.products.index.datagrid.qty-value')".replace(':qty', record.quantity) }}
                                    </span>
                                </p>

                                <p
                                    class="text-gray-600 dark:text-gray-300"
                                    v-else
                                >
                                    <span class="text-red-600">
                                        @lang('admin::app.catalog.products.index.datagrid.out-of-stock')
                                    </span>
                                </p>
                            </div>

                            <p class="text-gray-600 dark:text-gray-300">
                                @{{ "@lang('admin::app.catalog.products.index.datagrid.id-value')".replace(':id', record.product_id) }}
                            </p>
                        </div>
                    </div>

                    {{-- Status, Category, Type Columns --}}
                    <div class="flex items-center justify-between gap-x-4">
                        <div class="flex flex-col gap-1.5">
                            <p :class="[record.status ? 'label-active': 'label-info']">
                                @{{ record.status ? "@lang('admin::app.catalog.products.index.datagrid.active')" : "@lang('admin::app.catalog.products.index.datagrid.disable')" }}
                            </p>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-text="record.category_name ?? 'N/A'"
                            >
                            </p>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-text="record.type"
                            >
                            </p>
                        </div>

                    </div>
                </div>
            </template>

            {{-- Datagrid Body Shimmer --}}
            <template v-else>
                <x-admin::shimmer.datagrid.table.body :isMultiRow="true"></x-admin::shimmer.datagrid.table.body>
            </template>
        </template>
    </x-saas::datagrid>

    {!! view_render_event('bagisto.super.tenants.products.list.after') !!}

</x-saas::layouts>