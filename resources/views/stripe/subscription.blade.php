@extends('layouts.default')

<head>
<link rel="stylesheet" href="{{ asset('css/reset.css')}}" />
<link rel="stylesheet" href="{{ asset('css/stripe.css') }}">
</head>

@section('content')
 
<div class="container">
  <h3 class="mb-3">ご登録フォーム</h3>
	<div class="form_area">
{{-- フォーム部分 --}}
	<form action="/subscription/afterpay" method="post" id="payment-form">
		@csrf
		<div class="name_area">
			<label for="exampleInputEmail1">お名前</label>
			<input type="test" class="form-control col-sm-5" id="card-holder-name" style="padding: 5px;" required>
		</div>

		<div class="card_number_area">
			<label for="exampleInputPassword1">カード番号</label>
			<div class="form-group MyCardElement col-sm-5" id="card-element" style="border: 1px solid black; padding: 5px;"></div>
		</div>
	</div>
			<div id="card-errors" role="alert" style='color:red'></div>

		<div class="button_area">
			<button class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}" style="background: white; border: 0.2px solid #b32a23; color: #b32a23; border-radius: 5px; padding: 5px; margin: 20px auto;">送信する</button>
		</div>
	</form>
</div>
<div class="logout_area">
  <form action="{{route('logout')}}" method="POST">
      @csrf
    <button class="logout_button">Logout</button>
  </form>
</div>


<script src="https://js.stripe.com/v3/"></script>

<script>
 
	// HTMLの読み込み完了後に実行するようにする
	window.onload = my_init;
	function my_init() {
 
		// Configに設定したStripeのAPIキーを読み込む  
		const stripe = Stripe("{{ config('services.stripe.pb_key') }}");
		const elements = stripe.elements();
 
		var style = {
			base: {
			color: "#32325d",
			fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
			fontSmoothing: "antialiased",
			fontSize: "16px",
			"::placeholder": {
			color: "#aab7c4"
			}
		},
		invalid: {
			color: "#fa755a",
			iconColor: "#fa755a"
		}
		};
		
		const cardElement = elements.create('card', {style: style, hidePostalCode: true});
		cardElement.mount('#card-element');
 
		const cardHolderName = document.getElementById('card-holder-name');
		const cardButton = document.getElementById('card-button');
		const clientSecret = cardButton.dataset.secret;
 
		cardButton.addEventListener('click', async (e) => {
			// formのsubmitボタンのデフォルト動作を無効にする
			e.preventDefault();
			const { setupIntent, error } = await stripe.confirmCardSetup(
				clientSecret, {
					payment_method: {
					card: cardElement,
					billing_details: { name: cardHolderName.value }
					}
				}
			);
			
			if (error) {
			// エラー処理
			console.log('error');
			
			} else {
			// 問題なければ、stripePaymentHandlerへ
			stripePaymentHandler(setupIntent);
			}
		});
	}
	
	function stripePaymentHandler(setupIntent) {
	var form = document.getElementById('payment-form');
	var hiddenInput = document.createElement('input');
	hiddenInput.setAttribute('type', 'hidden');
	hiddenInput.setAttribute('name', 'stripePaymentMethod');
	hiddenInput.setAttribute('value', setupIntent.payment_method);
	form.appendChild(hiddenInput);
	// フォームを送信
	form.submit();
	}
</script>
@endsection