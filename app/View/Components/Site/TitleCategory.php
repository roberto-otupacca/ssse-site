<?php

namespace App\View\Components\Site;

use Illuminate\View\Component;

class TitleCategory extends Component
{
  
    public $icon;
    public $categoryName;
    public $cssName;
  
    /**
     * Create a new component instance.
     *
     * @param [type] $type
     * @param [type] $message
     */
    public function __construct($icon, $categoryName, $cssName)
    {
        $this->icon = $icon;
        $this->categoryName = $categoryName;
        $this->cssName = $cssName;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.site.title-category');
    }
}
