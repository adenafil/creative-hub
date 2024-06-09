<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Your Products Here📈') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-10 py-12">

                <form action="{{route('doCreate.product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h1 class="font-bold text-indigo-900 dark:text-white text-3xl mb-8">Add New Product</h1>

                    <!-- Cover Product -->
                    <div class="mt-4">
                        <x-input-label for="cover" :value="__('Cover')" />
                        <x-text-input id="cover" class="block mt-1 w-full" type="file" name="cover" required />
                        <x-input-error :messages="$errors->get('cover')" class="mt-2" />
                    </div>

                    <!-- Path File Product -->
                    <div class="mt-4">
                        <x-input-label for="path_file" :value="__('Path File')" />
                        <x-text-input id="path_file" class="block mt-1 w-full" type="file" name="path_file" required />
                        <x-input-error :messages="$errors->get('path_file')" class="mt-2" />
                    </div>

                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Price -->
                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autofocus autocomplete="price" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <!-- Select Category -->
                    <div class="mt-4">
                        <x-input-label for="category_id" :value="__('Category')" />
                        <select name="category_id" id="category_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full dark:bg-[#111827] dark:border-[#374151] dark:text-white">
                            <option value="">Choose your category</option>
                            @foreach ($categories as $id => $category)
                                <option value="{{ $category}}">{{ $category }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                    <!-- About -->
                    <div class="mt-4">
                        <x-input-label for="about" :value="__('About')" />
                        <textarea name="about" id="about" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md w-full py-3 pl-5 h-min-48">

                        </textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Add Product') }}
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
