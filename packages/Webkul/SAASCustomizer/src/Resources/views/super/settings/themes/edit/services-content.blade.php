<!-- Todays Details Vue Component -->
<v-services-content></v-services-content>

@pushOnce('scripts')
    <script type="text/x-template" id="v-services-content-template">
        <div>
            <div class="mt-3.5 flex gap-2.5 max-xl:flex-wrap">
                <div class="flex flex-1 flex-col gap-2 max-xl:flex-auto">
                    <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
                        <div class="flex items-center justify-between gap-x-2.5">
                            <div class="flex flex-col gap-1">
                                <p class="text-base font-semibold text-gray-800 dark:text-white">
                                    @lang('saas::app.super.settings.themes.edit.services-content.services')
                                </p>
                                
                                <p class="text-xs font-medium text-gray-500 dark:text-gray-300">
                                    @lang('saas::app.super.settings.themes.edit.services-content.service-info')
                                </p>
                            </div>
            
                            <!-- Add Services Button -->
                            <div class="flex gap-2.5">
                                <div
                                    class="secondary-button"
                                    @click="$refs.addServiceModal.toggle()"
                                >
                                    @lang('saas::app.super.settings.themes.edit.services-content.add-btn')
                                </div>
                            </div>
                        </div>

                        <template v-for="(deletedService, index) in deletedServices">
                            <input
                                type="hidden"
                                :name="'{{ $currentLocale->code }}[deleted_services]['+ index +'][service_details]'"
                                :value="deletedService.service_details"
                            />
                        </template>

                        <div
                            class="grid pt-4"
                            v-if="servicesContent.services.length"
                            v-for="(service_details, index) in servicesContent.services"
                        >
                            <!-- Hidden Input -->
                            <input
                                type="file"
                                class="hidden"
                                :name="'{{ $currentLocale->code }}[options]['+ index +'][service_details]'"
                                :ref="'imageInput_' + index"
                            />

                            <input
                                type="hidden"
                                :name="'{{ $currentLocale->code }}[options]['+ index +'][title]'"
                                :value="service_details.title"
                            />

                            <input
                                type="hidden"
                                :name="'{{ $currentLocale->code }}[options]['+ index +'][description]'"
                                :value="service_details.description"
                            />

                            <input
                                type="hidden"
                                :name="'{{ $currentLocale->code }}[options]['+ index +'][service_icon]'"
                                :value="service_details.service_icon"
                            />
                        
                            <!-- Service  Details  Listig -->
                            <div 
                                class="flex cursor-pointer justify-between gap-2.5 py-5"
                                :class="{
                                    'border-b border-slate-300 dark:border-gray-800': index < servicesContent.services.length - 1
                                }"
                            >
                                <div class="flex gap-2.5">
                                    <div class="grid place-content-start gap-1.5">
                                        <p class="text-gray-600 dark:text-gray-300">
                                            <div> 
                                                @lang('saas::app.super.settings.themes.edit.services-content.title'): 

                                                <span class="text-gray-600 transition-all dark:text-gray-300">
                                                    @{{ service_details.title }}
                                                </span>
                                            </div>
                                        </p>

                                        <p class="text-gray-600 dark:text-gray-300">
                                            <div> 
                                                @lang('saas::app.super.settings.themes.edit.services-content.description'): 

                                                <span class="text-gray-600 transition-all dark:text-gray-300">
                                                    @{{ service_details.description }}
                                                </span>
                                            </div>
                                        </p>

                                        <p class="text-gray-600 dark:text-gray-300">
                                            <div class="flex justify-between"> 
                                                @lang('saas::app.super.settings.themes.edit.services-content.service-icon'): 

                                                <span class="text-gray-600 transition-all dark:text-gray-300">
                                                    @{{ service_details.service_icon }}
                                                </span>
                                            </div>
                                        </p>
                                    </div>
                                </div>

                                <!-- Service Actions -->
                                <div class="grid place-content-start gap-1 text-right">
                                    <div class="flex items-center gap-1.5">
                                        <p 
                                            class="cursor-pointer text-blue-600 transition-all hover:underline"
                                            @click="edit(service_details)"
                                        > 
                                            @lang('admin::app.settings.themes.edit.edit')
                                        </p>

                                        <p 
                                            class="cursor-pointer text-red-600 transition-all hover:underline"
                                            @click="remove(service_details)"
                                        > 
                                            @lang('saas::app.super.settings.themes.edit.services-content.delete')
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Empty Page -->
                        <div    
                            class="gap-2.5.5 grid justify-center justify-items-center px-2.5 py-10"
                            v-else
                        >
                            <img    
                                class="h-[120px] w-[120px] rounded border border-dashed border-gray-300 dark:border-gray-800 dark:mix-blend-exclusion dark:invert"
                                src="{{ bagisto_asset('images/product-placeholders/front.svg', 'admin') }}"
                                alt="add-product-to-store"
                            >
            
                            <div class="flex flex-col items-center gap-1.5">
                                <p class="text-base font-semibold text-gray-400">
                                    @lang('saas::app.super.settings.themes.edit.services-content.add-btn')
                                </p>
                                
                                <p class="text-gray-400">
                                    @lang('saas::app.super.settings.themes.edit.services-content.service-info')
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- General -->
                <div class="flex w-[360px] max-w-full flex-col gap-2 max-sm:w-full">
                    <x-admin::accordion>
                        <x-slot:header>
                            <p class="p-2.5 text-base font-semibold text-gray-600 dark:text-gray-300">
                                @lang('saas::app.super.settings.themes.edit.general')
                            </p>
                        </x-slot:header>
                    
                        <x-slot:content>
                            <input
                                type="hidden"
                                name="type"
                                value="services_content"
                            />

                            <!-- Name -->
                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.settings.themes.edit.services-content.name')
                                </x-admin::form.control-group.label>

                                <v-field
                                    type="text"
                                    name="name"
                                    value="{{ $theme->name }}"
                                    rules="required"
                                    class="flex min-h-[39px] w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400 dark:focus:border-gray-400"
                                    :class="[errors['name'] ? 'border border-red-600 hover:border-red-600' : '']"
                                    label="@lang('saas::app.super.settings.themes.edit.services-content.name')"
                                    placeholder="@lang('saas::app.super.settings.themes.edit.services-content.name')"
                                ></v-field>

                                <x-admin::form.control-group.error
                                    control-name="name"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <!-- Short Order -->
                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.settings.themes.edit.services-content.sort-order')
                                </x-admin::form.control-group.label>

                                <v-field
                                    type="text"
                                    name="sort_order"
                                    rules="required|min_value:1"
                                    value="{{ $theme->sort_order }}"
                                    class="flex min-h-[39px] w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400 dark:focus:border-gray-400"
                                    :class="[errors['sort_order'] ? 'border border-red-600 hover:border-red-600' : '']"
                                    label="@lang('saas::app.super.settings.themes.edit.services-content.sort-order')"
                                    placeholder="@lang('saas::app.super.settings.themes.edit.services-content.sort-order')"
                                >
                                </v-field>

                                <x-admin::form.control-group.error
                                    control-name="sort_order"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <!-- Channels -->
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.settings.themes.edit.services-content.channels')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="select"
                                    name="channel_id"
                                    rules="required"
                                    :value="$theme->channel_id"
                                >
                                    @foreach($channels as $channel)
                                        <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                                    @endforeach 
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error control-name="channel_id"></x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.settings.themes.edit.services-content.status')
                                </x-admin::form.control-group.label>

                                <label class="relative inline-flex cursor-pointer items-center">
                                    <v-field
                                        type="checkbox"
                                        name="status"
                                        class="hidden"
                                        v-slot="{ field }"
                                        value="{{ $theme->status }}"
                                    >
                                        <input
                                            type="checkbox"
                                            name="status"
                                            id="status"
                                            class="peer sr-only"
                                            v-bind="field"
                                            :checked="{{ $theme->status }}"
                                        />
                                    </v-field>
                        
                                    <label
                                        class="peer h-5 w-9 cursor-pointer rounded-full bg-gray-200 after:absolute after:top-0.5 after:h-4 after:w-4 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-blue-300 after:ltr:left-0.5 peer-checked:after:ltr:translate-x-full after:rtl:right-0.5 peer-checked:after:rtl:-translate-x-full dark:bg-gray-800 dark:after:border-white dark:after:bg-white dark:peer-checked:bg-gray-950"
                                        for="status"
                                    ></label>
                                </label>
                                
                                <x-admin::form.control-group.error
                                    control-name="status"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                        </x-slot:content>
                    </x-admin::accordion>
                </div>
            </div>

            <!-- Update Form -->
            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
                <form 
                    @submit="handleSubmit($event, saveServices)"
                    ref="createServiceForm"
                >
                    <x-admin::modal ref="addServiceModal">
                        <!-- Modal Header -->
                        <x-slot:header>
                            <p class="text-lg font-bold text-gray-800 dark:text-white">
                                @lang('saas::app.super.settings.themes.edit.services-content.update-service')
                            </p>
                        </x-slot:header>

                        <!-- Modal Content -->
                        <x-slot:content>
                            <!-- Title -->
                            <x-admin::form.control-group class="px-4py-3 mb-2.5">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.settings.themes.edit.services-content.title')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="{{ $currentLocale->code }}[title]"
                                    rules="required"
                                    v-model="selectedService.title"
                                    :label="trans('saas::app.super.settings.themes.edit.services-content.title')"
                                    :placeholder="trans('saas::app.super.settings.themes.edit.services-content.title')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="{{ $currentLocale->code }}[title]"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <!-- Description -->
                            <x-admin::form.control-group class="px-4py-3 mb-2.5">
                                <x-admin::form.control-group.label>
                                    @lang('saas::app.super.settings.themes.edit.services-content.description')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="textarea"
                                    name="{{ $currentLocale->code }}[description]"
                                    v-model="selectedService.description"
                                    :label="trans('saas::app.super.settings.themes.edit.services-content.description')"
                                    :placeholder="trans('saas::app.super.settings.themes.edit.services-content.description')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="{{ $currentLocale->code }}[description]"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <!-- Services Icon -->
                            <x-admin::form.control-group class="px-4py-3 mb-2.5">
                                <x-admin::form.control-group.label class="required">
                                    @lang('saas::app.super.settings.themes.edit.services-content.service-icon-class')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="{{ $currentLocale->code }}[service_icon]"
                                    rules="required"
                                    v-model="selectedService.service_icon"
                                    :label="trans('saas::app.super.settings.themes.edit.services-content.service-icon-class')"
                                    :placeholder="trans('saas::app.super.settings.themes.edit.services-content.service-icon-class')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="{{ $currentLocale->code }}[service_icon]"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                        </x-slot:content>

                        <!-- Modal Footer -->
                        <x-slot:footer>
                            <div class="flex items-center gap-x-2.5">
                                <button 
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('saas::app.super.settings.themes.edit.services-content.save-btn')
                                </button>
                            </div>
                        </x-slot:footer>
                    </x-admin::modal>
                </form>
            </x-admin::form>
        </div>
    </script>

    <script type="module">
        app.component('v-services-content', {
            template: '#v-services-content-template',

            props: ['errors'],

            data() {
                return {
                    
                    servicesContent: @json($theme->translate($currentLocale->code)['options'] ?? null),

                    deletedServices: [],

                    selectedService: [],

                    isUpdating: false
                };
            },
            
            created() {
                if (
                    this.servicesContent == null 
                    || this.servicesContent.length == 0
                ) {
                    this.servicesContent = { services: [] };
                }
            },

            methods: {
                saveServices(params, { resetForm ,setErrors }) {
                    let formData = new FormData(this.$refs.createServiceForm);

                    if (! this.isUpdating) {
                        try {
                            const serviceImage = formData.get("service_icon[]");

                            this.servicesContent.services.push({
                                title: formData.get("{{ $currentLocale->code }}[title]"),
                                description: formData.get("{{ $currentLocale->code }}[description]"),
                                service_icon: formData.get("{{ $currentLocale->code }}[service_icon]"),
                            });

                            resetForm();
                        } catch (error) {
                            setErrors({'service_icon': [error.message]});
                        }
                        this.isUpdating = false;
                    }
                        
                    this.$refs.addServiceModal.toggle();
                },

                remove(service_details) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            this.deletedServices.push(service_details);
                    
                            this.servicesContent.services = this.servicesContent.services.filter(item => {
                                return (
                                    item.title !== service_details.title || 
                                    item.description !== service_details.description || 
                                    item.service_icon !== service_details.service_icon
                                );
                            });
                        }
                    });
                },

                edit(service_details) {
                    this.selectedService = service_details;

                    this.isUpdating = true;

                    this.$refs.addServiceModal.toggle();
                },
            },
        });
    </script>
@endPushOnce    