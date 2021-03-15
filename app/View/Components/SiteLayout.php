<?php

namespace App\View\Components;

use App\Models\News;
use App\Models\Page;
use Illuminate\View\Component;

class SiteLayout extends Component
{
    
    public $title;
    public $news;
    public $page;
    
    /**
     * Create a new component instance.
     *
     * @param [type] $type
     * @param [type] $message
     */
    public function __construct($title, $news, $page)
    {
        $this->title = $title;
        $this->news = $news;
        $this->page = $page;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $htmlTitle = !is_null(request()->segment(1))?"SSSE - ".strtoupper(request()->segment(1)):"SSSE - Scuola specializzata superiore di economia";
        return view('layouts.site', compact('htmlTitle'));
    }
}
