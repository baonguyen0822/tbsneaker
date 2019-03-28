<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Admin;
use Hash;
use Auth;
use Session;
use App\Providers;
use Illuminate\Support\Facades\Validator;
use App\User;

class AdminController extends Controller
{
    /*
    protected $admin;
    function __construct(Admin $admin)
    {
        $this->admin = $admin;
        view()->share('admin_login',$admin);
    }
    */
    public function getListAdmin()
    {
        $admin = Admin::all();
        return view('admin/admin/list',compact('admin'));
    }

    public function getAddAdmin()
    {
        return view('admin/admin/add');
    }

    public function postAddAdmin(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required|min:3',
            'email' => 'required|email|unique:users,email',
            'pass' => 'required|min:6|max:32',
            'passagain' =>'required|same:pass',
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
         ]);
         $admin = new Admin;
         $admin->name = $request->name;
         $admin->email = $request->email;
         $admin->pass = Hash::make($request->pass);
         $admin->save();
         return redirect('admin/admin/list')->with('thongbao','Tạo thành công.');
    }

    public function getEditAdmin($id)
    {
        $admin = Admin::find($id);
        return view('admin/admin/update',compact('admin'));
    }

    public function postEditAdmin(Request $request, $id)
    {
        $admin = Admin::find($id);
        $this->validate($request,
        [
            'name'=>'required|min:3',
        ],			
        [
            'name.required' => 'Chưa nhập tên.',
            'name.min' => 'Tên bạn phải ý nhất 3 ký tự.',
        ]);

        $admin->name = $request->name;
         
         if($request->changepass == "on")
         {
            $this->validate($request,
            [
                'pass' => 'required|min:6|max:32',
                'passagain' =>'required|same:pass',
             ],			
             [
                'pass.required' => 'Bạn chưa nhập mật khẩu.',
                'pass.min' => 'Mật khẩu 6-32 ký tự.',
                'pass.max' => 'Mật khẩu 6-32 ký tự.',
                'passagain.required' => 'Bạn chưa xác nhận mật khẩu.',
                'passagain.same' => 'Xác nhận mật khẩu chưa đúng.',
             ]);
             $admin->pass = Hash::make($request->pass);
         }
         $admin->save();
         return redirect('admin/admin/list')->with('thongbao','Update thành công.');
    }
    
    public function getBlockAdmin($id)
    {
        $admin = Admin::find($id);
        $admin->status = 0;
        $admin->save();
        return redirect()->back()->with('thongbao','Bạn đã khóa Admin có mã '.$id);
    }
    public function getUnblockAdmin($id)
    {
        $admin = Admin::find($id);
        $admin->status = 1;
        $admin->save();
        return redirect()->back()->with('thongbao','Bạn đã mở khóa Admin có mã '.$id);
    }


    public function getLoginAdmin()
    {
        return view('admin/login');
    }
    public function postLoginAdmin(Request $request)
    {
        $this->validate($request,
            [
                'email' =>'required',
                'password' =>'required|min:3|max:32'
            ],
            [
                'email.required' => 'Bạn chưa nhập email.',
                'password.required' => 'Bạn chưa nhập mật khẩu.',
                'password.min' => 'Mật khẩu từ 6-32 ký tự.',
                'password.max' => 'Mật khẩu từ 6-32 ký tự.',
            ]);
         
        $credentials = array('email'=>$request->email,'password'=>$request->password);
        $user = User::where([
                ['email','=',$request->email],
                ['status','=','2']
            ])->first();
    
        if($user){
            if(Auth::attempt($credentials)){
    
                return redirect('admin/product/list');
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            }
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Tài khoản không được quyền truy cập']); 
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect('admin/login');
    }

    
}
