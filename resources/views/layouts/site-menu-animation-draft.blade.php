<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{session('settings')->where('name', 'darkmode')->firstWhere('val')->val}}">
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- <title>SSSE{{!is_null(Request::segment(1))?" - ".strtoupper(Request::segment(1)):""}}</title> --}}
        <title>{{$htmlTitle}}</title>

        <!-- Styles -->
        
        <link rel="stylesheet" href="{{ asset('css/hoverlink.css') }}">
        

        {{-- Tutti i css in uno: 
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
            <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> <-- Animazioni card -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet" /> 
             --}}
        <link rel="stylesheet" href="{{ asset('css/all.css') }}" />
                
        
        <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            * {
                /* font-family: 'Nunito'; */
                font-family: 'Hind';
            }
        
            [data-aos="nav-animation"] {
                height: 0.3em;
                font-size: 1.4rem;
                /* background-color: white; */
            }

            [data-aos="nav-animation"].aos-animate {
                height: 0.1em;
                font-size: 1rem;
                /* background-color: #eee; */
            /* 'display': 'none' */
            }
            
        </style>
        <style>
            .trigger-menu-wrapper {
                transition: transform 0.4s;
            }
           
            .scroll-down .trigger-menu-wrapper {
                /* display: none; */
                /* transform: translate3d(0, -100%, 0); */
                
                transform:scaleY(0.01);
                /* transform: scale3d(1, 0.5, 1); */
            }

            .scroll-up .trigger-menu-wrapper {
                transform: none;
            }

        </style>
    </head>
    <body class="min-h-screen flex flex-col bg-sssebackground dark:bg-sssebackground-dark font-sans">
        <div class="flex-grow">  
            {{-- Componenete menu in alto--}}
            <x-site.menutop>Menu</x-site.menutop>
            
            @if(Request::segment(1) == 'home' || is_null(Request::segment(1)))

                @if(intval(session('settings')->where('name', 'newsnumber')->where('val', '0')->count()))
                    <img src="{{asset('img/placeholder-showcase1.jpg')}}" alt="Foto Scuola SSSE - Scuola superiore specializzata di economia"/>
                @else                     
                    <x-carousel :news="$news" />
                @endif
            @else
                <div class="p-7"></div>
                <div class="bg-sssebackground-lightest dark:bg-sssebackground-darkest">
                    @switch(str_contains($title,'¦')?explode("¦", $title)[0]:$title)
                        @case('SIG')
                            <div class="container mx-auto pb-3 pt-16  px-4
                                {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'lg:pt-3':''}}">
                                    <a href="{{url('/sig')}}">
                                        <img class="h-7 mx-auto 
                                                {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'lg:mx-0':''}}"
                                            src="{{asset("img/header-logo-sig.png")}}" alt="Scuola specializzata superiore di economia"/>
                                    </a>
                            </div>
                            @break
                        @case('SEA')
                            <div class="container mx-auto pb-3 pt-16  px-4
                                {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'lg:pt-3':''}}">
                                    <a href="{{url('/sea')}}">
                                        <img class="h-7 mx-auto 
                                                {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'lg:mx-0':''}}"
                                            src="{{asset("img/header-logo-sea.png")}}" alt="Scuola specializzata superiore di economia"/>
                                    </a>
                            </div>
                            @break
                        @case('FC')
                            <div class="container mx-auto pb-3 pt-16  px-4
                                {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'lg:pt-3':''}}">
                                <a href="{{url('/fc')}}">
                                    <img class="h-7 mx-auto 
                                            {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'lg:mx-0':''}}"
                                            src="{{asset("img/header-logo-fc.png")}}" alt="Scuola specializzata superiore di economia"/>
                                </a>
                            </div>
                            @break
                        @default
                            
                    @endswitch
                </div>
            @endif

            <div class="container mx-auto pt-9">
                <div class="flex flex-wrap">
                    @if (session('settings')->where('name', 'sitecolumns')->where('val', 'one')->count()) 
                        <div class="w-full px-4">
                            
                            {{-- Qui viene inserito il contenuto della pagina--}}
                            {{$slot}}

                        </div>
                    @else
                        <div class="w-full xl:w-8/12 px-4">
                            
                            {{-- Qui viene inserito il contenuto della pagina--}}
                            {{$slot}}

                        </div>

                        <div class="w-full xl:w-4/12 px-4">
                            <x-site.menuright></x-site.menuright>
                        </div>
                    @endif
                </div>
            </div>
            
            {{-- Lista mattonelle di statistiche --}}
            @if (session('settings')->where('name', 'statistics')->where('val', 'yes')->count() 
                && Request::segment(1) == 'home' || is_null(Request::segment(1))) 
                <x-site.card-statistics />
            @endif
            
            {{-- Pulsante Back to top--}}
            <button onclick="topFunction()" id="backToTopButton" title="Go to top"
                    class="bg-sssegreen h-11 w-11 text-center
                            hover:bg-sssegreen-light text-white font-bold py-2 px-4 rounded-full
                            fixed bottom-4 right-4 z-40"
                    data-aos="fade-left" 
                    data-aos-duration="1200"
                    >
                    <i class="fas fa-chevron-up"></i>
            </button>
        </div>

        <footer class="bg-sssebackground-dark dark:bg-sssebackground-darkest pt-4 mt-8 text-gray-500">
            <div class="container mx-auto">
                <div class="flex flex-wrap items-center justify-center px-4 pb-4 lg:gap-12 gap-2">
                    <a href="{{url('/')}}">
                        <img class="w-72 aspect-h-11" src="{{asset("img/header-logo-ssse_grey.png")}}" alt="Scuola specializzata superiore di economia"/>
                    </a>

                    <a href="http://www.linkedin.com/pub/scuola-ssig-bellinzona/44/138/a41" target="_blank">
                        <img class="w-10  aspect-h-12" src="{{asset("img/icn-linkedin-off.png")}}" alt="Linked In"/>
                    </a>

                    <a href="https://www.facebook.com/pages/Scuola-Superiore-di-Informatica-di-Gestione/156855900996022" target="_blank">
                        <img class="w-10 aspect-h-14" src="{{asset("img/icn-facebook-off.png")}}" alt="Facebook"/>
                    </a>

                    <a href="https://www.berufsbildungplus.ch/it/berufsbildungplus/berufsbildung" target="_blank">
                        <img class="w-10  aspect-h-8" src="{{asset("img/img-azienda-formatrice-off.png")}}" alt="Azienda Formatrice"/>
                    </a>

                    <iframe class="h-max w-full lg:w-1/2"
                        src="https://maps.google.ch/maps?f=q&amp;source=s_q&amp;hl=it&amp;geocode=&amp;q=Scuola+Specializzata+Superiore++di+Economia++Viale+Stefano+Franscini+32&amp;
                            sll=46.813187,8.22421&amp;sspn=2.533956,5.048218&amp;ie=UTF8&amp;hq=Scuola+Specializzata+Superiore++di+Economia++Viale+Stefano+Franscini+32&amp;hnear=&amp;
                            t=m&amp;ll=46.19427,9.013381&amp;spn=0.006238,0.011458&amp;z=15&amp;output=embed">
                    </iframe>
                </div>
            </div>

            <div class="bg-scroll bg-black bg-none bg-repeat box-border leading-5">
                <div class="table clear-both mx-auto px-4" >
                    <div class="box-border clear-both leading-5 -mx-4">
                        <div class="lg:float-left lg:w-full leading-5 px-4 relative">
                            <p class="text-xs p-2 text-gray-600">
                                Copyright 2014-2021 SSSE |&nbsp;Diritti riservati |
                                <a href="http://sssaa.csia.ch/?p=1910/" target="_blank"
                                   class="bg-scroll bg-none bg-repeat cursor-pointer text-gray-400 no-underline hover:underline">
                                    Design concept SSS_AA Orientamento web 2012-2014
                                </a>
                                (Proposta di D. Gazzo)
                                <span class="text-gray-400"> 
                                    | Sviluppo e realizzazione SSSE
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        {{-- Tutto  pacchettizzato--}}
        {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" ></script> --}}
        {{-- <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js" ></script> --}}
        {{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> --}}
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

        <script src="{{ asset('js/all.js') }}"></script>

        <script>       
            // AOS.init({
            //     // once: false,
            //     // disable: function() {
            //     //     var maxWidth = 800;
            //     //     return window.innerWidth < maxWidth;
            //     // }
            // });

            const body = document.body;
            const scrollUp = "scroll-up";
            const scrollDown = "scroll-down";
            let lastScroll = 0;

            window.addEventListener("scroll", () => {
                const currentScroll = window.pageYOffset;
                if (currentScroll <= 0) {
                    body.classList.remove(scrollUp);
                    return;
                }
                
                if (currentScroll > lastScroll && !body.classList.contains(scrollDown)) {
                    // down
                    body.classList.remove(scrollUp);
                    body.classList.add(scrollDown);
                } else if (currentScroll < lastScroll && body.classList.contains(scrollDown)) {
                    // up
                    body.classList.remove(scrollDown);
                    body.classList.add(scrollUp);
                }
                lastScroll = currentScroll;
            });
        </script>
        <script>
            function carousel() {
                return {
                    active: 0,
                    init() {
                    var flkty = new Flickity(this.$refs.carousel, {
                        wrapAround: true
                        // , draggable: false
                        // , autoPlay: 2000
                    });
                    flkty.on('change', i => this.active = i);
                    }
                }
            }
    
            function carouselFilter() {
                return {
                    active: 0,
                    changeActive(i) {
                    this.active = i;
                    
                    this.$nextTick(() => {
                        let flkty = Flickity.data( this.$el.querySelectorAll('.carousel')[i] );
                        flkty.resize();
                        
                        console.log(flkty);
                    });
                    }
                }
            }
        </script>
        <script>
            {{-- Codice per pulsante che torna in cima allo schermo  --}}
            var backToTopButton = document.getElementById("backToTopButton");
            // backToTopButton.style.display = "none"; // alternativa ad animazione aos.js
            
            {{-- Dopo uno scroll di  20px mostra il pulsante  --}}
            window.onscroll = function() { scrollFunction() };

            function scrollFunction() {
                // alternativa ad animazione aos.js
                // if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                //     backToTopButton.style.display = "block";
                // } else {
                //     backToTopButton.style.display = "none";
                // }
            }

            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <script>
            const openEls = document.querySelectorAll("[data-open]");
            const closeEls = document.querySelectorAll("[data-close]");
            const isVisible = "is-visible";

            for (const el of openEls) {
            el.addEventListener("click", function() {
                const modalId = this.dataset.open;
                document.getElementById(modalId).classList.add(isVisible);
            });
            }

            for (const el of closeEls) {
            el.addEventListener("click", function() {
                this.parentElement.parentElement.parentElement.classList.remove(isVisible);
            });
            }

            document.addEventListener("click", e => {
            if (e.target == document.querySelector(".modal.is-visible")) {
                document.querySelector(".modal.is-visible").classList.remove(isVisible);
            }
            });

            document.addEventListener("keyup", e => {
            // if we press the ESC
            if (e.key == "Escape" && document.querySelector(".modal.is-visible")) {
                document.querySelector(".modal.is-visible").classList.remove(isVisible);
            }
            });
        </script>
    </body>
</html>
