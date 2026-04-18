<x-layouts.dashboard>
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
                            d="M9 10C10.364 10 11.6721 9.47322 12.6365 8.53553C13.601 7.59785 14.1429 6.32608 14.1429 5C14.1429 3.67392 13.601 2.40215 12.6365 1.46447C11.6721 0.526784 10.364 0 9 0C7.63603 0 6.32792 0.526784 5.36345 1.46447C4.39898 2.40215 3.85714 3.67392 3.85714 5C3.85714 6.32608 4.39898 7.59785 5.36345 8.53553C6.32792 9.47322 7.63603 10 9 10ZM7.16384 11.875C3.20625 11.875 0 14.9922 0 18.8398C0 19.4805 0.534375 20 1.1933 20H16.8067C17.4656 20 18 19.4805 18 18.8398C18 14.9922 14.7938 11.875 10.8362 11.875H7.16384Z"
                            fill="white"
                        />
                    </svg>
                </button>
            </div>
        </nav>
        <main class="p-5 overflow-y-auto h-[calc(100vh-3.75rem)]">
            <!-- INDICADORES NUMERICOS -->
            <div
                class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 gap-2.5 p-2.5 bg-white rounded-xl"
            >
                <div class="p-5 flex gap-5 bg-gray-100 rounded-lg items-center">
                    <div
                        class="w-15 h-15 bg-primary rounded-xl flex justify-center items-center"
                    >
                        <svg
                            width="28"
                            height="32"
                            viewBox="0 0 28 32"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M10 7C10 4.79375 11.7937 3 14 3C16.2062 3 18 4.79375 18 7V10H10V7ZM7 10H3C1.34375 10 0 11.3438 0 13V26C0 29.3125 2.6875 32 6 32H22C25.3125 32 28 29.3125 28 26V13C28 11.3438 26.6562 10 25 10H21V7C21 3.13125 17.8687 0 14 0C10.1313 0 7 3.13125 7 7V10ZM8.5 13C8.89782 13 9.27936 13.158 9.56066 13.4393C9.84196 13.7206 10 14.1022 10 14.5C10 14.8978 9.84196 15.2794 9.56066 15.5607C9.27936 15.842 8.89782 16 8.5 16C8.10218 16 7.72064 15.842 7.43934 15.5607C7.15804 15.2794 7 14.8978 7 14.5C7 14.1022 7.15804 13.7206 7.43934 13.4393C7.72064 13.158 8.10218 13 8.5 13ZM18 14.5C18 14.1022 18.158 13.7206 18.4393 13.4393C18.7206 13.158 19.1022 13 19.5 13C19.8978 13 20.2794 13.158 20.5607 13.4393C20.842 13.7206 21 14.1022 21 14.5C21 14.8978 20.842 15.2794 20.5607 15.5607C20.2794 15.842 19.8978 16 19.5 16C19.1022 16 18.7206 15.842 18.4393 15.5607C18.158 15.2794 18 14.8978 18 14.5Z"
                                fill="white"
                            />
                        </svg>
                    </div>
                    <div>
                        <h6 class="text-2xl font-bold text-primary">150</h6>
                        <p class="text-lg">Novas vendas</p>
                    </div>
                </div>

                <div class="p-5 flex gap-5 bg-gray-100 rounded-lg items-center">
                    <div
                        class="w-15 h-15 bg-secondary rounded-xl flex justify-center items-center"
                    >
                        <svg
                            width="32"
                            height="32"
                            viewBox="0 0 32 32"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M20 6H12L9.0375 1.55625C8.59375 0.8875 9.06875 0 9.86875 0H22.1313C22.9312 0 23.4062 0.8875 22.9625 1.55625L20 6ZM12 8H20C20.2375 8.15625 20.5063 8.33125 20.8125 8.525C24.3563 10.7937 32 15.6812 32 26C32 29.3125 29.3125 32 26 32H6C2.6875 32 0 29.3125 0 26C0 15.6812 7.64375 10.7937 11.1875 8.525C11.4875 8.33125 11.7625 8.15625 12 8ZM17.25 13.5C17.25 12.8125 16.6875 12.25 16 12.25C15.3125 12.25 14.75 12.8125 14.75 13.5V14.375C14.275 14.4812 13.8 14.65 13.3625 14.9062C12.4938 15.425 11.7437 16.3312 11.75 17.65C11.7563 18.9187 12.5 19.7188 13.2937 20.1938C13.9812 20.6063 14.8375 20.8687 15.5188 21.0688L15.625 21.1C16.4125 21.3375 16.9875 21.525 17.375 21.7687C17.6938 21.9688 17.7375 22.1063 17.7437 22.2812C17.75 22.5938 17.6313 22.7812 17.375 22.9375C17.0625 23.1313 16.5688 23.25 16.0375 23.2313C15.3438 23.2063 14.6938 22.9875 13.8438 22.7C13.7 22.65 13.55 22.6 13.3938 22.55C12.7375 22.3312 12.0312 22.6875 11.8125 23.3375C11.5938 23.9875 11.95 24.7 12.6 24.9188C12.7188 24.9563 12.85 25 12.9812 25.05C13.5 25.2312 14.1 25.4375 14.7437 25.575V26.5C14.7437 27.1875 15.3062 27.75 15.9937 27.75C16.6812 27.75 17.2437 27.1875 17.2437 26.5V25.6375C17.7437 25.5312 18.2437 25.3563 18.6938 25.075C19.5875 24.5188 20.2625 23.5688 20.2437 22.2625C20.225 20.9938 19.5125 20.175 18.7062 19.6625C17.9875 19.2125 17.0875 18.9375 16.3875 18.725L16.3438 18.7125C15.5437 18.4688 14.975 18.2937 14.575 18.0562C14.25 17.8625 14.2437 17.75 14.2437 17.6375C14.2437 17.4062 14.3313 17.2312 14.6313 17.0562C14.9688 16.8562 15.4813 16.7375 15.975 16.7437C16.575 16.75 17.2375 16.8813 17.925 17.0688C18.5938 17.2437 19.275 16.85 19.4562 16.1812C19.6375 15.5125 19.2375 14.8312 18.5688 14.65C18.1625 14.5437 17.7125 14.4375 17.25 14.3562V13.5Z"
                                fill="white"
                            />
                        </svg>
                    </div>
                    <div>
                        <h6 class="text-2xl font-bold text-secondary">150</h6>
                        <p class="text-lg">Total da semana</p>
                    </div>
                </div>

                <div class="p-5 flex gap-5 bg-gray-100 rounded-lg items-center">
                    <div
                        class="w-15 h-15 bg-dark-green rounded-xl flex justify-center items-center"
                    >
                        <svg
                            width="40"
                            height="32"
                            viewBox="0 0 40 32"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M2.94099 0.635846C3.13696 0.197086 3.5681 -0.0546611 4.00577 0.010074L19.9972 2.21107L35.9887 0.010074C36.4263 -0.0474683 36.8575 0.204279 37.0534 0.635846L39.7775 6.63463C40.3654 7.92214 39.7383 9.48298 38.4841 9.87858L27.81 13.2376C26.902 13.5253 25.9287 13.1009 25.4453 12.209L19.9972 2.21107L14.5492 12.209C14.0658 13.1009 13.0924 13.5253 12.1844 13.2376L1.51691 9.87858C0.256148 9.48298 -0.364435 7.92214 0.223486 6.63463L2.94099 0.635846ZM20.0691 6.81445L23.6554 13.3887C24.6287 15.1725 26.5689 16.0212 28.3914 15.4458L36.7203 12.8276V24.8396C36.7203 26.422 35.7404 27.803 34.3425 28.1914L21.0097 31.8597C20.3434 32.0468 19.6445 32.0468 18.9847 31.8597L5.65195 28.1914C4.25401 27.7958 3.27414 26.4148 3.27414 24.8324V12.8204L11.6095 15.4458C13.4256 16.0212 15.3722 15.1725 16.3456 13.3887L19.9254 6.81445H20.0691Z"
                                fill="white"
                            />
                        </svg>
                    </div>
                    <div>
                        <h6 class="text-2xl font-bold text-dark-green">150</h6>
                        <p class="text-lg">Produtos disponíveis</p>
                    </div>
                </div>

                <div class="p-5 flex gap-5 bg-gray-100 rounded-lg items-center">
                    <div
                        class="w-15 h-15 bg-danger rounded-xl flex justify-center items-center"
                    >
                        <svg
                            width="40"
                            height="32"
                            viewBox="0 0 40 32"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M2.94099 0.635846C3.13696 0.197086 3.5681 -0.0546611 4.00577 0.010074L19.9972 2.21107L35.9887 0.010074C36.4263 -0.0474683 36.8575 0.204279 37.0534 0.635846L39.7775 6.63463C40.3654 7.92214 39.7383 9.48298 38.4841 9.87858L27.81 13.2376C26.902 13.5253 25.9287 13.1009 25.4453 12.209L19.9972 2.21107L14.5492 12.209C14.0658 13.1009 13.0924 13.5253 12.1844 13.2376L1.51691 9.87858C0.256148 9.48298 -0.364435 7.92214 0.223486 6.63463L2.94099 0.635846ZM20.0691 6.81445L23.6554 13.3887C24.6287 15.1725 26.5689 16.0212 28.3914 15.4458L36.7203 12.8276V24.8396C36.7203 26.422 35.7404 27.803 34.3425 28.1914L21.0097 31.8597C20.3434 32.0468 19.6445 32.0468 18.9847 31.8597L5.65195 28.1914C4.25401 27.7958 3.27414 26.4148 3.27414 24.8324V12.8204L11.6095 15.4458C13.4256 16.0212 15.3722 15.1725 16.3456 13.3887L19.9254 6.81445H20.0691Z"
                                fill="white"
                            />
                        </svg>
                    </div>
                    <div>
                        <h6 class="text-2xl font-bold text-danger">150</h6>
                        <p class="text-lg">Produtos a vencer</p>
                    </div>
                </div>
            </div>
            <!-- INDICADORES NUMERICOS -->

            <div class="flex w-full gap-2.5 my-5">
                <!-- <button class="flex gap-2.5 px-8 py-2.5 text-white bg-primary rounded-xl cursor-pointer text-lg items-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.5385 1.53846C11.5385 0.6875 10.851 0 10 0C9.14904 0 8.46154 0.6875 8.46154 1.53846V8.46154H1.53846C0.6875 8.46154 0 9.14904 0 10C0 10.851 0.6875 11.5385 1.53846 11.5385H8.46154V18.4615C8.46154 19.3125 9.14904 20 10 20C10.851 20 11.5385 19.3125 11.5385 18.4615V11.5385H18.4615C19.3125 11.5385 20 10.851 20 10C20 9.14904 19.3125 8.46154 18.4615 8.46154H11.5385V1.53846Z" fill="white"/>
                    </svg>

                    Produto
                </button> -->

                <x-modal>
                    <form wire:submit.prevent="saveProvince">
                        <div class="flex flex-col">
                            <label for="name">Nome da provincia</label>
                            <input
                                wire:model="provinceForm.name"
                                type="text"
                                id="name"
                                placeholder="Digite o nome da provincia"
                                class="bg-gray-200 rounded-xl py-4 px-6 mt-2.5 @error('provinceForm.name') border-2 border-red-500 @enderror"
                            />
                        </div>

                        <div class="flex w-full gap-2.5 mt-5 sm:mt-6">
                            <button type="button"
                                @click="open = false"
                                class="inline-flex justify-center px-8 py-2.5 text-black bg-gray-300 rounded hover:bg-gray-400 cursor-pointer"
                            >
                                Fechar
                            </button>

                            <button type="submit"
                                class="inline-flex justify-center px-8 py-2.5 text-white bg-primary rounded hover:bg-primary/90 cursor-pointer"
                            >
                                Salvar
                            </button>
                        </div>
                    </form>
                </x-modal>
            </div>
            <!-- TABELA DE PRODUTOS -->
            <div class="bg-white rounded-xl mt-2.5">
                <h2 class="text-base mt-2.5 ml-2.5 leading-10">
                    Listagem de provincias
                </h2>

                <!-- TABELA -->
                <div>
                    <table class="w-full text-left py-2.5">
                        <thead>
                            <tr
                                class="text-base text-black font-bold border-y-2 border-gray-200"
                            >
                                <th class="p-2.5">#</th>
                                <th class="p-2.5">Nome</th>
                            </tr>
                        </thead>
                        <tbody class="text-base text-gray-600">
                            @foreach($provinces as $province)
                            <tr
                                class="border-b border-gray-200 hover:bg-gray-200"
                            >
                                <td class="p-2.5 flex items-center gap-2.5">
                                    <p>{{ $loop->index+1 }}</p>
                                </td>
                                <td class="p-2.5">
                                    {{ $province->name }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- TABELA -->
            </div>

            <!-- <footer class="bg-dark-green p-4 text-center text-sm text-gray-500">
            &copy; 2026 GraficosCertos. Todos os direitos reservados.
            </footer> -->
            <!-- TABELA DE PRODUTOS -->
        </main>
    </div>
</x-layouts.dashboard>
