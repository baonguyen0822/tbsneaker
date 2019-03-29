<?php

namespace App\Http\Controllers;
use App\Transaction;
use Illuminate\Http\Request;
use App\Oder;
use Session;

class TransactionController extends Controller
{
    public function getTransList()
    {
        $trans = Transaction::orderBy('id','DESC')->paginate(10);
        return view('admin/transaction/list',compact('trans'));
    }

    public function getTransEdit($id)
    {
        $trans = Transaction::find($id);
        return view('admin/transaction/update',compact('trans'));
    }

    public function postTransEdit(Request $request, $id)    
    {
        $trans = Transaction::find($id);
        $trans->status = $request->status;
        $trans->save();
        return redirect('admin/transaction/list')->with('thongbao','Da cap nhat don hang thanh cong.');
    }
}
