<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Div Links Page</title>
    <style>
        .embedded-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;
            max-width: 800px; /* Adjust the max-width as needed */
            margin: 0 auto; /* Center the content horizontally */
        }

        .link-container {
            width: 45%;
            height: 200px;
            margin: 10px;
            overflow: hidden;
            position: relative;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-size: cover;
            background-position: center;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .link-container:hover {
            transform: scale(1.05);
        }

        .link-content {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php 
require_once("include/initialize.php");  
if (!isset($_SESSION['StudentID'])) {
  # code...
  redirect('login.php');
}

// Define an array with pages and their corresponding titles and background images
$pages = array(
    'lesson' => array('title' => 'Lesson', 'background' => 'images/study.jpg'),
    'exercises' => array('title' => 'Exercises', 'background' => 'images/study.jpg'),
    'download' => array('title' => 'Download', 'background' => 'images/study.jpg'),
    'about' => array('title' => 'About Us', 'background' => 'images/study.jpg'),
);

// Get the view from the query string
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : 'lesson';
$title = $pages[$view]['title'];
$content = $view . '.php';

require_once("navigation/navigations.php");

// Display the embedded content
echo '<div class="embedded-content">';

// Loop through pages to generate links
foreach ($pages as $page => $pageDetails) {
    echo '<a class="link-container" style="background-image: url(\'' . $pageDetails['background'] . '\');" href="?q=' . $page . '">';
    echo '<div class="link-content">' . $pageDetails['title'] . '</div>';
    echo '</a>';
}

echo '</div>';

?>
</body>
</html>
