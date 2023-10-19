<?php
// index.php

// Get the path from the URL
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';

// Your logic to handle different paths
switch ($path) {
    case '/':
        echo 'Home Page';
        break;
        case '/about':
            echo 'About Page';
        
        break;
    // Add more cases as needed
    default:
        echo '404 Not Found';
        break;
}
