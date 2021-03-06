<div class="grid grid-cols-4 gap-1 mt-3 mb-4">
    <span class="col-span-4 self-center">Todas tus ventas</span>
    <select class="col-span-2 select_filter_cms" wire:model="brand_id">
        @foreach ($brands as $brand)
            <option value="{{ $brand->id }}">{{$brand->brand}}</option>
        @endforeach
    </select>
    <select class="col-span-2 select_filter_cms" wire:model="status">
        <option value="">Todas</option>
        <option value="active">Activas</option>
        <option value="completed">Confirmadas</option>
        <option value="cancelled">Canceladas</option>
    </select>
</div>
