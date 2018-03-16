<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    public function index()
    {
       $this->getCurrs();
       return back();
    }

    public function getCurrs()
    {
        $currency = !empty($_GET['curr']) ? $_GET['curr'] : null;
        if($currency){
            $curr = DB::table('currencies')->where('code',$currency)->first();
            if(!empty($curr)){
                setcookie('currency', $currency, time() + 3600*24*7, '/');
                return back();
            }
        }

    }
}
