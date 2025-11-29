<?php
require "Database.php";
require "Flower.php";

$db = new Database();
$conn = $db->connect();

$flowerModel = new Flower($conn);
$flowers = $flowerModel->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        
        .container {
            max-width: 700px;   
            margin: 0 auto;     
        }
        body{
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
        }
        .flower-item {
            background: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }

        .flower-item img{
            max-width: 100%;
            border-radius: 6px;
            margin-top: 10px;
        }
        h3{
            margin-bottom: 10px;
        }
        p{
            margin-bottom: 10px;
        }
        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        button {
            padding: 8px 16px;
            background-color: #ff4d6d;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.25s;
        }

        button:hover {
            background-color: #e63b59;
            transform: translateY(-2px);
        }
    </style>

</head>
<body>
    <div class="container" >

        <div class="header-bar">
            <h2>Danh sách hoa đẹp nhất Việt Nam</h2>
            <a href = "baitap1_extra.php">
                <button> Admin </button>
            </a>
        </div>

        <?php foreach($flowers as $flower){?>
            <div class="flower-item">
                <h3><?php echo $flower["name"];?></h3>
                <p><?php echo $flower["description"];?></p>
                <img src = <?php echo $flower["image"];?> width = 300px, height = 300px>
            </div>
        <?php }?>

    </div>
</body>
</html>