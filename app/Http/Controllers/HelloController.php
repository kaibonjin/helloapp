<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class HelloController extends Controller
{
    public function index ()
    {
        // $data = [
        //     ['name'=>'山田太郎', 'mail'=>'taro@yamada'],
        //     ['name'=>'小山', 'mail'=>'taro@こやま'],
        //     ['name'=>'スズキ', 'mail'=>'taro@yaa'],
        // ];
        return view('hello.index', ['message'=>'Hello!']);
    }
    public function post (Request $request)
    {
        $data = ['msg' => $request->msg];
        return view('hello.index', $data);
    }
}
