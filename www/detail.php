<?php
session_start();

$id = $_GET['id'];
require "database.php";
$stmt = $conn->prepare("SELECT * FROM Plushies WHERE plush_id = :id");
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php include "nav.php"; ?>

    <section class="py-12 px-4">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-8">
            <div class="md:w-1/2">
                <img src="Photos/<?php echo$data['image'];?>" alt="Product Image" class="w-full rounded-lg shadow-lg">
                <div class="mt-6">
                    <h3 class="text-xl font-semibold mb-2">Description:</h3>
                    <p class="text-gray-600">
                        <?php echo$data['description']; ?>
                    </p>
                </div>
            </div>

            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold mb-4"><?php echo$data['plush_name']; ?></h2>
                <p class="text-2xl font-semibold text-blue-600 mb-6">€<?php echo$data['price']; ?></p>
                <div class="mb-6">
                    <button class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                        In winkelmand
                    </button>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Specifications</h3>
                    <ul class="space-y-2">
                        <li class="flex"><span class="font-medium w-24">Brand:</span> <?php echo$data['brand']; ?></li>
                        
                        <li class="flex"><span class="font-medium w-24">Rating:</span> <?php echo$data['rating']; ?></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
</body>

</html>