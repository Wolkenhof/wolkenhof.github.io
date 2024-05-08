<?php

// !!! WICHTIG - WICHTIG - WICHTIG !!!
// Die folgende Zeile darf unter keinen Umständen unkommentiert in der Produktion stehen!
// Bei Missachtung dieser Warnung kann jeder fremde Host diese API abfragen.
header("Access-Control-Allow-Origin: *");
// !!! WICHTIG - WICHTIG - WICHTIG !!!

// Uncomment to enable debugging on this script
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $to = "info@wolkenhof.com";
  $from = $_POST['mail'];
  $name = $_POST['name'];
  $website = $_POST['website'];
  $datenschutz = $_POST['datenschutz'];
  $comment = $_POST['comment'];
  $subject = "wolkenhof Kontaktformular: Von " . $name . "";
  $message = '
  <html>
  <head>
    <title>Nachricht von '. $name .'</title>
  </head>
  <body>
    <table style="width: 500px; font-family: arial; font-size: 14px;" border="1">
    <tr style="height: 32px;">
      <th align="right" style="width:150px; padding-right:5px;">Name:</th>
      <td align="left" style="padding-left:5px; line-height: 20px;">'. $name .'</td>
    </tr>
    <tr style="height: 32px;">
      <th align="right" style="width:150px; padding-right:5px;">E-Mail:</th>
      <td align="left" style="padding-left:5px; line-height: 20px;">'. $from .'</td>
    </tr>
    <tr style="height: 32px;">
      <th align="right" style="width:150px; padding-right:5px;">Website:</th>
      <td align="left" style="padding-left:5px; line-height: 20px;">'. $website .'</td>
    </tr>
    <tr style="height: 32px;">
      <th align="right" style="width:150px; padding-right:5px;">Nachricht:</th>
      <td align="left" style="padding-left:5px; line-height: 20px;">'. $comment .'</td>
    </tr>
    <tr style="height: 32px;">
      <th align="right" style="width:150px; padding-right:5px;">Datenschutzerklärung:</th>
      <td align="left" style="padding-left:5px; line-height: 20px;">'. $datenschutz .'</td>
    </tr>
    </table>
  </body>
  </html>
  ';
  $headers = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
  $headers .= 'From: wolkenhof Kontaktformular <info@wolkenhof.com>' . "\r\n";
  //$headers .= 'From: ' . $from . "\r\n";

  if (empty($name)) {
    $errors[] = "Bitte geben Sie Ihren Namen an.";
  }

  if (empty($from)) {
    $errors[] = "Bitte geben Sie Ihre E-Mail-Adresse an.";
  } else if (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Bitte geben Sie eine gültige E-Mail-Adresse an.";
  }

  if (empty($_POST['comment'])) {
    $errors[] = "Bitte geben Sie Ihre Nachricht ein.";
  }

  if ($datenschutz != "gelesen") {
    $errors[] = "Bitte akzeptieren Sie die Datenschutzerklärung.";
  }

  if (empty($errors)) {
    $mail = mail($to, $subject, $message, $headers);
    if ($mail) {
      $errorMessage = "<p style='color: #333; font-size: 14px;'>Vielen Dank, " . $name . "! Wir werden uns in Kürze bei Ihnen melden.</p>";
    } else {
      $errorMessage = "<p style='color: red; font-size: 14px;'>Oops, etwas ist schief gelaufen. Bitte versuchen Sie es später noch einmal.</p>";
    }
  } else {
    $allErrors = join('<br/>', $errors);
    $errorMessage = "<p style='color: red; font-size: 14px;'>{$allErrors}</p>";
  }
  echo "$errorMessage";
}
?>