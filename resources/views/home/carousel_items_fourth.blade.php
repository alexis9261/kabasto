@if ( $carousel_items_fourth && count($carousel_items_fourth) > 0)
<div class="flex justify-center mt-3">
    <div class="max-w-7xl w-full">
        <h2 class="font-bold text-xl text-gray-900">{{ $carousel_items_fourth[0]->category->category }}</h2>
    </div>
</div>
<div class="flex justify-center">
    <div class="owl-carousel owl-theme max-w-7xl my-4 text-center relative" id="carousel_items_fourth">

        @foreach ($carousel_items_fourth as $product)

            @include('components.card_product')

        @endforeach

    </div>
</div>

<script>
    $('#carousel_items_fourth').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:false,
        responsive:{
            0:{
                items:2
            },
            640:{
                items:3
            },
            768:{
                items:4
            },
            1024:{
                items:5
            },
            1280:{
                items:6
            }
        }
    })
</script>
@endif
