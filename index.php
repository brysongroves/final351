<!-- Bryson Groves -->
<!-- CS 351 Final -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Penguins</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    header {
        background-image: url('mainlogo.jpg');
        background-size: cover;
        background-position: center;
        background-color: rgba(255, 255, 255, 0.3); /* subtle overlay */
        background-blend-mode: overlay;
        padding:150px;
    }
    </style>
</head>
<body>
    <header>
        
        
        <nav><p></p>
            <button style="background-color: darkgreen; color: white; border-color: gray; padding: 20px 25px; font-size: 16px; cursor: pointer;" onclick="window.location.href='tracking.php';">
                Track Macros
            </button>
        </p></nav>
    </header>
    <main>

        <section class="dailys">
            <h2>Daily Recipes </h2>
            Today's 3 recipes

            <!-- i used llm to format following block of code-->
            <div class="container" style="display: flex; justify-content: center; gap: 20px; text-align: center; margin-top: 20px;">
                <div class="item" style="width: 150px;">
                    <img src="pasta.jpg" alt="Image 1" style="width: 100%; border-radius: 8px;">
                    <p>Four Cheese Pasta</p>
                    <button style="margin-top: 10px; padding: 5px 10px; background-color: darkgreen; color: white; border: none; border-radius: 5px; cursor: pointer;">Add Recipe</button>
                </div>
                <div class="item" style="width: 150px;">
                    <img src="sushi.jpg" alt="Image 2" style="width: 100%; border-radius: 8px;">
                    <p>Tango Roll</p>
                    <button style="margin-top: 10px; padding: 5px 10px; background-color: darkgreen; color: white; border: none; border-radius: 5px; cursor: pointer;">Add Recipe</button>
                </div>
                <div class="item" style="width: 150px;">
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
                <td style="padding: 20px;">When you use Bryson's Nutrition Tracker, you are able to keep track of your macros all in one convienint place. And this can be even more accurate when paired with a basic food scale. </td></tr>
            </table>
        </section>

    
    </main>
    <footer>
        <nav><p></p>| 
            <a href="about.html">Help</a> | 
            
        </p></nav>
    </footer>
</body>
</html>