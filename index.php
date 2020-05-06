<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Zaporozhets lab3</title>
	<script src="table.js"></script>
	<style>
        table, th, td {border: 1px solid black;}
    </style>
</head>
<body>
  <label>Товары производителя:</label>
  <select name='vendor' id='vendor'>
			<?php
				include 'db.php';
				$Vendors = "SELECT name FROM vendors";
				$sth = $conn->prepare($Vendors);
				$sth->execute();
				
				$result = $sth->fetchAll(PDO::FETCH_NUM);

				echo '<option selected = "selected">Выберите производителя</option>';

				foreach($result as $name)
				{
					echo "<option>$name[0]</option>";
				}
				$conn=null;
			?>
			</select>
		<input type="button" value="Показать" onclick="Vendor()">
		
<p id='table_vendor'></p>
<br>
  <label>Товары категории:</label>
  <select name='category' id='category'>
			<?php
				include 'db.php';
				$Category = "SELECT name FROM category";
				$sth = $conn->prepare($Category);
				$sth->execute();
				
				$result = $sth->fetchAll(PDO::FETCH_NUM);

				echo '<option selected = "selected">Выберите категорию</option>';

				foreach($result as $name)
				{
					echo "<option>$name[0]</option>";
				}
				$conn=null;
			?>
			</select>
		<input type="button" value="Показать" onclick="Category()">
<p id="table_category"></p>
<br>
  <label>Товары в ценовом диапазоне: </label>
		с <input type="number" name = "minPrice" id="minPrice">
		по <input type="number" name = "maxPrice" id="maxPrice">
		<input type="button" value="Показать" onclick="Price()">
<p id="table_price"></p>
</body>
</html>
