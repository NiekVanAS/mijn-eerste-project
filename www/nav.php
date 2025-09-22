<header class="w-full">
    <div class="bg-blue-600 p-4 text-center">
        <h1 class="text-3xl font-bold text-white">Plushy shop</h1>
    </div>
    <nav class="bg-gray-100 shadow-md">
        <div class="container mx-auto px-4 py-2 flex gap-4">
            <a href="index.php" class="text-gray-700 hover:text-blue-600 transition-colors">Home</a>
            <?php if (!isset($_SESSION['user_id'])) echo '<a href="login.php" class="text-gray-700 hover:text-blue-600 transition-colors">Login</a>'; ?>


            <?php if (isset($_SESSION['admin_id'])) echo '<a href="register.php" class="text-gray-700 hover:text-blue-600 transition-colors">create account</a>';
            else if (!isset($_SESSION['user_id'])) echo '<a href="register.php" class="text-gray-700 hover:text-blue-600 transition-colors">Register</a>' ?>

            <?php if (isset($_SESSION['user_id'])) echo '<a href="logout.php" class="text-gray-700 hover:text-blue-600 transition-colors">Logout</a>'; ?>
        </div>
    </nav>
</header>