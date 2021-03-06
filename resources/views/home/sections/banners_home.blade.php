@if ( $banners_home && count($banners_home) > 0)
    <div class="owl-carousel owl-theme w-full" id="carousel_banners_home">

        @foreach ($banners_home as $banner)

            <a class="item" href="{{ $banner->url }}" aria-label="ir a promocion">
                <div class="h-28 sm:h-40 md:h-60 lg:h-72 xl:h-80 bg-no-repeat bg-cover bg-top w-full overflow-hidden z-10 shadow-md"
                style="background-image: url('/storage/{{ $banner->banner }}');">
                </div>
            </a>

        @endforeach

    </div>
    <script>
        $('#carousel_banners_home').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            dots:false,
            autoplay: true,
            autoplayTimeout: 5000,
            navText: ['<img src="{{asset('arrow_left.svg')}}" alt="anterior imagen" width="25px" height="25px" loading="lazy"/>', '<img src="{{asset('arrow_right.svg')}}" alt="siguiente imagen" width="25px" height="25px" loading="lazy"/>'],
            responsive:{
                0:{
                    items:1
                }
            }
        })
        // agregar accesibilidad a los botones
        // const buttons = document.querySelectorAll('.owl-nav button');
        // buttons.forEach(element => {
        //     element.setAttribute('aria-label', 'siguiente banner');
        // });

    </script>
@endif



