<?php

namespace App\View\Components\Site;

use App\Models\Page;
use Illuminate\View\Component;

class MenuRight extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
                    ->where('pages.menu_right', true)
                    ->where('draft', 0)
                    ->orderBy('pages.display_order')
                    ->get();

        return view('components.site.menu-right', compact('menuItems'));
    }
}
