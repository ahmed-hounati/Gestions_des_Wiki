<?php
require APPROOT . '/views/users/header.php';
?>
<div class="flex flex-col items-center justify-center h-screen">
    <div
        class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-4xl">
        <div class="hidden bg-cover lg:block lg:w-1/2"
            style="background-image: url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80');">
        </div>

        <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">

            <p class="mt-3 text-xl text-center text-gray-600 dark:text-gray-200">
                Welcome to WIKI!
            </p>

            <form action="<?php echo URLROOT; ?>/users/register" method="post" onsubmit="return validateForm()">
                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200"
                        for="username">Username</label>
                    <input id="username" name="username"
                        class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>"
                        type="text" value="<?php echo $data['username']; ?>" />
                    <span id="usernameError" class="text-red-600">
                        <?php echo $data['username_err']; ?>
                    </span>
                </div>

                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200"
                        for="email">Email</label>
                    <input id="email" name="email"
                        class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                        type="text" value="<?php echo $data['email']; ?>">
                    <span id="emailError" class="text-red-600">
                        <?php echo $data['email_err']; ?>
                    </span>
                </div>

                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200"
                        for="password">Password</label>
                    <input id="password" name="password"
                        class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                        type="password" value="<?php echo $data['password']; ?>" />
                    <span id="passwordError" class="text-red-600">
                        <?php echo $data['password_err']; ?>
                    </span>
                </div>

                <a href="<?php echo URLROOT; ?>/users" class="text-blue-500 mb-2 md:mb-0">Have a account?
                    Login</a>

                <div class="mt-6 flex justify-center">
                    <button
                        class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                        Sign In
                    </button>
                </div>
            </form>

        </div>


    </div>
</div>
<script>
    function validateForm() {
        var email = document.getElementById("email").value;
        var isValid = true;

        const emailError = document.getElementById("emailError")
        if (email.trim() === "") {
            emailError.innerText = "Please enter your email" ;
            isValid = false;
        } else if (!validateEmail(email)) {
            emailError.innerText = "Please enter a valid email address";
            isValid = false;
        } else {
            emailError.innerHTML = "";
        }
        if (!isValid) {
            return false;
        } else {
            return true;
        }
    }

    function validateEmail(email) {
        var regex = /^[^\s@]+@[^\s@]+.[^\s@]+$/;
        return regex.test(email);
    }
</script>
<?php
require APPROOT . '/views/users/footer.php';
?>