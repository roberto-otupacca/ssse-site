<?php

namespace App\View\Components\Site;

use App\Models\News;
use App\Models\Page;
use Illuminate\View\Component;

class MenuTop extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $menuItems = Page::select('pages.title', 'pages.slug', 'colors.css_name')
                    ->join('colors','colors.id','=','pages.color_id')
                    ->where('pages.menu_top', true)
                    ->where('draft', 0)
                    ->orderBy('pages.display_order');

        if(News::count() == 0)
            $menuItems = $menuItems->where('slug', '!=', 'news')->get();
        else
            $menuItems = $menuItems->get();

        return view('components.site.menu-top', compact('menuItems'));
    }
}
