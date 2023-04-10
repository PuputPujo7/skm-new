<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>SKM</title>
	<meta name="author" content="name" />
	<meta name="description" content="description here" />
	<meta name="keywords" content="keywords,here" />
	@vite('resources/css/app.css')
    <link href="{{asset('logo-skm.png')}}" rel="icon">
	<!-- <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> -->
	<!--Replace with your tailwind.css once created-->
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
</head>


<body class="font-sans antialiased text-gray-900 leading-normal tracking-wider bg-cover pt-20" 
{{-- style="background-image:url('https://source.unsplash.com/1L71sPT5XKc');"> --}}
style="background-image:url('bg.jpg');">
    <nav id="header" class="fixed w-full z-0 top-0">

		<div id="progress" class="h-1 z-20 top-0"
			style="background:linear-gradient(to right, #f7fafa var(--scroll), transparent 0);"></div>

		<div class="w-full md:max-w-4xl mx-auto flex flex-wrap items-center justify-between mt-0 py-3">

			<div class="pl-4">
				<a class="text-green-500 text-base no-underline hover:no-underline font-extrabold text-xl" href="#">
                    <img src="logo-skm.png" alt="" style="width: 50px;" class="z-20">
					SKM
				</a>
			</div>

			<div class="block lg:hidden pr-4">
                
			</div>

		</div>
	</nav>

    @yield('content')
    
    @isset($slot)
    {{ $slot }}
    @endisset
    
    

    <!-- ======= Footer ======= -->
    {{-- <footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 z-100 text-center">
		<span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
            © 2023 
            <a href="https://dpmptsp.jatengprov.go.id" class="hover:underline" target="_blank">DPMPTSP Jateng</a>
        </span>
	</footer> --}}
    <!-- End Footer -->
    @livewireScripts

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- button scrolltoTop-->
    <button x-data="topBtn" @click="scrolltoTop" id="topButton"
    class="fixed z-10 hidden p-3 bg-gray-100 rounded-full shadow-md bottom-10 right-10 animate-bounce text-black">
    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
        </path>
    </svg>
    </button>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('topBtn', () => ({
                scrolltoTop() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }
            }));
        });

        const topBtn = document.getElementById("topButton");
        window.onscroll = () => {
            (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) ?
            topBtn.classList.remove("hidden"): topBtn.classList.add("hidden");

        }
    </script>

    <script>
        function scrollToDownload() {
    
            if ($('.section-download').length != 0) {
                $("html, body").animate({
                    scrollTop: $('.section-download').offset().top
                }, 1000);
            }
        }
    </script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
        TrackJS.install({
            token: "ee6fab19c5a04ac1a32a645abde4613a",
            application: "argon-design-system-pro"
        });
    </script>
        <!--jQuery-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!--Plugin JavaScript file-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
        {{-- <script>
            $(".js-range-slider").ionRangeSlider({
                skin: "big",
                from: "4",
                grid : "true",
                values : ['Tidak Baik', 'Kurang Baik', 'Baik', 'Sangat Baik']
            });
        </script> --}}

      <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
      <script src="https://unpkg.com/tippy.js@4"></script>
      <script>
          //Init tooltips
          tippy('.link',{
            placement: 'bottom'
          })
  
          //Toggle mode
          const toggle = document.querySelector('.js-change-theme');
          const body = document.querySelector('body');
          const profile = document.getElementById('profile');
          
          
          toggle.addEventListener('click', () => {
  
            if (body.classList.contains('text-gray-900')) {
              toggle.innerHTML = "☀️";
              body.classList.remove('text-gray-900');
              body.classList.add('text-gray-100');
              profile.classList.remove('bg-white');
              profile.classList.add('bg-gray-900');
            } else
            {
              toggle.innerHTML = "🌙";
              body.classList.remove('text-gray-100');
              body.classList.add('text-gray-900');
              profile.classList.remove('bg-gray-900');			
              profile.classList.add('bg-white');
              
            }
          });
          
      </script>

</body>

</html>