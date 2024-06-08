@php use App\Helper\ImageHelper; @endphp
    <!-- resources/views/products/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ini Index My Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Manage your products here") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{route('create.product')}}" method="get">
            @csrf
            <button class="bg-blue-50">Add Product</button>
        </form>
    </div>

    <div class="overflow-x-auto max-w-7xl mx-auto sm:px-6 lg:px-8">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Gambar</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Nama Produk</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Kategori</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Harga</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach ($products as $product)
                <tr>
                    <td class="py-4 px-6">
                        <img
                            src="{{
                    ImageHelper::isThisImage($product->image_product_url)
                    ? $product->image_product_url
                    : URL::signedRoute('file.view', ['encoded' => base64_encode($product->image_product_url)])
                                  }}"
                            class="h-10 w-10 rounded-full">
                    </td>
                    <td class="py-4 px-6">{{ $product->title }}</td>
                    <td class="py-4 px-6">{{ $product->category->name }}</td>
                    <td class="py-4 px-6">{{ $product->price }}</td>
                    <td class="py-4 px-6">
                        <div class="flex space-x-2">
                            <a href="{{ route('product.edit', $product->id) }}"
                               class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-md text-xs font-semibold uppercase tracking-wide">Edit</a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                  onsubmit="return confirm('yakin ?')">
                                @csrf
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md text-xs font-semibold uppercase tracking-wide">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Tampilkan tombol Next dan Previous -->
        <div class="mt-4 flex justify-between">
            @if ($products->onFirstPage())
                <span class="bg-gray-300 py-2 px-4 rounded-md">Previous</span>
            @else
                <a href="{{ $products->previousPageUrl() }}"
                   class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Previous</a>
            @endif

            @if ($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}"
                   class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Next</a>
            @else
                <span class="bg-gray-300 py-2 px-4 rounded-md">Next</span>
            @endif
        </div>


        <!-- Tampilkan pagination links -->
        <div class="mt-4">
            {{ $products->links() }}
        </div>

    </div>
</x-app-layout>
