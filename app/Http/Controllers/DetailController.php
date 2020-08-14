<?php

namespace App\Http\Controllers;

use App\RestaurantPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug) {
        $item = RestaurantPackage::with(['gallery'])
            ->where('slug', $slug)
            ->firstOrFail();
        
        return view('pages.detail',[
            'item' => $item
        ]);
    }
}
