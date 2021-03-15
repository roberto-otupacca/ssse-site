<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\File;
use App\Models\News;
use App\Models\Page;
use App\Models\Category;
use App\Models\Setting;


class SiteController extends Controller
{

    /**
     * Mostra una qualsiasi pagina del sito (a parte le news)
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($slug = null)
    {
        ///////////////////////////////////
        // Lista settings messi in sessione
        if (!isset(session()->settings)) {
            session()->put('settings', Setting::all('name','val'));
        }
        // dd(session()->all());
        // dd(session('settings'));
        // dd(session('settings')->where('name', 'darkmode')->where('val', 'white')->count());
        // dd(session('settings')->where('name', 'darkmode')->firstWhere('val')->val);

        $category = 0;
        if($slug == null) {
            $slug ="home";
        } else {
            $c = CATEGORY::where('id', $slug)->get();
            if (request()->segment(1) == 'news') {
                $slug ="news";
                if ($c->count() > 0) {
                    $category = $c->first()->id;
                }
            }
        }

        ///////////////////////////////////////
        // Intercetta pagina legata al menu-top
        $page = Page::where('slug',$slug)->where('draft', 0)->get();

        if ($page->count() == 0) {
            abort(404);
        } else {
            $page = $page->first();
        }

        // Se la pagina ha associato un colore, i titoli della pagina vengono colorati
        $color =COLOR::where('colors.id', $page->color_id)->get();
        if ($color->count() > 0) {
            $listTag = [['<h1', ' text-4xl '], ['<h2', ' text-3xl '], ['<h3', ' text-2xl '], ['<h4', ' text-xl ']];
            foreach($listTag as $tag) {
                $page->text = str_replace($tag[0], $tag[0] . " class='pb-2 font-semibold text-". $color->first()->css_name . $tag[1] . "'", $page->text);
            }
        }

        ////////////////////
        // Lista sottopagine + lista sotto-sottopagine
        if(is_null($page->parent_id) || $page->menu_top || $page->menu_right) {
            $pageL1Id = $page->id;
            $pageL2Id = 0;

        } else {
            // Se la pagina non è direttamente collegata a menu-top o menu-right recupera le "mattonelle del primo livello corrette
            $parentPage = Page::where('id',$page->parent_id)->first();

            if ($parentPage->menu_top || $parentPage->menu_right) {
                $pageL1Id = $parentPage->id;
                $pageL2Id = $page->id;
            } else {
                if(is_null($parentPage->parent_id)) {
                    $pageL1Id = $parentPage->id;
                    $pageL2Id = $page->id;
                } else {
                    $pageL1Id = $parentPage->parent_id;
                    $pageL2Id = $page->parent_id;
                }
            }
        }

        // Pagina prima livello
        $pageL1 = Page::where('id', $pageL1Id)->first();

        // Lista sottopagine
        $pagesL1 = Page::select('pages.id', 'pages.title', 'pages.text', 'pages.slug', 'colors.css_name')
            ->leftjoin('colors', 'colors.id', '=', 'pages.color_id')
            ->where('parent_id', $pageL1Id)
            ->where('draft', 0)
            ->orderBy('pages.display_order')
            ->get();
        // Lista sotto-sottopagine
        $pagesL2 = Page::select('pages.parent_id', 'pages.title', 'pages.text', 'pages.slug', 'colors.css_name')
                ->leftjoin('colors', 'colors.id', '=', 'pages.color_id')
                ->where('parent_id', $pageL2Id)
                ->where('draft', 0)
                ->orderBy('pages.display_order')
                ->get();

        // Lista pagine menu-right (visione due colonne) o menu Livello 3 (visione una colonna)
        if (session('settings')->where('name', 'sitecolumns')->where('val', 'one')->count()) {
            $pagesL3 = Page::select('pages.id', 'pages.title', 'pages.text', 'pages.slug', 'colors.css_name')
                ->leftjoin('colors', 'colors.id', '=', 'pages.color_id')
                ->where('menu_right', 1)
                ->where('draft', 0)
                ->orderBy('pages.display_order')
                ->get();
        } else {
            $pagesL3 = collect();
        }

        //////////////////////////////
        // Link legati alla pagina top
        $links = Page::select('links.title', 'links.link', 'colors.css_name', 'links.category_id', 'categories.name as category_name')
            ->join('link_page', 'pages.id', '=' , 'link_page.page_id')
            ->join('links', 'links.id', '=', 'link_page.link_id')
            ->leftjoin('categories', 'categories.id', '=', 'links.category_id')
            ->leftjoin('colors', 'colors.id', '=', 'categories.color_id')
            ->where('slug',$slug)
            ->orderBy('categories.display_order')
            ->orderBy('links.display_order')
            ->get();

        ///////////////////////////////
        // Files legati alla pagina top
        $files = File::select('files.title', 'files.slug', 'colors.css_name', 'files.category_id', 'categories.name as category_name')
            ->join('file_page', 'files.id', '=' , 'file_page.file_id')
            ->join('pages', 'pages.id', '=', 'file_page.page_id')
            ->leftjoin('categories', 'categories.id', '=', 'files.category_id')
            ->leftjoin('colors', 'colors.id', '=', 'categories.color_id')
            ->where('pages.slug',$slug)
            ->orderBy('categories.display_order')
            ->orderBy('files.display_order')
            ->get();

        /////////////
        // Lista News
        $news = collect();

        if (!is_null(session('settings')->where('name', 'newsnumber')->firstWhere('val')) ||
            request()->segment(1) == 'news')  {
            $news = News::select('news.title', 'news.slug', 'news.text', 'news.date_start', 'news.date_end', 'categories.id as category_id',
                                 'categories.name as category_name', 'colors.css_name', 'text_color', 'colors.id as color_id')
                ->leftjoin('categories', 'categories.id', '=', 'news.category_id')
                ->leftjoin('colors', 'colors.id', '=', 'categories.color_id')
                ->where('date_start', '<=', date("Y-m-d"))
                ->where('date_end', '>=', date("Y-m-d"))
                ->orderBy('categories.display_order')
                ->orderBy('categories.name')
                ->orderBy('news.date_start', 'DESC')
                ->get();

                foreach ($news as $n) {
                    // Se la pagina ha associato un colore, i titoli della pagina vengono colorati
                    $color =COLOR::where('colors.id', $n->color_id)->get();
                    if ($color->count() > 0) {
                        $listTag = [['<h1', ' text-5xl '], ['<h2', ' text-4xl '], ['<h3', ' text-3xl '], ['<h4', ' text-2xl '] , ['<h5', ' text-xl ']];
                        foreach($listTag as $tag) {
                            $n->text = str_replace($tag[0], $tag[0] . " class='pb-2 font-semibold text-". $color->first()->css_name . $tag[1] . "'", $n->text);
                        }
                }
        }
        }


        return view('site-content', compact('page', 'pageL1', 'links', 'files', 'category',
                                            'pagesL1', 'pagesL2', 'pagesL3', 'news'));
    }

    /**
     * Mostra la pagina della news
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function news($slug = null)
    {

        ///////////////////////////////////
        // Lista settings messi in sessione
        if (!isset(session()->settings)) {
            session()->put('settings', Setting::all('name','val'));
        }
        // dd(session()->all());
        // dd(session('settings'));
        // dd(session('settings')->where('name', 'darkmode')->where('val', 'white')->count());
        // dd(session('settings')->where('name', 'darkmode')->firstWhere('val')->val);

        if($slug == null) {
            abort(404);
        }

        ///////////////////////////////////////
        // Intercetta pagina legata al menu-top
        $page = News::select('news.id', 'news.title', 'news.text', 'news.slug', 'news.date_start', 'news.date_end', 'colors.css_name',
                            'text_color', 'color_id', 'categories.id as category_id', 'categories.name as category_name', 'categories.display_order as category_display_order'  )
            ->where('slug',$slug)
            ->leftjoin('categories', 'categories.id', '=', 'news.category_id')
            ->leftjoin('colors', 'colors.id', '=', 'categories.color_id')
            ->get();

        if ($page->count() == 0) {
            abort(404);
        } else {
            $page = $page->first();
        }

        // Recupera news successive per pulsante "Notizia successiva"
        $pageNext = News::select('news.slug','date_start')
            ->leftjoin('categories', 'categories.id', '=', 'news.category_id')
            ->orderBy('categories.display_order', 'DESC')
            ->orderBy('categories.name', 'DESC')
            ->orderBy('date_start')
            ->get();
        $param = $page->slug;
        $subset = $pageNext->takeUntil(function ($item) use ($param) {
            return $item->slug == $param;
        });

        if ($subset->count() > 0)
            $pageNext = $subset->last();
        else
            $pageNext = News::select('news.slug')
                ->leftjoin('categories', 'categories.id', '=', 'news.category_id')
                ->orderBy('categories.display_order')
                ->orderBy('categories.name')
                ->orderBy('date_start', 'DESC')
                ->get()
                ->first();

                // dd($pageNext->slug);


        // Se la pagina ha associato un colore, i titoli della pagina vengono colorati
        $color =COLOR::where('colors.id', $page->color_id)->get();
        if ($color->count() > 0) {
            $listTag = [['<h1', ' text-4xl '], ['<h2', ' text-3xl '], ['<h3', ' text-2xl '], ['<h4', ' text-xl ']];
            foreach($listTag as $tag) {
                $page->text = str_replace($tag[0], $tag[0] . " class='pb-2 font-semibold text-". $color->first()->css_name . $tag[1] . "'", $page->text);
            }
        }

        // Pagina prima livello
        $pageL1 = News::where('id', $page->id)->first();
        // Lista sottopagine
        $pagesL1 = collect();
        // Lista sotto-sottopagine
        $pagesL2 = collect();

        // Lista pagine menu-right (visione due colonne) o menu Livello 3 (visione una colonna)
        if (session('settings')->where('name', 'sitecolumns')->where('val', 'one')->count()) {
            $pagesL3 = Page::select('pages.id', 'pages.title', 'pages.text', 'pages.slug', 'colors.css_name')
                ->leftjoin('colors', 'colors.id', '=', 'pages.color_id')
                ->where('menu_right', 1)
                ->orderBy('pages.display_order')
                ->get();
        } else {
            $pagesL3 = collect();
        }

        //////////////////////////////
        // Link legati alla news
        $links = News::select('links.title', 'links.link', 'colors.css_name', 'links.category_id', 'categories.name as category_name')
            ->join('link_news', 'news.id', '=' , 'link_news.news_id')
            ->join('links', 'links.id', '=', 'link_news.link_id')
            ->leftjoin('categories', 'categories.id', '=', 'links.category_id')
            ->leftjoin('colors', 'colors.id', '=', 'categories.color_id')
            ->where('slug',$slug)
            ->orderBy('categories.display_order')
            ->orderBy('links.display_order')
            ->get();

        ///////////////////////////////
        // Files legati alla news
        $files = File::select('files.title', 'files.slug', 'colors.css_name', 'files.category_id', 'categories.name as category_name')
            ->join('file_news', 'files.id', '=' , 'file_news.file_id')
            ->join('news', 'news.id', '=', 'file_news.news_id')
            ->leftjoin('categories', 'categories.id', '=', 'files.category_id')
            ->leftjoin('colors', 'colors.id', '=', 'categories.color_id')
            ->where('news.slug',$slug)
            ->orderBy('categories.display_order')
            ->orderBy('files.display_order')
            ->get();

        /////////////
        // Lista News
        $news = collect();

        // Lista Foto News
        $photosCurrentNews = News::where('id', $page->id)->with(['media'])->get();


        return view('site-content', compact('page', 'pageNext', 'pageL1', 'links', 'files',
                                            'pagesL1', 'pagesL2', 'pagesL3', 'news', 'photosCurrentNews'));
    }
    /**
     * Scarica un file in base al suo slug
     *
     * @param [type] $slug
     * @return void
     */
    public function download($slug) {

        $file = File::where('slug', $slug)->with(['media'])->get();
        if ($file->count() > 0) {
            return response()->download($file->first()->file->getPath(), $file->first()->title);
        } else {
            abort(404);
        }
    }

}
