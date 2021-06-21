<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="cart.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<!------menu-bar------>
<?php include("menubar.php"); ?>
	<main class="main">
		<h1>Shopping Cart</h1>
		<div class="split-row">
			<div id="items" class="split-column">

			</div>
			<div class="split-column">
				<div class="delivery">
					<h1 id="111">Delivery</h1>
					<div class="split-column">
					<form id="delivery_form" method="post">
						<input type="text" name="delivery_address" id="delivery_address" placeholder="Address:" ><br>
						<label>Delivery_date:</label>
						<input type="date" id="delivery_date" name="delivery_date" min="<?php echo date('Y-m-d'); ?>" max="<?php $Date = date('Y-m-d'); echo date('Y-m-d', strtotime($Date. ' + 10 days')); ?>"><br>
						<input type="checkbox" id="pick_up" name="pick_up" value="pick_up" onclick="checkbox(this.checked)">
						<label for="pick_up">Pick up</label>
					</form>
					</div>
				</div>
				<div class="payment">
					<form method="post">
						<label>Total: </label>
						<div class="payment_total">
							<label>KZT </label>
							<label id="payment_total">0.00</label>
						</div>
						<button type="sybmit" class="payment_check_out"><img class="check_out_icon" src="https://image.flaticon.com/icons/png/512/482/482541.png"> Check out</button>
					</form>
				</div>
			</div>
		</div>
	</main>
</body>
</html>
<script>
showOrder();
total_payment_price();

	function showOrder(){
		var user_id = 1;
		getProducts();
		function getProducts(){
		    $.ajax({
				url: 'getData.php?action=getProducts',
			    type: 'post',
			    data: {user_id:user_id},
			    dataType: 'JSON',
			    success: function(response){
			    	setProducts(response.items);
			    }
			});
		}
		function setProducts(item){
			var items = document.getElementById('items');
			items.innerHTML = item;
		}
	}

function checkbox(checked){
	document.getElementById("delivery_address").disabled = checked;
	document.getElementById("delivery_date").disabled = checked;
}

function quantity(id,num){
	var user_id=1;
	var max = document.getElementById("product_quantity"+id).max;
	var min = document.getElementById("product_quantity"+id).min;
	if(1*num>1*max){
		num=max;
		document.getElementById("product_quantity"+id).value=num;
	}
	else if(1*num<1*min){
		num=min;
		document.getElementById("product_quantity"+id).value=num;
	}
	unpdateQuantity();

	// var cost = document.getElementById("product_price"+id).innerText;
	// var price = document.getElementById("product_total_price"+id);
	// price.innerText=(num*cost).toFixed(2);

	function unpdateQuantity(){
		    $.ajax({
				url: 'getData.php?action=unpdateQuantity',
			    type: 'post',
			    data: {user_id:user_id,product_id:id,amount:num},
			    dataType: 'JSON',
			    success: function(response){
			    	total_payment_price();
			    	showOrder();
			    }
			});		
	}
}


function total_payment_price(){
	var user_id = 1;
	var total = document.getElementById("payment_total");
	getTotalPrice();
	function getTotalPrice(){
		    $.ajax({
				url: 'getData.php?action=getTotalPrice',
			    type: 'post',
			    data: {user_id:user_id},
			    dataType: 'JSON',
			    success: function(response){
			    	total.innerText = (calculateTotal(response.productPrices)).toFixed(2);
			    }
			});
	}
	function calculateTotal(table){
		var total=0;
		for (var i = 0; i < table.length; i++) {
			total += parseFloat(table[i].amount)*parseFloat(table[i].price);
		}
		return total;
	}
}

function close_item(id){
	var user_id=1;
	deleteProduct();
	function deleteProduct(){
		$.ajax({
			url: 'getData.php?action=deleteProduct',
		    type: 'post',
		    data: {user_id:user_id,product_id:id},
		    dataType: 'JSON',
		    success: function(response){
		    	total_payment_price();
			    showOrder();
		    }		
		});
	}
}
</script>