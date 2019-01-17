@extends('cart.template.master')
@section('title', 'Pembelian')

@section('content')
<body>
  <div class="container">
    <input type="button" id="more_fields" onclick="addFields();totalamount();" value="Add More" class="btn btn-info ml-3 mt-5 mb-4" />  
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
      {{-- data-price="15.00" --}}
      <div id="readroot" style="display: none"></div>
      <form id="reset">
        <tbody class="text-center body" id="tableToModify">
          <tr data-id="1" id="rowToClone">
            <td><input type="text" name="data[]" placeholder="Part"></td>
            <td><input type="text" name="data[]" placeholder="Merk"></td>
            <td><input type="text" name="data[]" placeholder="No Serial"></td>
            <td><input type="number" class="product_quantities" id="qty" name="data[]" placeholder="Jumlah"></td>
            <td><input type="number" class="price" id="price" name="price" placeholder="Harga"></td>
            <td><input type="text" class="subtotal amount" id="subtotal" name="data[]" placeholder="Sub Total"  readonly></td>
            <td><button onclick="delRow(this);totalamount();">Hapus</button></td>
          </tr>
        </tbody>
      </form>
    </table>
    <section>
      <div class="container">
        <div class="row" style="float: right;">
          <input type="number" name="data[]" class="total" id="total">
        </div>
      </div>
    </section>
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
        document.getElementById("total").value=q; 
        // $('.total').html(q);
      }

      $(function () { 
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
  @endsection  
 














  {{-- https://jsfiddle.net/fw8t3ehs/4/ --}}
   {{--  <a class="test" name="Name 1"></a>
    <a class="test" name="Name 2"></a>
    <a class="test" name="Name 3"></a>
    <a class="test" name="Name 3"></a> --}}


    {{-- <script type="text/javascript">
      var elements = document.getElementsByClassName("test");
      var qty = document.getElementsByClassName("qty").value;
    var price = document.getElementsByClassName("price").value;
     var result = parseInt(qty)*parseInt(price);

      var names = '';
      for(var i=0; i<elements.length; i++) {
          names += elements[i].name;
      }
      document.write(names);
    </script> --}}

    {{-- <script type="text/javascript">
      function addNumber(divName){    
        var sum = document.getElementById('sum');
        var newdiv = document.createElement('div');
        newdiv.innerHTML = "<input type='text' name='number" + counter + "'>";
        document.getElementById(divName).appendChild(newdiv);
        sum.value = getSum(counter);
        counter++;    
        
   }
      function getSum(numberOfDivs) {
        var sum = 0;
        for (var i=0 ; i<numberOfDivs; i++) {
          sum += parseInt(document.getElementsByName('number' + i)[0].value);
        }
        return sum;
      }
    </script> --}}
@endsection