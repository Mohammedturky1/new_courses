<?php
use App\Models\Product;

?>
<main class="max-w-8xl mx-auto pt-6 lg:pt-20 " id="main"

     >


        @if($products->count())
            <x-products-grid :products="$products" />


        @else
            <h1 class="text-center text-4xl">No Products Yet. Please Check Back Later.</h1>
        @endif

    </main>
