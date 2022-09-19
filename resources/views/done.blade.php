@extends('layouts.default')
<style>
  a{
    text-decoration: none;
    color: blue;
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
  .menu{
    display: inline-block;
    width: 36px;
    height: 32px;
    cursor: pointer;
    position: relative;
    left: 50px;
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
  margin: 25px 0 0 60px;
  font-family: serif;
  color: blue;
}


  .content_area{
    width: 50%;
    background-color: white;
    margin: 50px auto;
  }
  .content_area-item{
    text-align: center;
    padding: 120px;
  }
  .h_text{
    width: 100%;
    font-size: 24px;
    font-weight: 600; 
    text-align: center;
    margin-bottom: 50px;
  }
  .returnbutton{
    padding: 10px 15px;
    border-radius: 5px;
    border-color: blue;
    background-color: blue;
    color: white;
    margin: 0 auto;
    text-align: center;
  }
</style>
@section('title', 'Rese')

@section('nav')

  <nav class="nav" id="nav">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Logout</a></li>
      <li><a href="#">Mypage</a></li>
    </ul>
  </nav>
  <div class="nav_title">
    <div class="menu" id="menu">
      <span class="menu_line--top"></span>
      <span class="menu_line--middle"></span>
      <span class="menu_line--bottom"></span>
    </div>
    <h1 class="title_item">Rese</h1>
  </div>


@section('content')

<div class="content_area">
  <div class="content_area-item">
    <h2 class="h_text">ご予約ありがとうございます</h2>
    <a href="/">
      <button class="returnbutton" name="returnbutton">
        戻る
      </button>
    </a>
  </div>
</div>

@endsection

