<?php
if(isset($_GET['action'])){
$action = $_GET['action'];
if ($action=="insertNewProduct") {
	require "connect_to_DB.php";

	$product = $_POST['product'];
	$components = $_POST['components'];
	$material_units = $_POST['material_units'];
	$units = $_POST['units'];
	$pos = $_POST['pos'];


	$sql_product = "INSERT INTO `products`(`name`, `description`) VALUES ('".$product['name']."','".$product['description']."')";
	mysqli_query($connection,$sql_product);
	$new_product_id = mysqli_insert_id($connection);

	for ($i=0; $i < sizeof($components); $i++) { 
		$sql_component = "INSERT INTO `components`(`name`, `create_time`) VALUES ('".$components[$i]['name']."','10')";
		mysqli_query($connection,$sql_component);
		$new_component_id = mysqli_insert_id($connection);

		$sql_product_component = "INSERT INTO `product_component`(`product_id`, `component_id`, `amount`) VALUES ('".$new_product_id."','".$new_component_id."','".$components[$i]['amount']."')";
		mysqli_query($connection,$sql_product_component);

		for ($j=0; $j < sizeof($units); $j++) { 
			if($components[$i]['id']==$units[$j]['component_id']){
				$sql_component_unit = "INSERT INTO `component_unit`(`component_id`, `unit_id`, `changeable`, `value`) VALUES ('".$new_component_id."','".$units[$j]['id']."','".$units[$j]['changeable']."','".$units[$j]['value']."')";
				mysqli_query($connection,$sql_component_unit);
			}
		}
		for ($j=0; $j < sizeof($material_units); $j++) { 
			if($components[$i]['material_id']==$material_units[$j]['material_id']){
				$sql_component_unit = "INSERT INTO `component_material`(`component_id`, `material_id`, `amount`) VALUES ('".$new_component_id."','".$components[$i]['material_id']."','1')";
				mysqli_query($connection,$sql_component_unit);
			}
		}

		for ($p=0; $p < sizeof($pos); $p++) { 
			if($components[$i]['id']==$pos[$p]['id']){
				$pos[$p]['id']=$new_component_id;
			}
		}
	}

	$sql_schema = "INSERT INTO `components`(`name`, `create_time`) VALUES ('schema".$new_product_id."','10')";
	mysqli_query($connection,$sql_schema);
	$schema_id = mysqli_insert_id($connection);

	$sql_product_component_schema = "INSERT INTO `product_component`(`product_id`, `component_id`, `amount`) VALUES ('".$new_product_id."','".$schema_id."','1')";
	mysqli_query($connection,$sql_product_component_schema);

	$new_pos = '';
	for ($i=0; $i < sizeof($pos); $i++) { 
		$new_pos .= $pos[$i]['id'] . 'i' .	$pos[$i]['x'] . 'x' .	$pos[$i]['y'] . 'y' . $pos[$i]['z'] . 'z';
	}

	$sql_component_unit_schema = "INSERT INTO `component_unit`(`component_id`, `unit_id`, `changeable`, `value`) VALUES ('".$schema_id."','6','1','".$new_pos."')";
	mysqli_query($connection,$sql_component_unit_schema);


	$return_arr = array('new_id'=>$new_product_id);
	echo json_encode($return_arr);

	$connection->close();
}
if ($action=="getComments") {
	require 'connect_to_DB.php';
	$product_id = $_POST['product_id'];
	$sql = "SELECT name,time,star,content FROM `comments` INNER JOIN `user` ON user.id=comments.user_id WHERE product_id=$product_id";
	$result = $connection->query($sql);
	$comments = '';
    while($row = mysqli_fetch_assoc($result)) {
            $comments .= '<div class="comment">
                    		<div class="comment_head">
                        		<div class="split-row">
                           			<h5 id="comment_user_name">'.$row["name"].'</h5>
                           			<span id="comment_time">'.$row["time"].'</span>
                        		</div>
                        		<div class="comment_stars">
                            		<div class="split-row">';
            for ($i = 1; $i <= 5; $i++) {
            if($i<=$row["star"])$comments .='<label class="old_comment_on_star"></label>';
            else $comments .= '<label class="old_comment_off_star"></label>';
            }
            $comments .= '			</div>
                        		</div>
                    		</div>
                    		<p id="comment_content">'.$row["content"].'</p>
                		  </div>';

	}

	$return_arr = array('comments'=>$comments);
	echo json_encode($return_arr);

	$connection->close();
}
if ($action=="addComment") {
    require 'connect_to_DB.php';

    $product_id = $_POST['product_id'];;
    $user_id = $_POST['user_id'];
    $star = $_POST['star'];
    $content = $_POST['content'];

    $sql = "INSERT INTO comments (product_id, user_id, star, content) VALUES ('$product_id','$user_id','$star','$content')";
    $connection->query($sql);

	$return_arr = array('success'=>"success");
	echo json_encode($return_arr);

	$connection->close();
}
if ($action=="addProductIntoCart") {
	require 'connect_to_DB.php';

    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $amount = $_POST['amount'];
    $price = $_POST['price'];
//    $order_id;
    $orders = "SELECT orders.id, orders.user_id,orders.time FROM `orders` LEFT JOIN `payment` ON orders.id=payment.order_id WHERE payment.order_id IS NULL AND orders.user_id=$user_id ORDER BY orders.time DESC";
    $result = $connection->query($orders);
    $row_cnt = $result->num_rows;
	if($row_cnt==0){
    	$new_order = "INSERT INTO `orders`(`user_id`) VALUES ('$user_id')";
    	$connection->query($new_order);
    	$new_order_id = mysqli_insert_id($connection);
    	$order_id=$new_order_id;
    }else{
    	$row = mysqli_fetch_assoc($result);
    	$order_id=$row['id'];
    }
    $products = "SELECT order_product.product_id FROM `order_product` WHERE order_id=$order_id";
	$result = $connection->query($products);
	$updated=false;
	while ($product = mysqli_fetch_assoc($result)) {
		if($product['product_id']==$product_id){
			$update_amount = "UPDATE `order_product` SET `amount`=$amount WHERE product_id=$product_id AND order_id=$order_id";
			$connection->query($update_amount);
			$updated=true;
		}
	}
	if(!$updated){
   		$insert_product = "INSERT INTO `order_product`(`order_id`, `product_id`, `amount`,`price`) VALUES ('$order_id','$product_id','$amount','$price')";
   		$connection->query($insert_product);
    }

	$return_arr = array('amount'=>$amount);
	echo json_encode($return_arr);

	$connection->close();
}

if ($action=="getProducts") {
	require 'connect_to_DB.php';

    $user_id = $_POST['user_id'];
    $items = '';

    $sql_orders = "SELECT orders.id, orders.user_id,orders.time FROM `orders` LEFT JOIN `payment` ON orders.id=payment.order_id WHERE payment.order_id IS NULL AND orders.user_id=$user_id ORDER BY orders.time DESC";
    $orders = $connection->query($sql_orders);
    if ($order = mysqli_fetch_assoc($orders)) {
	    $order_id = $order['id'];
	    $sql_order_product = "SELECT `product_id`, `amount`,`price`, products.name FROM `order_product` INNER JOIN `products` ON order_product.product_id=products.id WHERE order_id=$order_id ORDER BY products.name ASC";
	    $result = $connection->query($sql_order_product);
	    while ($row = mysqli_fetch_assoc($result)) {

	     	$items .= '<div class="product_item" id="item'.$row['product_id'].'">
					<div class="split-row">
						<img class="product_imgs" src="https://mebelnoff.ru/components/com_jshopping/files/img_products/thumb_547d3ce96823ab66efdcf34063ea8e47.jpg">
						<div>
							<button class="product_item_delete" onclick="close_item('.$row['product_id'].')"><img src="https://www.svgrepo.com/show/146494/delete-photo.svg"></button>
							<div class="product_info">
								<label>'.$row['name'].'</label>
								<div>
								<label>Price: KZT </label>
								<label class="product_price" id="product_price'.$row['product_id'].'">'.$row['price'].'</label>
								</div>
								<div>
									<input type="number" class="product_quantity" id="product_quantity'.$row['product_id'].'" value="'.$row['amount'].'" min="1" max="50" onchange="quantity('.$row['product_id'].',this.value)">
									<div class="product_total_price">
										<label>KZT </label>
										<label id="product_total_price'.$row['product_id'].'">'.$row['price']*$row['amount'].'</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>';
	    }
	}
	
	$return_arr = array('items'=>$items);
	echo json_encode($return_arr);

	$connection->close();
}
if ($action=="getTotalPrice") {
	require 'connect_to_DB.php';

	$user_id = $_POST['user_id'];
	$prices = array();

	$sql_orders = "SELECT orders.id, orders.user_id,orders.time FROM `orders` LEFT JOIN `payment` ON orders.id=payment.order_id WHERE payment.order_id IS NULL AND orders.user_id=$user_id ORDER BY orders.time DESC";
    $orders = $connection->query($sql_orders);
    if ($order = mysqli_fetch_assoc($orders)) {
    	$order_id = $order['id'];
		$sql_order_product = "SELECT `product_id`, `amount`,`price` FROM `order_product` WHERE order_id=$order_id";
	    $result = $connection->query($sql_order_product);
	    while ($row = mysqli_fetch_assoc($result)) {
	    	$prices[]=$row;
	    }
    }

	$return_arr = array('productPrices'=>$prices);
	echo json_encode($return_arr);
	$connection->close();
}
if ($action=="unpdateQuantity") {
	require 'connect_to_DB.php';
	$user_id= $_POST['user_id'];
	$product_id = $_POST['product_id'];
	$amount = $_POST['amount'];

	$sql_orders = "SELECT orders.id, orders.user_id,orders.time FROM `orders` LEFT JOIN `payment` ON orders.id=payment.order_id WHERE payment.order_id IS NULL AND orders.user_id=$user_id ORDER BY orders.time DESC";
    $orders = $connection->query($sql_orders);
    if ($order = mysqli_fetch_assoc($orders)) {
    	$order_id = $order['id'];
    	$sql_quantity = "UPDATE `order_product` SET `amount`=$amount WHERE `order_id`=$order_id AND `product_id`=$product_id";
    	$connection->query($sql_quantity);
    }

	$return_arr = array('return'=>$amount);
	echo json_encode($return_arr);
	$connection->close();
}
if ($action=="deleteProduct") {
	require 'connect_to_DB.php';
	$user_id= $_POST['user_id'];
	$product_id = $_POST['product_id'];

	$sql_orders = "SELECT orders.id, orders.user_id,orders.time FROM `orders` LEFT JOIN `payment` ON orders.id=payment.order_id WHERE payment.order_id IS NULL AND orders.user_id=$user_id ORDER BY orders.time DESC";
    $orders = $connection->query($sql_orders);
    if ($order = mysqli_fetch_assoc($orders)) {
    	$order_id = $order['id'];
    	$sql_quantity = "DELETE FROM `order_product` WHERE `order_id`=$order_id AND `product_id`=$product_id";
    	$connection->query($sql_quantity);
	}
	$return_arr = array('product_id'=>$product_id);
	echo json_encode($return_arr);
	$connection->close();
}
if ($action=="return") {
	$return_arr = array('return'=>"null");
	echo json_encode($return_arr);
}
}
?>