<?php
    $flowers = [
        [
            "name" => "Hoa dạ yến thảo",
            "desc" => "là lựa chọn thích hợp cho những ai yêu thích trồng hoa làm đẹp nhà ở. 
            Hoa có thể nở rực quanh năm, kể cả tiết trời se lạnh của mùa xuân hay 
            cả những ngày nắng nóng cao điểm của mùa hè. 
            Dạ yến thảo được trồng ở chậu treo nơi cửa sổ hay ban công, dáng hoa mềm mại, 
            sắc màu đa dạng nên được yêu thích vô cùng.",
            "images" => "hoadep/yendathao.png"
        ],
        [
            "name" => "Hoa đồng tiền",
            "desc" => "thích hợp để trồng trong mùa xuân và đầu mùa hè, 
            khi mà cường độ ánh sáng chưa quá mạnh. Cây có hoa to, nở rộ rực rỡ, 
            lại khá dễ trồng và chăm sóc nên sẽ là lựa chọn thích hợp của bạn trong tiết trời này. 
            Về mặt ý nghĩa, hoa đồng tiền cũng tượng trưng cho sự sung túc, tình yêu và 
            hạnh phúc viên mãn.",
            "images" => "hoadep/hoadongtien.png"
        ],
        [
            "name" => "Hoa giấy",
            "desc" => "có mặt ở hầu khắp mọi nơi trên đất nước ta, thích hợp với nhiều điều kiện 
            sống khác nhau nên rất dễ trồng, không tốn quá nhiều công chăm sóc nhưng thành quả 
            mang lại sẽ khiến bạn vô cùng hài lòng. Hoa giấy mỏng manh nhưng rất lâu tàn, 
            với nhiều màu như trắng, xanh, đỏ, hồng, tím, vàng… cùng nhiều sắc độ khác nhau. 
            Vào mùa khô hanh, hoa vẫn tươi sáng trên cây khiến ngôi nhà luôn luôn bừng sáng.",
            "images" => "hoadep/hoagiay.png"
        ],
        [
            "name" => "Hoa thanh tú",
            "desc" => "mang dáng hình tao nhã, màu sắc thiên thanh dịu dàng của hoa thanh tú 
            có thể khiến bạn cảm thấy vô cùng nhẹ nhàng khi nhìn ngắm. Cây khá dễ trồng, lại 
            nở nhiều hoa cùng một lúc, từ một bụi nhỏ có thể đâm nhánh, tạo nên những cây con 
            phát triển sum suê. Thanh tú trồng ở nơi có nắng sẽ ra hoa nhiều, vì thế thích hợp 
            trong cả mùa xuân lẫn mùa hè, đem lại khoảng không gian xanh mát cho ngôi nhà ngày 
            oi nóng.",
            "images" => "hoadep/hoathanhtu.png"
        ],
        [
            "name" => "Hoa đèn lồng",
            "desc" => "giống như tên gọi, hoa đèn lồng có vẻ đẹp giống như chiếc đèn lồng đỏ 
            trên cao. Nếu giàu trí tưởng tượng hơn, chúng ta sẽ hình dung hoa khi nụ đổ xuống 
            thành từng chùm, kết năm kết ba như những thiếu nữ xúng xính trong chiếc đầm dạ hội. 
            Hoa đèn lồng còn có tên là hồng đăng hoa, trồng trong chậu treo, bồn, phên dậu,… gieo
             hạt vào mùa xuân và cho hoa quanh năm.
",
            "images" => "hoadep/hoadenlong.png"
        ],
        [
            "name" => "Hoa Păng-xê",
            "desc" => "Vào mỗi độ tháng 4 về là dịp mà loài hoa Phăng-xê nở rộ vô cùng đẹp mắt. 
            Hoa còn được gọi tên là hay hoa bướm, hoa tử la lan, hoa tương tư,… Păng-xê thường được trồng trong chậu nhỏ, 
            với phần cánh mỏng mượt như nhung, hình dạng cánh bướm mềm mại như đang tung tăng nhảy múa mỗi khi có 
            làn gió thổi qua. Đây cũng là loài hoa tinh tế và sức sống bền bỉ. ",
            "images" => "hoadep/hoapangxe.png"
        ]
    ]
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
                            <td><?php echo $flower["desc"];?></td>
                            <td><img src = <?php echo $flower["images"];?> width = 200px, height = 200px></td>
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