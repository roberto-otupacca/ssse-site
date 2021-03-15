<?php

namespace App\View\Components\Site;

use Illuminate\View\Component;

class CardSection extends Component
{
  
    public $dimension;
    public $title;
    public $link;
    public $color;
    public $light;
  
    /**
     * Create a new component instance.
     *
     * @param [type] $type
     * @param [type] $message
     */
    public function __construct($dimension, $title, $link, $color, $light)
    {
        $this->dimension = $dimension;
        $this->title = $title;
        $this->link = $link;
        $this->color = $color;
        $this->light = $light;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.site.card-section');
    }
}
