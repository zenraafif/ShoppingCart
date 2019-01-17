<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<table class="table table-condensed table-hover" id="myTable">
	                    <thead>
	                        <tr>
	                            <th>Product</th>
	                            <th class="text-center">Quantity</th>
	                            <th class="text-right">Price ($)</th>
	                        </tr>
	                    </thead>
	                    <tbody class="body">
	                        <tr data-id="1" data-price="20.00">
	                            <td>Apple ($20)</td>
	                            <td><select class="form-control product_quantities" name="product_quantities[]">
	                                    <option value="0">0</option>
	                                    <option value="1">1</option>
	                                    <option value="2">2</option>
	                                    <option value="3">3</option>
	                                    <option value="4">4</option>
	                                    <option value="5">5</option>
	                                </select></td>
	                            <td class="text-right amount" name="amount[]">0</td>
	                        </tr>
	                        <tr data-id="2" data-price="15.00">
	                            <td>Banana ($15)</td>
	                            <td><select class="form-control product_quantities" name="product_quantities[]">
	                                    <option value="0">0</option>
	                                    <option value="1">1</option>
	                                    <option value="2">2</option>
	                                    <option value="3">3</option>
	                                    <option value="4">4</option>
	                                    <option value="5">5</option>
	                                </select></td>
	                            <td class="text-right amount" name="amount[]">0</td>
	                        </tr>
	                        <tr>
	                            <td class="text-right bold">TOTAL</td>
	                            <td class="text-center bold">1</td>
	                            <td class="text-right bold"><b class="total">0</b></td>
	                        </tr>
	                    </tbody>
	                </table>

<script type="text/javascript">
	function totalamount() {
	    var q = 0;
	    
	    
	    var rows = document.getElementById('myTable').getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
	    
	    for( var i = 0; i < rows; i++ ){
	        var z = $('.amount:eq(' + i + ')').html();
	        
	        if (!isNaN(z)) {
	        	q +=Number(z);
	        }
	    }
	    $('.total').html(q);
	}

	$(function () {
	    $('.body').delegate('.product_quantities','change',function(){
	        var tr = $(this).parent().parent();
	        var qty = tr.find('.product_quantities option:selected').attr('value');
	        var price = tr.data('price');

	        var total = (price * qty);
	        tr.find('.amount').html(total);
	        totalamount();
	    });
	});
</script>
</body>
</html>