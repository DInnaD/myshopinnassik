<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;
use App\Currency;
use Illuminate\Support\Facades\DB;
use Menu as LavMenu;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeCurrency();
        $this->composeMenu();
    }

    public function composeMenu()
    {
        view()->composer('pages.menu', function($view){
            $arrMenu = Category::all();
            $menu = $this->buildMenu($arrMenu);
            $view->with('menu', $menu);
        });
    }

    /**
     * @param $arrMenu
     * @return mixed
     * https://github.com/lavary/laravel-menu#installation
     */
    public function buildMenu ($arrMenu){
        $mBuilder = LavMenu::make('MyNav', function($m) use ($arrMenu){
            foreach($arrMenu as $item){
                if($item->parent_id == 0)
                {
                    $m->add($item->title, 'category/'.$item->slug)->id($item->id);
                }
                else
                {
                    if($m->find($item->parent_id)){
                        $m->find($item->parent_id)->add($item->title, 'category/'.$item->slug)->id($item->id);
                    }
                }
            }
        });
        return $mBuilder;
    }

    /**
     * return view menu
     */
    public function composeCurrency()
    {
        view()->composer('pages.header', function($view){
            $currencies = Currency::all();
            $view->with('currencies', $currencies);
            $view->with('res', $this->getCurrency($currencies));
        });
    }

    public function getCurrency($currencies)
    {
        if(isset($_COOKIE['currency'])){
            $currencies = DB::table('currencies')->where('code',$_COOKIE['currency'])->first();
        }
        else{
            $currencies = DB::table('currencies')->first();
        }
        return $currencies;
    }
}
