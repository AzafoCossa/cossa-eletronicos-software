<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CossaEletronicos | Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="font-family">
    {{ $slot }}

    <footer class="bg-dark text-white py-6 text-xl">
        <div class="container mx-auto text-center">
          <p>&copy; 2026 CossaEletronicos, Todos direitos reservados.</p>
        </div>
    </footer>
  </body>
</html>