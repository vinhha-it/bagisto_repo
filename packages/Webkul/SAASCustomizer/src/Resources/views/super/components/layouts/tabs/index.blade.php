@php
    $tabs = menu()->getCurrentActiveMenu('super-admin')?->getChildren();
@endphp

@if (
    $tabs
    && $tabs->isNotEmpty()
)
    <div class="tabs">
        <div class="mb-4 flex gap-4 border-b-2 pt-2 max-sm:hidden dark:border-gray-800">
            @foreach ($tabs as $tab)
                <a href="{{ $tab->getUrl() }}">
                    <div class="{{ $tab->isActive() ? "-mb-px border-blue-600 border-b-2 transition" : '' }} pb-3.5 px-2.5 text-base font-medium text-gray-600 dark:text-gray-300 cursor-pointer">
                        @lang($tab->getName())
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endif