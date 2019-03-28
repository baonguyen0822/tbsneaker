<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\Category;
use App\Cart;
use App\User;
use App\Brand_label;
use App\Oder;   
use App\Infor;
use App\Product_size;
use Session;
use App\Providers;
use Illuminate\Support\Facades\Validator;
use Hash;
use Auth;

class PageController extends Controller
{
    protected $user;
    function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getTrangchu(){
        $slide = Slide::all();
        $new = Product::orderBy('created_at','DESC')->take(8)->get();
        $sale = Product::where('price_sale','<>',0)->take(8)->get();
        return view('page/index',compact('slide','new','sale'));
    }

    public function getLoaisp($id)
    {
        $product = Product::where('c_id',$id)->paginate(12);
        $cate = Category::find($id);
        return view('page/sanpham',compact('product','cate'));
    }

    public function getBrand($id)
    {
        $product = Product::where('b_id',$id)->paginate(12);
        $brand = Brand_label::find($id);
        return view('page/theloai',compact('product','brand'));
    }

    public function getChitietsp($id)
    {
        $product = Product::find($id);
        $product_size = Product_size::where('p_id',$id)->get();
        $new = Product::orderBy('created_at','DESC')->take(8)->get();
        $sale = Product::where('price_sale','<>',0)->take(8)->get();
        return view('page.chitietsanpham', compact('product', 'product_size', 'img', 'new', 'sale'));
    }


    public function getThanhToan()
    {
        return view('page.thanhtoan');
    }
    
    public function getXacNhanDH(){
        return view('page.xacnhan_dathang');
    }

    public function getDangnhap()
    {
        return view('page/dangnhap');
    }

    public function postDangnhap(Request $request)
    {
        $this->validate($request,
            [
                'email' =>'required|email',
                'password' =>'required|min:3|max:32'
            ],
            [
                'email.required' => 'Bạn chưa nhập email.',
                'email.email' => 'Hãy nhập email của bạn.',
                'password.required' => 'Bạn chưa nhập mật khẩu.',
                'password.min' => 'Mật khẩu từ 6-32 ký tự.',
                'password.max' => 'Mật khẩu từ 6-32 ký tự.',
            ]);
        /*
        $check = $this->user->checkUser($request->email,$request->password);
        if($check)
        {
            return redirect('trangchu');
        }      
       else
        {
            return redirect()->back()->with(['flag'=>'danger','message'=>'Vui lòng kiểm tra lại thông tin đăng nhập']);
        }
        */

        $credentials = array('email'=>$request->email,'password'=>$request->password);
        $user = User::where([
                ['email','=',$request->email],
                ['status','=','1']
            ])->first();

        if($user){
            if(Auth::attempt($credentials)){

            return redirect('trangchu');
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            }
        }
        else{
           return redirect()->back()->with(['flag'=>'danger','message'=>'Tài khoản chưa kích hoạt']); 
        }
    }
    public function getDangxuat(){
        Auth::logout();
        return redirect('trangchu');
    }

    public function getDangky(){
        return view('page/dangky');
    }
    public function postDangky(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required|min:3',
            'email' => 'required|email|unique:users,email',
            'pass' => 'required|min:6|max:32',
            'passagain' =>'required|same:pass',
            'phone' => 'required|min:6|max:32',
            'address' => 'required',
         ],			
         [
            'name.required' => 'Chưa nhập tên.',
            'name.min' => 'Tên bạn phải ý nhất 3 ký tự.',
            'email.required' => 'Chưa nhập email.',
            'email.email' => 'Bạn chưa nhập đúng địa chỉ email.',
            'email.unique' => 'Email đã tồn tại',
            'pass.required' => 'Bạn chưa nhập mật khẩu.',
            'pass.min' => 'Mật khẩu 6-32 ký tự.',
            'pass.max' => 'Mật khẩu 6-32 ký tự.',
            'passagain.required' => 'Bạn chưa xác nhận mật khẩu.',
            'passagain.same' => 'Xác nhận mật khẩu chưa đúng.',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ.',
         ]);
         $user = new User;
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = Hash::make($request->pass);
         $user->phone = $request->phone;
         $user->address = $request->address;
         $user->save();
         return redirect('dangky')->with('thongbao','Bạn đã đăng ký thành công, vui lòng    ');
    }

    public function getTracking(){
        return view('page.tracking');
    }

    public function getLienhe()
    {
        $infor = Infor::all();
        return view('page.lienhe',compact('infor'));
    }
    
    public function getSearch(Request $request)
    {
        $product = Product::where('name','like','%'.$request->key.'%')
                            ->orWhere('price',$request->key)->get();
        return view('page/search',compact('product'));
    }
}
