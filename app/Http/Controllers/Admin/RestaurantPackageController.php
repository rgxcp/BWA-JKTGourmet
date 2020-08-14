<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RestaurantPackageRequest;
use App\RestaurantPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RestaurantPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = RestaurantPackage::all();

        return view('pages.admin.restaurant-package.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.restaurant-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantPackageRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);

        RestaurantPackage::create($data);

        return redirect()->route('restaurant-package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = RestaurantPackage::findOrFail($id);

        return view('pages.admin.restaurant-package.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantPackageRequest $request, $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);

        $item = RestaurantPackage::findOrFail($id);

        $item->update($data);

        return redirect()->route('restaurant-package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = RestaurantPackage::findOrFail($id);

        $item->delete();

        return redirect()->route('restaurant-package.index');
    }
}
