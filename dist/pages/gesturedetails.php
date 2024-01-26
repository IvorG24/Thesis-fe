<?php
require '../back-end/Config.php';
session_start();

if (isset($_GET['gesture']) && isset($_GET['email'])) {
    $email = strval($_GET['email']);
    $gestureCount = intval($_GET['gesture']);
    $label = 'gesture'.$gestureCount;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE EMAIL = ?");
$stmt->bind_param("s", $email); 
$stmt->execute();
$result = $stmt->get_result(); 
$userData = null;
if ($row = $result->fetch_assoc()) {
    $userData = $row;
}

$user_id = $userData ? $userData['USER_ID'] : null;
$get_gesture = $conn->prepare(
  "SELECT * FROM $label AS G
  INNER JOIN users AS U
  ON G.USER_ID = U.USER_ID
  WHERE U.USER_ID = ?
  ");
  
  $get_gesture->bind_param("i", $user_id); 
  $get_gesture->execute();
  $gesture_results = $get_gesture->get_result(); 
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
<body class="pt-2 overflow-x-hidden">
<script>
    function updateStatus(checkboxId, statusId) {
        var checkbox = document.getElementById(checkboxId);
        var statusSpan = document.getElementById(statusId);
        
        if (checkbox.checked) {
            statusSpan.textContent = 'ON';
            statusSpan.style.color = 'green';
        } else {
            statusSpan.textContent = 'OFF';
            statusSpan.style.color = 'black';
        }
    }
</script>
    <div class="container w-screen h-screen flex justify-center items-center">
        <div class="wrapper flex flex-col justify-center items-center">
            <h1 class="text-3xl font-bold">Edit Gesture <?Php echo $gestureCount; ?></h1>
                <form action="../back-end/insertgesture.php?gesture=<?php echo $gestureCount; ?>" method="post" class="flex w-screen flex-col justify-around sm:flex-row" >

                <div>
                  <div class="flex flex-col justify-between items-center ">
                        <img src="../assets/imgs/hand.png" height="500" width="500" alt="">
                  </div>
                </div>

                <?php
  while ($gesture_row = $gesture_results->fetch_assoc()) {
      $finger1 = $gesture_row['FINGER1'];
      $finger2 = $gesture_row['FINGER2'];
      $finger3 = $gesture_row['FINGER3']; // Corrected index from 'FINGER4' to 'FINGER3'
      $finger4 = $gesture_row['FINGER4'];
      $display = $gesture_row['DISPLAY'];
      
      echo '
          <div class="flex flex-col w-2/6 items-center justify-center">           
              <div class="flex flex-row items-center gap-5 text-2xl font-bold"> 
                  <label class="switch mb-4 text-left font-semibold">Finger 4
                      <input type="checkbox" class="checkbox" id="finger4Checkbox" value="90" name="finger4" onchange="updateStatus(\'finger4Checkbox\', \'finger4Status\')" '.($finger4 != 0 ? 'checked' : '').'>
                      <div class="slider text-3xl"></div>
                  </label>
                  <span id="finger4Status" class="status" style="'.($finger4 != 0 ? 'color: green;' : '').'">'.($finger4 != 0 ? 'ON' : 'OFF').'</span>
              </div>

              <div class="flex flex-row items-center gap-5 text-2xl font-bold"> 
                  <label class="switch mb-4 text-left font-semibold">Finger 3
                      <input type="checkbox" class="checkbox" id="finger3Checkbox" value="90" name="finger3" onchange="updateStatus(\'finger3Checkbox\', \'finger3Status\')" '.($finger3 != 0 ? 'checked' : '').'>
                      <div class="slider"></div>
                  </label>
                  <span id="finger3Status" class="status" style="'.($finger3 != 0 ? 'color: green;' : '').'">'.($finger3 != 0 ? 'ON' : 'OFF').'</span>
              </div>

              <div class="flex flex-row items-center gap-5 text-2xl font-bold"> 
                  <label class="switch mb-4 text-left font-semibold">Finger 2
                      <input type="checkbox" class="checkbox" id="finger2Checkbox" value="90" name="finger2" onchange="updateStatus(\'finger2Checkbox\', \'finger2Status\')" '.($finger2 != 0 ? 'checked' : '').'>
                      <div class="slider"></div>
                  </label>
                  <span id="finger2Status" class="status" style="'.($finger2 != 0 ? 'color: green;' : '').'">'.($finger2 != 0 ? 'ON' : 'OFF').'</span>
              </div>

              <div class="flex flex-row items-center gap-5 text-2xl font-bold"> 
                  <label class="switch mb-4 text-left font-semibold">Finger 1
                      <input type="checkbox" class="checkbox" id="finger1Checkbox" value="90" name="finger1" onchange="updateStatus(\'finger1Checkbox\', \'finger1Status\')" '.($finger1 != 0 ? 'checked' : '').'>
                      <div class="slider"></div>
                  </label>
                  <span id="finger1Status" class="status" style="'.($finger1 != 0 ? 'color: green;' : '').'">'.($finger1 != 0 ? 'ON' : 'OFF').'</span>
              </div>
              <h1 class="text-xl font-semibold">Gesture Display</h1>
              <input type="text" class="px-2 py-1 border-2 rounded-lg" value="'.$display.'" name="display" placeholder="Display Text" required >
              <button class="mt-2 border-2 px-2 py-1 rounded-lg bg-blue-200" type="submit">Update Gesture</button>
          </div>';
  }
?>

                </form>
            </div>
        </div>
</body>

  
  <script src="../assets/js/main.js"></script>
</html>