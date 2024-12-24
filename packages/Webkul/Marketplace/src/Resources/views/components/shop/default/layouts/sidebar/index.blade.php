<div class="fixed h-full w-[260px] border-r border-[#E9E9E9] bg-white transition-all duration-300 group-[.sidebar-collapsed]/container:w-[70px] max-lg:hidden">
    <div class="journal-scroll h-[calc(100vh-120px)] overflow-auto overflow-x-hidden group-[.sidebar-collapsed]/container:overflow-y-auto">
        <!-- Account Navigation Menus -->
        @foreach ($menu->items as $menuItem)
            <div class="max-md:rounded-md max-md:border max-md:border-b max-md:border-l max-md:border-r max-md:border-t-0 max-md:border-[#E9E9E9]">
                <!-- Account Navigation Content -->
                @foreach ($menuItem['children'] as $subMenuItem)
                    <a href="{{ $subMenuItem['url'] }}">
                        <div class="flex cursor-pointer justify-between border-[#E9E9E9] p-5 hover:bg-[#f3f4f682]">
                            <div class="flex items-center gap-x-4">
                                <span class="{{ $subMenuItem['icon'] }} text-2xl"></span>

                                <span class="whitespace-nowrap font-medium group-[.sidebar-collapsed]/container:hidden">
                                    @lang($subMenuItem['name'])
                                </span>
                            </div>

                            @if ($menu->getActive($subMenuItem))
                                <span class="mp-arrow-right-icon text-2xl max-md:hidden"></span>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        @endforeach
    </div>

    <!-- Collapse menu -->
    <v-sidebar-collapse></v-sidebar-collapse>
</div>

@pushOnce('scripts')
    <script type="text/x-template" id="v-sidebar-collapse-template">
        <div
            class="bg-whitefixed bottom-0 w-full max-w-[260px] cursor-pointer border-t border-gray-200 transition-all duration-300 hover:bg-gray-100"
            :class="{'max-w-[70px]': isCollapsed}"
            @click="toggle"
        >
            <div class="flex items-center gap-x-4 p-5 text-lg font-medium">
                <span
                    class="mp-collapse-icon text-2xl transition-all"
                    :class="[isCollapsed ? 'ltr:rotate-[180deg] rtl:rotate-[0]' : 'ltr:rotate-[0] rtl:rotate-[180deg]']"
                ></span>

                <template v-if="! isCollapsed">
                    @lang('marketplace::app.shop.components.layouts.sidebar.collapse')
                </template>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-sidebar-collapse', {
            template: '#v-sidebar-collapse-template',

            data() {
                return {
                    isCollapsed: {{ request()->cookie('sidebar_collapsed') ?? 0 }},
                }
            },

            methods: {
                toggle() {
                    this.isCollapsed = parseInt(this.isCollapsedCookie()) ? 0 : 1;

                    var expiryDate = new Date();

                    expiryDate.setMonth(expiryDate.getMonth() + 1);

                    document.cookie = 'sidebar_collapsed=' + this.isCollapsed + '; path=/; expires=' + expiryDate.toGMTString();

                    this.$root.$refs.appLayout.classList.toggle('sidebar-collapsed');
                },

                isCollapsedCookie() {
                    const cookies = document.cookie.split(';');

                    for (const cookie of cookies) {
                        const [name, value] = cookie.trim().split('=');

                        if (name === 'sidebar_collapsed') {
                            return value;
                        }
                    }
                    
                    return 0;
                },
            },
        });
    </script>
@endpushOnce