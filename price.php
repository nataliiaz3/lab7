<?php
header("Content-Type: text/xml");
include 'db.php';

$sql="SELECT name, price FROM items WHERE price >= :minPrice AND price <= :maxPrice";

    $sth=$conn->prepare($sql);
    $sth->execute(array(':minPrice' => $_GET['minPrice'], ':maxPrice' => $_GET['maxPrice']));
	$result = $sth->fetchAll();
    echo '<?xml version="1.0" encoding="utf8" ?>';
?>

<response>
<?php foreach ($result as $row):?>
        <name><?=$row[0]?></name>
        <price><?=$row[1]?></price>
<?php endforeach; ?>
</response>
  