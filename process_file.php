<?php
/**
 * @author Oscar Batlle <oscarbatlle@gmail.com>
 */
include 'autoload.php';
ini_set('max_execution_time', 300);
$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);
$filename = basename($_FILES['file']['name']);
$filename = basename($filename, ".pdf"); // Get the filename without .pdf extension

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
{
    $pdftoimage = new Pdftoimage();
    $length = $pdftoimage->getPDFPages($uploadfile);
    $pdftoimage->pdf2image($length, $uploadfile);
    $gallery = new Gallery($filename);

} else
{
    echo "Possible file upload attack!\n";
}