<x-app-layout>

    <div class="flex justify-center mt-3 py-3">
        <div class="max-w-7xl w-full">
            <h2 class="font-semibold text-3xl text-gray-900 px-2 md:px-0">
                Categorias del sitio web - Kabasto
            </h2>
        </div>
    </div>

    <div class="flex justify-center mt-4">
        <div class="grid grid-cols-1 md:grid-cols-2 max-w-7xl w-full shadow rounded-md p-6 md:px-10 bg-white">
            @foreach ($principal_categories as $category)
                <div class="text-gray-900 font-bold text-lg my-4 px-1">
                    <a class="hover:text-blue-600 mb-3" href="{{route('products.category.show', $category->slug)}}">
                        {{ $category->category }}
                        <span class="text-gray-600">({{ $category->products->count() }})</span>
                    </a>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 mb-4">
                        @foreach ($categories_children as $category_child)
                            @if ($category->id == $category_child->padre_id)
                                <div class="col-span-1 pl-2">
                                    <a class="text-sm text-gray-500 hover:text-blue-800" href="{{route('products.category.show', $category_child->slug)}}">
                                        {{ $category_child->category }} ({{ $category_child->products->count() }})
                                    </a>
                                </div>
                            @endif
                        @endforeach

                    </div>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>

