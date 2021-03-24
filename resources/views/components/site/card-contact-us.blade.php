{{-- <x-site.card-statistics title="Titolo" dimension="dim" :link="$link" :color="$color" :light="$light"/> --}}
<section class="text-gray-600 pt-10 body-font pb-10">
  <div class="container mx-auto px-5">
    
    {{-- @if(session('settings')->where('name', 'statposition')->where('val', 'down')->count())
      <div class="flex flex-col text-center w-full mb-10">
        <h1 class=" text-4xl lg:text-5xl font-semibold title-font mb-4 text-sssegreen">IN BREVE</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">
          La SSSE è perfettamente integrata nel mondo del lavoro e ha molte qualità nel campo dell'insegnamento.
        </p>
      </div>
    @endif --}}

    <div class="flex flex-wrap -m-4 text-center">
         
      <div class="group-link-underline p-4 w-full lg:w-1/3"
      @if(session('settings')->where('name', 'statposition')->where('val', 'down')->count())
              data-aos="fade-up" 
              {{-- data-aos-anchor-placement="top-bottom" --}}
              data-aos-duration="1200"
              @endif
              >
        <a href="{{url('/contatti')}}">
          <div class="shadow-xl h-48 lg:h-60 flex flex-col justify-center
                    text-gray-500 dark:text-gray-300
                    bg-white dark:bg-sssebackground-darkest">
              <div class=" px-4 py-6">
                <div class="text-sssegreen w-12 h-12 mb-3 inline-block">
                    {{-- <i class="far fa-hand-scissors fa-rotate-90 fa-3x"></i> --}}
                    <i class="fas fa-handshake fa-4x"></i>
                </div>
                <h2>
                  <span class="text-4xl text-gray-900 dark:text-gray-300 py-1 link-underline-black">Contattaci</span>
                </h2>
                {{-- <p class="leading-relaxed">
                ev.testo
                </p> --}}
              </div>
          </div>
          <div class="h-5 bg-sssegreen text-xs text-white"></div>
        </a>
      </div>

      <div class="group-link-underline p-4 w-full lg:w-1/3"
      @if(session('settings')->where('name', 'statposition')->where('val', 'down')->count())
              data-aos="fade-up" 
              {{-- data-aos-anchor-placement="top-bottom" --}}
              data-aos-duration="1200"
              @endif
              >
        <a href="https://www.facebook.com/ssse.bellinzona" target="_blank">
          <div class="shadow-xl h-48 lg:h-60 flex flex-col justify-center
                    text-gray-500 dark:text-gray-300
                    bg-white dark:bg-sssebackground-darkest">
            <div class=" px-4 py-6">
              <div class="text-sssegreen w-12 h-12 mb-3 inline-block">
                <i class="fab fa-facebook-square fa-4x"></i>
              </div>
              <h2>
                <span class="text-4xl text-gray-900 dark:text-gray-300 py-1 link-underline-black">Facebook Us</span>
              </h2>
              {{-- <p class="leading-relaxed">ev. testo</p> --}}
            </div>
          </div>
          <div class="h-5 bg-sssegreen text-xs text-white"></div>
        </a>
      </div>

      
      <div class="p-4 w-full lg:w-1/3" 
              @if(session('settings')->where('name', 'statposition')->where('val', 'down')->count())
              data-aos="fade-up" 
              {{-- data-aos-anchor-placement="top-bottom" --}}
              data-aos-duration="1200"
              @endif
              >
        <div class="shadow-xl h-60 flex flex-col justify-center
                  text-gray-500 dark:text-gray-300
                  bg-white dark:bg-sssebackground-darkest">
          <div class=" px-4 py-6">
            {{-- <div class="text-sssegreen w-12 h-12 mb-3 inline-block">
              <i class="fas fa-briefcase fa-3x"></i>
            </div> --}}
            <h2 class="text-4xl text-gray-900 dark:text-gray-300 pb-4">Incontriamoci</h2>
            {{-- <p class="leading-relaxed">ev.testo</p> --}}
            
            <div class="h-40 w-full">
              <div id="map" class="w-full h-full"></div>
            </div>
          </div>
        </div>
        <div class="h-5 bg-sssegreen text-xs text-white"></div>
      </div>

    </div>
  </div>
</section>