<?php
// Header partial: used to define the document structure and common meta information
// Variables like $title, $author, etc. can be dynamically passed to customize content.

$title = $title ?? 'DWES'; // Default title
$author = $author ?? 'Vicente Ricardo Pau Valero'; // Default author
$headerText = $headerText ?? 'Curso 24/25'; // Default header text

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="<?= htmlspecialchars($author) ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title) ?></title>
  <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    h1 {
      text-align: center;
    }

    #container {
      border: 2px solid #000;
      padding: 20px;
      text-align: center;
    }

    .error {
      color: red;
    }

    .birth {
      color: green;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      text-align: center;
      /* Center content in the table cells */
    }

    th,
    td {
      padding: 8px;
      border: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    tbody tr:nth-child(odd) {
      background-color: #f9f9f9;
    }

    tbody tr:nth-child(even) {
      background-color: #ffffe0;
    }

    button {
      padding: 5px 10px;
    }

    .create-new {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <header>
    <h1><?= htmlspecialchars($headerText) ?></h1>
  </header>