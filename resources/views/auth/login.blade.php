<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Card</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-sm bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-gray-700">Login</h2>
        <form class="mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-300" placeholder="Enter your email" required>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring focus:ring-blue-300" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="w-full px-4 py-2 mt-4 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">Login</button>
        </form>
        <p class="mt-4 text-sm text-center text-gray-600">Don't have an account? <a href="#" class="text-blue-500 hover:underline">Sign up</a></p>
    </div>
</body>
</html>
