@extends('layouts.guest')

@section('title')
    Enviar enlace de reinicio de contraseña - Kabasto
@endsection

@section('header')
    {{-- Meta No indexar --}}
    <meta name="robots" content="noindex,nofollow" />
@endsection

@section('content')
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            ¿Olvidaste tu contraseña? No hay problema. Simplemente díganos su dirección de correo electrónico y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva.
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="Email" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-jet-button>
                    Enviar enlace de reinicio de contraseña
                </x-jet-button>
            </div>
            <div class="flex items-center justify-center mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 mx-auto" href="{{ route('login') }}">
                    Volver
                </a>
            </div>


        </form>
    </x-jet-authentication-card>
@endsection
