<?php
require 'Database.php';

$db = new Database();
$questions = $db->getAllQuestions();

foreach ($questions as $index => $q) {
    echo "<h3>Câu " . ($index+1) . ": " . $q['question'] . "</h3>";
    $answers = $q['answer'];
    $inputType = count($answers) > 1 ? "checkbox" : "radio";

    foreach ($q['options'] as $option) {
        $letter = substr($option, 0, 1);
        $text = substr($option, 3);
        echo "<label><input type='$inputType' name='q$index" . ($inputType=="checkbox"?"[]":"") . "' value='$letter'> $option</label><br>";
    }
    echo "<p><strong>Đáp án đúng:</strong> " . implode(", ", $answers) . "</p><hr>";
}
?>