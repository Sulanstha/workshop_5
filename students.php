<?php
require 'header.php';

if (file_exists("students.txt")) {
    $students = file("students.txt");

    foreach ($students as $student) {
        list($name, $email, $skills) = explode("|", $student);
        $skillsArray = explode(",", $skills);

        echo "<p>";
        echo "Name: $name<br>";
        echo "Email: $email<br>";
        echo "Skills:<ul>";

        foreach ($skillsArray as $skill) {
            echo "<li>$skill</li>";
        }

        echo "</ul>";
        echo "</p><hr>";
    }
}

require 'footer.php';
?>
