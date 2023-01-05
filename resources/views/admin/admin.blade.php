@extends('layouts.default')

<head>
<link rel="stylesheet" href="{{ asset('css/reset.css')}}" />
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
    <h2 class="h_text">管理者画面</h2>
  </div>
</div>
<div class="userpage_button_area">
  <form action="/admin/users" method="GET">
    @csrf
    <button class="userpage_button">
      ユーザーページへ
    </button>
  </form>
</div>
@if (Count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif
<div class="input_area">
  <table class="input_teble_area">
    <tr>
      <th>責任者名</th>
      <th>メールアドレス</th>
      <th>パスワード</th>
    </tr>
    <form action="/admin/create" method="POST">
    @csrf
    <tr>
      <td class="input_td_area">
        <input class="input_text_class" type="text" name="name" required />
      </td>
      <td class="input_td_area">
        <input class="input_text_class" type="email" name="email" required />
      </td>
      <td class="input_td_area">
        <input class="input_text_class" type="password" name="password" required />
      </td>
    </tr>
  </table>
    <div class="input_button_area">
      <tr>
        <button class="input_button">追加</button>
      </tr>
    </div>
    </form>
</div>
<div class="person_detail_area">
  <table class="person_detail_table">
    <tr>
      <th>ID</th>
      <th>責任者名</th>
      <th>メールアドレス</th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    @foreach($persons as $person)
    <form action="/admin/update" method="POST">
      @csrf
    <tr>
      <td class="person_detail_input_td">
        <input type="hidden" name="id" value="{{$person->id}}" />
        {{$person->id}}
      </td>
      <td class="person_detail_input_td">
        <input class="person_detail_input" type="text" name="name" value="{{$person->name}}" />
      </td>
      <td class="person_detail_td">
        <input class="person_detail_input" type="email" name="email" value="{{$person->email}}" />
      </td>
      <td class="person_detail_button_area">
        <button class="person_detail_update_button">更新</button>
      </td>
    </form>
    <form action="/admin/delete" method="POST">
      @csrf
      <td>
        <input class="person_detail_input" type="hidden" name="id" value="{{$person->id}}" />
      </td>
      <td class="person_detail_button_area">
        <button class="person_detail_delete_button">削除</button>
      </td>
    </form>
    </tr>
    @endforeach
  </table>
  {{ $persons->links() }}
</div>
@endsection

</body>