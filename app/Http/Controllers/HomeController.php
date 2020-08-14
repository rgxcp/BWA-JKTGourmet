<?php

namespace App\Http\Controllers;

use App\RestaurantPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = RestaurantPackage::with(['gallery'])->get();

        return view('pages.home',[
            'items' => $items
        ]);
    }
}
