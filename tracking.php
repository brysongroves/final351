<?php
$host = 'localhost'; 
$dbname = '351final'; 
$user = 'root'; 
$pass = 'mysql';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$query = "SELECT * FROM recipes";
if ($search) {
    $query .= " WHERE name LIKE :search";
}
$stmt = $pdo->prepare($query);
if ($search) {
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
}
$stmt->execute();
$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['calories']) && isset($_POST['fats']) && isset($_POST['carbs']) && isset($_POST['protien']) && isset($_POST['ingredients']) && isset($_POST['size'])) {
        // Insert new recipe
        $name = htmlspecialchars($_POST['name']);
        $calories = (int) $_POST['calories'];
        $fats = (int) $_POST['fats'];
        $carbs = (int) $_POST['carbs'];
        $protien = (int) $_POST['protien'];
        $ingredients = htmlspecialchars($_POST['ingredients']);
        $size = htmlspecialchars($_POST['size']);

        $insert_sql = 'INSERT INTO recipes (name, calories, fats, carbs, protien, ingredients, size) VALUES (:name, :calories, :fats, :carbs, :protien, :ingredients, :size)';
        $stmt_insert = $pdo->prepare($insert_sql);
        $stmt_insert->execute([
            'name' => $name,
            'calories' => $calories,
            'fats' => $fats,
            'carbs' => $carbs,
            'protien' => $protien,
            'ingredients' => $ingredients,
            'size' => $size
        ]);
    } elseif (isset($_POST['delete_id'])) {
        // Delete a recipe
        $delete_id = (int) $_POST['delete_id'];

        $delete_sql = 'DELETE FROM recipes WHERE id = :id';
        $stmt_delete = $pdo->prepare($delete_sql);
        $stmt_delete->execute(['id' => $delete_id]);
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .header {
            background-color: darkgreen;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .search-bar {
            margin: 20px auto;
            text-align: center;
        }
        .search-bar input {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .search-bar button {
            padding: 10px 15px;
            background-color: darkgreen;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .container {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }
        .table-container, .form-container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 48%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        table th {
            background-color: darkgreen;
            color: white;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button.submit-btn {
            width: 100%;
            padding: 10px;
            background-color: darkgreen;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button.submit-btn:hover {
            background-color: green;
        }

        .hover-cell {
            position: relative;
        }
        .hover-cell button {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: red;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
        }
        .hover-cell:hover button {
            display: block;
        }
    </style>
</head>


<!-- created table display and entry box, and had gpt split it into sections and format it -->

<body>
    <div class="header">
        <h1>Tracking Page</h1>
    </div>

    <div class="search-bar">
        <form action="" method="get">
            <input type="text" name="search" placeholder="Search for a recipe..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="container">
        <!-- Table Section -->
        <div class="table-container">
            <h2>Recipes</h2>
            <table>
                <thead>
                    <tr>
                        
                        <th>Name</th>
                        <th>Calories</th>
                        <th>Fats</th>
                        <th>Carbs</th>
                        <th>Protein</th>
                        <th>Ingredients</th>
                        <th>Size</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($recipes): ?>
                        <?php foreach ($recipes as $recipe): ?>
                            <tr>
                            <tr>
                                
                                <td class="hover-cell">
                                    <?php echo htmlspecialchars($recipe['name']); ?>
                                    <form action="" method="post" style="display:inline;">
                                        <input type="hidden" name="delete_id" value="<?php echo $recipe['id']; ?>">
                                        <button type="submit">Remove</button>
                                    </form>
                                </td>
                                
                                <td><?php echo htmlspecialchars($recipe['calories']); ?></td>
                                <td><?php echo htmlspecialchars($recipe['fats']); ?></td>
                                <td><?php echo htmlspecialchars($recipe['carbs']); ?></td>
                                <td><?php echo htmlspecialchars($recipe['protien']); ?></td>
                                <td><?php echo htmlspecialchars($recipe['ingredients']); ?></td>
                                <td><?php echo htmlspecialchars($recipe['size']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8">No recipes found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="form-container">
            <h2>Add a Recipe</h2>
            <form action="" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
                <label for="calories">Calories</label>
                <input type="number" id="calories" name="calories" required>
                <label for="fats">Fats</label>
                <input type="number" id="fats" name="fats" required>
                <label for="carbs">Carbs</label>
                <input type="number" id="carbs" name="carbs" required>
                <label for="protien">Protein</label>
                <input type="number" id="protien" name="protien" required>
                <label for="ingredients">Ingredients</label>
                <textarea id="ingredients" name="ingredients" required></textarea>
                <label for="size">Size (grams)</label>
                <input type="text" id="size" name="size" required>

                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>