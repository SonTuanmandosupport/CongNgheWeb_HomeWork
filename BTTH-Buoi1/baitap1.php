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
                <p><?php echo $flower["desc"];?></p>
                <img src = <?php echo $flower["images"];?> width = 300px, height = 300px>
            </div>
        <?php }?>

    </div>
</body>
</html>