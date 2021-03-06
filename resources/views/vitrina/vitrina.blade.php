@extends('layouts.app')

@section('title')
    @if ( $query != '')

       @php
        $subtitle = ucwords($query);
        $description = 'Todos los resultados para la búsqueda '. $query . ' en un solo lugar. Kabasto.com - Busca en nuestra red de abatos y supermercados.';
        $keyword = $query;
        $h1 = "Todos los productos para la búsqueda: $query ";
       @endphp

    @elseif( $category_selected !== null)

        @php
            $subtitle = "Productos de ". ucwords($category_selected->category) ." en tu ciudad";
            $description = 'Todos los productos de '. $category_selected->category . ' en un solo lugar. Kabasto.com - Busca en nuestra red de abatos y supermercados.';
            $keyword = 'precio de '.$category_selected->category;
            $h1 = "Todos los productos para la categoría: $category_selected->category ";
        @endphp

    @else

        @php
            $subtitle = "Todos los productos";
            $description = 'Tendrás disponible una increible cantidad de productos y podrás comparar los precios en cada abasto y supermercado de tu cuidad - Kabasto.com';
            $keyword = 'precio de productos en abastos y supermercados en venezuela';
            $h1 = "Todos los productos disponibles";
        @endphp

    @endif

    @php
        $title = $subtitle."- Kabasto.com";
        echo $title;
    @endphp

@endsection

@section('header')
	{{-- precargar imagenes --}}
	<link rel="preload" href="{{ asset('home.png') }}" as="image">

    <meta name="robots" content="index,follow"/>

	<!-- Primary Meta Tags -->
	<meta name="title" content="{{ $title }}">
	<meta name="description" content="{{ $description }}">
    <meta name="keywords" content="{{ $keyword }}">

	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
    @isset ( $category_selected )
        <meta property="og:url" content="https://kabasto.com/{{ $category_selected->slug }}">
    @else
        <meta property="og:url" content="https://kabasto.com/listado-de-productos">
    @endif
	<meta property="og:title" content="{{ $title }}">
	<meta property="og:description" content="{{ $description }}">
	<meta property="og:image" content="{{ asset( 'home.webp' ) }}">

	{{-- url canonical --}}
    @isset ( $category_selected )
        <link rel="canonical" href="https://kabasto.com/categorias/{{ $category_selected->slug }}" />
    @else
        <link rel="canonical" href="https://kabasto.com/listado-de-productos" />
    @endif
@endsection

