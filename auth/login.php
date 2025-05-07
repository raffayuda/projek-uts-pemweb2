<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DriveEasy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-[#1A1F2C] to-[#2E2A4A] min-h-screen flex items-center justify-center">
    <div class="bg-gray-800 bg-opacity-50 p-8 rounded-lg shadow-xl w-full max-w-md">

        <h2 class="text-3xl font-bold text-white text-center mb-6">Login to DriveEasy</h2>

        <?php if (isset($_GET['error'])): ?>
            <div class="bg-red-500 bg-opacity-20 text-red-300 p-3 rounded-lg mb-4">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>

        <form action="process_login.php" method="POST" class="space-y-4">
            <div>
                <label class="block text-gray-300 mb-2" for="email">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50">
            </div>

            <div>
                <label class="block text-gray-300 mb-2" for="password">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50">
            </div>

            <div class="mb-4 flex justify-between gap-4">
                <button type="submit"
                    class="w-full py-3 bg-gradient-to-r from-purple-600 to-blue-500 text-white rounded-lg hover:opacity-90 transition-opacity">
                    Login
                </button>
                <a href="../index.php" class="px-4 text-center flex items-center justify-center py-2 bg-gray-700 bg-opacity-50 rounded-lg hover:bg-gray-600 w-full transition-colors text-white font-medium">
                    Kembali
                </a>
            </div>
        </form>

        <p class="text-gray-300 text-center mt-4">
            Don't have an account?
            <a href="register.php" class="text-purple-400 hover:text-purple-300">Register here</a>
        </p>

    </div>
</body>

</html>