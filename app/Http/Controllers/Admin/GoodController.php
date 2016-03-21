<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Good;
use App\Models\Brand;
use App\Models\Category;

class GoodController extends Controller
{
    //

    function index()
    {
        $goods=Good::with('brand','category')->get();
//        return $goods;
        return view('admin.goods.index')->with('goods',$goods);
    }

    function create()
    {
        $categories=Category::get_categories();
        $brands=Brand::get();
        return view('admin.goods.create')->with('categories',$categories)
            ->with('brands',$brands);
    }


    function store(Request $request)
    {
        $good=Good::create($request->all());
        return redirect(route('admin.good.index'));
    }


    function destroy($id)
    {
        Good::destroy($id);
        return redirect(route('admin.good.index'));
    }


    function edit($id)
    {
        $good=Good::find($id);
        $categories=Category::get_categories();
        $brands=Brand::get();
        return view('admin.goods.edit')->with('good',$good)
            ->with('categories',$categories)
            ->with('brands',$brands);
    }


    function search(Request $request)
    {
        $keyword = "%".$request->keyword."%";
        $goods = Good::where("name","like",$keyword)->get();
        return view('admin.goods.index')->with('goods',$goods);

    }
}
