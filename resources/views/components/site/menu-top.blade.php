{{-- <x-menu /> --}}

      <div class="bg-sssebackground-lightest dark:bg-sssebackground-darkest mt-0 fixed w-full z-30 top-0 trigger-menu-wrapper menu-top">
        <nav class="container mx-auto">
          <div class=" flex flex-wrap items-center px-4 md:px-0">
            {{-- <div class="flex pl-3 lg:w-1/2 mx-auto lg:mx-0 text-white font-extrabold"> --}}
            <div class="flex pl-3 mx-auto text-white font-extrabold
                        {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'lg:mx-0 lg:w-1/2':''}}">
                  <a href="{{url('/')}}" class="
                  {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'lg:mt-0 lg:mb-0':''}}"  rel="noreferrer">
                    <img class="h-8 mt-2 mb-2"
                      src="{{asset("img/header-logo-ssse.png")}}"
                      alt="Scuola specializzata superiore di economia"/>
                  </a>
              </div>
              {{-- <div class="flex w-full content-center justify-between lg:w-1/2 lg:justify-end"> --}}
              <div class="flex w-full content-center justify-between
                    {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'lg:w-1/2 lg:justify-end':''}}">

                  <ul class="list-reset flex justify-between flex-1 items-center px-2 md:px-0
                      {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'lg:flex-none':''}}">
                      @foreach($menuItems as $menuItem)
                        @if (Request::segment(1) == $menuItem->slug || (is_null(Request::segment(1)) && $menuItem->slug == "home"))
                          <li class="mr-0 md:mr-3">
                            <div class="cursor-default inline-block py-2 px-0 md:px-4 dark:text-white no-underline line-clamp-1
                                border-t-8 border-{{$menuItem->css_name}}">
                                  {{str_contains($menuItem->title,'¦')?explode("¦", $menuItem->title)[0]:$menuItem->title}}
                                  <span class="hidden
                                    {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'2xl:contents':'xl:contents'}}">
                                      {{str_contains($menuItem->title,'¦')?' - '.explode("¦",$menuItem->title)[1]:''}}
                                  </span>
                            </div>
                          </li>
                        @else
                          <li class="mr-0 md:mr-3">
                            <a class="inline-block py-2 px-0 md:px-4 no-underline border-t-8 line-clamp-1
                                    text-gray-500 hover:text-gray-700
                                    dark:text-gray-400 dark:hover:text-gray-200
                                      transition duration-500 ease-in-out border-sssebackground-lightest hover:border-{{$menuItem->css_name}}
                                      transition duration-500 ease-in-out dark:border-sssebackground-darkest dark:hover:border-{{$menuItem->css_name}}"
                              href="{{url('/' . $menuItem->slug)}}">
                                {{str_contains($menuItem->title,'¦')?explode("¦", $menuItem->title)[0]:$menuItem->title}}
                                    <span class="hidden
                                      {{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'2xl:contents':'xl:contents'}}">
                                        {{str_contains($menuItem->title,'¦')?' - '.explode("¦", $menuItem->title)[1]:''}}
                                    </span>
                            </a>
                          </li>
                        @endif

                      @endforeach

                  </ul>
              </div>
          </div>
      </nav>
      <div
          class="bg-sssegreen leading-3">
          &nbsp;
      </div>
    </div>


