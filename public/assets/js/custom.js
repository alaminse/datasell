
function increaseCount(a, b,c,id, totalID) {
  

   var price=c;
    var input = b.previousElementSibling;
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    input.value = value;
    var totalPrice=price*value;
    // var updateAmount = dcoument.getElementById('total').value;
    // var update= dcoument.getElementById('total').value;
    // console.log(update);
   var test= document.getElementById(totalID).value=totalPrice;
   console.log(test);

    document.getElementById(id).innerHTML=`<strong id="totalprice">Total:${totalPrice}</strong>`;
 
   
  }
  
  function decreaseCount(a, b, c, id, totalID) {
    var price=c;
    var input = b.nextElementSibling;
    var value = parseInt(input.value, 10);
    if (value > 1) {
      value = isNaN(value) ? 0 : value;
      value--;
      input.value = value;
      var totalPrice=price*value;
      var test= document.getElementById(totalID).value=totalPrice;
      console.log(test);
      document.getElementById(id).innerHTML=`<strong id="totalprice">Total:${totalPrice}</strong>`;
      console.log(totalPrice);
    }
  }
  