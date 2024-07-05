<!-- app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="../assets/logos/logo-singgle.svg" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Flowbite CDN --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- CSS tambahan dari views lain -->
    @stack('styles')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

{{--  Flowbite CDN  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

{{-- CK Editor CDN --}}
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#about'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
            heading: {
                options: [
                    {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                    {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                    {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                    {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'}
                ]
            }
        })
        .catch(error => {
            console.log(error);
        });

    function previewFile() {
        var preview = document.querySelector('.file-preview');
        var fileInput = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        console.log("asas")
        reader.onloadend = function () {
            var img = preview.querySelector('.thumbnail-proof'); // Get the thumbnail image element
            img.src = reader.result; // Update src attribute with the uploaded file
            preview.classList.remove('hidden'); // Remove the 'hidden' class to display the preview
        }

        if (fileInput) {
            reader.readAsDataURL(fileInput);
        } else {
            preview.classList.add('hidden'); // Hide preview if no file selected
        }
    }

    document.getElementById('bank').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var accountName = selectedOption.getAttribute('data-account-name');
        var accountNumber = selectedOption.getAttribute('data-account-number');

        document.getElementById('name').value = accountName;
        document.getElementById('number').value = accountNumber;
    });

    // Trigger change event on page load to populate initial values
    document.getElementById('bank').dispatchEvent(new Event('change'));
</script>

<!-- Script tambahan dari views lain -->
@stack('scripts')

</body>
</html>
