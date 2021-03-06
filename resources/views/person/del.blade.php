@extends('layouts.helloapp')

@section('title', 'Person.Edit')

@section('menubar')
    @parent
    編集ページ

@endsection

@section('content')
@if(count($errors) > 0)
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <form action="/person/del" method="post">
        <table>
            @csrf
            <input type="hidden" name="id" value="{{$form->id}}">
            <tr><th>name: </th><td>{{$form->name}}</td></tr>
            <tr><th>mail: </th><td>{{$form->mail}}</td></tr>
            <tr><th>age: </th><td>{{$form->age}}</td></tr>
            <tr><th></th><td><input type="submit" value="submit"></td></tr>
        </table>
    </form>
@endsection

@section('footer')
copyright 2021 kaisei.

@endsection
