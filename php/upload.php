<?php

$upload_dir = './files/';

if (isset($_POST['id'])) {
  // Check if the ID is a valid integer
  if (!is_int($_POST['id'])) {
    echo 'Error: Invalid ID';
    exit;
  }

  // Check if the file exists
  $remove_file = $upload_dir . $_POST['id'];
  if (!file_exists($remove_file)) {
    echo 'Error: File does not exist';
    exit;
  }

  // Delete the file
  if (unlink($remove_file)) {
    echo 'File removed successfully';
  } else {
    echo 'Error: Failed to remove file';
  }
  exit;
}

if (isset($_FILES['file']['name'])) {
  $file_name = $_FILES['file']['name']; // Get the original file name
  $destination = $upload_dir . $file_name; // Use the original name as the destination

  // Save the file to the destination
  if (move_uploaded_file($_FILES['file']['tmp_name'], $destination) === TRUE) {
    echo 'File uploaded successfully';
  } else {
    echo 'Error: Uploaded file failed to be saved';
  }
}
?>