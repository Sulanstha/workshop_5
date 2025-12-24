<?php
require 'header.php';
require 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        uploadPortfolioFile($_FILES['portfolio']);
        echo "<p>File uploaded successfully</p>";
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}
?>

<form method="post" enctype="multipart/form-data">
    Select file:
    <input type="file" name="portfolio" required><br><br>
    <button type="submit">Upload</button>
</form>

<?php require 'footer.php'; ?>
