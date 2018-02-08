@extends('layouts.master')
@section('title', $title)

@section('content')
  <h1>{{ $title }}</h1>

  @include('components.socialButton')

  Email:
  <input type="text" name="email" placeholder="請輸入 Email">
  密碼：
  <input type="password" name="password" placeholder="請輸入密碼">
  暱稱：
  <input type="text" name="nickname" placeholder="請輸入暱稱">
@endsection