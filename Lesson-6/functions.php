<?php

function getQueryParam($name) {
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
}

function isPOST() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function isGET() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function getUploadedFileClientName() {
    return isset($_FILES['testJson']) ? $_FILES['testJson']['name'] : null;
}

function isAllowedExt($fileName) {
    if (getExtFile($fileName) != 'json') {
        return false;
    } else {
        return true;
    }
}

function getExtFile($fileName) {
    return substr($fileName, strrpos($fileName, '.') + 1);
}

function showUploadedTests ($uploadDir) {

    if ($handle = opendir($uploadDir)) {
        $i = 1;
        $tests = [];

        while (false !== ($entry = readdir($handle))) {
            $sourceFileName = basename($entry);
            $sourceFileType = substr($sourceFileName, -4, 4);

            if ($sourceFileType === 'json')
            {
                $tests[$i] = $sourceFileName;
                $i++;
            }
        }
    }
    return $tests;
}

function checkAnswers ($sumbittedQuestionID, $correctAnswer) {
    if (isset($sumbittedQuestionID) && !is_null($sumbittedQuestionID)) {
        $usersAnswer = mb_strtolower($sumbittedQuestionID);
        $correctAnswer = mb_strtolower($correctAnswer);

        if ($usersAnswer == $correctAnswer) {
            echo "<p class=\"correct\">Верно!</p><br>";
        } else {
            echo "<p class=\"error\">Не верно</p><br>";
        }
    }
}

function notAllFieldsFilled ($jsonDecoded) {
    foreach ($jsonDecoded as $question) {
        if (empty($_POST["answer_$question[id]"])) {
            $notAllFieldsFilled = true;
            return $notAllFieldsFilled;
        }
    }
}

function showTest ($jsonDecoded) {

    echo "<form method=\"post\">";

    foreach ($jsonDecoded as $question) {
        if (!empty($_POST)) {
            $usersAnswer = $_POST["answer_$question[id]"];
        } else {
            $usersAnswer = "";
        }
        echo "<label for=\"answer_$question[id]\">Вопрос № $question[id]. $question[question]</label>";
        echo "<input id=\"answer_$question[id]\" name=\"answer_$question[id]\" class=\"form-control\" placeholder=\"Ваш ответ\" value=\"$usersAnswer\"/>";
        if (notAllFieldsFilled($jsonDecoded) !== true) {
            checkAnswers ($usersAnswer, $question['answer']);
        }
    }

    if (notAllFieldsFilled($jsonDecoded) == true) {
        echo "<br>";
        echo "<button type=\"submit\" class=\"btn btn-info\">Проверить</button>";
    }

    echo "</form><br>";

    if (notAllFieldsFilled($jsonDecoded) == true && !empty($_POST)) {
        echo "<p class=\"error\">Нельзя проверить тест. Вы ответили не на все вопросы.</p>";
    }

}
