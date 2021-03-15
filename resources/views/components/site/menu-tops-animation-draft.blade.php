{{-- <x-menu /> --}}

      <div class="mt-0 fixed w-full z-30 top-0 bg-sssebackground-lightest dark:bg-sssebackground-darkest">
        {{-- <div class=" "> --}}
          <nav class=" z-30 container mx-auto divide-solid"
                      data-aos="nav-animation" 
                      data-aos-duration="1000"
                      data-aos="fade-up"
                      data-aos-anchor="main" 
                      data-aos-anchor-placement="top-top"
                      >
            <div class="flex flex-wrap items-center">
                <div class="z-20 flex pl-3 lg:w-1/2 justify-center lg:justify-start text-white font-extrabold
                        bg-sssebackground-lightest dark:bg-sssebackground-darkest">
                    <a href="{{url('/')}}">
                      <img class="h-8" src="{{asset("img/header-logo-ssse.png")}}" alt="Scuola specializzata superiore di economia"/>
                    </a>
                </div>
                <div class="z-20 flex w-full content-center justify-between lg:w-1/2 lg:justify-end
                        bg-sssebackground-lightest dark:bg-sssebackground-darkest">
                    <ul class="list-reset flex justify-between flex-1 lg:flex-none items-center">
                        @foreach($menuItems as $menuItem)
                          @if (Request::segment(1) == $menuItem->slug || (is_null(Request::segment(1)) && $menuItem->slug == "home"))
                            <li class="mr-3">
                              <div class="cursor-default inline-block py-2 px-4 dark:text-white no-underline border-t-8 border-{{$menuItem->css_name}}">
                                {{str_contains($menuItem->title,'¦')?explode("¦", $menuItem->title)[0]:$menuItem->title}}
                              <br>
                                <div class="cursor-default dark:text-white no-underline trigger-menu-wrapper">
                                  {{str_contains($menuItem->title,'¦')?explode("¦", $menuItem->title)[1]:''}}
                                </div>
                              </div>
                            </li>
                          @else
                            <li class="mr-3">
                              <a class="inline-block py-2 px-4 no-underline border-t-8 text-center
                                      text-gray-500 hover:text-gray-700 
                                      dark:text-gray-400 dark:hover:text-gray-200 
                                        transition duration-500 ease-in-out border-sssebackground-lightest hover:border-{{$menuItem->css_name}}
                                        transition duration-500 ease-in-out dark:border-sssebackground-darkest dark:hover:border-{{$menuItem->css_name}}"
                                        href="{{url('/' . $menuItem->slug)}}">
                                {{str_contains($menuItem->title,'¦')?explode("¦", $menuItem->title)[0]:$menuItem->title}}
                              
                                <div class="dark:text-white no-underline trigger-menu-wrapper">
                                  {{str_contains($menuItem->title,'¦')?explode("¦", $menuItem->title)[1]:''}}
                                </div>
                              </a>
                            </li>
                          @endif

                        @endforeach

                    </ul>
                </div>
                {{-- <div class="p-10 z-0 trigger-menu-wrapper w-full
                      bg-sssebackground-lightest dark:bg-sssebackground-darkest">

                  dsadasdsadsad
                  
                </div> --}}
            </div>
        </nav>
      {{-- </div> --}}
      {{-- <div
          class="bg-sssegreen leading-3">
          &nbsp;
      </div> --}}
      <div class=" z-0 bg-sssebackground-lightest dark:bg-sssebackground-darkest">
        <div class=" container mx-auto bg-sssebackground-lightest dark:bg-sssebackground-darkest">
          <div class="flex flex-wrap items-center">
            <div class="pt-20 trigger-menu-wrapper w-full h-20
                ">

                <div class="flex pl-3 lg:w-1/2 justify-center lg:justify-start text-white font-extrabold
                        bg-sssebackground-lightest dark:bg-sssebackground-darkest">
                        <a href="{{url('/')}}">
                          <img class="h-8" src="{{asset("img/header-logo-ssse.png")}}" alt="Scuola specializzata superiore di economia"/>
                        </a>
                </div>
                <div class="flex w-full content-center justify-between lg:w-1/2 lg:justify-end
                        bg-sssebackground-lightest dark:bg-sssebackground-darkest">
                    <ul class="list-reset flex justify-between flex-1 lg:flex-none items-center">
                        @foreach($menuItems as $menuItem)
                            <li class="mr-3">
                              <div class="cursor-default inline-block py-2 px-4 dark:text-white no-underline border-t-8 border-{{$menuItem->css_name}}">
                                {{str_contains($menuItem->title,'¦')?explode("¦", $menuItem->title)[0]:$menuItem->title}}
                              </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

              <div
                  class="bg-sssegreen leading-3 w-full">
                  &nbsp;
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 

