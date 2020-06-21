<html>
    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css">
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>

    <body class="font-sans bg-gray-200">
        <div id="app">
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold leading-tight text-gray-900">
                        {{ $title }}
                    </h1>
                </div>
            </header>
            <div class="py-6">
                <div class="align-middle inline-block min-w-full">

                    <invoice-list></invoice-list>
                </div>
            </div>
        </div>
    </body>
</html>
