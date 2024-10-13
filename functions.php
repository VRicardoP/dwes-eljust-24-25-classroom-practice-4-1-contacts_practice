<?php
// Include common functions used across the application

/**
 * Function to display a generic HTML table from an associative array.
 * Only shows ID, Title, Name, Surname, and Type columns, centered in the table.
 * @param array $data The array containing the contact data.
 */
function showTable(array $data): void
{
  // Define the specific columns we want to display
  $columns = ['id', 'title', 'name', 'surname'];

  // Start the HTML table
  echo '<table border="1" cellpadding="10" cellspacing="0">';
  echo '<thead>';
  echo '<tr>';

  // Display the table headers for specific columns
  foreach ($columns as $col) {
    echo '<th>' . ucfirst(htmlspecialchars($col)) . '</th>';
  }
  echo '<th>Type</th>'; // Add column for Type
  echo '<th>Action</th>'; // Add column for Edit/View button
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';

  // Loop through each row in the data array and display the values
  foreach ($data as $row) {
    echo '<tr>';
    foreach ($columns as $col) {
      echo '<td>' . htmlspecialchars((string)$row[$col]) . '</td>';
    }

    // Display Type fields
    $types = [];
    if ($row['favourite']) $types[] = 'Favourite';
    if ($row['important']) $types[] = 'Important';
    if ($row['archived']) $types[] = 'Archived';
    echo '<td>' . implode(', ', $types) . '</td>';

    // Add Edit/View button
    echo '<td><form method="GET" action="contact_form.php">';
    echo '<button type="submit" name="contact_id" value="' . htmlspecialchars($row['id']) . '">Edit/View</button>';
    echo '</form></td>';
    echo '</tr>';
  }

  echo '</tbody>';
  echo '</table>';
}

// functions.php
/**
 * Validate form data for contacts.
 * @param array $data The contact data from the form submission.
 * @return array An array of validation error messages.
 */
function validateContactData(array $data): array
{
  $errors = [];

  // Required fields: name, surname, birthdate
  if (empty($data['name'])) {
    $errors[] = 'First name is required.';
  }
  if (empty($data['surname'])) {
    $errors[] = 'Surname is required.';
  }
  if (empty($data['birthdate'])) {
    $errors[] = 'Birthdate is required.';
  }

  // Validate phone (must be digits)
  if (!preg_match('/^\d{9,15}$/', $data['phone'])) {
    $errors[] = 'Invalid phone number.';
  }

  // Validate email
  if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email address.';
  }

  return $errors;
}
