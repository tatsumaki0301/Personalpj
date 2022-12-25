@extends('layouts.default')

<style>
.title{
  text-align: center;
  margin: 30px auto;
}
.title_text{
  color: blue;
  font-size: 30px;
  font-family: serif;
  font-weight: bold;
}
.name{
  width: 80%;
  margin: 0 auto;
}
.reserve_area{
  width: 100%;
  text-align: center;
  margin: 30px auto;
}
.reserve_title{
  font-size: 18px;
  font-weight: bolder;
}
.reserve_table{
  width: 60%;
  margin: 50px auto;
}
.reserve_detail{
  text-align: center;
  height: 50px;
}
.reserve_detail_text{
  vertical-align: middle;
}

</style>

<body>
@section('title', 'Rese')

@section('content')

<div class="title">
    <h2 class="title_text">Rese</h2>
</div>
<div class="name">
    <p>{{$reserves->user->name}}さま</p>
</div>
<div class="reserve_area">
    <p class="reserve_title">予約詳細</p>
    <table class="reserve_table">
        <tr>
            <th>店舗名</th>
            <th>予約日</th>
            <th>予約時間</th>
            <th>人数</th>
            <th></th>
            <th></th>
        </tr>
        <tr class="reserve_detail">
            <td class="reserve_detail_text">{{$reserves->shop->shop_name}}</td>
            <td class="reserve_detail_text">{{substr($reserves->datetime,0,10)}}</td>
            <td class="reserve_detail_text">{{substr($reserves->datetime,10,6)}}</td>
            <td class="reserve_detail_text">{{$reserves->user_number}}人</td>
        </tr>
    </table>
</div>

@endsection

</body>