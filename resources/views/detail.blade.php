@extends('layouts.default')
<style>
  a{
    text-decoration: none;
    color: blue;
  }
  .main_area{
    display: flex;
    margin: 0 auto;
  }
  .nav_area{
    width: 90%;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
  }
  .nav{
    position: absolute;
    height: 100vh;
    width: 100%;
    left: -100%;
    background: WhiteSmoke;
    transition: .7s;
    text-align: center;
  }
  .nav ul{
    padding-top: 80px;
  }
  .nav ul li{
    list-style-type: none;
    margin-top: 50px;
    font-size: 25px;
    font-weight: bold;
    font-family: serif;

  }
  .button-item{
    border: none;
    background-color: WhiteSmoke;
    font-size: 25px;
    font-weight: bold;
    font-family: serif;
    color: blue;
    cursor: hand;
  }
  .menu{
    display: inline-block;
    width: 36px;
    height: 32px;
    cursor: pointer;
    position: relative;
    left: 20px;
    top: 30px;
    background-color: blue;
    border-radius: 5px;
  }
  .menu_line--top,
  .menu_line--middle,
  .menu_line--bottom {
    display: inline-block;
    width: 100%;
    height: 2px;
    background-color: white;
    position: absolute;
    transition: 0.5s;
  }
  .menu_line--top{
    top: 8px;
    width: 30%;
    right: 15px;
    height: 0.5px;
  }
  .menu_line--middle{
    top: 16px;
    width: 50%;
    right: 8px;
    height: 1px;
  }
  .menu_line--bottom{
    bottom: 8px;
    height: 1px;
    width: 15%;
    right: 18px;
  }
.menu.open span:nth-of-type(1){
  top: 14px;
  width: 100%;
  left: 0px;
  transform: rotate(45deg);
}
.menu.open span:nth-of-type(2){
  opacity: 0;
}
.menu.open span:nth-of-type(3){
  top: 14px;
  width: 100%;
  left: 0px;
  transform: rotate(-45deg);
}
.in{
  transform: translateX(100%);
}
.nav_title{
  display: flex;
}
.title_item{
  margin: 25px 0 0 30px;
  font-family: serif;
  color: blue;
}

.login-area{
  margin-left: 90px;
}

.card_group{
  margin: 80px 0 0 -120px;
}
.wrapper{
  width: 60%;
}
.text-box {
  display: flex;
}
.return-item-area{
  margin-top: 23px;
}
.return-item{
  background-color: white;
  color: grey;
  border-color: grey;
  text-align: center;
  box-shadow: 1px 1px 1px 1px;
  border-radius: 3px;
  padding: 0px 5px;
}
.title-area{
  margin: auto 10px;
}
.title{
}
.card {
}
img {
  width: 100%;
}
.content-img {
  text-align: center;
}
.date-item {
  font-size: 15px;
  font-weight: 600;
}
.content-item{
  font-weight: 600;
}
.detailbutton{
  padding: 5px 15px;
  background-color: blue;
  color: white;
  border-radius: 5px;
  border: 1px solid white;
}
.reserve_area{
  width: 80%;
  height: 100%;
  background-color: dodgerblue;
  margin: 0px 100px 0 -100px;
  border-radius: 10px;
  box-shadow: 3px 3px 0 1px rgba(0,0,0,0.2);

}
.reserve_content_area{
  margin: 0 30px;
}
.reserve_title{
  color: white;
  font-size: 28px;
  font-weight: bold;
}
.date_area{
  width: 50%;
  padding: 5px;
  border-radius: 5px;
  border: none;
}
.time_area{
  width: 100%;
  padding: 5px;
  border-radius: 5px;
  border: none;
  margin: 15px auto;
}
.user_number_area{
  width: 100%;
  padding: 5px;
  border-radius: 5px;
  border: none;
}
.reservebutton_area{
  text-align: center;
  padding: 20px;
  background-color: blue;
  border-radius: 0 0 10px 10px;
  margin: 50px auto 0;
}
.reserve_detail_area{
  background-color: dodgerBlue;
  margin-top: 50px;
  border: none;
  border-radius: 10px;
}
.reserve_detail_teble{
  border: 5px solid dodgerblue;
  border-radius: 10px;
  background-color: cornflowerblue;
}
.reserve_detail_th{
  padding: 10px;
  text-align: left;
  color: white;
}
.reserve_detail_td{
  color:white;
  width: 100%;
  padding-left: 50px;
}
.reservebutton{
  width: 100%;
  background-color: blue;
  border: none;
  color: white;
}
</style>
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
<div class="main_area">
  <div class="login-area">
  @if (Auth::check())
    <p>こんにちは {{$user->name . 'さん'}}</p>
    @else
    <p>ゲストさん　ログインお願いします。</p>
  @endif
  </div>

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
          <img src="{{ Storage::url($shop->image_path)}}" width="50%">
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
  <div class="reserve_area">
    @if (Auth::check())
    <div class="reserve_content_area">
      <div>
        <p class="reserve_title">予約</p>
      </div>
      <form action="/reserve" method="POST">
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
      @endif
  </div>
</div>
@endsection