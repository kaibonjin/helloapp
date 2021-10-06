<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class HelloController extends Controller
{
    public function index (Request $request)
    {
        // $data = [
        //     ['name'=>'山田太郎', 'mail'=>'taro@yamada'],
        //     ['name'=>'小山', 'mail'=>'taro@こやま'],
        //     ['name'=>'スズキ', 'mail'=>'taro@yaa'],
        // ];
        return view('hello.index', ['data'=>$request->data]);
    }

    public function post (Request $request)
    {
        return view('hello.index');
    }
}
