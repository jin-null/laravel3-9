<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller
{
    //
    function index()
    {
        $brands = Brand::orderBy('sort_order')->get();
//        return $brands;
        return view('admin.brand.index')->with('brands', $brands);

    }

    function create()
    {
//        return 111;
        return view('admin.brand.create');
    }

    function store(Request $request)
    {
//        $brand=$request->all();
//        return $brand;
        Brand::create($request->all());
        return redirect(route('admin.brand.index'))->with('msg', '�����ɹ���');
    }


    function destroy($id)
    {
        Brand::destroy($id);
        return redirect(route('admin.brand.index'))->with('msg', 'ɾ���ɹ���');
    }

    function sort_order(Request $request)
    {
        $brand = Brand::find($request->id);
        $brand->update(['sort_order' => $request->sort_order]);
    }


    function edit($id)
    {
//        dd($id);
        $brand=Brand::find($id);
        return view ('admin.brand.edit')->with('brand',$brand);
    }

    function  update(Request $request,$id)
    {
        $brand=Brand::find($id);
        $brand->update($request->all());
        return redirect(route('admin.brand.index'))->with('msg', '�޸ĳɹ���');
    }

    function is_show(Request $request)
    {
        $brand = Brand::find($request->id);
        $brand->update(['is_show' => $request->is_show]);
    }
}
