<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_size;
class Product_sizeController extends Controller
{
    //
    public function getListSize($id)
    {  
        $product_size = Product_size::all();
        $product = Product::find($id);
        return view('admin.product_size.list',compact('product_size','product'));
    }
    public function getAddSize($id)
    {
        $product = Product::find($id);
        return view('admin.product_size.add',compact('product'));
    }
    public function postAddSize(Request $request,$id)
    {
        $this->validate($request,
        [
            'size' => 'required',
            'qty' => 'required',
        ],
        [  
            'size.required'=>'Vui lòng nhập size sản phẩm',
            'qty.required'=>'Vui lòng nhập số lượng',
        ]);
        $product = Product::find($id);
        $product_size = new Product_size;
        $product_size->p_id = $product->id;
        $product_size->size = $request->size;
        $product_size->qty = $request->qty;
        $product_size->save();
        return redirect('admin/product_size/list/'.$id)->with('thongbao','Them thanh cong');
    }

    public  function getUpdateSize($id)
    {
        $product = Product::all();
        $product_size = Product_size::find($id);
        return view('admin.product_size.update',compact('product_size','product'));
    }
    public function postUpdateSize(Request $request, $id)
    {
        $product_size = Product_size::find($id);
        $this->validate($request,
        [
            'size' => 'required',
            'qty' => 'required',
        ],
        [  
            'size.required'=>'Vui long nhap size san pham',
            'qty.required'=>'Vui long nhap so luong',
        ]);
        $product_size->size = $request->size;
        $product_size->qty = $request->qty;
        $product_size->save();
        return redirect('admin/product_size/update/'.$id)->with('thongbao','Them thanh cong');
    }

    public function getDeleteSize(Request $request, $id)
    {
        $product_size = Product_size::find($id);
        $product_size->delete();
        return redirect('admin/product/list')->with('thongbao','Delete size thanh cong');
    }
}
