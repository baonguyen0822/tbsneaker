<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_img;
class Product_imgController extends Controller
{
   //
   public function getListImg($id)
   {  
       $product_img = Product_img::all();
       $product = Product::find($id);
       return view('admin.product_img.list',compact('product_img','product'));
   }

   public  function getUpdateImg($id)
   {
       $product_img = Product_img::find($id);
       return view('admin.product_img.update',compact('product_img'));
   }
   public function postUpdateImg(Request $request, $id)
   {
       $product_img = Product_img::find($id);
       $this->validate($request,
       [
            'img_1' => 'mimes:jpg,jpeg,png,gif|max:2048',
            'img_2' => 'mimes:jpg,jpeg,png,gif|max:2048',
            'img_3' => 'mimes:jpg,jpeg,png,gif|max:2048',
        ],			
        [
            'img_1.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
            'img_2.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
            'img_3.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',

            'img_1.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
            'img_2.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
            'img_3.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
        ]);
        if($request->hasFile('img_1'))
        {
            $img1 = $request->file('img_1');
            $name = $img1->getClientOriginalName();
            $img_1 = str_random(6)."_". $name;
           while(file_exists("img/productimg/".$img_1))
            {
                $img_1 = str_random(6)."_". $name;
            }
            $img1->move("img/productimg",$img_1);
            $product_img->img_1 = $img_1;
        }
        else
        {

        }
        
        if($request->hasFile('img_2'))
        {
            $img2 = $request->file('img_2');
            $name2 = $img2->getClientOriginalName();
            $img_2 = str_random(6)."_". $name2;
           while(file_exists("img/productimg/".$img_2))
            {
                $img_2 = str_random(6)."_". $name2;
            }
            $img2->move("img/productimg",$img_2);
            $product_img->img_2 = $img_2;
        }
        else
        {

        }

        if($request->hasFile('img_3'))
        {
            $img3 = $request->file('img_3');
            $name3 = $img3->getClientOriginalName();
            $img_3 = str_random(6)."_". $name3;
           while(file_exists("img/productimg/".$img_3))
            {
                $img_3 = str_random(6)."_". $name3;
            }
            $img3->move("img/productimg",$img_3);
            $product_img->img_3 = $img_3;
        }
        else
        {
           
        }
        $product_img->save();
        return redirect('admin/product_img/list/'.$id)->with('thongbao','Cập nhật thành công rồi nè.');
   }

   public function getDeleteSize($id)
   {
       $product_img = Product_img::find($id);
       if($product->$id == NULL)
       {
            $product_img->delete();
       }
   }
}
