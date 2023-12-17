<?php
  require '../back-end/Config.php';


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <title>Sign up</title>
  </head>
  <style>
    .checkbox {
  display: none;
}

.slider {
  width: 60px;
  height: 30px;
  background-color: lightgray;
  border-radius: 20px;
  overflow: hidden;
  display: flex;
  align-items: center;
  border: 4px solid transparent;
  transition: .3s;
  box-shadow: 0 0 10px 0 rgb(0, 0, 0, 0.25) inset;
  cursor: pointer;
}

.slider::before {
  content: '';
  display: block;
  width: 100%;
  height: 100%;
  background-color: #fff;
  transform: translateX(-30px);
  border-radius: 20px;
  transition: .3s;
  box-shadow: 0 0 10px 3px rgb(0, 0, 0, 0.25);
}

.checkbox:checked ~ .slider::before {
  transform: translateX(30px);
  box-shadow: 0 0 10px 3px rgb(0, 0, 0, 0.25);
}

.checkbox:checked ~ .slider {
  background-color: #2196F3;
}

.checkbox:active ~ .slider::before {
  transform: translate(0);
}
</style>
<body class="p-10">
    <div class="container w-screen h-screen flex flex-col justify-center items-center">
        <div class="wrapper flex flex-col justify-center items-center">
            <div class="middle flex flex-col justify-center items-center">
                <h1 class="text-2xl font-bold">Edit Gesture</h1>
                
                <form action="" class="flex flex-col justify-center items-center">
                    <h1 class="text-xl font-light">Gesture Display</h1>
                    <input type="text" placeholder="Gesture" class="mb-4">

                <div class="relative">           
                    <div class="absolute flex flex-col left-32 top-20 pl-4"> 
                        <label class="switch mb-4">Finger 4
                            <input type="checkbox" class="checkbox">
                            <div class="slider"></div>
                        </label>
                    </div>
                    <div class="absolute flex flex-col left-48 top-4 pl-4"> 
                        <label class="switch mb-4">Finger 3
                            <input type="checkbox" class="checkbox">
                            <div class="slider"></div>
                        </label>
                    </div>
                    <div class="absolute flex flex-col left-64 -top-4 pl-4"> 
                        <label class="switch mb-4">Finger 2
                            <input type="checkbox" class="checkbox">
                            <div class="slider"></div>
                        </label>
                    </div>
                    <div class="absolute flex flex-col right-52 top-6 pb-2 "> 
                        <label class="switch mb-4">Finger 1
                            <input type="checkbox" class="checkbox">
                            <div class="slider"></div>
                        </label>
                    </div>
                    <div class=" p-12">
                        <img src="https://freesvg.org/img/1548791555.png" height="500" width="500" alt="">
                    </div>
                </div>
                <button type="submit">Update Gesture</button>
                </form>
            </div>
        </div>
    </div>
</body>

  
  <script src="../assets/js/main.js"></script>
</html>