<?php
// Load the contacts data from data.php and the functions
$contacts = require_once __DIR__ . '/data.php';
require_once __DIR__ . '/functions.php';

// Include the header partial
require_once __DIR__ . '/header.php';

?>

<h1 style="text-align:center;">Contact List</h1>

<div class="create-new">
  <form method="GET" action="contact_form.php">
    <button type="submit">Create new contact</button>
  </form>
</div>
<br>
<div id="container">
  <?php
  // Call the showTable function to display the contact list table
  showTable($contacts);
  ?>
</div>
<?php
// Include the footer partial
require_once __DIR__ . '/footer.php';
?>