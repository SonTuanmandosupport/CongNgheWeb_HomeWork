<?php
// TODO 1: Khởi động session (BẮT BUỘC ở mọi trang cần dùng SESSION)
session_start();
// TODO 2: Kiểm tra xem SESSION (lưu tên đăng nhập) có tồn tại không?
if ( isset($_SESSION['your_username']) ) {
// TODO 3: Nếu tồn tại, lấy username từ SESSION ra
    $loggedInUser = $_SESSION['your_username'];
// TODO 4: In ra lời chào mừng
    echo "<h1>おかえり、愛してる $loggedInUser!</h1>";
    echo "<p>あなたは正常にログインしました。</p>";
// TODO 5: (Tạm thời) Tạo 1 link để "Đăng xuất" (chỉ là quay về login.html)
    echo '<a href="login.html">Log out (Temporary)</a>';
}   

else{
// TODO 6: Nếu không tồn tại SESSION (chưa đăng nhập)
// Chuyển hướng người dùng về trang login.html
    header('Location: login.html');
    exit(); 
}
?>