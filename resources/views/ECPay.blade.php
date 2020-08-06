<form action="https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5",  method="post">

	@foreach ($code as $key => $checkCode)
    	<input type="text" name="{{ $key }}" value="{{ $checkCode }}"></br></br>
	@endforeach

	<button type = "submit">
		<span class = "pl-1">送出</span>
	</button>
</form>