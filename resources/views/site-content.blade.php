{{-- {{dd($pageL1)}} --}}
<x-site-layout :title="$pageL1->title" :news="$news" :page='$page'>

    {{-- Lista mattonelle primo livello--}}
    <div class="flex flex-row gap-1 md:gap-2 w-full pb-4">
        @foreach($pagesL1 as $pag)
            @if($pag->slug != 'home')
                <x-site.card-section dimension="big" :title="$pag->title" :link="'/'.$pag->slug" 
                    :color="$pag->css_name" :light="(Request::segment(1)!=$pag->slug)&&($pagesL2->where('parent_id',$pag->id)->count()==0)"/>
            @endif
        @endforeach
    </div>
    
    {{-- Lista mattonelle secondo livello--}}
    <div class="flex flex-wrap gap-1 md:gap-2 w-full pb-4">
        @foreach($pagesL2 as $pag)
            @if($pag->slug != 'home' || 
              ($pag->slug == 'home' && Request::segment(1) != 'home' && !is_null(Request::segment(1))))
                <x-site.card-section dimension="small" :title="$pag->title" :link="'/'.$pag->slug" 
                    :color="$pag->css_name" :light="(Request::segment(1)!=$pag->slug)&&(Request::segment(1)!=null||$pag->slug!='home')"/>
            @endif
        @endforeach
    </div>
    
    {{-- Visualizzazione a una colonna: lista menu L3 per pagina home --}}
    @if (session('settings')->where('name', 'sitecolumns')->where('val', 'one')->count() &&
        (Request::segment(1) == 'home' || is_null(Request::segment(1)) || $page->menu_right == 1)) 
        <div class="flex flex-wrap gap-1 md:gap-2 w-full pb-4">
            @foreach($pagesL3 as $pag)
             {{-- {{dd($pag)}} --}}
                @if($pag->slug != 'home' || ($pag->slug == 'home' && Request::segment(1) != 'home' && !is_null(Request::segment(1))))
                    <x-site.card-section dimension="small" :title="$pag->title" :link="'/'.$pag->slug" 
                        :color="$pag->css_name" :light="(Request::segment(1)!=$pag->slug)&&(Request::segment(1)!=null||$pag->slug!='home')"/>
                @endif
            @endforeach
            <x-site.card-section dimension="small" title="_special_" link="https://www4.ti.ch/decs/dfp/divisione/" color="sssegreen" :light="true"/>
        </div> 
    @endif
    
    {{-- Pulsanti pagina news --}}
    @if(Request::segment(1) == 'notizia') 
        <div class="container mx-auto">
            <div class="flex flex-row items-center justify-center gap-6"> 
                <div class=" cursor-pointer hover:shadow-xl hover:border-opacity-0 transform hover:-translate-y-2 transition-all duration-200 ">
                    <a href="{{url('/news') . '/' . $page->category_id }}" 
                        class="p-3 bg-{{$page->css_name}}-light hover:bg-{{$page->css_name}} text-white text-xs md:text-base line-clamp-1">
                            <i class="fas fa-chevron-left"></i>
                            @if(str_replace(url('/').'/', '', url()->previous()) == 'news')
                                Torna alla pagina delle news
                            @else
                                Vai alla pagina delle news
                            @endif
                    </a>
                </div>
                <div class=" cursor-pointer hover:shadow-xl hover:border-opacity-0 transform hover:-translate-y-2 transition-all duration-200 shadow-md ">
                    <a href="{{url('/notizia') . '/' . $pageNext->slug }}" 
                        class="p-3 bg-{{$page->css_name}}-light hover:bg-{{$page->css_name}} text-white text-xs md:text-base line-clamp-1">
                            Vai alla prossima news
                            <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    @endif
    
    {{-- Carosello con le foto se si è in una pagina di una news --}}
    @if(isset($photosCurrentNews) && $photosCurrentNews->count() > 0)
        <div class="p-4"></div>
        {{-- <div class="flickity-viewport"> --}}
        <div class="" >
            <div class="carousel"
                data-flickity='{ "fullscreen": true, "lazyLoad": 2 {{$photosCurrentNews->first()->photo->count() == 1?', "prevNextButtons": false':''}} }'>
                @foreach($photosCurrentNews as $photo)
                    @foreach($photo->photo as $key => $media)
                    <div class="carousel-cell  px-2 
                        {{$photo->photo->count()<3?'w-max':'w-3/5'}}">
                        <img data-flickity-lazyload="{{$media->getUrl('preview')}}">
                        {{-- loading="lazy"> --}}
                    </div>
                    @endforeach
                @endforeach
            </div>  
        </div>
        <div class="p-8"></div>
    @endif    

    {{-- Contenuto della pagina--}}
    <div class="prose max-w-max">
        {!!($page->text)!!}
    </div>

    {{-- Pagina News: Lista delle notizie--}}
    @if(Request::segment(1) == 'news')
        @if($news->groupBy('category_name')->count() > 1)
            <nav class="tabs flex flex-col sm:flex-row mb-2">
                @foreach($news->groupBy('category_name') as $key => $categoryNews) 
                    <button data-target="panel-{{$loop->index}}" 
                        class="tab {{($categoryNews->first()->category_id == $category)||($category==0 && $loop->first)?'active 
                            text-gray-800':'text-gray-400 dark:text-gray-500'}} pb-1 block 
                                focus:outline-none  border-b-2 border-{{$categoryNews->first()->css_name}}
                                mr-12 text-lg uppercase font-bold  line-clamp-1                
                                hover:text-gray-800 
                                ">
                        {{$key}}
                    </button>
                {{-- </a> --}}
                @endforeach
            </nav>
        @endif
        <div id="panels">
            @foreach($news->groupBy('category_name') as $key => $categoryNews) 
                <div class="panel-{{$loop->index}} {{$loop->first?'active block':'hidden'}} tab-content py-5">
                    <div class="grid grid-cols-4 md:grid-cols-8 lg:grid-cols-12 gap-4">
                        @foreach($categoryNews as $n) 
                            <x-site.card-news dimension="dimension" :title="$n->title" :slug="$n->slug"  :text="$n->text" :dateStart="$n->date_start"
                                :categoryId="$n->category_id" :color="$n->css_name" light="1" :categoryName="$n->category_name"/>
                        @endforeach
                    </div> 
                </div>
            @endforeach
        </div>
    @endif
       
    {{-- Links legati alla pagina--}}
    <div class="mt-8">
        @foreach($links->groupBy('category_id') as $linkList)
            {{-- {{dd($linkList)}}  --}}
            @if(!is_null($linkList->first()->category_id))
                <x-site.title-category icon="fas fa-link"  :categoryName="$linkList->first()->category_name" :cssName="$linkList->first()->css_name" /> 
            @endif

            <ul>
                @foreach($linkList as $link)
                    <li class="pl-4 animation-left-to-right">
                        @if(is_null($linkList->first()->category_id))
                            <i class="fas fa-link"></i>
                        @endif
                        <a href="{{$link->link}}" target="blank">{{$link->title}}</a>
                    </li>
                    @if ($loop->last)
                            <div class="p-2"></div>
                    @endif
                @endforeach
            </ul>
            @if ($loop->last)
                    <div class="p-6"></div>
            @endif
        @endforeach
    </div>

    {{-- File legati alla pagina--}}
    <div class="mt-8">
        @foreach($files->groupBy('category_id') as $fileList)
            @if(!is_null($fileList->first()->category_id))
                <x-site.title-category icon="fas fa-download"  :categoryName="$fileList->first()->category_name" :cssName="$fileList->first()->css_name" /> 
            @endif

            <ul>
                @foreach($fileList as $file)
                    <li class="pl-4 animation-left-to-right">
                        @if(is_null($fileList->first()->category_id))
                            <i class="fas fa-download"></i>
                        @endif
                        <a href="{{url('/download') . '/' . $file->slug}}" target="blank">{{$file->title}}</a>
                    </li>
                    @if ($loop->last)
                            <div class="p-2"></div>
                    @endif
                @endforeach
            </ul>
            @if ($loop->last)
                    <div class="p-6"></div>
            @endif
        @endforeach
    </div>

    {{-- Visualizzazione a una colonna lista menu L3 per pagine non home --}}
    @if (session('settings')->where('name', 'sitecolumns')->where('val', 'one')->count() &&
        Request::segment(1) != 'home' && !is_null(Request::segment(1)) && $page->menu_right != 1) 
        <div class="flex flex-wrap gap-1 md:gap-2 w-full pb-4">
            @foreach($pagesL3 as $pag)
                @if($pag->slug != 'home' || 
                ($pag->slug == 'home' && Request::segment(1) != 'home' && !is_null(Request::segment(1))))
                    {{-- {{dd($pagesL1->where('id',$pag->parent_id)->count())}} --}}
                    <x-site.card-section dimension="small" :title="$pag->title" :link="'/'.$pag->slug" 
                        :color="$pag->css_name" :light="(Request::segment(1)!=$pag->slug)&&(Request::segment(1)!=null||$pag->slug!='home')"/>
                @endif
            @endforeach 
            <x-site.card-section dimension="small" title="_special_" link="https://www4.ti.ch/decs/dfp/divisione/" color="sssegreen" :light="true"/>
        </div>
    @endif
    
</x-site-layout>