<?php
namespace App\Helpers;

use App\Models\News;
use App\Models\Page;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SiteHelper
{
    /**
     * Creazione site.xml per motori di ricerca
     *
     * @return void
     */
    public static function createSitemap()
    {
          //// Creazione mappa completa in automatico (mancano frequency e priority)
        // SitemapGenerator::create(url('/'))
        //     ->getSitemap()
        //     ->writeToFile('site.xml');

        $sitemap = Sitemap::create();
        $pages = Page::where('draft', 0)->get();
        foreach($pages as $page) {
            
            if(is_null($page->parent_id))
                $priority = 1;
            else
                $priority = 0.8;

            $days = Carbon::parse($page->updated_at)->diffInDays(Carbon::now());
            switch (true) {
                case ($days <= 14):
                    $frequency = Url::CHANGE_FREQUENCY_DAILY;
                    break;
                case ($days <= 30):                    
                    $frequency = Url::CHANGE_FREQUENCY_WEEKLY;
                    break;
                case ($days <= 250):                    
                    $frequency = Url::CHANGE_FREQUENCY_MONTHLY;
                    break;
                default:                   
                    $frequency = Url::CHANGE_FREQUENCY_YEARLY;
            }

            $sitemap->add(Url::create(url('/'.$page->slug))
                    ->setLastModificationDate(Carbon::create(utf8_encode(\Carbon\Carbon::instance($page->updated_at)->format('Y-m-d\TH:i:sP'))))
                    ->setChangeFrequency($frequency)
                    ->setPriority($priority));
        }

        
        $news = News::where('date_start', '<=', date("Y-m-d"))
                    ->where('date_end', '>=', date("Y-m-d"))
                    ->get();
        foreach($news as $n) {
            
            $priority = 0.5;

            $days = Carbon::parse($n->updated_at)->diffInDays(Carbon::now());
            switch (true) {
                case ($days <= 14):
                    $frequency = Url::CHANGE_FREQUENCY_DAILY;
                    break;
                case ($days <= 30):                    
                    $frequency = Url::CHANGE_FREQUENCY_WEEKLY;
                    break;
                case ($days <= 250):                    
                    $frequency = Url::CHANGE_FREQUENCY_MONTHLY;
                    break;
                default:                   
                    $frequency = Url::CHANGE_FREQUENCY_YEARLY;
            }

            $sitemap->add(Url::create(url('/notizia/'.$n->slug))
                    ->setLastModificationDate(Carbon::create(utf8_encode(\Carbon\Carbon::instance($n->updated_at)->format('Y-m-d\TH:i:sP'))))
                    ->setChangeFrequency($frequency)
                    ->setPriority($priority));
        }

        $sitemap->writeToFile('site.xml');
    }

}