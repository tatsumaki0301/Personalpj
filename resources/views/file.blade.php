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
        　　写真：　<input type="file" name="file_image">
      </li>
      <li>
        　　　　　　<input type="submit" value="アップロード" class="upsubmit">
      </li>
    </ul>
    </form>

  <div class=shop_item_area>
    <table>
      <tr class="shop_item_title">
        <th>ID</th>
        <th>画像</th>
      </tr>
      @foreach ($file_images as $file_image)
      <tr>
        <td>
          {{$file_image->id}}
        </td>
        <td>
          <img class="shop_img" src="{{asset('storage/'.$file_image->file_image)}}" width="50%">
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection
</body>