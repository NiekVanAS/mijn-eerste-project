<?php

session_start();
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<?php include "nav.php" ?>

<body class="bg-gray-100">
    <section class="container mx-auto px-4 py-8">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Products</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php foreach ($data as $product): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <img src="Photos/<?php echo $product['image']; ?>" alt="Product Image"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2"><?php echo $product['plush_name']; ?></h2>
                        <p class="text-lg font-bold text-blue-600 mb-3">$<?php echo $product['price']; ?></p>
                        <a href="detail.php?id=<?php echo $product['plush_id']; ?>"
                            class="block text-center bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition-colors duration-300">
                            View Details
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <?php include "footer.php" ?>

</body>

</html>