<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getListCate()
    {
        $category = Category::all();
        return view('admin/category/list',compact('category'));
    }

    public function getAddCate()
    {
        return view('admin/category/add');
    }

    public function postAddCate(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required',
            ],
            [
                'name.required'=>'Ban chua nhap ten thuong hieu.'
            ]);
        $category = new Category();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        return redirect('admin/category/list')->with('thongbao','Bạn đã có thêm 1 hãng sản phẩm');
    }

    public function getEditCate($id)
    {
        $category = Category::find($id);
        return view('admin/category/update',compact('category'));
    }   

    public function postEditCate(Request $request, $id)
    {
        $this-> validate($request,
        [
            'name'=>'required',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên hãng.'
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        return redirect('admin/category/list')->with('thongbao','Bạn đã update thành công.');
    }

    
    public function getDeleteCate($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/category/list')->with('thongbao','Bạn đã xóa 1 hãng sản phẩm.');
    }
    
    
}