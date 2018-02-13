@extends('layouts.master')

@section('title', $title)

@section('content')
<div class="edit">
  <form class="edit__form" action="/merchandise/{{ $merchandise->id }}/" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{ $merchandise->id }}">
    {{ method_field('PUT') }}
    <h1 class="edit__form-title">{{ $title }}</h1>
    @include('errors.error')
    <div class="form-group">
      <label for="exampleFormControlSelect1">商品狀態：</label>
      <select class="form-control" name="status">
        <option value="C" @if (old('status', $merchandise->status) === 'C') selected @endif>建立中</option>
        <option value="S" @if (old('status', $merchandise->status) === 'S') selected @endif>可販售</option>
      </select>
    </div>
    <div class="form-group">
      <label for="name">商品名稱：</label>
      <input class="form-control" type="text" name="name" placeholder="請輸入商品名稱" value="{{ old('name, $merchandise->name') }}">
    </div>
    <div class="form-group">
      <label for="name_en">商品英文名稱：</label>
      <input class="form-control" type="text" name="name_en" placeholder="請輸入商品英文名稱" value="{{ old('name_en, $merchandise->name_en') }}">
    </div>
    <div class="form-group">
      <label for="introduction">商品介紹：</label>
      <textarea rows="4" cols="50" class="form-control" type="text" name="introduction" placeholder="請輸入商品介紹" value="{{ old('introduction, $merchandise->introduction') }}"></textarea>
    </div>
    <div class="form-group">
      <label for="introduction_en">商品英文介紹：</label>
      <textarea rows="4" cols="50" class="form-control" type="text" name="introduction_en" placeholder="請輸入商品英文介紹" value="{{ old('introduction_en, $merchandise->introduction_en') }}"></textarea>
    </div>
    <div class="form-group">
      <label for="photo">商品照片：</label>
      <input class="form-control" type="file" name="photo" placeholder="商品照片">
      <img src="{{ $merchandise->photo ? $merchandise->photo : '/assets/images/default.svg' }}">
    </div>
    <div class="form-group">
      <label for="price">商品價格：</label>
      <input class="form-control" type="text" name="price" placeholder="商品價格" value="{{ old('price, $merchandise->price') }}">
    </div>
    <div class="form-group">
      <label for="remain_count">商品剩餘數量：</label>
      <input class="form-control" type="text" name="remain_count" placeholder="商品剩餘數量" value="{{ old('remain_count, $merchandise->remain_count') }}">
    </div>
    <div class="edit__form-send form-group">
      <button type="submit" class="btn btn-primary">更新商品資訊</button>
      <a class="btn btn-secondary" href="/">取消</a>
    </div>
  </form>
  @endsection
</div>

<style>
  .edit {
    align-items: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .edit__form {
    width: 50%
  }

  .edit__form-title {
    text-align: center
  }

  .edit__form-send {
    text-align: center
  }
</style>