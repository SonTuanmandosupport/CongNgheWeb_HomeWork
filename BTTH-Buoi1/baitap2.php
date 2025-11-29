<?php
$questions = array();
$current_question = "";
$options = array();
$answer = "";

$handle = fopen("Quiz.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $line = trim($line);
        if ($line == "") continue; // bỏ dòng trống

        if (strpos($line, "ANSWER:") === 0) {
            // Đây là đáp án đúng
            $answer = trim(str_replace("ANSWER:", "", $line));
            // Lưu câu hỏi hoàn chỉnh vào mảng
            $questions[] = array(
                'question' => $current_question,
                'options' => $options,
                'answer' => $answer
            );
            // reset cho câu hỏi tiếp theo
            $current_question = "";
            $options = array();
            $answer = "";
        } elseif (preg_match('/^[A-E]\./', $line)) {
            // Đây là 1 đáp án
            $options[] = $line;
        } else {
            // Đây là câu hỏi
            $current_question = $line;
        }
    }
    fclose($handle);
} 
else {
    die("Không tồn tại file Quiz.txt!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thi trắc nghiệm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .question-nav {
            text-align: center;
            margin-bottom: 20px;
        }

        .question-nav button {
            width: 35px;
            height: 35px;
            margin: 3px;
            border: none;
            border-radius: 50%;
            background-color: #ddd;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .question-nav button.active {
            background-color: #007bff;
            color: white;
        }

        .question-nav button:hover {
            background-color: #007bff;
            color: white;
        }

        .question {
            background: white;
            padding: 15px 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .question strong {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            cursor: pointer;
            padding: 6px 10px;
            border-radius: 5px;
            transition: 0.3s;
        }

        input[type="radio"], input[type="checkbox"] {
            margin-right: 8px;
        }

        label:hover {
            background-color: #f0f0f0;
        }

        input[type="radio"]:checked + span,
        input[type="checkbox"]:checked + span {
            background-color: #d0e7ff;
        }

        button.submit-btn {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button.submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h1>Bài thi trắc nghiệm</h1>

<div class="question-nav">
    <?php foreach ($questions as $index => $question) : ?>
        <button onclick="scrollToQuestion(<?= $index ?>)" id="navBtn<?= $index ?>"><?= $index+1 ?></button>
    <?php endforeach; ?>
</div>

<form method="GET">
    <?php foreach ($questions as $index => $question) : ?>
        <div class="question" id="question<?= $index ?>">
            <strong><?= "Câu " . ($index+1) . ": " . $question['question']; ?></strong>

            <?php
            $answers = array_map('trim', explode(',', $question['answer']));
            $inputType = (count($answers) > 1) ? 'checkbox' : 'radio';
            ?>

            <?php foreach ($question['options'] as $option) : 
                $letter = substr($option, 0, 1);
                $text = substr($option, 3);
            ?>
                <label>
                    <input type="<?= $inputType ?>" name="q<?= $index+1 ?><?= ($inputType=='checkbox')?'[]':'' ?>" value="<?= $letter ?>">
                    <span><?= $letter. ". " . $text ?></span>
                </label>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

    <button type="submit" class="submit-btn">Nộp bài</button>
</form>

<script>
    function scrollToQuestion(index) {
        document.getElementById('question' + index).scrollIntoView({behavior: 'smooth'});
        highlightNav(index);
    }

    function highlightNav(index) {
        <?php foreach ($questions as $i => $q): ?>
        document.getElementById('navBtn<?= $i ?>').classList.remove('active');
        <?php endforeach; ?>
        document.getElementById('navBtn' + index).classList.add('active');
    }
</script>

</body>
</html>