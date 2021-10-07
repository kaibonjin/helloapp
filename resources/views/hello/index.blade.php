@extends('layouts.helloapp')
@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section ('content')
    <p>ここが本文のコンテンツです</p>
    <p>これは、<middleware>google.com</middleware>へのリンクです。</p>
    <p>これは、<middleware>yahoo.com</middleware>へのリンクですね。</p>
@endsection

@section('footer')
copyright 2021 kaisei.
@endsection
