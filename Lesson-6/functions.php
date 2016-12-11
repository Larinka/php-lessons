<?php

function getQueryParam($name) {
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
}

function uploadFile($fieldName, $newName) {
    $newPath = __DIR__ . '/tests';
    $tmpFile = $_FILES[$fieldName]['tmp_name'];
    if(!move_uploaded_file($tmpFile, $newPath . '/' . 'test_' . $newName)) {
       return false;
    } else {
        return true;
    }
}

function isPOST() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function isGET() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function getUploadedFileClientName() {
    return isset($_FILES['test']) ? $_FILES['test']['name'] : null;
}

function getUploadedFileNewName() {
    return md5(getUploadedFileClientName()) . '.json';
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

function showTests() {
    $files = glob(__DIR__ . "/tests/test_*.json");
    $tests = [];
    foreach ( $files as $file ) {
      $data = json_decode(file_get_contents($file), true);
      foreach ( $data as $test ) {
        $tests[] = $test;
      }
    }
    return $tests;
}

function xssafe($data, $encoding='UTF-8') {
    return htmlspecialchars($data, ENT_QUOTES | ENT_HTML401, $encoding);
}
