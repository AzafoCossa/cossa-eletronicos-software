@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />
@endpush
<div class="h-screen w-screen flex bg-gray-100">
    <x-sidebar />

    <div class="w-full">
        <nav
            class="flex justify-between w-full px-5 py-2.5 bg-white drop-shadow-lg drop-shadow-black/25"
        >
            <button id="sidebar-toggler">
                <svg
                    width="32"
                    height="24"
                    viewBox="0 0 32 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M0 2C0 0.89375 0.89375 0 2 0H26C27.1063 0 28 0.89375 28 2C28 3.10625 27.1063 4 26 4H2C0.89375 4 0 3.10625 0 2ZM4 12C4 10.8938 4.89375 10 6 10H30C31.1063 10 32 10.8938 32 12C32 13.1062 31.1063 14 30 14H6C4.89375 14 4 13.1062 4 12ZM28 22C28 23.1063 27.1063 24 26 24H2C0.89375 24 0 23.1063 0 22C0 20.8937 0.89375 20 2 20H26C27.1063 20 28 20.8937 28 22Z"
                        fill="black"
                        fill-opacity="0.69"
                    />
                </svg>
            </button>

            <div class="flex gap-2.5">
                <button
                    class="p-2.5 bg-primary flex items-center justify-center rounded-full"
                >
                    <svg
                        width="18"
                        height="20"
                        viewBox="0 0 18 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M8.99911 0C8.28796 0 7.71342 0.558594 7.71342 1.25V2C4.78042 2.57812 2.57063 5.10156 2.57063 8.125V8.85938C2.57063 10.6953 1.87555 12.4688 0.621991 13.8438L0.324673 14.168C-0.0128225 14.5352 -0.0931786 15.0625 0.111729 15.5117C0.316637 15.9609 0.778685 16.25 1.28493 16.25H16.7133C17.2195 16.25 17.6776 15.9609 17.8865 15.5117C18.0954 15.0625 18.011 14.5352 17.6736 14.168L17.3762 13.8438C16.1227 12.4688 15.4276 10.6992 15.4276 8.85938V8.125C15.4276 5.10156 13.2178 2.57812 10.2848 2V1.25C10.2848 0.558594 9.71026 0 8.99911 0ZM10.8192 19.2695C11.3013 18.8008 11.5705 18.1641 11.5705 17.5H8.99911H6.42772C6.42772 18.1641 6.69691 18.8008 7.17905 19.2695C7.66118 19.7383 8.31609 20 8.99911 20C9.68214 20 10.337 19.7383 10.8192 19.2695Z"
                            fill="white"
                        />
                    </svg>
                </button>

                <div class="relative" x-cloak x-data="{open: false}">
                    <button type="button" @click="open = !open" class="bg-primary w-10 h-10 rounded-full flex items-center justify-center cursor-pointer">
                        <x-icons.person fill="#fff"/>
                    </button>

                    <div @click.away="open = false" x-show="open" class="absolute bg-white rounded-xl border-2 border-primary right-0 top-12 w-80">
                        <ul class="flex flex-col">
                            <li class="px-4 py-2 bg-primary rounded-t-lg font-semibold text-lg text-white">{{ Auth::user()->full_name}}</li>
                            <li class="text-lg border-t-2 border-dark"><a class="block w-full h-full px-4 py-2" href="{{ route('home') }}">Pagina Inicial</a></li>
                            <li class="rounded-b-lg text-lg border-t-2 border-dark">
                                <a class="block w-full h-full px-4 py-2" href="{{ route('logout') }}">Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="p-2.5 overflow-y-auto h-[calc(100vh-3.75rem)]">
            {{ $slot }}
        </div>
    </div>
</div>
@push('scripts')
<script src="{{ asset('assets/js/jQuery.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
@endpush @script
<script>
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

    $(function () {
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
@endscript
