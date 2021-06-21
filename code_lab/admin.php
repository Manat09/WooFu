<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		admin
	</title>
	<link rel="stylesheet" type="text/css" href="admin_page.css">
</head>
<body>
<!------menu-bar------>
<?php include("menubar.php"); ?>
	<main class="main">
		<div class="split-row">
			<div class="admin_panel">
				<label>Admin</label>
				<button type="submit" onClick = "products_table()">Products</button>
				<button type="submit" onClick = "components_table()">Components</button>
				<button type="submit" onClick = "units_table()">Units</button>
			</div>

			<div class="admin_table">
				<div class="split-row">
					<button type="submit" onClick = "add_row()">add</button>
					<button type="submit" onClick = "delete_row()">delete</button>
				</div>
				<form id="admin_form" action="admin.php" method="post"></form>
				<div id="admin_table" class="table">
					<table></table>
				</div>
			</div>
		</div>
	</main>
</body>
</html>

<script>
	var admin_table = document.getElementById('admin_table');
	var selected_table;
	var admin_form = document.getElementById('admin_form');

	function add_row(){
		
		if (admin_form.style.display === "none") {
			admin_form.style.display = "flex";
		} else {
			admin_form.style.display = "none";
		}
		var form ='';
        switch(selected_table){
        	case "products":
        	form += `<input name="product_name" type="text" placeholder="name">
					<input name="product_description" type="text" placeholder="description">`;
			break;
			case "components":
        	form += `<input name="component_name" type="text" placeholder="name">
					<input name="component_create_time" type="text" placeholder="create_time">`;
			break;
			case "units":
        	form += `<input name="units_name" type="text" placeholder="name">`;
			break;
        }
        
		form +=`<input name="admin_form_submit`+selected_table+`" onclick="return form_submit()" type="submit">`;
  		admin_form.innerHTML = form;

	}

	function delete_row(){
		
		if (admin_form.style.display === "none") {
			admin_form.style.display = "flex";
		} else {
			admin_form.style.display = "none";
		}
		var form ='';
        form += `<input name="delete_id" type="text" placeholder="id">`;
		form +=`<input name="admin_form_delete`+selected_table+`" onclick="return form_delete()" type="submit">`;
  		admin_form.innerHTML = form;

	}
	
	function form_delete(){
		 switch(selected_table){
        	case "products": <?php
					require 'connect_to_DB.php';
					if (isset($_POST['admin_form_deleteproducts'])){
					$id =  $_POST['delete_id'];
					$sql = "DELETE FROM `products` WHERE id=$id";
					if($connection->query($sql)){ header("Location: admin.php");}
					}
					$connection->close();
					?>break;
			case "components": <?php
					require 'connect_to_DB.php';
					if (isset($_POST['admin_form_deletecomponents'])){
					$id =  $_POST['delete_id'];
					$sql = "DELETE FROM `components` WHERE id=$id";
					if($connection->query($sql)){ header("Location: admin.php");}
					}
					$connection->close();
					?>break;
			case "units": <?php
					require 'connect_to_DB.php';
					if (isset($_POST['admin_form_deleteunits'])){
					$id =  $_POST['delete_id'];
					$sql = "DELETE FROM `units` WHERE id=$id";
					if($connection->query($sql)){ header("Location: admin.php");}
					}
					$connection->close();
					?>break;
        }
		return true;
	}

	function form_submit(){
		 switch(selected_table){
        	case "products": <?php
					require 'connect_to_DB.php';
					if (isset($_POST['admin_form_submitproducts'])){
					$name =  $_POST['product_name'];
					$description = $_POST['product_description'];
					$sql = "INSERT INTO `products`(`name`, `description`) VALUES ('$name','$description')";
					if($connection->query($sql)){ header("Location: admin.php");}
					}
					$connection->close();
					?>break;
					return true;
			case "components": <?php
					require 'connect_to_DB.php';
					if (isset($_POST['admin_form_submitcomponents'])){
					$name =  $_POST['component_name'];
					$create_time = $_POST['component_create_time'];
					$sql = "INSERT INTO `components`(`name`, `create_time`) VALUES ('$name','$create_time')";
					if($connection->query($sql)){ header("Location: admin.php");}
					}
					$connection->close();
					?>break;
					return true;
			case "units": <?php
					require 'connect_to_DB.php';
					if (isset($_POST['admin_form_submitunits'])){
					$name =  $_POST['units_name'];
					$sql = "INSERT INTO `units`(`name`) VALUES ('$name')";
					if($connection->query($sql)){ header("Location: admin.php");}
					}
					$connection->close();
					?>break;
					return true;
        }
		return true;
	}

	function ShowTable(content){
        var table = '';
        table += content;
  		admin_table.innerHTML = table;
	}

	function products_table(){
		selected_table="products";
		<?php
			require 'connect_to_DB.php';
			$sql = "SELECT * FROM `products`";
			$result = $connection->query($sql);
			$php_table = array();
			$php_table2 = array();

			while($row = mysqli_fetch_assoc($result)){
				$id = $row['id'];
				$sql2 = "SELECT * FROM `product_component` WHERE product_id=$id;";
				$result2 = $connection->query($sql2);
				$php_table[] = $row;
				while($row2 = mysqli_fetch_assoc($result2)){
					$php_table2[] = $row2;
				}
			}
		$connection->close();
		?>
		var php_table = <?php echo json_encode($php_table); ?>;
		var php_table2 = <?php echo json_encode($php_table2); ?>;
		console.dir(php_table);
		console.dir(php_table2);

		var table='';
		table +=`<table>
        		<tr>
        			<th>Id</th>
    				<th>Name</th>
    				<th>Description</th>
    				<th></th>
  				</tr>`;
    			for (var i = 0; i < php_table.length; i++) {
    				table +=`<tr>
    							<td>`+ php_table[i].id+`</td>	
    							<td>`+ php_table[i].name+`</td>
    							<td>`+ php_table[i].description+`</td>
    							<td><a onclick="show_more('product',`+php_table[i].id+`)">...</a><div id="product`+php_table[i].id+`">`;
    				table+=`<table>
    						<tr>
        						<th>component_id</th>
    							<th>amount</th>
  							</tr>`;
    				for (var j = 0; j < php_table2.length; j++) {
    					if(php_table[i].id==php_table2[j].product_id){
    					table+=`<tr>
    							<td>`+ php_table2[j].component_id+`</td>
    							<td>`+ php_table2[j].amount+`</td>
  								</tr>`;
  						}
    				}
    				table+=`</table>`;
    				table+=`</div></td>
  							</tr>`;
    			}
    	table += `</table>`;
		ShowTable(table);
	}

	function components_table(){
		selected_table="components";
		<?php
			require 'connect_to_DB.php';
			$sql = "SELECT * FROM `components`";
			$result = $connection->query($sql);
			$php_table = array();
			$php_table2 = array();

			while($row = mysqli_fetch_assoc($result)){
				$id = $row['id'];
				$sql2 = "SELECT * FROM `component_unit` WHERE component_id=$id;";
				$result2 = $connection->query($sql2);
				$php_table[] = $row;
				while($row2 = mysqli_fetch_assoc($result2)){
					$php_table2[] = $row2;
				}
			}
		$connection->close();
		?>
		var php_table = <?php echo json_encode($php_table); ?>;
		var php_table2 = <?php echo json_encode($php_table2); ?>;
		console.dir(php_table);
		console.dir(php_table2);

		var table='';
		table +=`<table>
        		<tr>
        			<th>Id</th>
    				<th>Name</th>
    				<th>Create_time</th>
    				<th></th>
  				</tr>`;
    			for (var i = 0; i < php_table.length; i++) {
    				table +=`<tr>
    							<td>`+ php_table[i].id+`</td>	
    							<td>`+ php_table[i].name+`</td>
    							<td>`+ php_table[i].create_time+`</td>
    							<td><a onclick="show_more('component',`+php_table[i].id+`)">...</a><div id="component`+php_table[i].id+`">`;
    					table+=`<table>
		    						<tr>
		        						<th>unit_id</th>
		    							<th>value</th>
		    							<th>changeable</th>
		  							</tr>`;
		    				for (var j = 0; j < php_table2.length; j++) {
		    					if(php_table[i].id==php_table2[j].component_id){
		    					table+=`<tr>
		    							<td>`+ php_table2[j].unit_id +`</td>
		    							<td>`+ php_table2[j].value +`</td>
		    							<td>`+ php_table2[j].changeable +`</td>
		  								</tr>`;
		  						}
		    				}
    					table+=`</table>`;
    				table+=`</div></td>
  							</tr>`;
    			}
    	table += `</table>`;
		ShowTable(table);
	}

	function units_table(){
		selected_table="units";
		<?php
			require 'connect_to_DB.php';
			$sql = "SELECT * FROM `units`";
			$result = $connection->query($sql);
			$php_table = array();
			while($row = mysqli_fetch_assoc($result)){
				$php_table[] = $row;
			}
		$connection->close();
		?>
		var php_table = <?php echo json_encode($php_table); ?>;
		console.dir(php_table);
		var table='';
		table +=`<table>
        		<tr>
        			<th>Id</th>
    				<th>Name</th>
  				</tr>`;
    			for (var i = 0; i < php_table.length; i++) {
    				table +=`<tr>
    							<td>`+ php_table[i].id+`</td>	
    							<td>`+ php_table[i].name+`</td>
  							</tr>`;
    			}
    	table += `</table>`;
		ShowTable(table);
	}


	function show_more(table,id){
		var x = document.getElementById(table + id);
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
	}

</script>
<script>
</script>	