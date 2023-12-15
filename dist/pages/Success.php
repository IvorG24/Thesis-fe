<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <title>Tailwind Boilerplate</title>
</head>
<body class="overflow-auto">
    <div class="container">
        <nav class="bg-blue-200 w-screen">
            <div class="flex justify-between items-center px-4 md:px-8 lg:px-12">
                <div class="flex items-center">
                    <img src="../assets/imgs/logo.png" height="70" width="70" alt="">
                    <h1 class="text-3xl font-semibold">BicycleGlove</h1>
                </div>
                <div class="flex gap-4 md:gap-6 lg:gap-8">
                    <a href="#">Home</a>
                    <a href="#">Welcome ,</a>
                   
                </div>
            </div>
        </nav>
        <div class="flex w-screen h-auto">
            <div class="left flex-grow-1 border-2 flex flex-col px-20 h-screen gap-10 pt-10 pb-6 overflow-hidden">
                <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                </svg>

                <span>Dashboard</span>
                </div>

                <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Profile</span>
                </div>

                <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
                <span>Guides</span>
                </div>
            
                <div class="end flex flex-col justify-end h-auto gap-10 ">
                    <div class="flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Account Settings</span>
                        </div>
                        <form action="../back-end/validation/logout.php" method="post" class=" flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                        </svg>

                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
         
            <div id="gestures-container" class="right flex flex-col flex-grow justify-start items-center gap-5 h-auto overflow-auto bg-blue-100">
              <div class="divider px-20 pt-10 flex justify-between w-11/12 ">
                <div>
                    <h1 class="text-3xl font-bold">Gestures</h1>
                </div>
                <div>
                    <button class="add-gesture-btn flex bg-white gap-2 rounded-lg px-3 py-2 items-center shadow-md" onclick="addGesture()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                    <span>
                        Add Gesture</span>
                </button>
              </div>
            </div>
            
              <div  class=" gestures w-11/12 border-2 rounded-full h-20 overflow-auto bg-white flex justify-between px-10 items-center">
                <div>
                    <h1 class="text-xl">Gesture 1</h1>
                </div>
                <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                </svg>
                </div>
             </div>
            
             <div class="gestures w-11/12 border-2 rounded-full h-20 bg-white flex justify-between px-10 items-center">
                <div>
                    <h1 class="text-xl">Gesture 2</h1>
                </div>
                <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>

                </div>
             </div>
             
             <div class="gestures w-11/12 border-2 rounded-full h-20 bg-white flex justify-between px-10 items-center">
                <div>
                    <h1 class="text-xl">Gesture 3</h1>
                </div>
                <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
                </div>
             </div>

             <div class="gestures w-11/12 border-2 rounded-full h-20 bg-white flex justify-between px-10 items-center">
                <div>
                    <h1 class="text-xl">Gesture 4</h1>
                </div>
                <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>

                </div>
             </div>
            </div>
        </div>
    </div>
</body>
<script src="../assets/js/main.js"></script>
<script>
  let gestureCount = 4; // Starting from 4

function addGesture() {
    gestureCount++;
    const newGesture = `
        <div class="gestures w-11/12 border-2 rounded-full h-20 bg-white flex justify-between px-10 items-center">
            <div>
                <h1 class="text-xl">Gesture ${gestureCount}</h1>
            </div>
        <div class="flex gap-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                </svg>
                
                <button class="remove" onclick="removeGesture(event)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
                </button>
        </div>
        </div>
    `;

    document.getElementById('gestures-container').innerHTML += newGesture;

    // Check if gestureCount reaches 14 and disable the button if it does
    if (gestureCount === 14) {
        document.querySelector('.add-gesture-btn').disabled = true;
    }
}

// Optionally, enable the button when the count is less than 14 (in case you need this in other parts of your script)
function enableGestureButton() {
    if (gestureCount < 14) {
        document.querySelector('.add-gesture-btn').disabled = false;
    }
}

function removeGesture(event) {
    // Prevent the default action of the button
    event.preventDefault();

    // Find the parent gesture box of the clicked remove button and remove it
    const gestureBox = event.target.closest('.gestures');
    if (gestureBox) {
        gestureBox.remove();
        gestureCount--; // Decrease the gesture count

        // Optionally, re-enable the add button if gestureCount is less than 14
        if (gestureCount < 14) {
            document.querySelector('.add-gesture-btn').disabled = false;
        }
    }
}


</script>

</html>
