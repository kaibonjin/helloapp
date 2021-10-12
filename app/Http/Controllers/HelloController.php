<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class HelloController extends Controller
{
    public function index (Request $request)
    {
        $items = DB::table('people')->orderBy('age', 'asc')->get();
        return view('hello.index', ['items' => $items]);
    }
    public function post (Request $request)
    {
        $items = DB::select('select * from people');
        return view('hello.index', ['items' => $items]);
    }
    public function add(Request $request)
    {
        return view('hello.add');
    }
    public function create(Request $request)
    {
        $param = [
            'name' => $request -> name,
            'mail' => $request -> mail,
            'age' => $request ->age,

        ];
        DB::table('people')->insert($param);
        return redirect('/hello');
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        if ($id > 0)
        {
        $item = DB::table('people')->where('id', $id)->first();
        return view('hello.edit', ['form' => $item]);


        } else {
            return redirect('/hello');
        }
    }
    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')->where('id', $request->id)->update($param);
        return redirect('/hello');
    }
    public function del(Request $request)
    {
        $id = $request->id;
        if ($id > 0)
        {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view('hello.del', ['form' => $item[0]]);

        } else {
            return redirect('/hello');
        }
    }

    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        DB::delete('delete from people where id = :id', $param);
        return redirect('/hello');
    }

    public function show(Request $request)
    {
        $page = $request->page;
        $items = DB::table('people')->offset($page * 3)->limit(3)->get();
        return view('hello.show', ['items' => $items]);
    }
}
