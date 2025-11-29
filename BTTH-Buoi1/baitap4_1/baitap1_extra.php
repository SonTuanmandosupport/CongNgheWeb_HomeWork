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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container {
            max-width: 1000px;   
            margin: 0 auto;     
        }

        body{
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
        }

        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        button {
            padding: 8px 16px;
            background-color: #0d6efd;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.25s;
        }

        button:hover {
            background-color: #0d6efd;
            transform: translateY(-2px);
        }
        .rounded-table {
            border: 2px solid #dee2e6; /* giống viền table */
            border-radius: 15px;        /* bo góc bảng */
            overflow: hidden;           /* cắt viền con bên trong */
        }
        .rounded-table th, .rounded-table td {
            border: none; /* loại bỏ border mặc định */
        }
        

        .table-wrapper {
            border: 3px solid #010004ff; /* viền bao quanh */
            border-radius: 15px;        /* bo góc */
            padding: 15px;              /* khoảng cách giữa bảng và viền */
            overflow-x: auto;           /* nếu bảng rộng, sẽ cuộn ngang */
            background-color: #f8f9fa;  /* nền nhẹ cho đẹp */
        }
        .table-wrapper table {
            margin: 0;                  /* bỏ margin mặc định của table */
        }
        .rounded-table th {
            vertical-align: top; /* căn lề trên */
            text-align: center;  /* căn giữa theo ngang */
            padding-top: 8px;    /* khoảng cách trên nếu muốn */
        }

    </style>

</head>
<body>
    <div class="container">

        <div class="header-bar">
            <h2>Danh sách hoa đẹp nhất Việt Nam</h2>
            <a href = "baitap1.php">
                <button> User </button>
            </a>
        </div>

        <div class="add-button mb-3">
            <button class = "btn btn-sm btn-primary" style = "width: 150px; padding: 10px 15px;">+ Thêm mới</button>
        </div>

        <div class="table-wrapper">
            <table class="table table-striped text-center rounded-table">


                <thead class="table-dark">
                    <tr>
                        <th>Tên hoa</th>
                        <th>Mô tả</th>
                        <th>Hình ảnh</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>


                <tbody>
                    <?php foreach($flowers as $flower){?>
                        <tr>
                            <td><strong><?php echo $flower["name"];?></strong></td>
                            <td><?php echo $flower["description"];?></td>
                            <td><img src = <?php echo $flower["image"];?> width = 200px, height = 200px></td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button class="btn btn-warning me-2" title="Sửa">Sửa</button>
                                    <button class="btn btn-danger" title="Xóa">Xóa</button>
                                </div>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>


            </table>

        </div>

    </div>
</body>
</html>