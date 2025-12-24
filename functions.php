<?php

function formatName($name) {
    return ucwords(trim($name));
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function cleanSkills($string) {
    $skills = explode(",", $string);
    return array_map('trim', $skills);
}

function saveStudent($name, $email, $skillsArray) {
    $data = $name . "|" . $email . "|" . implode(",", $skillsArray) . PHP_EOL;
    file_put_contents("students.txt", $data, FILE_APPEND);
}

function uploadPortfolioFile($file) {
    $allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];

    if (!in_array($file['type'], $allowedTypes)) {
        throw new Exception("Invalid file type");
    }

    if ($file['size'] > 2097152) {
        throw new Exception("File size exceeds 2MB");
    }

    if (!is_dir("uploads")) {
        throw new Exception("Upload directory not found");
    }

    $newName = time() . "_" . basename($file['name']);
    move_uploaded_file($file['tmp_name'], "uploads/" . $newName);
}
