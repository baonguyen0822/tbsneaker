<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;   
use App\Category;
use App\Brand_label;
use App\Product_img;
use App\Product_size;
use Session;


class ProductController extends Controller
{
    public function getDanhSach()
    {
        $product = Product::orderBy('id','DESC')->paginate(10);
        return view('admin.product.list',compact('product'));
    }
    public function getThemsp()
    {
        $category = Category::all();
        $brand_label = Brand_label::all();
        return view('admin.product.add',compact('category','brand_label'));
    }

    public function postThemsp(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|min:5|max:100',
            'price' => 'required',
            'price_sale' => 'required',
            'qty' => 'required',
        ],
        [  
            'name.required'=>'Bạn chưa nhập tên sản phẩm',
            'name.min'=>'Tên sản phẩm phải có ít nhất 5 và nhỏ hơn 100 ký tự',
            'price.required'=>'Bạn chưa nhập giá sản phẩm',
            'price_sale.required'=>'Bạn chưa nhập giá sale sản phẩm',
            'qty.required'=>'Bạn chưa nhập số lượng sản phẩm',
        ]);
   
        $product_size = new Product_size;
        $product = new Product;
        $product_img = new Product_img;
        $product->name = $request->name;
        $product->c_id = $request->c_id;
        $product->b_id = $request->b_id;    
        $product->price = $request->price;
        $product->price_sale = $request->price_sale;
        
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $avatar = str_random(6)."_". $name;
            while(file_exists("img/product/".$avatar))
            {
                $avatar = str_random(6)."_". $name;
            }
            $file->move("img/product",$avatar);
            $product->avatar = $avatar;
        }

        $product->qty = $request->qty;
        $product->admin_id = $request->admin_id;
        $product->save();
        $product_size->p_id = $product ->id;
        $product_size->save();
        $product_img->id = $product->id;
        $product_img->save();
        return redirect('admin/product/list')->with('thongbao','Bạn đã có thêm một sản phẩm mới.');
    }

    public function getSuasp($id)
    {
        $product = Product::find($id);
        return view('admin.product.update',['product'=>$product]);
    }

    public function postSuasp(Request $request, $id)
    {
        $product = Product::find($id);
        $this->validate($request,
        [
            'name' => 'required|min:5|max:50',
            'price' => 'required',
            'price_sale' => 'required',
            'qty' => 'required',
        ],
        [  
            'name.required'=>'Bạn chưa nhập tên sản phẩm',
            'name.min'=>'Tên sản phẩm phải có ít nhất 5 và nhỏ hơn 50 ký tự',
            'price.required'=>'Bạn chưa nhập giá sản phẩm',
            'price_sale.required'=>'Bạn chưa nhập giá sale sản phẩm',
            'qty.required'=>'Bạn chưa nhập số lượng sản phẩm',
        ]);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->price_sale = $request->price_sale;
        $product->qty - $request->qty;
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $avatar = str_random(6)."_". $name;
            while(file_exists("img/product/".$avatar))
            {
                $avatar = str_random(6)."_". $name;
            }
            $file->move("img/product",$avatar);
            $product->avatar = $avatar;
        }
        $product->save();
        return redirect('admin/product/list')->with('thongbao','Đã Update sản phẩm.');
    }
    
    public function postXoasp($id)
    {
        $product = Product::find($id);
        $product_img = Product_img::find($id);
        $product->delete();
        $product_img->delete();
        return redirect('admin/product/list')->with('thongbao','Bạn đã xóa sản phẩm.');
    }
    
}
