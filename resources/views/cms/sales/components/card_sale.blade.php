<div class="col-span-1 grid grid-cols-6 bg-white rounded-md shadow-sm p-2 md:px-3">
    <div class="col-span-4">
        <div>
            <h4 class="text-md md:text-lg lg:text-xl font-semibold text-gray-900 md:inline titleBrand">
                {{ ucwords($order->user->name) }}
            </h4>
            <span class="hidden md:inline text-gray-600 text-sm">
                - {{ ucwords($order->created_at->format('l')) }}
                {{ $order->created_at->format("j \d\\e") }}
                {{ ucwords($order->created_at->format('F,')) }}
                {{ $order->created_at->format("Y. g:i a") }}
            </span>
        </div>
        <span class="text-sm font-light text-gray-900">
            @php $quantityTotal = 0; @endphp
            @foreach ($order->products_purchase as $products)
                @php
                    $quantityTotal += $products->quantity;
                @endphp
            @endforeach
            {{ $quantityTotal }}
             Productos
        </span>

    </div>
    <div class="col-span-2 text-right">
        <h2 class="text-xl font-bold text-gray-900"> {{ number_format($order->amount, 2, '.', ',') }} $<span class="hidden md:inline">USD</span> </h2>
        <span class="spanStatusCompra">
        @switch($order->status)

            @case('active')
                <span class="text-xs font-light text-white bg-blue-450 px-4 py-1 rounded-full shadow-sm"> Activa </span>
                @break
            @case('received')
                <span class="text-xs font-light text-white bg-blue-450 px-4 py-1 rounded-full shadow-sm"> Activa </span>
                @break
            @case('delivered')
                <span class="text-xs font-light text-white bg-yellow-500 px-4 py-1 rounded-full shadow-sm"> Entregada </span>
                @break
            @case('completed')
                <span class="text-xs font-light text-white bg-green-450 px-4 py-1 rounded-full shadow-sm"> Confirmada </span>
                @break
            @case('cancelled')
                <span class="text-xs font-light text-white bg-red-450 px-4 py-1 rounded-full shadow-sm"> Cancelada </span>
                @break
            @default

        @endswitch
        </span>
    </div>
    <div class="col-span-7 grid grid-cols-2 mt-4">
        @if ($order->status == 'active')
            <button class="font-bold text-md text-gray-600 text-left cancelButton" wire:click="showModalCancel( {{ $order }} )">Cancelar compra</button>
        @else
            <span></span>
        @endif
        <button class="font-bold text-md text-blue-800 text-right" wire:click="showModalDetailsSale( {{ $order }} )">Ver detalles</button>
    </div>


</div>
