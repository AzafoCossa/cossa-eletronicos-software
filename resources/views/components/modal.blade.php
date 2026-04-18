<div x-data="{ open: false }">
    <!-- Button (blue), duh! -->
    <button
       class="flex gap-2.5 px-8 py-2.5 text-white bg-primary rounded-xl cursor-pointer text-lg items-center"
        @click="open = true"
    >
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.5385 1.53846C11.5385 0.6875 10.851 0 10 0C9.14904 0 8.46154 0.6875 8.46154 1.53846V8.46154H1.53846C0.6875 8.46154 0 9.14904 0 10C0 10.851 0.6875 11.5385 1.53846 11.5385H8.46154V18.4615C8.46154 19.3125 9.14904 20 10 20C10.851 20 11.5385 19.3125 11.5385 18.4615V11.5385H18.4615C19.3125 11.5385 20 10.851 20 10C20 9.14904 19.3125 8.46154 18.4615 8.46154H11.5385V1.53846Z" fill="white"/>
        </svg>
        Provincia
    </button>

    <!-- Dialog (full screen) -->
    <div
        class="absolute top-0 left-0 flex items-center justify-center w-full h-full"
        style="background-color: rgba(0, 0, 0, 0.5)"
        x-show="open"
    >
        <!-- A basic modal dialog with title, body and one button to close -->
        <div
            class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl w-full md:max-w-xl md:p-6 lg:p-8 md:mx-0"
            @click.away="open = false"
        >
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg font-medium leading-6 text-gray-900 border-b-2 border-dark/30 pb-2">
                    Adicionar provincia
                </h3>

                <div class="mt-10">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</div>
