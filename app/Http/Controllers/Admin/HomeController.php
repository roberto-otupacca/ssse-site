<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;
Use App\Helpers\SiteHelper;

class HomeController
{
    public function index()
    {   
        

        ///////////////////////////////////
        // Lista settings messi in sessione
        $settings = Setting::all();
        if (!isset(session()->settings)) {
            session()->put('settings', $settings);
        }

        if ($settings->count() < 6) {
            $s = new Setting();
            $s->name = 'darkmode';
            $s->val = 'white';
            $s->save();
            $s = new Setting();
            $s->name = 'sitecolumns';
            $s->val = 'two';
            $s->save();
            $s = new Setting();
            $s->name = 'statistics';
            $s->val = 'no';
            $s->save();
            $s = new Setting();
            $s->name = 'newsnumber';
            $s->val = '0';
            $s->save();
            $s->save();
            $s = new Setting();
            $s->name = 'menurows';
            $s->val = '1';
            $s->save();
            $s = new Setting();
            $s->name = 'statposition';
            $s->val = 'down';
            $s->save();
            session()->put('settings', Setting::all('name','val'));
        }

        $pages = Page::orderBy('updated_at', 'desc')->take(5)->get();
        $news = News::orderBy('updated_at', 'desc')->take(5)->get();

        return view('home', compact('settings', 'pages', 'news'));
    }
    
    public function saveSetting(Request $request, $settings)
    {
        // dd($request->all());
        // dd($setting);
        
        $s = Setting::where('name', $settings)->get();
        if ($s->count() == 0) {
            $s = new Setting();
            $s->name = $settings;
            $s->val = $request[$settings];
            $s->save();
        } else {
            $s->first()->update(['val' => $request[$settings] ]);
        }
         
        session()->put('settings', Setting::all('name','val'));

        $success = trans('global.modifySuccess');   
        
        return redirect ('/admin')->with('success', $success);

    }

    /**
     * Crea site.xml per motori di ricerca
     *
     * @return void
     */
    public function sitemap() {

        SiteHelper::createSitemap();

        return('Sitemap creata');
    }
}
