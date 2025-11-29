<?php
require_once 'Account.php';

// Kết nối database
$database = new Database();
$db = $database->getConnection();

// Khởi tạo Account object
$account = new Account($db);

// Nhập CSV (tự động, tránh duplicate)
$account->importCSV(__DIR__ . "/65HTTT_Danh_sach_diem_danh.csv");

// Lấy dữ liệu từ database
$rows = $account->getAll();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách tài khoản</title>
</head>
<body>
    <h2>Danh sách tài khoản</h2>
    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Class</th>
                <th>Email</th>
                <th>Course</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r): ?>
                <tr>
                    <td><?php echo htmlspecialchars($r['Username']); ?></td>
                    <td><?php echo htmlspecialchars($r['Password']); ?></td>
                    <td><?php echo htmlspecialchars($r['Lastname']); ?></td>
                    <td><?php echo htmlspecialchars($r['Firstname']); ?></td>
                    <td><?php echo htmlspecialchars($r['Class']); ?></td>
                    <td><?php echo htmlspecialchars($r['Email']); ?></td>
                    <td><?php echo htmlspecialchars($r['Course']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>