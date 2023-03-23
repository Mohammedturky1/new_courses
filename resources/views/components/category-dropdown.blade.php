<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-6 pr-9 text-sm font-semibold w-full lg:w-48 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'كل الاصناف' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
        </button>
    </x-slot>

    <x-dropdown-item href="?{{ http_build_query(request()->except('category', 'page')) }}"
                     :active="count(request()->all()) == 0"
    >
        All
    </x-dropdown-item>


    @foreach($categories as $category)
        <x-dropdown-item
{{--            href="/categories/{{ $category->slug }}"--}}
{{--            href="/?category={{ $category->slug }}&{{ request()->getQueryString() }}"--}}
            href="?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
{{--            href="/?category={{ $category->slug }}"--}}

            :active="isset($currentCategory) && $currentCategory->is($category)"

        >
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>


