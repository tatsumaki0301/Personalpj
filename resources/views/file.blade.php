@extends('layouts.default')

<head>
<link rel="stylesheet" href="{{ asset('css/reset.css')}}" />
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
</head>

<body>
@section('title', 'Rese')

@section('nav')

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
    <h1 class="title_item">Rese</h1>
  </div>


@section('content')

<form action="/file_upload" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="file" name="file">
  <button type="submit">保存</button>
</form>

@endsection

</body>


