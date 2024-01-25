<?php
require '../back-end/Config.php';
session_start();

if (isset($_GET['gesture'])) {
    // Get the value of the 'gesture' parameter
    $gestureCount = intval($_GET['gesture']);

    // Now you have the gesture count in the $gestureCount variable
    echo "Gesture Count: " . $gestureCount;
} else {
    echo "Error: Gesture parameter not found in the URL.";
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <title>Gesture Details</title>
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
<script>
    function updateStatus(checkbox1,checkbox2,checkbox3,checkbox4) {
        var statusSpan = document.getElementById('finger4Status');
        if (checkbox.checked) {
            statusSpan.textContent = 'ON';
            statusSpan.style.color = 'green';
        } else {
            statusSpan.textContent = 'OFF';
            statusSpan.style.color = 'black';

        }
    }
</script>
    <div class="container w-screen h-screen flex flex-col justify-center items-center">
        <div class="wrapper flex flex-col justify-center items-center">
                <form action="../back-end/insertgesture.php?gesture=<?php echo $gestureCount; ?>" method="post" class="flex flex-row border-2 w-screen justify-around">
              

                <div>
                <div class="border-2 flex flex-col justify-between items-center ">
                    
                        <img src="../assets/imgs/hand.png" height="500" width="500" alt="">
                    </div>
                    </div>


                    <div class="flex flex-col border-2 w-2/6 items-center justify-center">           
                    <div class="flex flex-row items-center gap-5 text-2xl font-bold"> 
                        <label class="switch mb-4 text-left font-semibold">Finger 4
                            <input type="checkbox" class="checkbox" id="finger4Status" value="90" name="finger4" onchange="updateStatus(this.checkbox1)">
                            <div class="slider text-3xl"></div>
                        </label>
                        <span id="finger4Status" class="status">OFF</span>
                    </div>

                    <div class="flex flex-row items-center gap-5 text-2xl font-bold"> 
                        <label class="switch mb-4 text-left font-semibold">Finger 3
                            <input type="checkbox" class="checkbox" value="90" name="finger3" onchange="updateStatus(this.checkbox2)">
                            <div class="slider"></div>
                        </label>
                        <span id="finger3Status" class="status">OFF</span>
                    </div>
                    <div class=" flex flex-col "> 
                        <label class="switch mb-4">Finger 2
                            <input type="checkbox" class="checkbox" value="90" name="finger2">
                            <div class="slider"></div>
                        </label>
                    </div>
                    <div class=" flex flex-col  "> 
                        <label class="switch mb-4">Finger 1
                            <input type="checkbox" class="checkbox" value="90" name="finger1">
                            <div class="slider"></div>
                        </label>
                    </div>
                    <h1 class="text-xl font-light">Gesture Display</h1>
                    <input type="text" name="display" placeholder="Display Text" pattern="" required >
                    <button type="submit">Update Gesture</button>
                </div>
                </form>
            </div>
        </div>
</body>

  
  <script src="../assets/js/main.js"></script>
</html>