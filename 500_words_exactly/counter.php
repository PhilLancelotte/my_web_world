<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Path to the counter file
$counterFile = 'access_counter.txt';

// If the file doesn't exist, create it and initialize to 0
if (!file_exists($counterFile)) {
    file_put_contents($counterFile, '0');
}

// Open the file for reading and writing ("r+" mode)
$fp = fopen($counterFile, 'r+');

if (flock($fp, LOCK_EX)) {  // Acquire an exclusive lock
    // Read the current count
    $count = (int)fread($fp, filesize($counterFile));
    
    // Increment the counter
    $count++;
    
    // Move the file pointer to the beginning and truncate the file
    ftruncate($fp, 0);
    rewind($fp);
    
    // Write the updated count back to the file
    fwrite($fp, $count);
    
    // Release the lock
    flock($fp, LOCK_UN);
} else {
    // Handle error if file cannot be locked
    echo "Could not lock the file!";
}

fclose($fp);

// Display the counter on the page
echo "This page has been visited " . $count . " times.";
?>
