<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <title>Tailwind Boilerplate</title>
  </head>

  <body>
    <div class="container">
      <div class="wrapper flex w-screen h-screen">
        <div class="left flex-grow border-2 bg-bgcover">
        </div>
        <div class="right flex-grow-1 px-20 bg-blue-100">
          <form action="../back-end/login.php" method="post" class="flex flex-col justify-center h-screen gap-5">
            <div class="flex items-center pl-6">
              <img src="../assets/imgs/logo.png" height="70" width="70" alt="">
              <h1 class="text-left text-3xl font-semibold">Login</h1>
            </div>
              <input class="px-2 py-4 rounded-md bg-blue-50 " name="email" type="text" placeholder="Username">
              <input class="px-2 py-4 rounded-md bg-blue-50" name="password" type="password" placeholder="Password">
              <button class="bg-blue-600 px-10 py-2 text-white rounded-md" type="submit">Log in</button>
              <div>
                <?php
                  if (isset($_GET['loginErr'])) {
                    $loginErr = $_GET['loginErr'];
                    echo '<p class="text-red-600 pb-2 text-center">' . htmlspecialchars($loginErr)  . '</p>';}
                ?>
               
                <span>Do you have an account ?</span>
                <span><a href="./Signup.php" class="text-gray-600 hover:text-black duration-150">Sign up</a></span>
              </div>
          </form>
          <form action="../back-end/validation/delete.php" method="post">
                  <input type="hidden" name="email">
                </form>
        </div>
      </div>
    </div>
  </body>
  
  <script src="../assets/js/main.js"></script>
</html>