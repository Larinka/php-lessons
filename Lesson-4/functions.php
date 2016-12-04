<?php
error_reporting(E_ALL);

//getting file list
function getFiles($relPath, $ext) {
    if(!is_dir($relPath)) {
        return [];
    }
    chdir($relPath);
    $files = [];
    $fileName = "1.{$ext}";
    while (is_file($fileName)) {
        array_push($files, $relPath . DIRECTORY_SEPARATOR . $fileName);
        $fileName[0] = (int)$fileName[0] + 1;
    }
    chdir(__DIR__);
    return $files;
}

//size and changing time
function getFilesInfo($files) {
    $info = [];
    foreach ( $files as $file ) {
        $info[$file]['size']  = filesize($file);
        $info[$file]['mtime'] = filemtime($file);
    }

    return $info;
}

//export in csv
function exportToCsv($filesInfo, $fileName) {
    if (!is_writable(realpath('.'))) {
        return false;
    }
    $fd = fopen($fileName, 'w');
    foreach ($filesInfo as $fname => $info) {
        array_unshift($info, $fname);
        fputcsv($fd, $info);
    }
    fclose($fd);
    return filesize($fileName);
}

//preview creation
function createPreview($files, $suffix, $width) {
    $previews = [];
    foreach ( $files as $filename ) {
        $pathParts = pathinfo($filename);
        $newName  = $pathParts['dirname'] . DIRECTORY_SEPARATOR;
        $newName .= $pathParts['filename'] . $suffix . '.' . $pathParts['extension'];
        //new size
        list($widthOrig, $heightOrig) = getimagesize($filename);
        $ratioOrig = $widthOrig/$heightOrig;
        $height = $width/$ratioOrig;
        //resampling
        $image_p = imagecreatetruecolor($width, $height);
        $image = imagecreatefromjpeg($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $widthOrig, $heightOrig);
        //output
        if (imagejpeg($image_p, $newName, 100)) {
            $previews[$filename]['preview'] = $newName;
        }
    }
    return $previews;
}


?>
