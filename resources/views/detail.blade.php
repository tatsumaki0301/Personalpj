@extends('layouts.default')

<head>
<link rel="stylesheet" href="{{ asset('css/reset.css')}}" />
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
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
  <div class="nav_title">
    <div class="menu" id="menu">
      <span class="menu_line--top"></span>
      <span class="menu_line--middle"></span>
      <span class="menu_line--bottom"></span>
    </div>
@else
  <nav class="nav" id="nav">
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/register">Registrastion</a>
        </li>
      <li><a href="/login">Login</a></li>
    </ul>
  </nav>
  <div class="nav_title">
    <div class="menu" id="menu">
      <span class="menu_line--top"></span>
      <span class="menu_line--middle"></span>
      <span class="menu_line--bottom"></span>
    </div>
@endif
    <h1 class="title_item">Rese</h1>
  </div>
</div>

@section('content')
<?php
/*
  <div class="login-area">
  @if (Auth::check())
    <p>こんにちは {{$user->name . 'さん'}}</p>
    @else
    <p>ゲストさん　ログインお願いします。</p>
  @endif
  </div>
*/
?>

<div class="main_area">
  <div class="card_group">
    @if (@isset($shops))
    @foreach ($shops as $shop)
    <div class="wrapper">
      <div class="text-box">
        <div class="return-item-area">
          <a href="/" class="return-item"><</a>
        </div>
        <div class="title-area">
          <h2 class="title">{{$shop->shop_name}}
          </h2>
        </div>
      </div>
      <div class="card">
        <div class="content-img">
          <img src="{{$shop->image_path}}" width="50%">
        </div>
        <div>
          <p class="date-item">
            #{{$shop->area->area_name}}
            #{{$shop->genru->genru_name}}
          </p>
        </div>
        <div class="content-item">
          {{$shop->shop_content}}
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
  @if (Auth::check())
  <div class="reserve_area">
    <div class="reserve_content_area">
      <div>
        <p class="reserve_title">予約</p>
      </div>
      <form action="/done" method="POST">
        @csrf
        <div>
          <input type="hidden" name="user_id" value="{{$id}}">
          <input type="hidden" name="shop_id" value="{{$shop->id}}">
          <label for="datetime">
          <input class="date_area" type="date" id="datetime" name="date" value="yyyy-MM-dd" required>
        </div>
        <div>
          <select class="time_area" id="time" name="time" required>
            <option></option>
            @foreach($ret as $ret)
            <option value="{{$ret}}">{{$ret}}</option>
            @endforeach
          </select>
          </label>
        </div>
          <select class="user_number_area" id="user_number" name="user_number" required>
              <option></option>
              @for($j=1; $j <= 10; $j++)
              <option value="{{$j}}">{{$j}}人</option>
              @endfor
          </select>
        <div class="reserve_detail_area">
        @foreach($reserves as $reserve)
          <table class="reserve_detail_teble">
            <tr>
              <th class="reserve_detail_th">name</th>
              <td class="reserve_detail_td">{{$reserve->shop->shop_name}}</td>
            </tr>
            <tr>
              <th class="reserve_detail_th">date</th>
              <td class="reserve_detail_td">{{substr($reserve->datetime,0,10)}}</td>
            </tr>
            <tr>
              <th class="reserve_detail_th">time</th>
              <td class="reserve_detail_td">{{substr($reserve->datetime,10,6)}}</td>
            </tr>
            <tr>
              <th class="reserve_detail_th">number</th>
              <td class="reserve_detail_td">{{$reserve->user_number}}人</td>
            </tr>
          </table>
        @endforeach
        </div>
    </div>
        <div class="reservebutton_area">
          <button class="reservebutton">予約する</button>
        </div>
      </form>
  </div>
  @endif
</div>
@endsection

</body>