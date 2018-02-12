@extends('layouts.master') @section('title', $title) @section('content')
<div class="signUp">
  <form class="signUp__form" action="/user/auth/sign-up" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <h1 class="signUp__form-title">{{ $title }}</h1>
    @include('errors.error')
    <div class="form-group">
      <label for="nickname">暱稱：</label>
      <input class="form-control" type="text" name="nickname" placeholder="請輸入暱稱" value="{{ old('nickname') }}">
    </div>
    <div class="form-group">
      <label for="email">Email：</label>
      <input class="form-control" type="text" name="email" placeholder="請輸入 Email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
      <label for="password">密碼：</label>
      <input class="form-control" type="password" name="password" placeholder="請輸入密碼">
    </div>
    <div class="form-group">
      <label for="password_confirmation">確認密碼：</label>
      <input class="form-control" type="password" name="password_confirmation" placeholder="請再次確認密碼">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">角色</label>
      <select class="form-control" name="type">
        <option selected="selected">請選擇</option>
        <option value="G">一般會員</option>
        <option value="A">管理者</option>
      </select>
    </div>
    <div class="signUp__form-send form-group">
      <button type="submit" class="btn btn-primary">註冊</button>
      <a class="btn btn-secondary" href="#">取消</a>
    </div>
  </form>
</div>
@endsection

<style>
  .signUp {
    align-items: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100%
  }

  .signUp__form {
    width: 50%
  }

  .signUp__form-title {
    text-align: center
  }

  .signUp__form-send {
    text-align: center
  }
</style>