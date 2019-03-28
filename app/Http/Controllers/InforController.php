<?php

namespace App\Http\Controllers;
use App\Infor;
use Illuminate\Http\Request;

class InforController extends Controller
{
    public function getListInfor()
    {
        $infor = Infor::all();
        return view('admin/infor/list',compact('infor'));
    }
    public function getEditInfor($id)
    {
        $infor = Infor::find($id);
        return view('admin/infor/update',compact('infor'));
    }
    public function postEditInfor(Request $request, $id)
    {
        $infor = Infor::find($id);
        $this->validate($request,
        [
             //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
            'logo' => 'mimes:jpg,jpeg,png,gif|max:2048',
            'name'=>'required',
            'title' => 'required',
            'hotline' => 'required',
            'fax' => 'required',
            'email' => 'required',
            'address' => 'required',
         ],			
         [
             //Tùy chỉnh hiển thị thông báo không thõa điều kiện
            'logo.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
            'logo.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
            'name.required' => 'Chưa nhập tên cửa hàng.',
            'title.required' => 'Chưa nhập slogan.',
            'hotline.required' => 'Vui lòng nhập số điện thoại',
            'fax.required' => 'Bạn chưa nhập số fax.',
            'email.required' => 'Vui lòng nhập email.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
         ]);
         if($request->hasFile('logo'))
        {
            $file = $request->file('logo');
            $name = $file->getClientOriginalName();
            $logo = str_random(6)."_". $name;
            while(file_exists("img/".$logo))
            {
                $logo = str_random(6)."_". $name;
            }
            $file->move("img/",$logo);
            $infor->logo = $logo;
        }
         $infor->name = $request->name;
         $infor->title = $request->title;
         $infor->hotline = $request->hotline;
         $infor->fax = $request->fax;
         $infor->email = $request->email;
         $infor->address = $request->address;
         $infor->save();
         return redirect('admin/infor/list')->with('thongbao','Đã Update infor thành công.');
    }
    
}
