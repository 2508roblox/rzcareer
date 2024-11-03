<div class="w-full overflow-hidden">

    <div class="border-b flex flex-col overflow-y-scroll grow h-full">

        {{-- header --}}
        <header class="w-full sticky inset-x-0 flex pb-[5px] pt-[5px] top-0 z-10 bg-white border-b ">

            <div class="flex w-full items-center px-2 lg:px-4 gap-2 md:gap-5">

                <a class="shrink-0 lg:hidden" href="#">


                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                    </svg>


                </a>


                {{-- avatar --}}

                <div class="shrink-0">
                    <x-avatar />
                </div>


                <h6 class="font-medium truncate"> Receive message </h6>


            </div>


        </header>


        {{-- body --}}
        <main id="conversation"
            class="flex flex-col gap-3 p-2.5 overflow-y-auto  flex-grow overscroll-contain overflow-x-hidden w-full my-auto">



        </main>



        {{-- send message  --}}

        <footer class="shrink-0 z-10 bg-white inset-x-0">

            <div class=" p-2 border-t">

                <form x-data="" method="POST" autocapitalize="off">
                    @csrf

                    <input type="hidden" autocomplete="false" style="display:none">

                    <div class="grid grid-cols-12">
                        <input x-model="body" type="text" autocomplete="off" autofocus
                            placeholder="write your message here" maxlength="1700"
                            class="col-span-10 bg-gray-100 border-0 outline-0 focus:border-0 focus:ring-0 hover:ring-0 rounded-lg  focus:outline-none">

                        <button x-bind:disabled="!body.trim()" class="col-span-2" type='submit'>Send</button>

                    </div>

                </form>

                {{-- <p> {{ $message }} </p> --}}

            </div>


        </footer>

    </div>

</div>
