<?php

namespace App\View\Components;

use App\Models\News;
use Illuminate\View\Component;

class Carousel extends Component
{
  
    public $news;
  
    /**
     * Create a new component instance.
     *
     * @param [type] $type
     * @param [type] $message
     */
    public function __construct($news)
    {
        $this->news = $news;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        
        // Lista Foto News 
        $photoNews = News::with(['media'])->get();

        // dd($photoNews->first()->photo->first()->getUrl());
        //// Visualizza foto della news
        // foreach($photoNews as $key => $n){
        //     foreach($n->photo as $key => $media)
        //     dump($media->getUrl() );
        //     dump($media->getUrl('thumb') );
        // }
        // dd('ddd');

        return view('components.carousel', compact('photoNews'));
    }
}
