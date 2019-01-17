@extends('cart.template.master')
@section('title', 'Pembelian')
<style type="text/css">
  input{
    border: none;
  }
</style>
@section('content')
<body>
  <div class="container">
  	<h2 class="text-center mt-4">Detail Transaksi</h2>
  	<hr width="100px" class="mb-5">
    @if (session('alert-success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ session('alert-success') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif
    @if(\Session::has('alert'))
        <div class="alert alert-danger">
            <div>{{Session::get('alert')}}</div>
        </div>
    @endif
    @foreach ($master as $rows)	
      <form method="post" action="action/{{ $rows->id }}">
    @endforeach
    <div class="font-weight-light text-right text-dark mr-5 mb-2">
      <span class="bg-warning p-1"><b>*Click to edit</b></span>
    </div>
        <table class="table" id="myTable">
          <thead>
            <tr class="text-center">
              <th scope="col">PART</th>
              <th scope="col">MERK</th>
              <th scope="col">NO SERIAL</th>
              <th scope="col">QTY</th>
              <th scope="col">HARGA SATUAN</th>
              <th scope="col">SUB TOTAL</th>
              <th scope="col">HAPUS</th>
            </tr>
          </thead>
          <tbody class="text-center body" id="tableToModify">
          @foreach ($orders_details as $row)
            <tr id="rowToClone">
              <input type="hidden" name="id[]" placeholder="Part" value="{{$row->id}}">
              <td><input type="text" name="part[]" placeholder="Part" value="{{$row->part}}"></td>
              <td><input type="text" name="merk[]" placeholder="Merk" value="{{$row->merk}}"></td>
              <td><input type="text" name="serial[]" placeholder="No Serial" value="{{$row->no_serial}}"></td>
              <td><input type="number" class="product_quantities" id="qty" name="quantity[]" placeholder="Jumlah" value="{{$row->quantity}}"></td>
              <td>Rp.<input type="number" class="price" id="price" name="price[]" placeholder="Harga" value="{{$row->price}}"></td>
              <td>Rp.<input type="text" class="subtotal amount" id="subtotal" name="subtotal[]" placeholder="Sub Total" readonly="" value="{{$row->subtotal}}"></td>
              <td>
                <a class="btn btn-danger btn-sm" href="hapusDetailOrder/{{$row->id}}"><i class="far fa-trash-alt"></i></a>
               </td>
            </tr>
		  @endforeach
          </tbody>
          <tfoot>
          	@foreach ($master as $row)
            <tr>
              <td class="text-center bold" colspan="4"></td>
              <td class="text-center bold"><b>TOTAL :</b></td>
              <td class="text-center bold ">Rp.<input id="total" class="total" name="total" readonly style="border: none;" value="{{$row->total}}"></td>
              <td></td>
            </tr>
          	@endforeach
          </tfoot>
        </table>
        <div class="text-center mt-5 mb-5">
          <button class="btn btn-success" name="simpan" style="width: 25%"><b>simpan</b></button>
          {{-- <input class="btn btn-primary" type="submit" name="simpan" value="Simpan" /> --}}
          {{-- <input class="btn btn-warning" type="submit" name="checkout" value="CheckOut" /> --}}
        </div>
        {{ csrf_field() }}
      </form>
    </div>
    <script type="text/javascript">
      function totalamount() {
        // var q = parseInt(getElementById('#total')).value;
        var q = 0;
        var rows = document.getElementById('myTable').getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
        
        for( var i = 0; i < rows; i++ ){
          var z = $('.amount:eq(' + i + ')').val();

          if (!isNaN(z)) {
            q +=Number(z);
          }
        }
        // document.getElementById("total").value=q; 
        $('#total').val(q);
      }

      $(function () { 
        $('tabel').find('tr[data-id=""]')
        $('.body').delegate('input','change',function(){
          var tr = $(this).parent().parent();
          var qty = tr.find('input.product_quantities').val();
          // var price = tr.data('price');
          var price = tr.find('input.price').val();
          var subtotal = (qty * price); 
          tr.find('.amount').val(subtotal).html(subtotal);
          totalamount();
        });
      });
    </script>
  </body>
  </html>
  <!-- https://jsfiddle.net/fw8t3ehs/4/ -->
@endsection
