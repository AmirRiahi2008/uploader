<?php
session_start();
$message = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["uploadBtn"])) {
        if (!empty($_FILES["uploadedFile"]) && $_FILES["uploadedFile"]["error"] === 0) {

            $fileName = $_FILES["uploadedFile"]["name"];
            $fileSize = $_FILES["uploadedFile"]["size"];
            $filePath = $_FILES["uploadedFile"]["tmp_name"];

            $convertFileNameToArray = explode('.', $fileName);
            $lowerFormatFile = strtolower(end($convertFileNameToArray));
            $newFileName = md5(time() . $fileName) . "." . $lowerFormatFile;
            $correctFormats = ['jpg', 'docx', 'pdf', 'png', 'txt', 'html', 'mp4'];

            if (in_array($lowerFormatFile, $correctFormats)) {
                $defaultFileSize = 5 * 1024 * 1024;

                $fileDirectionToSave = './upload/';
                if (!is_dir($fileDirectionToSave)) {
                    mkdir($fileDirectionToSave, 0777, true);
                }

                if ($fileSize <= $defaultFileSize) {
                    $putFileToDirectory = $fileDirectionToSave . $newFileName;
                    $fileMime = mime_content_type($filePath);
                    $allowedMimeTypes = [
                        'image/jpeg',
                        'image/png',
                        'application/pdf',
                        'text/plain',
                        'text/html',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'video/mp4'
                    ];

                    if (in_array($fileMime, $allowedMimeTypes)) {
                        if (move_uploaded_file($filePath, $putFileToDirectory)) {
                            $message = "File uploaded successfully 🙌";
                        } else {
                            $message = "Something went wrong during moving the file 😶";
                        }
                    } else {
                        $message = "Invalid file type! 🚫";
                    }
                } else {
                    $message = "Please upload a file smaller than 5 MB 😐";
                }
            } else {
                $message = "Please upload a valid file format (jpg, docx, pdf, png, txt, html, mp4) 😎";
            }
        } else {
            $message = "Something went wrong during file upload 💀";
        }
    } else {
        $message = "Something went wrong 😒";
    }
} else {
    $message = "Do not change the request method 😢";
}

$_SESSION["message"] = $message;
header("Location: index.php");
exit();
