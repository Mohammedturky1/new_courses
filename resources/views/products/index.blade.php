{{-- default slot variable --}}
<x-layout>
    {{-- {{ dd($products); }} --}}
    @include('layout._products-header')
    @include('products.products-main')
</x-layout>
