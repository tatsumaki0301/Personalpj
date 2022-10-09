@extends('layouts.default')

<head>
<link rel="stylesheet" href="{{ asset('css/file.css') }}">
</head>

<body>
@section('title', 'Rese')

@section('nav')

  <nav class="nav" id="nav">
    <ul>
      <li><a href="/">Home</a></li>
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

<div class="file_main_area">
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
          <img src="{{$shop->image_path}}" width="50%">
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection
</body>