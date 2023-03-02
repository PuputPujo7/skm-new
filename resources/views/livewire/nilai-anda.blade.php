<section id="hero" class="hero d-flex align-items-center">
    <div class="max-w-4xl flex items-center h-full lg:h-screen flex-wrap mx-auto my-48 lg:my-0">

        <!--Main Col-->
        <div id="profile" class="w-full lg:w-full lg:rounded-l-lg lg:rounded-r-lg shadow-2xl bg-white opacity-85 mx-6 lg:mx-0 rounded">

            <div class="flex items-center justify-center container mx-auto px-8">
                <div class="max-w-2xl text-center">
                    <h1 class="text-3xl sm:text-5xl capitalize tracking-widest text-grey lg:text-7xl">Terima Kasih</h1>
                {{--<p class="mt-6 lg:text-lg text-white">You can subscribe to our newsletter, and let you know when we are back</p> --}}
                        <div class="mt-16 flex flex-col items-center">
                            <h4 class="text-xl font-bold text-navy-700 dark:text-white">
                                {{$nilai->nama}}
                            </h4>
                            {{-- <p class="text-base font-normal text-gray-600">Product Manager</p> --}}
                            {{-- <p class="text-base font-normal text-gray-600">{{$view->no_tiket}}</p> --}}
                        </div>
                            <div class="bg-white mt-8 flex flex-col space-y-3 sm:-mx-2 sm:flex-row sm:justify-center sm:space-y-0 rounded">
                                <div class="text-grey ">
                                    <div>
                                        <h1 class="text-black">Penilaian Anda:</h1>
                                    </div>
                                    <div>
                                        <h1 class="text-3xl sm:text-5xl capitalize tracking-widest text-black lg:text-7xl p-5">{{$nilai->review_star}}</h1>
                                    </div>
                                </div>
                            </div>
                      

                    <div class="mt-8 mb-5 flex flex-col space-y-3 sm:-mx-2 sm:flex-row sm:justify-center sm:space-y-0">

                        <a href="/" class="transform rounded-md bg-blue-700 px-8 py-2 text-sm font-medium capitalize tracking-wide text-white transition-colors duration-200 hover:bg-blue-600 focus:bg-blue-600 focus:outline-none sm:mx-2">Home</a>
                    </div>
                </div>
            </div>
            <!-- Pin to top right corner -->
            <div class="absolute top-0 right-0 h-12 w-18 p-4" style="position: fixed;">
                <button class="js-change-theme focus:outline-none">🌙</button>
            </div>
        </div>
    </div>
</section>
