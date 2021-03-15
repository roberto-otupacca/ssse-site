<div class="bg-white dark:bg-sssebackground-darkest 
              overflow-hidden col-span-4
              
              text-gray-500 hover:text-gray-700 
              dark:text-gray-300 dark:hover:text-gray-100">
              
    <img src="{{$photoNews->first()->photo->first()->getUrl('preview')}}" alt="img" class="w-full object-cover h-32 sm:h-48 md:h-64">
    <div class="px-4 md:px-6 pt-4 md:pt-6 pb-2 md:pb-4">
      <div class="h-24">
        <p class="text-{{$color}} font-semibold text-xs xl:text-sm mb-1 leading-none">{{$categoryName}}&nbsp;</p>
        <h3 class="font-semibold mb-2 text-xl leading-tight sm:leading-normal ">
          <span class="line-clamp-2 group-link-underline">
            {{-- <a href="{{url('/news') . '/' . $slug . '/' . $categoryId}}" --}}
            <a href="{{url('/notizia') . '/' . $slug }}"
               class="{{(session('settings')->where('name', 'darkmode')->where('val', 'dark')->count())?'link-underline-white':'link-underline'}}">
              {{$title}}
            </a>
          </span>
        </h3>
      </div>
      <div class="text-sm flex items-center">
        <p class="pt-4">
          {{$dateStart}}
          {{--non funzia--}}
          {{-- {{utf8_encode(\Carbon\Carbon::parse(date( 'd/m/Y', strtotime( $dateStart ) ))->formatLocalized('%A, %d %B %Y'))}} --}}
          
        </p>
      </div>
    </div>
    <div class="h-4 bg-{{is_null($color)?"black":$color}}"></div>
</div>