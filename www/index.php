<?php
require "database.php";

$sql = "SELECT * FROM Plushies";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="Style/Style.css">
</head>

<header>
    <?php include "nav.php" ?>
</header>

<body>
    <section class="product-section">
        <div class="product-header">
            <H2>Products</H2>
        </div>
        <div class="product-grid">
            <?php foreach ($data as $product): ?>

                <div class="product-item">
                <div>
                    <td><img src="Photos/<?php echo $product['product_image']; ?>" alt="fail img" class="product-img"></td>
                    <td><a href="detail.php?id=<?php echo$product['product_id'];?>">detail page</a></td>
                    <td><h2><?php echo $product['product_name'];?></h2> <?php echo $product['product_price'];?></td>
                </div>
            </div>
            <?php endforeach; ?>


        </div>
    </section>
    </div>






    <footer>
        <?php include "footer.php" ?>
    </footer>

</body>

</html>