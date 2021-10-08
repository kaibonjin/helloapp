<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\Validator;


class HelloController extends Controller
{
    public function index (Request $request)
    {
        $validator = Validator::make($request->query(), ['id'=>'required', 'pass' => 'required']);
        if ($validator->fails()) {
            $msg = 'クエリーに問題があります';
        } else {
            $msg = 'ID/PASSを受付ました。フォームを入力してください';
        }
        return view('hello.index', ['msg'=>$msg]);
    }

    public function post (Request $request)
    {
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];
        $messages = [
            'name.required' => '名前は必ず入力してください',
            'mail.required' => 'メールアドレスが必要です',
            'age.between' => '年齢は0~150の間で入力してください',
            'age.numeric' => '年齢は整数で記入してください',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('/hello')->withErrors($validator)->withInput();
        }
        return view('hello.index', ['msg'=>'正しく入力されました']);
    }
}
