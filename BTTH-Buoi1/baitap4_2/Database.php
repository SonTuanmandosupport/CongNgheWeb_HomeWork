<?php
class Database {
    private $host = "localhost";
    private $dbname = "quiz_db";
    private $username = "root";
    private $password = "";
    private $conn;

    public function connect() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
        return $this->conn;
    }

    public function readQuizFile($filename) {
        $questions = [];
        $current_question = "";
        $options = [];
        $answer = "";

        if (!file_exists($filename)) {
            die("File $filename không tồn tại!");
        }

        $handle = fopen($filename, "r");
        while (($line = fgets($handle)) !== false) {
            $line = trim($line);
            if ($line === "") continue;

            if (strpos($line, "ANSWER:") === 0) {
                $answer = trim(str_replace("ANSWER:", "", $line));
                $questions[] = [
                    'question' => $current_question,
                    'options' => $options,
                    'answer' => array_map('trim', explode(',', $answer))
                ];
                $current_question = "";
                $options = [];
                $answer = "";
            } elseif (preg_match('/^[A-E]\./', $line)) {
                $options[] = $line;
            } else {
                $current_question = $line;
            }
        }
        fclose($handle);
        return $questions;
    }

    public function insertQuestions($questions) {
        $conn = $this->connect();
        $stmt = $conn->prepare("INSERT INTO questions (question, options, answer) VALUES (:question, :options, :answer)");
        foreach ($questions as $q) {
            $stmt->execute([
                ':question' => $q['question'],
                ':options' => json_encode($q['options'], JSON_UNESCAPED_UNICODE),
                ':answer' => json_encode($q['answer'], JSON_UNESCAPED_UNICODE)
            ]);
        }
        echo count($questions) . " câu hỏi đã được chèn vào database.<br>";
    }

    public function getAllQuestions() {
        $conn = $this->connect();
        $stmt = $conn->query("SELECT * FROM questions");
        $results = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $row['options'] = json_decode($row['options'], true);
            $row['answer'] = json_decode($row['answer'], true);
            $results[] = $row;
        }
        return $results;
    }
}
?>