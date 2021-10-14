<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $hasItems = Person::has('boards')->get();
        $noItems= Person::doesntHave('boards')->get();
        $param = ['hasItems'=> $hasItems, 'noItems' => $noItems];
        return view('person.index', $param);
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
    public function add(Request $request)
    {
        return view('person.add');
    }
    public function create(Request $request)
    {
        $this->validate($request, Person::$rules);
        $person = new Person;
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->save();
        return redirect('/person');
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        if ($id != null)
        {
            $person = Person::find($request->id);
            return view('person.edit', ['form'=>$person]);
        } else {
            return redirect('/person');
        }
    }
    public function update(Request $request)
    {
        $this->validate($request, Person::$rules);
        $person = Person::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->save();
        return redirect('/person');
    }
    public function del(Request $request)
    {
        $id = $request->id;
        if ($id != null)
        {
            $person = Person::find($id);
            return view('person.del', ['form' => $person]);
        } else {
            return redirect('/person');
        }
    }
    public function remove(Request $request)
    {
        Person::find($request->id)->delete();
        return redirect('/person');

    }
}
