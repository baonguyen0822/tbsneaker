<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand_label;
use App\product;
class Brand_labelController extends Controller
{
    public function getListBrand()
    {
        $brand_label = Brand_label::all();
        return view('admin/brand_label/list',compact('brand_label'));
    }

    public function getAddBrand()
    {
        return view('admin/brand_label/add');
    }

    public function postAddBrand(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên thể loại.'
        ]);
        $brand_label = new Brand_label();
        $brand_label->name = $request->name;
        $brand_label->status = $request->status;
        $brand_label->save();
        return redirect('admin/brand_label/list')->with('thongbao','Ban da them mot loai san pham thanh cong.');
    }

    public function getEditBrand($id)
    {
        $brand_label = Brand_label::find($id);
        return view('admin/brand_label/update',compact('brand_label'));
    }

    public function postEditBrand(Request $request, $id)
    {
        $brand_label = Brand_label::find($id);
        $this->validate($request,
        [
            'name'=>'required',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên thể loại.'
        ]);
        $brand_label->name = $request->name;
        $brand_label->status = $request->status;
        $brand_label->save();
        return redirect('admin/brand_label/list')->with('thongbao','Bạn đã update thành công.');
    }


    public function getDeleteBrand($id)
    {
        $brand_label = Brand_label::find($id);
        $brand_label->delete();
        return redirect('admin/brand_label/list')->with('thongbao','Bạn đã delete thành công.');
    }
    
    
}
