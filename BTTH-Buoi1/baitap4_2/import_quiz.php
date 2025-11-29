<?php
require 'Database.php';

$db = new Database();
$questions = $db->readQuizFile("Quiz.txt");
$db->insertQuestions($questions);
?>