@extends('layouts.default')

<head>
<link rel="stylesheet" href="{{ asset('css/reset.css')}}" />
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
</head>

<body>
@section('title', 'Rese')

@section('nav')

  <nav class="nav" id="nav">
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/register">Registrastion</a></li>
      <li><a href="/login">Login</a></li>
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

@endsection

@section('content')

<div class="content_area">
  <div class="content_area-item">
    <h2 class="h_text">会員登録ありがとうございます</h2>
    <a href="/login">
      <button class="returnbutton" name="returnbutton">
        ログインする
      </button>
    </a>
  </div>
</div>
@endsection

</body>