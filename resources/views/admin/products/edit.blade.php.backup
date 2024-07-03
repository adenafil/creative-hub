@php use App\Helper\ImageHelper; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Edit your product here") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Edit Product</h1>
        <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="flex flex-col">
                <label for="cover" class="mb-2 font-semibold">Cover</label>
                <input type="file" name="cover" id="cover" class="border rounded-lg py-2 px-4">

                @if ($product->image_product_url)
                    <div class="mt-2">
                        <img src="
                        {{
                    ImageHelper::isThisImage($product->image_product_url)
                    ? $product->image_product_url
                    : URL::signedRoute('file.view', ['encoded' => base64_encode($product->image_product_url)])
                                  }}
                        " alt="Product Cover" class="rounded-lg object-cover w-full h-auto" style="max-height: 300px;">
                    </div>
                    <p class="mt-2">
                        <a href="
                        {{
                    ImageHelper::isThisImage($product->image_product_url)
                    ? $product->image_product_url
                    : URL::signedRoute('file.view', ['encoded' => base64_encode($product->image_product_url)])
                                  }}
                        " class="text-blue-500 hover:underline">View Current Cover</a>
                    </p>
                @else
                    <p>No cover image available.</p>
                @endif
            </div>

            <div class="flex flex-col">
                <label for="file" class="mb-2 font-semibold">File</label>
                <input type="file" name="file" id="file" class="border rounded-lg py-2 px-4">

                @if ($product->asset_product_url)
                    <p class="mt-2">
                        <a href="{{ $product->file_url }}" class="text-blue-500 hover:underline">View Current File</a>
                    </p>
                @else
                    <p>No file available.</p>
                @endif
            </div>

            <div class="flex flex-col">
                <label for="name" class="mb-2 font-semibold">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->title) }}" class="border rounded-lg py-2 px-4">
            </div>

            <div class="flex flex-col">
                <label for="price" class="mb-2 font-semibold">Price</label>
                <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}" class="border rounded-lg py-2 px-4">
            </div>

            <div class="flex flex-col">
                <label for="category" class="mb-2 font-semibold">Category</label>
                <input list="categories" name="category" id="category" value="{{ old('category', $product->category->name) }}" class="border rounded-lg py-2 px-4">
                <datalist id="categories">
                    <option value="ebook">
                    <option value="font">
                    <option value="icon">
                    <option value="template">
                    <option value="ui kit">
                </datalist>
            </div>

            <div class="flex flex-col">
                <label for="about" class="mb-2 font-semibold">About</label>
                <textarea name="about" id="about" rows="4" class="border rounded-lg py-2 px-4">{{ old('about', $product->description) }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700">Update Product</button>
        </form>
    </div>
</x-app-layout>
