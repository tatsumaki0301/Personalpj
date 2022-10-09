@extends('layouts.default')

<head>
<link rel="stylesheet" href="{{ asset('css/reset.css')}}" />
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
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


  <div class="search_area">
    <form action="/" method="POST">
      @csrf
      <div class="search_area_item">
        <select id="area_id" name="area_id"  class="area_name" value="area_id">
          <option>All area</option>
          @foreach($areas as $area)
          <option class="name-item" value="{{$area->id}}">
            {{$area->area_name}}
          </option>
          @endforeach
        </select>
        <select id="genru_id" name="genru_id" class="genru_name" value="genru_id">
          <option>All genru</option>
          @foreach($genrus as $genru)
          <option class="name-item" value="{{$genru->id}}">
            {{$genru->genru_name}}
          </option>
          @endforeach
        </select>
          <button class="searchbutton">
            <img class="musimegane" src="{{asset('img/musimegane.png')}}" alt="">
          </button>
          <input type="search" name="input" class="search_text_area" placeholder="search...">
      </div>
    </form>
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

  <div class="card_group">
    @if (@isset($shops))
      @foreach ($shops as $shop)
      <div class="wrapper">
        <div class="card">
          <div class="content-img">
            <img src="{{$shop->image_path}}" width="50%">
          </div>
          <div class="text-box">
            <h2 class="title">{{$shop->shop_name}}
            </h2>
          </div>
          <div class="area_genru_area">
            <p class="date">
              #{{$shop->area->area_name}}
              #{{$shop->genru->genru_name}}
            </p>
          </div>
          <div class="detail-favorite">
            <form action="detail" method="GET">
            @csrf
              <input type="hidden" name="shop_id" value="{{$shop->id}}">
              <button class="detailbutton">詳しく見る</button>
            </form>
            @if(Auth::check())
              @if(count($shop->favorite) == 0)
                <form action="/favorite" method="POST">
                @csrf
                  <input type="hidden" name="user_id" value="{{$shop->id}}">
                  <input type="hidden" name="shop_id" value="{{$shop->id}}">
                  <button class="heart_button"><img class="heart_button" src="{{asset('img/heart-white.png')}}" alt=""></button>
                </form>
              @else
              <form action="/delete" method="POST">
                @csrf
                  <input type="hidden" name="shop_id" value="{{$shop->id}}">
                  <button class="heart_button"><img class="heart_button" src="{{asset('img/heart-red.png')}}" alt=""></button>
                </form>
              @endif
            @endif
          </div>
        </div>
      </div>
      @endforeach
    @endif
  </div>
@endsection

</body>
