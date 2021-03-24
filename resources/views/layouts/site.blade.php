<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{session('settings')->where('name', 'darkmode')->firstWhere('val')->val}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        {{-- Metadati per prevenire script cross-site, clickjacking e altri attacchi di iniezione di codice (maps iframe)--}}
        {{-- <meta http-equiv="Content-Security-Policy"  --}}
        {{-- content="default-src 'self' {{url('/')}} https://maps.google.ch/maps 'unsafe-inline' 'unsafe-eval' * 'strict-dynamic'; 
                 frame-src https://maps.google.ch/maps  https://www.google.com/maps;
                 style-src {{url('/')}} https://fonts.googleapis.com 'unsafe-inline'; 
                 font-src {{url('/')}} https://fonts.googleapis.com  https://fonts.gstatic.com 'unsafe-inline'; "> --}}

        {{-- Metadati per prevenire script cross-site, clickjacking e altri attacchi di iniezione di codice (maps javascript)--}}
        <meta http-equiv="Content-Security-Policy" 
                content="default-src 'self' {{url('/')}} https://maps.googleapis.com 'unsafe-inline' 'unsafe-eval' 'strict-dynamic'; 
                        img-src 'self' https://maps.googleapis.com  https://maps.gstatic.com data:;
                        style-src {{url('/')}} https://fonts.googleapis.com 'unsafe-inline'; 
                        font-src {{url('/')}} https://fonts.googleapis.com  https://fonts.gstatic.com 'unsafe-inline'; 
                        script-src 'self' https://maps.googleapis.com 'unsafe-inline' 'unsafe-eval';">

        <title>{{$htmlTitle}}</title>
        
        <meta name="description" content="{{strip_tags(substr(str_replace(array("&nbsp;", "\n", "\t", "\r"), ' - ', $page->text), 0, 160) . '...')}}"/>

        {{-- Tutti i css in uno: 
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
            <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> <-- Animazioni card -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet" /> 
            <link rel="stylesheet" href="{{ asset('resource/css/site.css') }}">
             --}}
        <link rel="stylesheet" href="{{ asset('css/all.css') }}" />

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;600;700&display=swap" rel="stylesheet">
        
    </head>
    <body class="min-h-screen flex flex-col bg-sssebackground dark:bg-sssebackground-dark font-sans"> 
        <div class="flex-grow">  
            {{-- Componenete menu in alto--}}
            <x-site.menuTop>Menu</x-site.menuTop>
            
            {{-- Lista mattonelle di statistiche --}}
            @if (session('settings')->where('name', 'statistics')->where('val', 'yes')->count() && session('settings')->where('name', 'statposition')->where('val', 'up')->count()
                && (Request::segment(1) == 'home' || is_null(Request::segment(1)))) 
                <x-site.card-statistics />
            @endif

            {{-- Viaualizzazione immagine fissa / News + sottomenu SIG SEA FC--}}
            @if(Request::segment(1) == 'home' || is_null(Request::segment(1)))

                @if(intval(session('settings')->where('name', 'newsnumber')->where('val', '0')->count()) || $news->count() == 0)
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
                                    <a href="{{url('/sig')}}" class="mx-auto 
                                    {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'lg:mx-0':''}}">
                                        <img class="h-7" src="{{asset("img/header-logo-sig.png")}}" alt="Scuola specializzata superiore di economia"/>
                                    </a>
                            </div>
                            @break
                        @case('SEA')
                            <div class="container mx-auto pb-3 pt-16  px-4
                                {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'lg:pt-3':''}}">
                                    <a href="{{url('/sea')}}" class="mx-auto 
                                    {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'lg:mx-0':''}}">
                                        <img class="h-7" src="{{asset("img/header-logo-sea.png")}}" alt="Scuola specializzata superiore di economia"/>
                                    </a>
                            </div>
                            @break
                        @case('FC')
                            <div class="container mx-auto pb-3 pt-16  px-4
                                {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'lg:pt-3':''}}">
                                <a href="{{url('/fc')}}" class="mx-auto 
                                {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'lg:mx-0':''}}">
                                    <img class="h-7" src="{{asset("img/header-logo-fc.png")}}" alt="Scuola specializzata superiore di economia"/>
                                </a>
                            </div>
                            @break
                        @default
                            @if(session('settings')->where('name', 'menurows')->where('val', '2')->count())
                                <div class="container  mt-8  bg-sssebackground
                                {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'lg:pt-3':''}}">
                                </div>
                            @endif
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

                        <div class="w-full xl:w-4/12 px-4 
                                    {{session('settings')->where('name', 'menurows')->where('val', '2')->count()?'':''}}">
                            <x-site.menuRight></x-site.menuRight>
                        </div>
                    @endif
                </div>
            </div>
            
            {{-- Lista mattonelle di statistiche --}}
            @if (session('settings')->where('name', 'statistics')->where('val', 'yes')->count() && session('settings')->where('name', 'statposition')->where('val', 'down')->count()
                && (Request::segment(1) == 'home' || is_null(Request::segment(1)))) 
                <x-site.card-statistics />
            @endif

            @if ((session('settings')->where('name', 'contactus')->where('val', 'firstpage')->count() && (Request::segment(1) == 'home' || is_null(Request::segment(1))))
                  || (session('settings')->where('name', 'contactus')->where('val', 'allpages')->count() )) 
                <x-site.card-contact-us />
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

        {{-- Footer statico --}}
        <footer class="pt-4 mt-8 text-gray-500 
                        @if ((session('settings')->where('name', 'contactus')->where('val', 'firstpage')->count() && (Request::segment(1) != 'home' && !is_null(Request::segment(1))))
                                || (session('settings')->where('name', 'contactus')->where('val', 'no')->count() ))
                        bg-sssebackground-dark dark:bg-sssebackground-darkest 
                        @endif">
            @if ((session('settings')->where('name', 'contactus')->where('val', 'firstpage')->count() && (Request::segment(1) != 'home' && !is_null(Request::segment(1))))
                  || (session('settings')->where('name', 'contactus')->where('val', 'no')->count() )) 
                <div class="container mx-auto">
                    <div class="flex flex-wrap items-center justify-center px-4 pb-4 lg:gap-12 gap-2 ">
                        <a href="{{url('/')}}">
                            <img class="w-72 aspect-h-11" src="{{asset("img/header-logo-ssse_grey.png")}}" alt="Scuola specializzata superiore di economia"/>
                        </a>

                        {{-- <a href="http://www.linkedin.com/pub/scuola-ssig-bellinzona/44/138/a41" target="_blank">
                            <img class="w-10  aspect-h-12" src="{{asset("img/icn-linkedin-off.png")}}" alt="Linked In"/>
                        </a> --}}

                        <a href="https://www.facebook.com/ssse.bellinzona" target="_blank">
                            <img class="w-10 aspect-h-14" src="{{asset("img/icn-facebook-off.png")}}" alt="Facebook"/>
                        </a>

                        <a href="https://www.berufsbildungplus.ch/it/berufsbildungplus/berufsbildung" target="_blank">
                            <img class="w-10  aspect-h-8" src="{{asset("img/img-azienda-formatrice-off.png")}}" alt="Azienda Formatrice"/>
                        </a>
                        {{-- <iframe class="h-max w-full lg:w-1/2"
                            src="https://maps.google.ch/maps?f=q&amp;source=s_q&amp;hl=it&amp;geocode=&amp;q=Scuola+Specializzata+Superiore++di+Economia++Viale+Stefano+Franscini+32&amp;sll=46.813187,8.22421&amp;sspn=2.533956,5.048218&amp;ie=UTF8&amp;hq=Scuola+Specializzata+Superiore++di+Economia++Viale+Stefano+Franscini+32&amp;hnear=&amp;t=m&amp;ll=46.19427,9.013381&amp;spn=0.006238,0.011458&amp;z=15&amp;output=embed">
                        </iframe> --}}
                        
                        <div class="h-40 w-full lg:w-1/2">
                            <div id="map" class="w-full h-full"></div>
                        </div>
                        
                    </div>
                </div>
            @endif

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

        {{-- Passa al javascript il tipo di visualizzazione--}}
        <script>
            const siteDarkMode = "{{session('settings')->where('name', 'darkmode')->where('val', 'dark')->count()}}";
        </script>
        {{-- Tutto  pacchettizzato--}}
        {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" ></script> --}}
        {{-- <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js" ></script> --}}
        {{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> --}}
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
        <script src="{{ asset('js/all.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDc6ho3RWGGhLU1hYm9dv5slAZIIw__sd0&callback=initMap&libraries=&v=weekly" async></script>
    </body>
</html>
