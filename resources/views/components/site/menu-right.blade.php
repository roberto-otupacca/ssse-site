{{-- <x-site.menu-right> </x-site.menu-right> --}}

<div class="flex flex-col w-full border-1">


  <div class="cursor-pointer mb-4 h-32 justify-between group-link-underline bg-white dark:bg-sssebackground-darkest">
      <a class="link-underline" href="https://www4.ti.ch/decs/dfp/divisione/" target="blank">
          <div class="text-xl p-3
                    text-gray-500 hover:text-gray-700
                    dark:text-gray-300 dark:hover:text-gray-100 ">
              
              @if((session('settings')->where('name', 'darkmode')->where('val', 'dark')->count()))
                <img class="h-10"  src="{{asset('img/rep_ti_colori-700x118 - white.png')}}" alt="Foto Scuola SSSE - Scuola superiore specializzata di economia"/>
              @else
                <img class="h-10"  src="{{asset('img/rep_ti_colori-700x118.png')}}" alt="Foto Scuola SSSE - Scuola superiore specializzata di economia"/>
              @endif              
              
              <div class="text-xs mt-3">
                  DIPARTIMENTO DELL'EDUCAZIONE, DELLA CULTURA E DELLO SPORT DIVISIONE DELLA FORMAZIONE PROFESSIONALE
              </div>
          </div>
          <div class="h-5 bg-sssegreen"></div>
      </a>
  </div>
  @foreach($menuItems as $menuItem)
    <div class="cursor-pointer mb-4 h-20 justify-between  group-link-underline bg-white dark:bg-sssebackground-darkest">
      <a href="{{url('/' . $menuItem->slug)}}">
          <div class="h-4"></div>
          <div class="text-xl p-3
                    text-gray-500 hover:text-gray-700 
                    dark:text-gray-300 dark:hover:text-gray-100">
              <span class="{{(session('settings')->where('name', 'darkmode')->where('val', 'dark')->count())?'link-underline-white':'link-underline'}}">{{$menuItem->title}}</span>
          </div>
          <div class="h-4 bg-{{$menuItem->css_name}}"></div>
      </a>
    </div>
  @endforeach
  <video src="{{asset('img/sss2.mp4')}}" poster="{{asset('img/poster3.png')}}" controls="" class=""></video>
</div>
 

