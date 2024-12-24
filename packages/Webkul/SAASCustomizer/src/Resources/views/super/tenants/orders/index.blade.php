<x-saas::layouts>
    <x-slot:title>
        @lang('saas::app.super.tenants.orders.index.title')
    </x-slot:title>

    <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
        <p class="py-3 text-xl font-bold text-gray-800 dark:text-white">
            @lang('saas::app.super.tenants.orders.index.title')
        </p>

        <div class="flex items-center gap-x-2.5">
            <!-- Export Modal -->
            <x-admin::datagrid.export src="{{ route('super.tenants.orders.index') }}"></x-admin::datagrid.export>
        </div>
    </div>

    {!! view_render_event('bagisto.super.tenants.orders.list.before') !!}

    <x-saas::datagrid :src="route('super.tenants.orders.index')" :isMultiRow="true">
        {{-- Datagrid Header --}}
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
                        v-for="(columnGroup, index) in [['increment_id', 'created_at', 'status', 'image'], ['domain'], ['base_grand_total', 'method', 'channel_name'], ['full_name', 'customer_email', 'location']]"
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
                    class="row grid grid-cols-4 border-b px-4 py-2.5 transition-all hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-950"
                    v-for="record in available.records"
                >
                    {{-- Order Id, Created, Status Section --}}
                    <div class="">
                        <div class="flex gap-2.5">
                            <div class="flex flex-col gap-1.5">
                                <p
                                    class="text-base font-semibold text-gray-800 dark:text-white"
                                >
                                    @{{ "@lang('saas::app.super.tenants.orders.index.datagrid.id')".replace(':id', record.increment_id) }}
                                </p>

                                <p
                                    class="text-gray-600 dark:text-gray-300"
                                    v-text="record.created_at"
                                >
                                </p>

                                <p
                                    v-if="record.is_closure"
                                    v-html="record.status"
                                >
                                </p>

                                <p
                                    v-else
                                    v-html="record.status"
                                >
                                </p>
                            </div>

                            {{-- Imgaes Section --}}
                            <div class="flex items-center justify-between gap-x-4">
                                <div class="flex flex-col gap-1.5">
                                    <p
                                        v-if="record.is_closure"
                                        class="text-gray-600 dark:text-gray-300"
                                        v-html="record.image"
                                    >
                                    </p>

                                    <p
                                        v-else
                                        class="text-gray-600 dark:text-gray-300"
                                        v-html="record.image"
                                    >
                                    </p>

                                </div>
                            </div>

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

                    {{-- Total Amount, Pay Via, Channel --}}
                    <div class="">
                        <div class="flex flex-col gap-1.5">
                            <p class="text-base font-semibold text-gray-800 dark:text-white">
                                @{{ $admin.formatPrice(record.base_grand_total) }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('saas::app.super.tenants.orders.index.datagrid.pay-by', ['method' => ''])@{{ record.method }}
                            </p>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-text="record.channel_name"
                            >
                            </p>
                        </div>
                    </div>

                    {{-- Custoemr, Email, Location Section --}}
                    <div class="">
                        <div class="flex flex-col gap-1.5">
                            <p
                                class="text-base text-gray-800 dark:text-white"
                                v-text="record.full_name"
                            >
                            </p>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-text="record.customer_email"
                            >
                            </p>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-text="record.location"
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

    {!! view_render_event('bagisto.super.tenants.orders.list.after') !!}

</x-saas::layouts>