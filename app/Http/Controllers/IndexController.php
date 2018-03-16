<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{

    const CURRENCY = "UAH";

    public function index()
    {
        if(isset($_COOKIE['currency']))
        {
            $curr = $_COOKIE['currency'];
        }
        else
        {
            $curr = IndexController::CURRENCY;
        }
        return $val = DB::table('currencies')->where('code',$curr)->first();
    }


}
