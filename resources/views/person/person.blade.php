@extends('layouts.default')

<head>
<link rel="stylesheet" href="{{ asset('css/reset.css')}}" />
<link rel="stylesheet" href="{{ asset('css/person.css') }}">
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
    <h2 class="h_text">店舗代表者画面</h2>
  </div>
</div>
<div class="person_shop_create_area">
@if(!$shops->shops()->exists())
  <form action="/person/shop_create" method="POST" enctype="multipart/form-data">
    @csrf
    <table class="person_shop_create_table">
      <tr>
        <th>ID</th>
        <th>shop_name</th>
        <th>area_name</th>
        <th>genru_name</th>
        <th>person_id</th>
        <th>shop_content</th>
        <th>image_path</th>
      </tr>
      <tr>
        <td class="person_shop_create_td">{{$shops->id}}</td>
        <td class="person_shop_create_td">
          <input class="person_shop_create_input" type="text" name="shop_name" required />
        </td>
        <td class="person_shop_create_td">
          <select name="area_id">
            @foreach($areas as $area)
              <option value="{{$area->id}}">{{$area->area_name}}
              </option>
              @endforeach
          </select>
        </td>
        <td class="person_shop_create_td">
          <select name="genru_id">
            @foreach($genrus as $genru)
              <option value="{{$genru->id}}">
                {{$genru->genru_name}}
              </option>
            @endforeach
          </select>
        </td>
        <td class="person_shop_create_td">
          <input type="hidden" name="person_id" value="{{$shops->id}}" />
          {{$shops->id}}
        </td>
        <td class="person_shop_create_td">
          <textarea class="person_shop_create_textarea" name="shop_content" rows="5" corls="30" required></textarea>
        </td>
        <td class="person_shop_create_td">
          <input type="file" name="image_path" />
        </td>
      </tr>
    </table>
    <div class="person_shop_create_button_area">
      <button class="person_shop_create_button">追加</button>
    </div>
  </form>
@endif
</div>
<div class="person_detail_area">
  <table class="person_detail_table">
    <form action="/person/shop_update" method="POST" enctype="multipart/form-data">
      @csrf
        <tr>
          <th></th>
          <th></th>
          <th class="person_detail_th">ID</th>
          <th class="person_detail_th">店舗名</th>
          <th class="person_detail_th">エリア</th>
          <th class="person_detail_th">ジャンル</th>
          <th class="person_detail_th">説明</th>
          <th class="person_detail_th">画像</th>
          <th></th>
          <th></th>
        </tr>
        <tr>
          <td><input type="hidden" name="email" value="{{$shops->email}}" /></td>
          <td><input type="hidden" name="password" value=" {{$shops->password}}" /></td>
        @foreach($shops->shops as $shop)
          <td class="person_detail_td"><input type="hidden" name="id" value="{{$shop->id}}" />{{$shop->id}}</td>
          <td class="person_detail_td">{{$shop->shop_name}}</td>
          <td class="person_detail_td">
            <input type="hidden" name="area_id" value="{{$shop->area->id}}" />
            {{$shop->area->area_name}}
          </td>
          <td class="person_detail_td">
            <input type="hidden" name="genru_id" value="{{$shop->genru->id}}" />
            {{$shop->genru->genru_name}}
          </td>
          <td class="person_detail_td_content">
            <textarea class="person_detail_textarea" name="shop_content" rows="5" cols="40"> {{$shop->shop_content}}</textarea>
          </td>
          <td class="person_detail_td_image">
            <input type="hidden" name="image_path" value="{{$shop->image_path}}"><img src="{{$shop->image_path}}" width="50%"></input></td>
            <td><input type="hidden" name="person_id" value="{{$shop->person_id}}" /></td>
          <td class="person_detail_updatebutton_td"><button class="person_detail_updatebutton">更新</button></td>
        </tr>
      @endforeach
    </form>
  </table>
</div>
<div class="person_reserve_area">
  <table class="person_reserve_table">
    <tr class="person_reserve_tr">
      <th class="person_reserve_th">ID</th>
      <th class="person_reserve_th">ユーザー名</th>
      <th class="person_reserve_th">メールアドレス</th>
      <th class="person_reserve_th">予約日時</th>
      <th class="person_reserve_th">予約時間</th>
      <th class="person_reserve_th">予約人数</th>
      <th class="person_reserve_th">登録日時</th>
    </tr>
  @foreach($reserves as $reserve)
    <tr>
      <td class="person_reserve_td">{{$reserve->id}}</td>
      <td class="person_reserve_td">{{$reserve->user->name}}</td>
      <td class="person_reserve_td">{{$reserve->user->email}}</td>
      <td class="person_reserve_td">{{substr($reserve->datetime,10,6)}}</td>
      <td class="person_reserve_td">{{substr($reserve->datetime,10,6)}}</td>
      <td class="person_reserve_td">{{$reserve->user_number}}人</td>
      <td class="person_reserve_td">{{$reserve->user->created_at}}</td>
    </tr>
  @endforeach
  </table>
</div>
@endsection

</body>