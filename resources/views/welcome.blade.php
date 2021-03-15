<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark"> --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SSSE</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/hoverlink.css') }}">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>



        

        
        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}        
        <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            * {
                /* font-family: 'Nunito'; */
                font-family: 'Hind';
            }

            

            .nav {
            position: fixed;
            top:0;
            left: 0;
            width: 100%;
            padding: 2rem;
            background: white;
            }

            .nav a {
            color: mediumslateblue;
            text-decoration: none;
            padding-right: 2rem;
            }

            

            [data-aos="nav-animation"] {
                font-size: 2rem;
            background-color: white;
            }

            [data-aos="nav-animation"].aos-animate {
                font-size: 1.4rem;
            background-color: #eee;
            }




        </style>
    </head>
    <body class="min-h-screen flex flex-col bg-sssebackground dark:bg-sssebackground-dark font-sans">

        <nav class="nav p-2 z-50" 
            data-aos="nav-animation" 
            data-aos-duration="1000"
            data-aos="fade-up"
            data-aos-anchor="main" 
            data-aos-anchor-placement="top-top">

            <a href="/">Home</a>
            <a href="/">About</a>
            <a href="/">Services</a>
            <a href="/">Contact</a>
        </nav>
        


        






        <img src="{{asset('img/placeholder-showcase1.jpg')}}" alt="Foto Scuola SSSE - Scuola superiore specializzata di economia"/>

        <div class="container mx-auto pt-9">

            <div class="flex flex-wrap">
                <div class="w-full xl:w-8/12 px-4">
                    <div class="flex flex-row gap-2 w-full pb-4">
                        
                        <div class="card w-1/3 cursor-pointer border h-32 p-3 text-white bg-sigred 
                            hover:shadow-lg hover:border-opacity-0 transform hover:-translate-y-1 transition-all duration-200">
                            <a href="#">
                                <span class="m-1 mb-auto mt-auto ">
                                    <h1 class="text-2xl">SIG</h1>
                                    <span class="">
                                        Sezione di informatica di gestione
                                    </span>
                                </span>
                            </a>
                        </div>
                        <div class="card w-1/3 cursor-pointer border h-32 p-3 text-white bg-seablue
                                    hover:shadow-lg hover:border-opacity-0 transform hover:-translate-y-1 transition-all duration-200">
                            <a href="#">
                                <span class="m-1 mb-auto mt-auto">
                                    <h1 class="text-2xl">SEA</h1>
                                    <p>
                                        Sezione di economia aziendale
                                    </p>
                                </span>
                            </a>
                        </div>
                        <div class="card w-1/3 cursor-pointer border h-32 p-3 text-white bg-formazionecontinua
                                    hover:shadow-lg hover:border-opacity-0 transform hover:-translate-y-1 transition-all duration-200">
                            <a href="#">
                                <span class="m-1 mb-auto mt-auto">
                                    <h1 class="text-2xl">FC</h1>
                                    <p>
                                        Corsi di formazione continua
                                    </p>
                                </span>
                            </a>
                        </div>
                    </div>
                    
                    <div class="animation-left-to-right ">
                        <a href="#">
                            SIG Sezione informatica di gestione
                        </a>
                    </div>
                    
                    {{-- <img src="https://services.eu-central-1.v2.cloudbrowser-api.com/image?source=http://example.com&key=MsLJUJ53FT1mvrvDl2GtBXlCfQhI5BLXAC2qmZVtluCYsec7PbguU2sIsRDhN3wN4wI6XqN2&output_return_method=2" alt="Site image" /> --}}

                    <button class="transition duration-500 ease-in-out bg-blue-600 hover:bg-red-600 ">
                        Hover me
                      </button>

                </div>

                <div class="w-full xl:w-4/12 px-4">
                    <div class="flex flex-col w-full border-1">

                        
                        <div class="cursor-pointer mb-4 h-32 justify-between border bg-white group-link-underline">
                            <a class="link-underline" href="#sss">
                                <div class="text-gray-500 hover:text-gray-700 text-xl p-3">
                                    <img class="h-10"  src="{{asset('img/rep_ti_colori-700x118.png')}}" alt="Foto Scuola SSSE - Scuola superiore specializzata di economia"/>
                                    <div class="text-xs mt-3">
                                        DIPARTIMENTO DELL'EDUCAZIONE, DELLA CULTURA E DELLO SPORT DIVISIONE DELLA FORMAZIONE PROFESSIONALE
                                    </div>
                                </div>
                                <div class="h-4 bg-sssegreen"></div>
                            </a>
                        </div>
                        <div class="cursor-pointer mb-4 h-20 justify-between border bg-white group-link-underline">
                            <a href="#">
                                <div class="h-4"></div>
                                <div class="text-gray-500 hover:text-gray-700 text-xl p-3">
                                    <span class="link-underline">CONTATTI</span>
                                </div>
                                <div class="h-4 bg-sssegreen"></div>
                            </a>
                        </div>
                        <div class="cursor-pointer mb-4 h-20 justify-between border bg-white group-link-underline">
                            <a href="#">
                                <div class="h-4"></div>
                                <div class="text-gray-500 hover:text-gray-700 text-xl p-3">
                                    <span class="link-underline">DOWNLOAD</span>                                    
                                </div>
                                <div class="h-4 bg-sssegreen"></div>
                            </a>
                        </div>
                        <div class="cursor-pointer mb-4 h-20 justify-between border bg-white group-link-underline">
                            <a href="#">
                                <div class="h-4"></div>
                                <div class="text-gray-500 hover:text-gray-700 text-xl p-3">
                                    <span class="link-underline">OPENCAMPUS</span>                                    
                                </div>
                                <div class="h-4 bg-sssegreen"></div>
                            </a>
                        </div>
                        <div class="cursor-pointer mb-4 h-20 justify-between border bg-white group-link-underline">
                            <a href="#">
                                <div class="h-4"></div>
                                <div class="text-gray-500 hover:text-gray-700 text-xl p-3">
                                    <span class="link-underline">QUALITÀ</span>                                    
                                </div>
                                <div class="h-4 bg-sssegreen"></div>
                            </a>
                        </div>
                        <div class="cursor-pointer mb-4 h-20 justify-between border bg-white group-link-underline">
                            <a href="#">
                                <div class="h-4"></div>
                                <div class="text-gray-500 hover:text-gray-700 text-xl p-3">
                                    <span class="link-underline">LINKS UTILI</span>                                    
                                </div>
                                <div class="h-4 bg-sssegreen"></div>
                            </a>
                        </div>
                    </div>
                </div>
            

            </div>
        </div>




        <footer class="bg-sssebackground-dark pt-4 text-gray-500">
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
                                    Progetto della SSS_AA Orientamento web 2012-2014 
                                </a>
                                | Proposta di D. Gazzo
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>




        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" ></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js" ></script>
    {{-- <script src="https://unpkg.com/aos@2.3.4/dist/aos.js" > --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        
        AOS.init({
            delay: 200,
            duration: 1200,
            once: false,
            })
        // AOS.init(
        //         // duration: 1200,
        //         // easing: 'ease-in-out-back',
                
        //             // disable: function() {
        //             //     var maxWidth = 800;
        //             //     return window.innerWidth < maxWidth;
        //             // }
        //         );
    </script>
    



</body>
</html>