@section('content')

    {{-- Filtro para Celulares --}}
    <div class="w-full h-13 px-2 md:px-3 flex md:hidden flex-wrap content-center pt-3">
        <div class="flex flex-wrap w-full">
            @isset($category_selected)
                <span class="flex flex-shrink bg-green-500 text-white rounded-full shadow px-3 py-1 mb-2 ml-2 cursor-pointer">
                    <span class="inline self-center text-sm mr-1 modalCategories">{{ $category_selected->category }}</span>
                    <svg class="fill-current text-white stroke-current stroke-2 cursor-pointer h-3 inline self-center ml-auto" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" id="closeCategoryMobile">
                        <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" />
                    </svg>
                </span>
            @else
                <span class="flex flex-shrink text-sm rounded-full bg-gray-100 border border-gray-600 px-3 py-1 text-center hover:bg-white cursor-pointer mb-2 modalCategories">
                    Categorias
                </span>
            @endisset
            {{-- @isset($state_selected)
                <span class="flex flex-shrink bg-green-500 text-white rounded-full shadow px-3 py-1 mb-2 ml-2 cursor-pointer">
                    <span class="inline self-center text-sm mr-1 modalStates">{{ $state_selected }}</span>
                    <svg class="fill-current text-white stroke-current stroke-2 cursor-pointer h-3 inline self-center ml-auto removeStateSelected" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" >
                        <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" />
                    </svg>
                </span>
            @else
                <span class="flex flex-shrink text-sm rounded-full bg-gray-100 border border-gray-600 px-3 py-1 ml-2 text-center hover:bg-white cursor-pointer mb-2 modalStates">
                    Estados
                </span>
            @endisset
            @isset($city_selected)
                <span class="flex flex-shrink bg-green-500 text-white rounded-full shadow px-3 py-1 mb-2 ml-2 cursor-pointer">
                    <span class="inline self-center text-sm mr-1 modalCities">{{ $city_selected }}</span>
                    <svg class="fill-current text-white stroke-current stroke-2 cursor-pointer h-3 inline self-center ml-auto removeCitySelected" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg" >
                        <path d="M12.639 11.0735L23.3484 0.993304C23.5898 0.766088 23.5898 0.3977 23.3484 0.170484C23.1069 -0.0567312 22.7156 -0.0567312 22.4741 0.170484L11.7648 10.2506L1.05536 0.170412C0.813966 -0.0568039 0.422582 -0.0568039 0.181184 0.170412C-0.0602917 0.397627 -0.0602917 0.766016 0.181184 0.993231L10.8905 11.0735L0.181107 21.1537C-0.0603689 21.3809 -0.0603689 21.7493 0.181107 21.9766C0.301806 22.0902 0.459982 22.147 0.618236 22.147C0.776489 22.147 0.934665 22.0902 1.05536 21.9766L11.7648 11.8964L22.4741 21.9766C22.5949 22.0902 22.753 22.147 22.9113 22.147C23.0695 22.147 23.2277 22.0902 23.3484 21.9766C23.5898 21.7493 23.5898 21.3809 23.3484 21.1537L12.639 11.0735Z" />
                    </svg>
                </span>
            @else
                @isset($state_selected)
                <span class="flex flex-shrink text-sm rounded-full bg-gray-100 border border-gray-600 px-3 py-1 ml-2 text-center hover:bg-white cursor-pointer mb-2 modalCities">
                    Ciudades
                </span>
                @endisset
            @endisset --}}
        </div>
    </div>


    <div class="max-w-7xl w-full mt-0 md:mt-3 px-2 md:px-4">
        <span class="font-regular text-lg md:text-2xl text-gray-700">({{ $total_products_search }})</span>
        <h1 class="inline font-semibold md:font-bold text-lg md:text-2xl text-gray-900 mb-2">
             {{ $h1 }}
        </h1>
        <div class="text-md md:text-lg text-gray-900">
            @isset($query)
                <h2>
                    Búsqueda realizada:
                    <span class="font-semibold">
                        {{ $query }}
                    </span>
                </h2>
            @else
                @isset($category_selected)
                    <h2 class="hidden md:inline">
                        Categoria seleccionada:
                        <strong class="font-semibold">
                            {{ $category_selected->category }}
                        </strong>
                    </h2>
                @else
                    <h2 class="hidden md:block">
                        Encuentra los productos disponibles en tu ciudad.
                    </h2>
                @endisset
            @endisset
        </div>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-9 mb-14 bg-gray-100 max-w-7xl">

        <div class="md:col-span-2 hidden md:block bg-gray-100 px-0 md:px-2 lg:px-3">

          <!-- Aside Navbar -->
          @include('vitrina.aside_filter')

        </div>

        <!-- Contenido -->
        <div class="md:col-span-7 max-w-7xl w-full px-2 md:px-3 mt-3">

            <div class="flex justify-center">
                @if ( count($products) > 0 )

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                        @foreach ($products as $product)

                            <div>
                                @include('components.card_product')
                            </div>

                        @endforeach
                    </div>

                @else

                    <div class="w-full text-center">
                        <h4 class="text-lg font-semibold">No se encontraron resultados :/</h4>
                        <img class="mx-auto" width="75%" src="{{ asset('no_results.svg') }}" alt="sin resultados en la busqueda" loading="lazy">
                        <a class="rounded-lg text-white bg-green-500 shadow-md py-1 px-10" href="{{ route('products.show') }}" aria-label="hacer otra búsqueda">Continuar con otra búsqueda</a>
                    </div>

                @endif
            </div>
            <div class="w-full block text-center mt-4" id="pagination_nav">
                {{-- {!! $products->links() !!} --}}
                {{-- {{$products->appends(request()->input())->links()}} --}}
            </div>

        </div>
    </div>

    {{-- Modales --}}
    @include('vitrina.modals')

    {{-- scripts --}}
    @include('vitrina.scripts')

    <script>
        const closeCategoryMobile = document.getElementById('closeCategoryMobile');

        if( closeCategoryMobile !== null ){

            closeCategoryMobile.addEventListener('click', event => {

                // Limpio la ubicacion del local Storage
                localStorage.removeItem('ubication');
                // Redirecciono a la vista de productos
                window.location.href = "/listado-de-productos";

            }, {passive: true})
        }
    </script>

@endsection
