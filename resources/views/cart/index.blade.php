<!DOCTYPE html>
<html>
<head>
  <title>Shopping Cart</title>
  <script type="text/javascript" src="{{ asset('js/script2.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <style type="text/css">
  .container table tbody tr td input {
    width: auto;
    max-width: 100px;
    border-radius: 5px;
    padding: 5px;
  }
  .container table thead tr td input {
    width: 100%;
    border-radius: 5px;
    padding: 5px;
  }
</style>
</head>
<body>
    <table >
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
    </table>

    <input type="button" id="more_fields" onclick="moreFields();" value="Add More" class="btn btn-info ml-3 mt-5 mb-4" />  
    <div id="readroot" style="display: none">
      <table class="table" id="myTable">
        <tbody class="text-center body"">
          <tr>
            <td><input type="text" name="data[]"></td>
            <td><input type="text" name="data[]"></td>
            <td><input type="text" name="data[]"></td>
            <td><input type="number" class="product_quantities" id="qty" name="product_quantities[]"></td>
            <td><input type="number" class="price" id="price" name="price"  value=""></td>
            {{-- <td class="subtotal amount" id="subtotal" name="amount[]" ></td> --}}
            <td  ><input type="text" class="subtotal amount" id="subtotal" name="amount[]"></td>
            <td><input type="button" name="" value="Hapus" onclick="deleteRow(this)" ></td>
          </tr>
        </div>
      </tbody>
    </table>

  </div>
  <form method="post" action="/cgi-bin/show_params.cgi">

  </form>
  <span id="writeroot"></span>
  <table>
    <thead>
      <tr>
          <td class="text-center bold" colspan="4"></td>
          <td class="text-center bold">TOTAL</td>
          <td class="text-center bold "><input id="total" class="total"></td>
        </tr>
    </thead>
  </table>





  <script type="text/javascript">
    var counter = 0;
    function moreFields() {
      counter++;
      var newFields = document.getElementById('readroot').cloneNode(true);
      newFields.id = '';
      newFields.style.display = 'block';
      var newField = newFields.childNodes;
      for (var i=0;i<newField.length;i++) {
        var theName = newField[i].name
        if (theName)
          newField[i].name = theName + counter;
      }
      var insertHere = document.getElementById('writeroot');
      insertHere.parentNode.insertBefore(newFields,insertHere);
    }
    window.onload = moreFields; 
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