<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>CossaEletronicos | Dashboard</title>



        <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>
    <body class="font-family">
        {{ $slot }}

        <script src="{{ asset('assets/js/jQuery.js') }}"></script>
        <script src="{{ asset('assets/js/select2.js') }}"></script>
        <script>

            $(function () {
                Livewire.on("show-message", (event) => {
                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 1500,
                        icon: event.type,
                        title: event.message,
                    });
                });
                // Select2 Country
                var select2 = $(".select2");
                if (select2.length) {
                    select2.each(function () {
                        var $this = $(this);
                        $this.wrap('<div class="position-relative"></div>').select2({
                            placeholder: "Selecione uma opção",
                            dropdownParent: $this.parent(),
                            width: '100%',
                        });
                    });
                }
            });
        </script>
        @stack('scripts')
    </body>
</html>