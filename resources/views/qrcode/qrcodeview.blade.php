<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QRコード</title>
</head>
<body>
  <div>
    <p>Rese</p>
  </div>
  <div>
    <table>
      <tr>
        <th>ID</th>
        <th>user_name</th>
        <th>email</th>
        <th>reserve_ID</th>
        <th>shop_name</th>
        <th>reserve_date</th>
        <th>reserve_time</th>
        <th>reserve_number</th>
      </tr>
    @foreach($reserves as $reserve)
      <tr>
        <td>{{$reserve->user->id}}</td>
        <td>{{$reserve->user->name}}</td>
        <td>{{$reserve->user->email}}</td>
        <td>{{$reserve->id}}</td>
        <td>{{$reserve->shop->shop_name}}</td>
        <td>{{substr($reserve->datetime,0,10)}}</td>
        <td>{{substr($reserve->datetime,10,6)}}</td>
        <td>{{$reserve->user_number}}人</td>
      </tr>
    @endforeach
    </table>
  </div>
</body>
</html>