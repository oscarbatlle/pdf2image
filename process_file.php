<?php
/**
 * @author Oscar Batlle <oscarbatlle@gmail.com>
 */
include 'autoload.php';
ini_set('max_execution_time', 300);
$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);
$filename = basename($_FILES['file']['name']);
$arr = explode(' ',trim($filename));
$filename = basename($arr[0], ".pdf"); // Get the filename without .pdf extension

if($_FILES['file']['type'] != 'application/pdf'){
    die('Unsupported filetype uploaded.');
}

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
{
    $pdftoimage = new Pdftoimage();
    $length = $pdftoimage->getPDFPages($uploadfile);
    $pdftoimage->pdf2image($length, $uploadfile);
    $gallery = new Gallery($filename);

}