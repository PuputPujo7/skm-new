<section id="hero" class="hero d-flex align-items-center">
    <div class="max-w-4xl flex items-center h-full lg:h-screen flex-wrap mx-auto my-48 lg:my-0">
          
        <!--Main Col-->
        <div id="profile" class="w-full lg:w-full lg:rounded-l-lg lg:rounded-r-lg shadow-2xl bg-white opacity-85 mx-6 lg:mx-0 rounded">

            <div class="items-center justify-center p-10">
                <div class="max-w-3xl grid mx-auto p-10 rounded-lg">
                    <h5 class="font-semibold mb-5 text-center
                    ">Data Pemohon 
                    {{-- <span class="italic"> SKM </span> DPMPTSP Provinsi Jawa Tengah --}}
                </h5>
                <form wire:submit.prevent="submit">
                    {{ $this->form }}

                    <button type="submit" class="w-full bg-blue-500 text-white mt-5 rounded-md shadow py-3">
                        Simpan
                    </button>
                </form>
                <a href="/" class="w-full bg-gray-500 text-white mt-5 rounded-md shadow py-3 text-center">Kembali</a>
                </div>
            {{-- </div> --}}

        </div>
        
        <!-- Pin to top right corner -->
        <div class="absolute top-0 right-0 h-12 w-18 p-4" style="position: fixed;">
            <button class="js-change-theme focus:outline-none">🌙</button>
        </div>
    
    </div>
</section>
