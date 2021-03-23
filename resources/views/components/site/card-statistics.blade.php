{{-- <x-site.card-statistics title="Titolo" dimension="dim" :link="$link" :color="$color" :light="$light"/> --}}
<section class="text-gray-600 pt-24 body-font 
  @if(session('settings')->where('name', 'statposition')->where('val', 'down')->count()) pb-10 @endif">
  <div class="container mx-auto px-5">
    
    @if(session('settings')->where('name', 'statposition')->where('val', 'down')->count())
      <div class="flex flex-col text-center w-full mb-10">
        <h2 class=" text-4xl lg:text-5xl font-semibold title-font mb-4 text-sssegreen">IN BREVE</h2>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">
          La SSSE è perfettamente integrata nel mondo del lavoro e ha molte qualità nel campo dell'insegnamento.
        </p>
      </div>
    @endif

    <div class="flex flex-wrap -m-4 text-center">
                  
      <div class="p-4 w-full md:w-1/2 xl:w-1/4" 
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
            <div class="text-sssegreen w-12 h-12 mb-3 inline-block">
              <i class="fas fa-comment-dollar fa-3x"></i>
            </div>
            <h2 class="text-5xl text-gray-900 dark:text-gray-300 py-1">90%</h2>
            <p class="leading-relaxed">
              La tassa scolastica si recupera quasi interamente attraverso gli stage pagati
            </div>
        </div>
        <div class="h-5 bg-sssegreen text-xs text-white">SSSE - Scuola Specializzata superiore di economia</div>
      </div>

      
      <div class="p-4 w-full md:w-1/2 xl:w-1/4" 
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
            <div class="text-sssegreen w-12 h-12 mb-3 inline-block">
              <i class="fas fa-briefcase fa-3x"></i>
            </div>
            <h2 class="text-5xl text-gray-900 dark:text-gray-300 py-1">&infin;</h2>
            <p class="leading-relaxed">Al termine degli studi i diplomati disporanno di un cerca-lavoro esclusivo per loro</p>
          </div>
        </div>
        <div class="h-5 bg-sssegreen text-xs text-white">SSSE - Scuola Specializzata superiore di economia</div>
      </div>

      <div class="p-4 w-full md:w-1/2 xl:w-1/4" 
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
            <div class="text-sssegreen w-12 h-12 mb-3 inline-block">
              <i class="fas fa-user-graduate fa-3x"></i>
            </div>
            <h2 class="text-5xl text-gray-900 dark:text-gray-300 py-1">+500</h2>
            <p class="leading-relaxed">Il totale dei diplomati inseriti nel mondo del lavoro ticinese e internazionale</p>
          </div>
        </div>
        <div class="h-5 bg-sssegreen text-xs text-white">SSSE - Scuola Specializzata superiore di economia</div>
      </div>

      <div class="p-4 w-full md:w-1/2 xl:w-1/4"  
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
            <div class="text-sigred w-12 h-12 mb-3 inline-block">
              <i class="fas fa-user-tie fa-3x"></i>
            </div>
            <h2 class="text-5xl text-gray-900 dark:text-gray-300 py-1">&#x7e;50%</h2>
            <p class="leading-relaxed">Sono i diplomati in informatica di gestione che nell'azienda in cui svolgono lo stage trovano immediatamente il primo impiego</p>
          </div>
        </div>
        <div class="h-5 bg-sigred text-xs text-white">SIG - Sezione di Informatica di Gestione</div>
      </div>

      <div class="p-4 w-full md:w-1/2 xl:w-1/4"  
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
            <div class="text-sssegreen w-12 h-12 mb-3 inline-block">
              <i class="fas fa-chalkboard-teacher fa-3x"></i>
            </div>
            <h2 class="text-5xl text-gray-900 dark:text-gray-300 py-1">+12</h2>
            <p class="leading-relaxed">Sono gli anni di esperienza maturati nel blended learning</p>
          </div>
        </div>
        <div class="h-5 bg-sssegreen text-xs text-white">SSSE - Scuola Specializzata superiore di economia</div>
      </div>

      <div class="p-4 w-full md:w-1/2 xl:w-1/4"  
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
            <div class="text-sssegreen w-12 h-12 mb-3 inline-block">
              <i class="fas fa-city fa-3x"></i>
            </div>
            <h2 class="text-5xl text-gray-900 dark:text-gray-300 py-1">+250</h2>
            <p class="leading-relaxed">Sono le aziende coinvolte negli stage della scuola</p>
          </div>
        </div>
        <div class="h-5 bg-sssegreen text-xs text-white">SSSE - Scuola Specializzata superiore di economia</div>
      </div>

      <div class="p-4 w-full md:w-1/2 xl:w-1/4"  
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
            <div class="text-sigred w-12 h-12 mb-3 inline-block">
              <i class="fas fa-university fa-3x"></i>
            </div>
            <h2 class="text-5xl text-gray-900 dark:text-gray-300 py-1">+35</h2>
            <p class="leading-relaxed">Gli anni di esperienza muturati nel formare Informatici di gestione</p>
          </div>
        </div>
        <div class="h-5 bg-sigred text-xs text-white">SIG - Sezione di Informatica di Gestione</div>
      </div>

      <div class="p-4 w-full md:w-1/2 xl:w-1/4"  
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
            <div class="text-seablue w-12 h-12 mb-3 inline-block">
              <i class="fas fa-university fa-3x"></i>
            </div>
            <h2 class="text-5xl text-gray-900 dark:text-gray-300 py-1">+10</h2>
            <p class="leading-relaxed">Gli anni di esperienza muturati nel formare Economisti aziendali</p>
          </div>
        </div>
        <div class="h-5 bg-seablue text-xs text-white">SEA - Sezione di Economia Aziendale</div>
      </div>
      
      <div class="p-4 w-full md:w-1/2 xl:w-1/4"  
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
            <div class="text-sssegreen w-12 h-12 mb-3 inline-block">
              <i class="fas fa-layer-group fa-3x"></i>
            </div>
            <h2 class="text-5xl text-gray-900 dark:text-gray-300 py-1">6</h2>
            <p class="leading-relaxed">La classificazione europea del titolo SSSE, pertanto allo stesso livello di un titolo di Bachelor</p>
          </div>
        </div>
        <div class="h-5 bg-sssegreen text-xs text-white">SSSE - Scuola Specializzata superiore di economia</div>
      </div>

      <div class="p-4 w-full md:w-1/2 xl:w-1/4"  
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
            <div class="text-sssegreen w-12 h-12 mb-3 inline-block">
              <i class="fas fa-user-tie fa-3x"></i>
            </div>
            <h2 class="text-5xl text-gray-900 dark:text-gray-300 py-1">+70%</h2>
            <p class="leading-relaxed">I docenti professionisti che sono anche certificati nell'insegnamento</p>
          </div>
        </div>
        <div class="h-5 bg-sssegreen text-xs text-white">SSSE - Scuola Specializzata superiore di economia</div>
      </div>

      <div class="p-4 w-full md:w-1/2 xl:w-1/4"  
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
            <div class="text-seablue w-12 h-12 mb-3 inline-block">
              <i class="fas fa-random fa-3x"></i>
            </div>
            <h2 class="text-5xl text-gray-900 dark:text-gray-300 py-1">+</h2>
            <p class="leading-relaxed">I diplomati in economia aziendale si possono perfezionare come contabili federali o controller o tramite corsi universitari</p>
          </div>
        </div>
        <div class="h-5 bg-seablue text-xs text-white">SEA - Sezione di Economia Aziendale</div>
      </div>
      
      <div class="p-4 w-full md:w-1/2 xl:w-1/4"  
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
            <div class="text-sigred w-12 h-12 mb-3 inline-block">
              <i class="fas fa-business-time fa-3x"></i>
            </div>
            <h2 class="text-5xl text-gray-900 dark:text-gray-300 py-1">+85%</h2>
            <p class="leading-relaxed">Sono i diplomati in informatica di gestione trovano lavoro in meno di un anno</p>
          </div>
        </div>
        <div class="h-5 bg-sigred text-xs text-white">SIG - Sezione di Informatica di Gestione</div>
      </div>

    </div>
  </div>
</section>