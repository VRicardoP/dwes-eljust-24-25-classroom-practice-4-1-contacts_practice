<?php
// This page handles the form for viewing/editing/creating contacts
session_start();

$contacts = require_once __DIR__ . '/data.php';
require_once __DIR__ . '/functions.php';

// Fetch contact data by ID from the query string, if provided
$contactId = $_GET['contact_id'] ?? null;
$contact = null;

// Find the contact with the provided ID, if any
if ($contactId) {
  foreach ($contacts as $c) {
    if ($c['id'] == $contactId) {
      $contact = $c;
      break;
    }
  }
}

// Set default values if no contact is selected
$contact = $contact ?? [
  'id' => 0,
  'title' => 'Mr.',
  'name' => '',
  'surname' => '',
  'birthdate' => '',
  'phone' => '',
  'email' => '',
  'favourite' => false,
  'important' => false,
  'archived' => false,
];

// Set the title, author, and headerText for this page
$title = "Contact Form";
$headerText = $contactId ? "Edit Contact" : "Create New Contact";

// Include the header partial
require_once __DIR__ . '/header.php';

// Handle validation errors stored in the session
if (isset($_SESSION['errors'])) {
  foreach ($_SESSION['errors'] as $error) {
    echo "<p style='color:red;'>$error</p>";
  }
  unset($_SESSION['errors']); // Clear errors after displaying
}
?>
<div id="container">
  <form method="POST" action="checkdata.php">
    <label for="id">ID:</label>
    <input type="text" id="id" name="id" value="<?= htmlspecialchars($contact['id']) ?>" readonly><br>

    <label for="title">Title:</label>
    <input type="radio" name="title" value="Mr." <?= $contact['title'] === 'Mr.' ? 'checked' : '' ?>> Mr.
    <input type="radio" name="title" value="Mrs." <?= $contact['title'] === 'Mrs.' ? 'checked' : '' ?>> Mrs.
    <input type="radio" name="title" value="Miss" <?= $contact['title'] === 'Miss' ? 'checked' : '' ?>> Miss<br>

    <label for="name">First name:</label>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($contact['name']) ?>"><br>

    <label for="surname">Surname:</label>
    <input type="text" name="surname" id="surname" value="<?= htmlspecialchars($contact['surname']) ?>"><br>

    <label for="birthdate">Birth date:</label>
    <input type="date" name="birthdate" id="birthdate" value="<?= htmlspecialchars($contact['birthdate']) ?>"><br>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" id="phone" value="<?= htmlspecialchars($contact['phone']) ?>"><br>

    <label for="email">E-mail:</label>
    <input type="text" name="email" id="email" value="<?= htmlspecialchars($contact['email']) ?>"><br>

    <label>Type:</label><br>
    <input type="checkbox" name="favourite" <?= $contact['favourite'] ? 'checked' : '' ?>> Favourite<br>
    <input type="checkbox" name="important" <?= $contact['important'] ? 'checked' : '' ?>> Important<br>
    <input type="checkbox" name="archived" <?= $contact['archived'] ? 'checked' : '' ?>> Archived<br><br>

    <button type="submit" name="save" <?= $contactId ? 'disabled' : '' ?>>Save</button>
    <button type="submit" name="update" <?= !$contactId ? 'disabled' : '' ?>>Update</button>
    <button type="submit" name="delete" <?= !$contactId ? 'disabled' : '' ?>>Delete</button>
  </form>
</div>

<?php
// Include the footer partial
require_once __DIR__ . '/footer.php';
?>