@php use App\Helper\ImageHelper; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Your Products Here📈') }}
        </h2>
    </x-slot>

        <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-10 py-12">

                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    <h1 class="font-bold text-indigo-900 dark:text-white text-3xl mb-8">Edit Your Product</h1>
                    @csrf
                    @method('PUT')


                    <!-- Cover Product -->
                    @if($product->image_product_url)
                        <div class="mt-4">
                            <x-input-label for="cover" :value="__('Existing Cover')" />
                            <img src="
                            {{
                        ImageHelper::isThisImage($product->image_product_url)
                    ? $product->image_product_url
                    : URL::signedRoute('file.view', ['encoded' => ImageHelper::encodePath($product->image_product_url)])
                            }}
                            " class="w-16 md:w-32 max-w-full max-h-full rounded-md" alt="">
                            <x-text-input id="cover" class="block mt-1 w-full" type="file" name="cover" />
                            <x-input-error :messages="$errors->get('cover')" class="mt-2" />
                        </div>
                    @endif

                    <!-- Path File Product -->
                    <div class="mt-4">
                        <x-input-label for="path_file" :value="__('Path File')" />
                        <p class="dark:text-white">
                            {{ $product->asset_product_url }}
                        </p>
                        <x-text-input id="path_file" class="block mt-1 w-full" type="file" name="path_file" />
                        <x-input-error :messages="$errors->get('path_file')" class="mt-2" />
                    </div>

                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input value="{{$product->title}}" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Price -->
                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input value="{{ $product->price }}" id="price" class="block mt-1 w-full" type="number" name="price" required autofocus autocomplete="price" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <!-- Select Category -->
                    <!-- Select Category -->

                    <div class="mt-4">
                        <x-input-label for="category_id" :value="__('Category')" />
                        <select name="category_id" id="category_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full dark:bg-[#111827] dark:border-[#374151] dark:text-white">
                            <option value="">Choose your category</option>
                            @foreach ($categories as $id => $category)
                                <option value="{{ $category }}" {{ $product->category_id == $id ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <!-- About -->
                    <div class="mt-4">
                        <x-input-label for="about" :value="__('About')" />
                        <textarea name="about" id="about" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md w-full py-3 pl-5 h-min-48">
                                {{$product->description}}
                        </textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Save Changes') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .ck-content {
        min-height: 264px!important;
    }
    .ck-rounded-corners {
        border-radius: 4px!important;
    }

    /* Dark mode styles using media query */
    @media (prefers-color-scheme: dark) {
        .ck {
            background-color: #111827 !important;
            color: white !important;
        }

        .ck.ck-button.ck-on, a.ck.ck-button.ck-on {
            color: #2977ff!important;
            background-color: #f0f7ff!important;
        }
    }
</style>
