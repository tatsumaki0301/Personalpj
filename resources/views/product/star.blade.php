@extends('layouts.default')

<head>
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/star.css') }}">
</head>

<body>
@section('title', 'Rese')
@section('nav')
<div class="nav_area">
  @if (Auth::check())
  <nav class="nav" id="nav">
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/mypage">Mypage</a></li>
      <form action="{{route('logout')}}" method="POST">
      @csrf
        <li>
          <button class="button-item">Logout</button>
        </li>
      </form>
    </ul>
  </nav>
  <div class="menu" id="menu">
    <span class="menu_line--top"></span>
    <span class="menu_line--middle"></span>
    <span class="menu_line--bottom"></span>
    <h1 class="title_item">Rese</h1>
  </div>
  @else
  <nav class="nav" id="nav">
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/register">Registrastion</a> </li>
      <li><a href="/login">Login</a></li>
    </ul>
  </nav>
  <div class="menu" id="menu">
    <span class="menu_line--top"></span>
    <span class="menu_line--middle"></span>
    <span class="menu_line--bottom"></span>
    <h1 class="title_item">Rese</h1>
  </div>
    @endif
</div>
@section('content')
  <div class="login-area">
  @if (Auth::check())
    <p>こんにちは {{$user->name . 'さん'}}</p>
    @else
    <p>ゲストさん　ログインお願いします。</p>
  @endif
  </div>
  <div class="products-review-area">
    <p>ご利用ありがとうございました。
      <br>
      <br>
      またのご来店を心よりお待ちしております。
    </p>
  </div>
  <div class="products-table-area">
  <form action="/review/star" method="POST">
    @csrf
    <table class="product-table">
      <tr>
        <th></th>
        <th>予約番号</th>
        <th>ユーザーID</th>
        <th></th>
        <th>店舗名</th>
        <th>予約日時</th>
        <th>予約人数</th>
      </tr>
    @foreach($reserves as $reserve)
      <tr>
        <td><input type="hidden" name="reserve_id" value="{{$reserve->id}}" /></td>
        <td>{{$reserve->id}}</td>
        <td>{{$reserve->user_id}}</td>
        <td><input type="hidden" name="shop_id" value="{{$reserve->shop_id}}" /></td>
        <td>{{$reserve->shop->shop_name}}</td>
        <td>{{$reserve->datetime}}</td>
        <td>{{$reserve->user_number}}</td>
      </tr>
    @endforeach
    </table>
  </div>
  <div class="please-text-area">
    <p class="please-text">ご利用店舗に対する満足度を５段階で評価をお願いします。</p>
  </div>
  <div class="star-area">
    <select class="star-select" id="star_id" name="star_id">
      @foreach($stars as $star)
        <option value="{{$star->id}}">
          {{$star->stars}}
        </option>
      @endforeach
    </select>
  </div>
  <div class="textarea-comment-text">
    <p class="comment-text">
      ＊ご意見・ご感想をお願いします。
    </p>
  </div>
  <div class="review-text-area">
    <textarea class="textarea-class" rows="5" cols="50" maxlength="200" name="comment">
    </textarea>
  </div>
    <input type="hidden" name="user_id" value="{{$user_id}}" />
  <div class="review-button-area">
    <button class="review-button">done</button>
  </div>
  </form>
@endsection
</body>
