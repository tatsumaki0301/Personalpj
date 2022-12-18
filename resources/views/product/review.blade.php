@extends('layouts.default')

<head>
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
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
  <div class="shop-name-area">
    <p class="shop-name-text">店舗への評価一覧</p>
  </div>
  <div class="review-area">
    <table class="review-table-area">
      <tr>
        <th>作成日</th>
        <th>ユーザー名</th>
        <th>店舗名</th>
        <th>評価</th>
        <th>コメント</th>
      </tr>
      @foreach($reviews as $review)
      <tr>
        <td>{{$review->created_at}}</td>
        <td>{{$review->user->name}}</td>
        <td>{{$review->shop->shop_name}}</td>
        <td><span class="star-class">{{$review->star->stars}}</span></td>
        <td>{{$review->comment}}</td>
      </tr>
      @endforeach
    </table>
  </div>
@endsection
</body>
