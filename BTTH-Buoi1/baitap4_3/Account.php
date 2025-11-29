<?php
require_once 'Database.php';

class Account {
    private $conn;
    private $table_name = "accounts";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Chèn dữ liệu vào bảng, tránh trùng Username
    public function insert($data) {
        $sql = "INSERT INTO {$this->table_name} 
                (Username, Password, Lastname, Firstname, Class, Email, Course) 
                VALUES (:Username, :Password, :Lastname, :Firstname, :Class, :Email, :Course)
                ON DUPLICATE KEY UPDATE
                    Password = VALUES(Password),
                    Lastname = VALUES(Lastname),
                    Firstname = VALUES(Firstname),
                    Class = VALUES(Class),
                    Email = VALUES(Email),
                    Course = VALUES(Course)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':Username', $data['Username']);
        $stmt->bindParam(':Password', $data['Password']);
        $stmt->bindParam(':Lastname', $data['Lastname']);
        $stmt->bindParam(':Firstname', $data['Firstname']);
        $stmt->bindParam(':Class', $data['Class']);
        $stmt->bindParam(':Email', $data['Email']);
        $stmt->bindParam(':Course', $data['Course']);

        return $stmt->execute();
    }

    // Lấy tất cả dữ liệu
    public function getAll() {
        $sql = "SELECT * FROM {$this->table_name}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Đọc CSV và chèn vào CSDL
    public function importCSV($filename) {
        if (!file_exists($filename)) return false;

        $file = fopen($filename, "r");
        $header = fgetcsv($file);
        if (!$header) return false;

        // Bỏ BOM nếu có
        $header[0] = preg_replace('/^\xEF\xBB\xBF/', '', $header[0]);

        while (($row = fgetcsv($file)) !== false) {
            if (count($row) == 0 || trim(implode('', $row)) == '') continue;
            if (count($row) != count($header)) continue;

            $data = array_combine($header, $row);
            if (empty($data['Username'])) continue;

            $this->insert($data); // không echo gì
        }

        fclose($file);
        return true;
    }
}