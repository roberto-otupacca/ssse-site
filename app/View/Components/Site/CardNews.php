<?php

namespace App\View\Components\Site;

use App\Models\News;
use Illuminate\View\Component;

class CardNews extends Component
{
  
    public $dimension;
    public $title;
    public $slug;
    public $text;
    public $dateStart;
    public $color;
    public $light;
    public $categoryId;
    public $categoryName;
  
    /**
     * Create a new component instance.
     *
     * @param [type] $type
     * @param [type] $message
     */
    public function __construct($dimension, $title, $slug, $text, $dateStart, $color, $light, $categoryId, $categoryName)
    {
        $this->dimension = $dimension;
        $this->title = $title;
        $this->slug = $slug;
        $this->text = $text;
        $this->dateStart = $dateStart;
        $this->color = $color;
        $this->light = $light;
        $this->categoryId = $categoryId;
        $this->categoryName = $categoryName;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        // Lista Foto News 
        $photoNews = News::where('slug', $this->slug)->with(['media'])->get();

        //// Visualizza foto della news
        // foreach($photoNews as $key => $n){
        //     foreach($n->photo as $key => $media)
        //     dump($media->getUrl() );
        //     dump($media->getUrl('thumb') );
        // }
        // dd('ddd');

        return view('components.site.card-news', compact('photoNews'));
    }
}
