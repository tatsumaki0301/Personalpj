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
  li {
    list-style-type: none;
    text-align: left;
  }
  .shop_name{
    padding: 5px;
    font-size: 10px;
  }
  .area_name{
    padding: 5px;
    margin: 5px 0;
  }
  .genru_name{
    padding: 5px;
    margin: 5px 0;
  }
  .upsubmit{
    margin-top: 20px;
    padding: 10px;
    background-color: red;
    color: white;
    border: none;
    border-radius: 5px;
  }
  .upsubmit:hover{
    opacity: 0.7;
  }
  .shop_item_area{
    width: 95%;
    margin: 50px auto;
  }
  table {
    margin: 0 auto;
    text-align: center;
  }
  .th_item{
    width: 70px;
  }
</style>
@section('title', 'Rese')

@section('nav')

  <nav class="nav" id="nav">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Registration</a></li>
      <li><a href="#">Login</a></li>
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

<form action="/file" method="POST" enctype="multipart/form-data">
  @csrf
  <ul>
    <li>
      　店舗名：　<input type="text" name="shop_name">
    </li>
    <li>
      　　地域：　
        <select id="area_id" name="area_id"  class="area_name">
          <option></option>
          @foreach($areas as $area)
          <option value="{{$area->id}}">
            {{$area->area_name}}
          </option>
          @endforeach
        </select>
    </li>
    <li>
      ジャンル：　
        <select id="genru_id" name="genru_id"  class="genru_name">
          <option></option>
          @foreach($genrus as $genru)
          <option value="{{$genru->id}}">
            {{$genru->genru_name}}
          </option>
          @endforeach
        </select>
    </li>
    <li>
      　　内容：　<textarea name="shop_content" rows="5" cols="50"></textarea>
    </li>
    <li>
      　　写真：　<input type="file" name="image_path">
    </li>
    <li>
      　　　　　　<input type="submit" value="アップロード" class="upsubmit">
    </li>
  </ul>
  </form>

<div class=shop_item_area>
  <table>
    <tr>
      <th class="th_item">ID</th>
      <th class="th_item">店舗名</th>
      <th class="th_item">地域</th>
      <th class="th_item">ジャンル</th>
      <th>　　　　　</th>
      <th>店舗概要</th>
      <th>画像</th>
    </tr>
    @foreach ($shops as $shop)
    <tr>
      <td>{{$shop->id}}</td>
      <td>{{$shop->shop_name}}</td>
      <td>{{$shop->area->area_name}}</td>
      <td>{{$shop->genru->genru_name}}</td>
      <td></td>
      <td>{{$shop->shop_content}}</td>
      <td>
        <img src="{{ Storage::url($shop->image_path)}}" width="50%">
      </td>
    </tr>
    @endforeach
  </table>
</div>

@endsection