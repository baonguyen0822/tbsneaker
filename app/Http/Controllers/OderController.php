<?php

namespace App\Http\Controllers;
use App\Oder;
use App\Transaction;
use Illuminate\Http\Request;

class OderController extends Controller
{
    public function getListOrd($id)
    {
        $tran = Transaction::find($id);
        $oder = Oder::where('t_id',$id)->get();
        return view('admin/order/list', compact('oder','tran'));
    }
}
