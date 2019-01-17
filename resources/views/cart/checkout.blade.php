<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
</head>
<body>
	<table align="center" border="1 px" cellspacing="0" cellpadding="10px" width="50%">
		<thead>
			<tr>
				<th>No.</th>
				<th>Part</th>
				<th>Merk</th>
				<th>No Serial</th>
				<th>Qty</th>
				<th>Price</th>
				<th>Subtotal</th>
			</tr>
		</thead>
		@if(Session::has('table_id'))

		    {{ Session::get('table_id') }}

		@endif
		<tbody>
			<tr>
				
				@foreach ($part as $p)
					<td>{{$p}}</td>
				@endforeach
				{{-- 
				@foreach ($merk as $m)
					<td>{{$m}}</td>
				@endforeach

				@foreach ($serial as $s)
				<td>{{$s}}</td>
				@endforeach

				@foreach ($quantity as $qty)
				<td>{{$qty}}</td>
				@endforeach --}}
			</tr>
		</tbody>

	</table>
	
</body>
</html>