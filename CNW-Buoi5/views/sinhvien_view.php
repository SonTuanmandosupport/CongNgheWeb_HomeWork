<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHT Chương 5 - MVC</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>

<body>
    <h2>Thêm Sinh Viên Mới (Kiến trúc MVC)</h2>

    <form action='index.php' method='POST'>
        <label>Tên sinh viên:</label>
            <input type='text' name='ten_sinh_vien' required>
        <label>Email:</label>
            <input type='email' name = 'email' required>
        <button type = 'submit'>Thêm sinh viên mới</button>
    </form>

    <h2>Danh Sách Sinh Viên (Kiến trúc MVC)</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Sinh Viên</th>
                <th>Email</th>
                <th>Ngày Tạo</th>
            </tr>
        </thead>

        <tbody>
            <?php
            
            // TODO 4: Dùng vòng lặp foreach để duyệt qua biến $danh_sach_sv
                foreach($danh_sach_sv as $sv){
                    echo "<tr>";

                        // TODO 5: In (echo) các dòng <tr> và <td> chứa dữ liệu $sv
                        echo "<td>" .htmlspecialchars($sv['id']) . "</td>";
                        echo "<td>" .htmlspecialchars($sv['ten_sinh_vien']) . "</td>";
                        echo "<td>" .htmlspecialchars($sv['email']) . "</td>";
                        echo "<td>" .htmlspecialchars($sv['ngay_tao']) . "</td>";

                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>