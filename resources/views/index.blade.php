@extends('layouts.default')
<style>
  a{
    text-decoration: none;
    color: blue;
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


.search_area{
  background-color: white;
  box-shadow: 0 1.2px 1px 0px rgba(0,0,0,0.2);
  border-radius: 5px;
  width: 40%;
  height: 50px;
  margin: 20px 80px 0 0;
}
.search_area_item{
  margin: 10px auto;
  width: 100%;
  text-align: center;
}
.area_name{
  width: 20%;
  border: none;
  border-right: 1px solid grey;
  padding: 5px;
  color: grey;
}
.genru_name{
  width: 20%;
  border: none;
  border-right: 1px solid grey;
  padding: 5px;
  color: grey;
}
.name-item{
  color: black;
}
.search_text_area{
  width: 30%;
  padding: 5px;
  border: 0.5px solid lightgrey;
  border-radius: 5px;
  border: none;
  color: grey;
}
.searchbutton{
  background-color: white;
  color: grey;
  border-color: lightgrey;
  border-radius: 5px;
  border: none;
  cursor: hand;
  margin: 0 auto;
}
.musimegane{
  width: 16px;
  margin-bottom: -3px;
}


.login-area{
  width: 88%;
  margin: 0 auto;
}


.card_group{
  width: 90%;
  display: flex;
  flex-wrap: wrap;
  flex-direction: row;
  justify-content: flex-start;
  margin: 0 auto;
}
.wrapper{
  width: 21%;
  margin: 20px auto 0;
}
img {
  width: 100%;
  border-radius: 10px 10px 0 0;
}
.card {
  cursor: pointer;
  border-radius: 10px;
  background-color: white;
  margin: 10px -10px;
  box-shadow: 1.2px 1.2px 0 1px rgba(0,0,0,0.2);
}
.text-box {
  padding: 15px;
}
.title{
  margin-top: -10px;
}
.content-img {
  text-align: center;
}
.date {
  font-size: 15px;
  margin-top: -15px;
}
.detail-favorite{
  display: flex;
  justify-content: space-between;
  margin: auto 10px;
}
.detailbutton{
  padding: 5px 15px;
  background-color: blue;
  color: white;
  border-radius: 5px;
  border: 1px solid white;
  cursor: hand;
}
.heart_button{
  border: none;
  background-color: white;
  width: 40px;
  margin-top: -4px;
  margin-right: 20px;
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
        <div class="card">
          <div class="content-img">
            <img src="{{$shop->image_path}}" width="50%">
          </div>
          <div class="text-box">
            <h2 class="title">{{$shop->shop_name}}
            </h2>
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