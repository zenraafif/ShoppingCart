<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <script type="text/javascript" src="{{ asset('js/myscript.js') }}"></script>
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
  <form name="order" id="order">
      <table>
          <tr>
              <td>
                  <label for="productID">Product ID:</label>
              </td>
              <td>
                  <input id="productID" name="product" type="text" size="28" required/>
              </td>
          </tr>
          <tr>
              <td>
                  <label for="product">Product Desc:</label>
              </td>
              <td>
                  <input id="product_desc" name="product" type="text" size="28" required/>
              </td>
          </tr>
          <tr>
              <td>
                  <label for="quantity">Quantity:</label>
              </td>
              <td>
                  <input id="quantity" name="quantity" width="196px" required/>
              </td>
          </tr>
          <tr>
              <td>
                  <label for="price">Price:</label>
              </td>
              <td>
                  <input id="price" name="price" size="28" required/>
              </td>
          </tr>
      </table>
      <input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset" />
      <input type="button" id="btnAddProduct" onclick="addProduct();" value="+ Podoct" >
  </form>
  <br>
  <p id="demo"></p> <br/>
  <h2> Shopping Cart </h2>
  <p id="demo2"></p>
  <h2>Grand Total:</h2>
  <p id="demo3"></p>
  </body>
  </html>