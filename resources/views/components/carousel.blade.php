{{-- <x-carousel :news="$news" /> --}}
{{-- {{dd($news)}} --}}
<div class="{{intval(session('settings')->where('name', 'menurows')->where('val', '1')->count())?'h-28 lg:h-16':'h-28'}}"></div>
<div class=" text-gray-800 flex items-center justify-center my-8" x-data="carouselFilter()">
    <div class="container grid grid-cols-1 px-5">
        @if($news->take(session('settings')->where('name', 'newsnumber')->firstWhere('val')->val)->groupBy('category_name')->count() > 1)
            <div class="flex  justify-center gap-12">
                {{--Titoli categorie--}}
                @foreach($news->take(session('settings')->where('name', 'newsnumber')->firstWhere('val')->val)->groupBy('category_name') as $key => $n)
                    <a class=" text-lg uppercase font-bold tracking-widest line-clamp-1 mb-2                
                        hover:text-gray-800 border-b-2 border-{{$n->first()->css_name}}" 
                        :class="{ 'text-gray-500': active != {{$loop->index}} }" 
                        href="#" @click.prevent="changeActive({{$loop->index}})">
                        {{$key}}
                    </a>
                @endforeach
            </div>
        @endif
      
        {{-- Ciclo per categoria news --}}
        @foreach($news->take(session('settings')->where('name', 'newsnumber')->firstWhere('val')->val)->groupBy('category_name') as $key => $listNews)
            <div class="row-start-2 col-start-1"
                x-show="active == {{$loop->index}}"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"
            >
                <div class="grid grid-cols-1 grid-rows-1" x-data="carousel()" x-init="init()">
                <div class="flex col-start-1 row-start-1 relative z-10 pointer-events-none
                            justify-center mr-24 lg:mr-36 xl:mr-40 mb-2 xl:mb-4 2xl:mb-6
                            items-end ">
                    {{-- Lista titoli di una categoria news--}}
                    @foreach($listNews as $n)
                        <h2 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl uppercase 
                                    w-1/2 group-link-underline p-3 bg-opacity-30 bg-black"
                                
                            style="color:{{$n->text_color}}; "
                            x-show="active == {{$loop->index}}"
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 transform translate-y-8"
                            {{-- x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-out duration-300"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-12" --}}
                        >
                            <a class="mb-0 pb-0 link-underline-colored" 
                            {{-- href="{{url('news') . '/' . $n->slug}}" --}}
                                href="#"
                                data-open="modal{{($loop->parent->index) * 1000 + $loop->index}}"
                                style=" pointer-events: auto !important; 
                                        cursor: pointer !important;
                                        background-image:linear-gradient(transparent,transparent),
                                                linear-gradient({{$n->text_color}},{{$n->text_color}});"
                                >
                                {{$n->title}}
                            </a>
                        </h2>
                    @endforeach
                </div>
        
                <div class="carousel col-start-1 row-start-1" x-ref="carousel">
                    {{-- Lista immagini di una categoria--}}
                    @foreach($listNews as $n) 
                        <div class="w-3/5 px-2">
                            <img src="{{$photoNews->where('slug', $n->slug)->first()->photo->first()->getUrl('preview')}}"
                            loading="lazy" alt="{{$n->category_name . '- ' . $n->title}}">
                            {{-- <video src="{{asset('img/sss2.mp4')}}" poster="{{asset('img/poster3.png')}}" controls="" class="" loading="lazy"></video> --}}
                        </div>
                    @endforeach
                </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- Categoria news --}}
<div class="cursor-pointer ">
    @foreach($news->take(session('settings')->where('name', 'newsnumber')->firstWhere('val')->val)->groupBy('category_name') as $key => $listNews)
        {{-- Lista titoli di una categoria news--}}
        @foreach($listNews as $n)
            <div class="modal fixed top-24 left-0 right-0 bottom-0 flex items-center z-40
                        justify-center bg-gray-500 bg-opacity-50 invisible cursor-default" 
                        id="modal{{($loop->parent->index) * 1000 + $loop->index}}" data-animation="slideInOutTop">
                <div class="modal-dialog relative w-2/3 h-2/3 rounded bg-sssebackground dark:bg-sssebackground-dark
                            flex flex-col justify-between">
                    <header class="bg-{{$n->css_name}}-light text-2xl text-black px-3 pb-3 pt-2 shadow-lg">
                        {{-- {{$n->title}} --}}
                        {{-- {{\Carbon\Carbon::parse("2018-03-20")->formatLocalized('%d/%B/%Y')}} --}}
                        {{utf8_encode(\Carbon\Carbon::parse("2018-03-20")->formatLocalized('%A, %d %B %Y'))}}
                        
                        <button class="close-modal cursor-pointer float-right" aria-label="close modal" data-close>
                            <i class="fas fa-times"></i>
                        </button>
                    </header>
                    <section class= "overflow-auto">
                        <div class="prose max-w-max p-3 ">
                            {!!($n->text)!!}
                        </div>
                    </section>

                    <footer class="group-link-underline bg-{{$n->css_name}}-light text-black p-3 shadow-xl">
                        
                        <a class="pb-1 link-underline-black cursor-pointer float-right" 
                            href="{{url('notizia') . '/' . $n->slug}}"
                            {{-- style="linear-gradient({{$n->text_color}},{{$n->text_color}});" --}}
                            >
                            Vai alla pagina della news
                        </a>
                    </footer>
                </div>
            </div>
        @endforeach
    @endforeach
</div>