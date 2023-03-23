
<header class="max-w-8xl mx-auto  text-center" id="category_header"
{{-- style="background-color: rgb(2, 2, 19);color:rgb(19, 29, 116)" --}}
>
    <h1 class="text-4xl text-red-400">
        افضل   الكورسات   لدينا
    </h1>


    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <!--  Category -->
        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
            <x-category-dropdown />
        </div>


        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input
                    type="text"
                    name="search"
                    placeholder="ابحث عن كورس"
                    class="bg-transparent placeholder-black font-semibold text-sm"
                    value="{{ request('search') }}"
                >
            </form>
        </div>
    </div>
</header>
