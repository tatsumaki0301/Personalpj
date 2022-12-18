@extends('layouts.default')
<head>
<link rel="stylesheet" href="{{ asset('css/reset.css')}}" />
<link rel="stylesheet" href="{{ asset('css/favorite.css') }}">
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
      <li><a href="/register">Registrastion</a>
        </li>
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

<div class="main_area">
  <div class="reserve_area">
      <p class="reserve_title_items">予約状況</p>
    <div class="reserve_detail_area">
      @foreach($reserves as $reserve)
          <table class="reserve_detail_teble">
            <tr>
              <th class="reserve_count_text">
              <img src="{{asset('img/tokei2.png')}}" style="width: 20px; margin: 0 5 -5 0;">
              予約{{$reserves->firstItem() + $loop->index}}</th>
              
              <form action="/review" method="POST">
                @csrf
                <td>
                  <input type="hidden" name="reviewId" value="{{$reserve->id}}" />
                </td>
                <td class="review_button_area">
                  <button class="review_button">レビュー</button>
                </td>
              </form>

              <form action="/remove" method="POST">
                @csrf
              <td>
                <input type="hidden" name="deleteId" value="{{$reserve->id}}">
              </td>
              <td class="delete_button_area">
                <button class="delete_button">Ｘ</button>
              </td>
              </form>
            </tr>
            <form action="/update" method="post">
              @csrf
            <tr>
              <th class="reserve_detail_th">name</th>
              <td class="reserve_detail_td">
                {{$reserve->shop->shop_name}}</td>
            </tr>
            <tr>
              <th class="reserve_detail_th">date</th>
                <td class="reserve_detail_td">{{substr($reserve->datetime,0,10)}}</td>
                <td class="update_area">
                  <div>
                    <input type="hidden" name="id" value="{{$reserve->id}}">
                    <input type="hidden" name="user_id" value="{{$id}}">
                    <input type="hidden" name="shop_id" value="{{$reserve->shop->id}}">
                    <label for="datetime">
                    <input class="date_area" type="date" id="datetime" name="date" value="yyyy-MM-dd" required>
                  </div>
                </td>
            </tr>
            <tr>
              <th class="reserve_detail_th">time</th>
                <td class="reserve_detail_td">{{substr($reserve->datetime,10,6)}}</td>
                <td class="update_area">
                <div>
                  <select class="time_area" id="time" name="time" required>
                    <option></option>
                    @foreach($timers as $timer)
                    <option value="{{$timer}}">{{$timer}}</option>
                    @endforeach
                  </select>
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <th class="reserve_detail_th">number</th>
                <td class="reserve_detail_td">{{$reserve->user_number}}人</td>
                <td class="update_area">
                  <select class="user_number_area" id="user_number" name="user_number" required>
                      <option></option>
                      @for($j=1; $j <= 5; $j++)
                      <option value="{{$j}}">{{$j}}人</option>
                      @endfor
                  </select>
                </td>
            </tr>
            <tr>
              <th></th>
              <td></td>
                <td class="update_button_area">
                  <button class="update_button">予約変更</button>
                </td>
            </form>
            </tr>
          </table>
      @endforeach
      {{ $reserves->links() }}
    </div>
  </div>
  
  <div class="favorite_area">
    <div class="login-area">
      @if (Auth::check())
        <p class="login_name">{{$user->name . 'さん'}}</p>
      @endif
    </div>

    <div class="favorite_area_item">
      <p class="favorite_title">お気に入り店舗</p>
      <div class="card_group">
        @if (@isset($favorite))
          @foreach($favorite as $item)
            <div class="wrapper">
              <div class="card">
                <div class="content-img">
                  <img src="{{$item->shop->image_path}}" width="50%">
                </div>
                <div class="text-box">
                  <h2 class="title">{{$item->shop->shop_name}}
                  </h2>
                </div>
                <div class="area_genru_area">
                  <p class="date">
                    #{{$item->shop->area->area_name}}
                    #{{$item->shop->genru->genru_name}}
                  </p>
                </div>
                <div class="detail-favorite">
                  <form action="detail" method="GET">
                  @csrf
                    <input type="hidden" name="shop_id" value="{{$item->shop->id}}">
                    <button class="detailbutton">詳しく見る</button>
                  </form>
                  @if(Auth::check())
                    @if(count($item->shop->favorite) == 0)
                      <form action="/favorite" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$item->shop->id}}">
                        <input type="hidden" name="shop_id" value="{{$item->shop->id}}">
                          <button class="heart_button"><img class="heart_button" src="{{asset('img/heart-white.png')}}" alt=""></button>
                      </form>
                    @else
                    <form action="/delete" method="POST">
                      @csrf
                        <input type="hidden" name="shop_id" value="{{$item->shop->id}}">
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
      {{ $favorite->links() }}
    </div>
  </div>
</div>
@endsection

</body>