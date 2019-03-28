<?php

namespace App\Http\Controllers;
use App\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function getListSlide()
    {
        $slide = Slide::all();
        return view('admin/slide/list',compact('slide'));
    }

    public function getEditSlide($id)
    {
        $slide = Slide::find($id);
        return view('admin/slide/update',compact('slide'));
    }

    public function postEditSlide(Request $request, $id)
    {
        $slide = Slide::find($id);
        $this->validate($request,
       [
            //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
            'img' => 'mimes:jpg,jpeg,png,gif|max:2048',
        ],			
        [
            //Tùy chỉnh hiển thị thông báo không thõa điều kiện
            'img.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
            'img.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
        ]);
        if($request->hasFile('img'))
        {
            $img1 = $request->file('img');
            $name = $img1->getClientOriginalName();
            $img = str_random(6)."_". $name;
           while(file_exists("img/banner/".$img))
            {
                $img = str_random(6)."_". $name;
            }
            $img1->move("img/banner",$img);
            $slide->img = $img;
        }
        else
        {

        }
        $slide->title = $request->title;
        $slide->title2 = $request->title2;
        $slide->text= $request->text;
        $slide->save();
        return redirect('admin/slide/list')->with('thongbao','Update thành công.');
    }
}
