<?php session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Plush</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php include "nav.php"; ?>

    <div class="max-w-2xl mx-auto mt-10 mb-10 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Create New Plush</h2>

        <form action="post" class="space-y-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" name="plush_name" required
                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea name="description" required
                    class="w-full border border-gray-300 p-2 rounded-md h-24 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2">Price</label>
                <input type="number" step="0.01" name="price" required
                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2">Rating</label>
                <input type="number" min="1" max="5" step="0.1" name="rating" required
                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2">Brand</label>
                <input type="text" name="brand" required
                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2">Image</label>
                <input type="file" name="plush_image" accept="image/*" required
                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                    Create Plush
                </button>
            </div>
        </form>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>