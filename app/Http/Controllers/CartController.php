<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use App\Product_size;
use App\Oder;
use App\Transaction;
use Mail;
class CartController extends Controller
{
    //
    public function getAddCart($id)
    {
        
        $product = Product::find($id);
        $product_size = Product_size::where('p_id',$id)->get();
        Cart::add(['id' => $id, 'name' => $product->name, 'size' => 7, 'qty' => 1 , 'price' => $product->price, 
        'options' => ['avatar' => $product->avatar,'price_sale' => $product->price_sale]]);
        $data = Cart::content();
        return redirect('cart/show');
        
    }
    public function getShowCart()
    {
        $data['total'] = Cart::total();
        $data['items'] = Cart::Content();
        return view('page/cart/cart',$data);
    }
    public function getDeleteCart($id)
    {
        if($id=='all')
        {
            Cart::destroy();
        }
        else
        {
            Cart::remove($id);
        }
        return back();
    }
    public function getUpdateCart(Request $request)
    {
        Cart::update($request->rowId,$request->qty);
    }
    
    public function getCheckout()
    {
        $data['total'] = Cart::total();
        $data['cart'] = Cart::content();    
        return view('page/cart/thanhtoan',$data);
    }
    public function postCheckout(Request $request)
    {

        $data['info'] = $request->all();
        $email = $request->email;
        $data['total'] = Cart::total();
        $data['cart'] = Cart::content();   
        /*
        Mail::send('page/cart/email', $data, function ($message) use ($email)
        {
            $message->from('tbsneaker.best@gmail.com','TbSneaker');
            $message->to($email, $email);
            $message->cc('l35.kuntl@gmail.com','Bac xe om');
            $message->subject('Xác nhận mua đơn hàng của TbSneaker');
        });
         */
        $tran = new Transaction;
        $tran->name = $request->name;
        $tran->email = $request->email;
        $tran->phone = $request->phone;
        $tran->address = $request->address;
        $tran->amount = Cart::total();
        $tran->save();
        $cartInfor = Cart::content();
        if (count($cartInfor) >0) {
            foreach ($cartInfor as $key => $item) {
                $od = new Oder;
                $od->t_id = $tran->id;
                $od->p_id = $item->id;
                $od->size = $item->size;
                $od->qty = $item->qty;
                $od->price = $item->price;
                $od->amount = ($item->qty*$item->price);
                $od->save();
            }
        }
       
        return redirect('cart/confirm');
        
    }


    public function getConfirm()
    {
        $data['total'] = Cart::total();
        $data['cart'] = Cart::content();
        Cart::destroy(); 
        return view('page/cart/confirm',$data);
    }

}
