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
                    {{ __("Create your products here") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Add New Product</h1>
        <form method="POST" action="{{ route('doCreate.product') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="flex flex-col">
                <label for="cover" class="mb-2 font-semibold">Cover</label>
                <input type="file" name="cover" id="cover" class="border rounded-lg py-2 px-4">
            </div>

            <div class="flex flex-col">
                <label for="file" class="mb-2 font-semibold">File</label>
                <input type="file" name="file" id="file" class="border rounded-lg py-2 px-4">
            </div>

            <div class="flex flex-col">
                <label for="name" class="mb-2 font-semibold">Name</label>
                <input type="text" name="name" id="name" class="border rounded-lg py-2 px-4">
            </div>

            <div class="flex flex-col">
                <label for="price" class="mb-2 font-semibold">Price</label>
                <input type="text" name="price" id="price" class="border rounded-lg py-2 px-4">
            </div>

            <div class="flex flex-col">
                <label for="category" class="mb-2 font-semibold">Category</label>
                <input list="categories" name="category" id="category" class="border rounded-lg py-2 px-4">
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
                <input type="text" name="about" id="about" class="border rounded-lg py-2 px-4">
            </div>

            <button type="submit" class="bg-amber-900 text-white py-2 px-4 rounded-lg hover:bg-amber-700">Add Product</button>
        </form>
    </div>
</x-app-layout>
