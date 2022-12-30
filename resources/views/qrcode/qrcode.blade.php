<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>How to Generate QR Code in Laravel 8</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>

    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                <h2>本番用</h2>
            </div>
            <div class="card-body">
                {!! QrCode::size(200)->generate(url('/qrcodeview')) !!}
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h2>ローカル用</h2>
            </div>
            <div class="card-body">
                {!! QrCode::size(200)->generate('OK!') !!}
            </div>
        </div>
    </div>
</body>
</html>