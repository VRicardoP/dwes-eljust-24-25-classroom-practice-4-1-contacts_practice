<?php
session_start();
require_once __DIR__ . '/functions.php';

// Process form data after submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = [
    'id' => $_POST['id'] ?? 0,
    'title' => $_POST['title'] ?? 'Mr.',
    'name' => $_POST['name'] ?? '',
    'surname' => $_POST['surname'] ?? '',
    'birthdate' => $_POST['birthdate'] ?? '',
    'phone' => $_POST['phone'] ?? '',
    'email' => $_POST['email'] ?? '',
    'favourite' => isset($_POST['favourite']),
    'important' => isset($_POST['important']),
    'archived' => isset($_POST['archived']),
  ];

  // Validate the form data
  $errors = validateContactData($data);

  if (!empty($errors)) {
    // Store errors in session and redirect back to the form
    $_SESSION['errors'] = $errors;
    header('Location: contact_form.php?contact_id=' . $data['id']);
    exit;
  }

  // If no errors, display success message
  echo "No errors Contact data is valid:<br>";
  echo "ID: " . $data['id'] . "<br>";
  echo "Title: " . $data['title'] . "<br>";
  echo "Name: " . $data['name'] . "<br>";
  echo "Surname: " . $data['surname'] . "<br>";
  echo "Birthdate: " . $data['birthdate'] . "<br>";
  echo "Phone: " . $data['phone'] . "<br>";
  echo "Email: " . $data['email'] . "<br>";

  // Display Type fields
  $types = [];
  if ($data['favourite']) $types[] = 'Favourite';
  if ($data['important']) $types[] = 'Important';
  if ($data['archived']) $types[] = 'Archived';
  echo "Type: " . implode(', ', $types) . "<br>";
}
