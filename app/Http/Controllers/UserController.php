<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Hash;
use Auth;

class UserController extends Controller
{
    public function getListUser()
    {
        $user = User::orderBy('id','DESC')->paginate(10);
        return view('admin/user/list',compact('user'));
    }

    public function getAddUser()
    {
        return view('admin/user/add',compact('user'));
    }
    
    public function postAddUser(Request $request)
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
         return redirect('admin/user/list')->with('thongbao','Tạo thành công.');
    }

    public function getEditUser($id)
    {
        $user = User::find($id);
        return view('admin/user/update',compact('user'));
    }

    public function postEditUser(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request,
        [
            'name'=>'required|min:3',
            'phone' => 'required|min:6|max:32',
            'address' => 'required',
        ],			
        [
            'name.required' => 'Chưa nhập tên.',
            'name.min' => 'Tên bạn phải ý nhất 3 ký tự.',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ.',
        ]);

        $user->name = $request->name;
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
             $user->password = Hash::make($request->pass);
         }
         $user->phone = $request->phone;
         $user->address = $request->address;
        
         $user->save();
         return redirect('admin/user/list')->with('thongbao','Update thành công.');
    }


    public function getBlockUser($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();
        return redirect()->back()->with('thongbao','Bạn đã khóa user có mã '.$id);
    }
    public function getUnblockUser($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        return redirect()->back()->with('thongbao','Bạn đã mỡ khóa user có mã '.$id);
    }


}
