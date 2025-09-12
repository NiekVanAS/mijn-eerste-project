<?php
$id = $_GET['id'];
require "database.php";
$stmt = $conn->prepare("SELECT * FROM Products WHERE product_id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/Style.css">
</head>

<body>
    <?php include "nav.php"; ?>

    <section class="detail-section">
        <div class="detail-container">
            <div class="detail-image">
                <img src="Photos/<?php echo$data['product_image'];?>" alt="Product Image">
                <div class="description">
                    <h3>Desscription:</h3>
                    <p>
                    <?php echo$data['product_description']; ?>

                    </p>
                </div>
            </div>

            <div class="detail-info">
                <h2><?php echo$data['product_name']; ?></h2>
                <p class="price"><?php echo$data['product_price']; ?></p>
                <div class="purchaseButton">
                    <button>In winkelmand</button>
                </div>

                <div class="specifications">
                    <h3>Specifications</h3>
                    <ul>
                        <li>Brand: <?php echo$data['product_brand']; ?></li>
                        <li>Seller: <?php echo$data['product_publisher']; ?></li>
                        <li>Rating: <?php echo$data['product_rating']; ?></li>
                        <li>Stock: <?php echo$data['product_stock']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <br><br><br>    <br><br><br>    <br><br><br>  <br>

    <?php include "footer.php"; ?>
</body>

</html>