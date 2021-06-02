@extends('layouts.app')

@section('title')
    Kabasto - Compara precios y compra todos los productos de tu mercado
@endsection

@section('header')
	{{-- precargar imagenes --}}
	<link rel="preload" href="{{asset('storage/'.$carousel_banners[0]->banner)}}" as="image">

	<!-- Primary Meta Tags -->
	<meta name="title" content="Kabasto - Compara precios y compra todos los productos de tu mercado">
	<meta name="description" content="Kabasto - Compara precios y compra todos los productos de tu mercado">

	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://kabasto.com/">
	<meta property="og:title" content="Kabasto - Compara precios y compra todos los productos de tu mercado">
	<meta property="og:description" content="Kabasto - Compara precios y compra todos los productos de tu mercado">
	<meta property="og:image" content="/storage/{{$carousel_banners[0]->banner}}">

	{{-- url canonical --}}
	<link rel="canonical" href="https://kabasto.com/" />
@endsection

@section('content')

    {{-- Carousel principal --}}
    @include('home.sections.carousel_banners')

    {{-- Banners promocionales --}}
    @include('home.sections.banners_promotionals')

    {{-- Call To Action a registrarse --}}
    @include('home.sections.cta_login')

    {{-- Carousel productos 'mas comprados' --}}
    @include('home.sections.products_carousel')

    {{-- Categorias cards sencillas --}}
    @include('components.carousel_categories_banners')

    {{-- Carousel de productos de las categorias --}}
    @include('home.sections.carousel_products')

    {{-- Categorias cads con detalle --}}
    @include('home.sections.carousel_categories_card_details')

@endsection
