<x-app-layout>

    @include('components.categories_menu')

    @include('home.carousel_banners')

    @include('home.banners_promotionals')

    @include('components.carousel_categories_banners')


    @include('components.products_carousel')

    @include('home.carousel_items_first')
    {{-- @include('home.carousel_items_second')
    @include('home.carousel_items_third')
    @include('home.carousel_items_fourth')
    @include('home.carousel_items_five') --}}

{{-- @include('components.carousel_categories_card')  --}}

</x-app-layout>
