<?php
include 'db.php';

$sql="SELECT items.name, items.price FROM category JOIN items ON items.FID_Category = category.ID_Category 
WHERE  category.name = :category";

    $sth=$conn->prepare($sql);
    $sth->execute(array(':category' => $_GET['category']));
    $result= $sth -> fetchAll();
 

echo"<table border=1><tr><th>Name</th><th>Price</th></tr>";    
        foreach($result as $row)
            {
                print("<tr><td>$row[0]</td><td>$row[1]</td></tr>");
            }
    echo"</table>";
 

?>
 



