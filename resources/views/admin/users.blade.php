@extends('layouts.default')

<head>
<link rel="stylesheet" href="{{ asset('css/reset.css')}}" />
<link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>

<body>
@section('title', 'Rese')

@section('nav')

  <nav class="nav" id="nav">
    <ul>
      <li><a href="/">Home</a></li>
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

<div class="content_area">
  <div class="content_area-item">
    <h2 class="h_text">ユーザーページ</h2>
  </div>
</div>
<div class="user_list_area">
  <form action="/mail/send" method="GET">
    @csrf
    <table class="user_list_table">
      <tr class="user_list_tr">
        <th class="user_list_th">ID</th>
        <th class="user_list_th">name</th>
        <th class="user_list_th">email</th>
        <th class="user_list_th">created_at</th>
      </tr>
    @foreach($users as $user)
      <tr class="user_list_tr">
        <td class="user_list_td"><input type="hidden" name="id" value="{{$user->id}}" />{{$user->id}}</td>
        <td class="user_list_td"><input type="hidden" name="name" value="{{$user->name}}" />{{$user->name}}</td>
        <td class="user_list_td"><input type="hidden" name="email" value="{{$user->email}}" />{{$user->email}}</td>
        <td class="user_list_td"><input type="hidden" name="created_at" value="{{$user->created_at}}" />{{$user->created_at}}</td>
      </tr>
    @endforeach
    </table>
    <div>
      <button>
        メール送信
      </button>
    </div>
  </form>
</div>
@endsection

</body>