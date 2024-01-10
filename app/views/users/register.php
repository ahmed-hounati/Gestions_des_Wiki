<?php
require APPROOT . '/views/users/header.php';
?>

<div class="bg-white p-8 rounded-lg mt-28 shadow-md w-80 md:w-96 mx-auto ">
    <h1 class="text-2xl font-semibold mb-4">Register</h1>
    <form action="<?php echo URLROOT; ?>/users/register" method="post">
        <div class="mb-4">
            <label for="username" class="block text-gray-600">Name :</label>
            <input type="text" id="username" name="username"
                class="border rounded w-full py-2 px-3 focus:outline-none focus:ring focus:border-blue-300 <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>"
                value="<?php echo $data['username']; ?>">
            <span class="invalid-feedback">
                <?php echo $data['username_err']; ?>
            </span>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-600">Email:</label>
            <input type="email" id="email" name="email"
                class="border rounded w-full py-2 px-3 focus:outline-none focus:ring focus:border-blue-300 <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback">
                <?php echo $data['email_err']; ?>
            </span>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-600">Password:</label>
            <input type="password" id="password" name="password"
                class="border rounded w-full py-2 px-3 focus:outline-none focus:ring focus:border-blue-300 <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback">
                <?php echo $data['password_err']; ?>
            </span>
        </div>
        <div class="flex flex-col md:flex-row justify-between items-center mb-4">
            <a href="<?php echo URLROOT; ?>/users/index" class="text-blue-500 mb-2 md:mb-0">Login?</a>
            <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Sign Up</button>
        </div>
    </form>
</div>

</body>

</html>