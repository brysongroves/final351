<?php
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nutrition Tracker</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    header {
        background-image: url('header.jpg');
        background-size: 100%;
        background-position: center;
        background-color: rgba(255, 255, 255, 0.3); /* subtle overlay */
        background-blend-mode: overlay;
        padding:150px;
    }
    </style>
</head>
<body>
    <!-- llm polished this up, looks much better, also added mouse hovering animation -->
<header style="border: 2px solid white; border-radius: 8px; padding: 20px; text-align: center; background-color: #f4f4f4; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <nav>
    <h1 style="color: green; font-family: Arial, sans-serif; margin-bottom: 20px;">Bryson's Nutrition Tracker</h1>
        <style>
            button {
                background-color: darkgreen;
                color: white;
                border: none;
                border-radius: 12px;
                padding: 15px 20px;
                font-size: 16px;
                cursor: pointer;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                transition: transform 0.2s ease, box-shadow 0.2s ease; /* Smooth transition for hover effects */
            }
            button:hover {
                transform: scale(1.1); /* Increases size by 10% */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Adds a stronger shadow on hover */
            }
        </style>
        <button onclick="window.location.href='tracking.php';">
            Track Macros
        </button>
        <button style="position: absolute; top: 20px; right: 20px; background-color: darkgreen; color: white; border: none; border-radius: 12px; padding: 10px 15px; font-size: 14px; cursor: pointer; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); transition: transform 0.2s ease, box-shadow 0.2s ease;" onclick="window.location.href='login.php';">
        Login
    </button>
    </nav>
</header>

    <main>

        <section class="dailys">
            <h2 style="text-align: center;">Daily Recipes </h2>
            <p style="text-align: center;">Today's 3 recipes</p>

            <!-- i used llm to format following block of code-->
            <div class="container" style="display: flex; justify-content: center; gap: 100px; text-align: center; margin-top: 20px;">
                <div class="item" style="width: 190px;">
                    <img src="pasta.jpg" alt="Image 1" style="width: 100%; border-radius: 8px;">
                    <p>Four Cheese Pasta</p>
                    <button style="margin-top: 10px; padding: 5px 10px; background-color: darkgreen; color: white; border: none; border-radius: 5px; cursor: pointer;">Add Recipe</button>
                </div>
                <div class="item" style="width: 190px;">
                    <img src="sushi.jpg" alt="Image 2" style="width: 100%; border-radius: 8px;">
                    <p>Tango Roll</p>
                    <button style="margin-top: 10px; padding: 5px 10px; background-color: darkgreen; color: white; border: none; border-radius: 5px; cursor: pointer;">Add Recipe</button>
                </div>
                <div class="item" style="width: 190px;">
                    <img src="glorp.jpg" alt="Image 3" style="width: 100%; border-radius: 8px;">
                    <p>Zlorpian Stew</p>
                    <button style="margin-top: 10px; padding: 5px 10px; background-color: darkgreen; color: white; border: none; border-radius: 5px; cursor: pointer;">Add Recipe</button>
                </div>
            </div>
        </section>
        
        <section class="about">
            <h2 style="text-align: center;">Why Use Our Tracker?</h2>
            <table>
                <tr>
                <td style="text-align: center">When you use Bryson's Nutrition Tracker, you are able to keep track of your macros all in one convienint place. And this can be even more accurate when paired with a basic food scale. </td></tr>
            </table>
        </section>

    
    </main>
    <footer>
        <nav><p></p>| 
            <a href="about.php">Help</a> | 
            
        </p></nav>
    </footer>
</body>
</html>
