<?php 
session_start();
$count =0;
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	
</head>
<body>
<?php include 'header.php';?>
<?php include 'config.php';?>
	<div id="main">
		<div id="products">
			<?php foreach($products as $val){?>
			<div id = <?php echo $val['name'] ?> class ="product">
			<img src = <?php echo $val['img'] ?> >
			<h3 class="title"><a href="#"><?php echo $val['name']?></a></h3>
			<span><?php echo "Price:"." ".$val['price']?></span>
			<button class="add-to-cart" type="submit" name="submit" value="<?php echo $val['name'] ?>">Add To Cart</button>
			</div>
			<?php } ?>
		</div>
	</div>

	<div>
		<table id="tbody" width="100%" bgcolor="grey">
			<thead width="100%">
				<th width="20%">Name</th>
				<th width="20%">price</th>
				<th width="20%">image</th>
				<th width="20%">Quantity</th>
				<th width="20%">Action</th>
			</thead>
			<tbody>	
				<tr width="100%"></tr>
				<td style="margin:auto; padding: left 10px;"></td>
			</tbody>
		</table>
	</div>
	<?php include 'footer.php';?>
	<script>
		$(document).ready(function(){
			$('.add-to-cart').click(function(){
				var val = this.value;
				$.ajax({
			 url:'server.php',
			 type:'post',
			 data:{info:val},
			 success:function(result){
				 $('#tbody').append(result);
			 }
		 });
		});
		$('#tbody').on('click','.btn',function(){
			$(this).closest('tr').remove();
		})
	});
	 </script>
	
</body>
</html>