<?php session_start(); 
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
    <?php
    include "nav.php";
    ?>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-6">Register</h2>

            <form action="register_process.php" method="POST" class="space-y-4">
                <section class="container mx-auto px-4 py-8">
                    <div>
                        <label class="block text-gray-700">first name</label>
                        <input type="text" name="firstname" required class="w-full border border-gray-300 p-2 rounded">
                    </div>

                    <div>
                        <label class="block text-gray-700">last name</label>
                        <input type="text" name="lastname" required class="w-full border border-gray-300 p-2 rounded">
                    </div>




                    <div>
                        <label class="block text-gray-700">country </label>
                        <input type="text" name="country" required class="w-full border border-gray-300 p-2 rounded">
                    </div>

                    <div>
                        <label class="block text-gray-700">city </label>
                        <input type="text" name="city" required class="w-full border border-gray-300 p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">street </label>
                        <input type="text" name="street" required class="w-full border border-gray-300 p-2 rounded">
                    </div>
                    

                    <div>
                        <label class="block text-gray-700">house_number </label>
                        <input type="text" name="house_number" required class="w-full border border-gray-300 p-2 rounded">
                    </div>

                    <div>
                        <label class="block text-gray-700">zipcode </label>
                        <input type="text" name="zipcode" required class="w-full border border-gray-300 p-2 rounded">
                    </div>


                </section>



                <section class="container mx-auto px-4 py-8">
                    <div>
                        <label class="block text-gray-700">Email</label>
                        <input type="email" name="email" required class="w-full border border-gray-300 p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">password</label>
                        <input type="password" name="password" required class="w-full border border-gray-300 p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">Confirm Password</label>
                        <input type="password" name="confirm_password" required class="w-full border border-gray-300 p-2 rounded">
                    </div>
                </section>

                <?php if (isset($_SESSION['admin_id'])): ?>
                    <div>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="is_admin" class="form-checkbox">
                            <span class="text-gray-700">Register as Administrator</span>
                        </label>
                    </div>
                <?php endif; ?>

                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    Register
                </button>
            </form>
        </div>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>