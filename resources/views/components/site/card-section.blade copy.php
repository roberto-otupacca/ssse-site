{{-- <x-site.card-section title="Titolo" :link="$link" :color="$color" :light="$light"/> --}}
<a href="{{$link}}" {{($title == '_special_')?'target="blank"':''}} 
  class="card w-1/3 text-white text-center flex 
          {{($title != '_special_')?'px-0 md:px-4':'hover:text-gray-100'}}
          {{$dimension=="big"?'h-32 py-3':'h-24 py-0'}}
          bg-{{$color}}{{$light?"-light":""}} 
          hover:bg-{{$color}}
          {{(Request::segment(1)!=$link && !(Request::segment(1)==null && $link == 'home'))||($title == 'special')?
            "cursor-pointer hover:shadow-xl hover:border-opacity-0 transform hover:-translate-y-2 transition-all duration-200"
            :"cursor-default"
          }}">
    <div class="{{($title != '_special_')?'m-1':''}} mb-auto mt-auto w-full">
        @if($title != '_special_')
          <h2 class="{{$dimension=="big"?'text-base md:text-xl lg:text-3xl':'text-sm md:text-base lg:text-xl'}} ">
            @if((Request::segment(1) != 'home' && !is_null(Request::segment(1))) && $link == 'home')
              <i class="fas fa-home fa-lg"></i>
            @else
                {{str_contains($title,'¦')?explode("¦", $title)[0]:$title}}
            @endif
          </h2>
          <div class="{{$dimension=="big"?'text-sm md:text-base':'text-xs md:text-sm'}}">
            {{str_contains($title,'¦')?explode("¦", $title)[1]:""}}
          </div>
        @else
          {{-- @if((session('settings')->where('name', 'darkmode')->where('val', 'dark')->count())) --}}
            {{-- <img class=""  src="{{asset('img/rep_ti_colori-700x118 - white.png')}}" alt="Foto Scuola SSSE - Scuola superiore specializzata di economia"/> --}}
          {{-- @else --}}
            <img class="w-52  aspect-h-10  mx-auto pt-1 px-1"  src="{{asset('img/rep_ti_colori-700x118.png')}}" alt="Foto Scuola SSSE - Scuola superiore specializzata di economia"/>
          {{-- @endif     --}}
          <div class="text-xs mt-1 p-px text-gray-700 line-clamp-3">
            DIPARTIMENTO DELL'EDUCAZIONE, DELLA CULTURA E DELLO SPORT DIVISIONE DELLA FORMAZIONE PROFESSIONALE
          </div>
        @endif
    </div>
</a>