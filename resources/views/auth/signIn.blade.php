@extends('layouts.master')

@section('title', $title)

@section('content')
<div class="signIn">
  <form class="signIn__form" action="/user/auth/sign-in" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <h1 class="signIn__form-title">{{ $title }}</h1>
    @include('errors.error')
    <div class="form-group">
      <label for="email">Email：</label>
      <input class="form-control" type="text" name="email" placeholder="請輸入 Email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
      <label for="password">密碼：</label>
      <input class="form-control" type="password" name="password" placeholder="請輸入密碼">
    </div>
    <div class="signIn__form-send form-group">
      <button type="submit" class="btn btn-primary">登入</button>
      <a class="btn btn-secondary" href="/">取消</a>
    </div>
  </form>
</div>
@endsection

<style>
  .signIn {
    align-items: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100%
  }

  .signIn__form {
    width: 30%
  }

  .signIn__form-title {
    text-align: center
  }

  .signIn__form-send {
    text-align: center
  }
</style>