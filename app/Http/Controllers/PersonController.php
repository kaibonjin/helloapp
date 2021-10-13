<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $items = Person::all();
        return view('person.index', ['items' => $items]);
    }
    public function find(Request $request)
    {
        return view('person.find', ['input' =>'']);
    }
    public function search(Request $request)
    {
        $min = $request->input;
        $max = $min + 10;
        $item = Person::AgeGreaterThan($min)->ageLessThan($max)->first();
        $param = ['input'=> $request->input, 'item'=>$item];
        return view('person.find', $param);
    }
}
