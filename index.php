<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = $_POST['name'];
  $number = $_POST['number'];
  $wing = $_POST['wing'];
  $date = $_POST['date'];
  $from = $_POST['from'];
  $to = $_POST['to'];
  $sound = isset($_POST['sound']) ? "Yes" : "No";

  $toEmails = "your-email@example.com, (add-other-emails-here)";
  $subject = "Newlands Sai Centre Booking Request";

  $message = "Name: $name\n";
  $message .= "Contact Number: $number\n";
  $message .= "Wing: $wing\n";
  $message .= "Date Required: $date\n";
  $message .= "Time: $from - $to\n";
  $message .= "Require Sound System: $sound\n";

  $headers = "From: noreply@yourdomain.com";

  mail($toEmails, $subject, $message, $headers);

  $submitted = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Newlands Sai Centre Booking Form</title>

  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: #f4f6f8;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .container {
      background: #ffffff;
      padding: 30px 35px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
      width: 100%;
      max-width: 500px;
    }

    h1 {
      text-align: center;
      margin-bottom: 5px;
      font-size: 26px;
    }

    h2 {
      text-align: center;
      margin-top: 0;
      color: #666;
      font-weight: normal;
      font-size: 15px;
      margin-bottom: 25px;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
      font-size: 14px;
    }

    input,
    select {
      width: 100%;
      padding: 10px 12px;
      margin-top: 6px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 14px;
      box-sizing: border-box;
    }

    .time-row {
      display: flex;
      gap: 10px;
    }

    .checkbox-row {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-top: 18px;
      font-size: 14px;
    }

    button {
      margin-top: 25px;
      width: 100%;
      padding: 12px;
      background: #8b0000;
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background: #a80000;
    }

    .note {
      line-height: 1.6;
    }

    .note h3 {
      margin-top: 0;
      text-align: center;
    }

    .note ul {
      padding-left: 18px;
    }

    .success {
      text-align: center;
      color: green;
      font-weight: bold;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <div class="container">

<?php if (!isset($submitted)): ?>

      <h1>Aum Sai Ram</h1>
      <h2>Newlands Sai Centre Booking Form</h2>

      <form method="POST">
        <label>Name of Convenor</label>
        <input type="text" name="name" required />

        <label>Convenor Contact Number</label>
        <input type="tel" name="number" required />

        <label>Wing</label>
        <select name="wing" required>
          <option value="">Select Wing</option>
          <option>Education</option>
          <option>Devotional</option>
          <option>Seva</option>
          <option>Ladies</option>
          <option>Youth</option>
        </select>

        <label>Date Required</label>
        <input type="date" name="date" required />

        <label>Time</label>
        <div class="time-row">
          <input type="time" name="from" required />
          <input type="time" name="to" required />
        </div>

        <div class="checkbox-row">
          <input type="checkbox" name="sound" />
          <label>Require Sound System</label>
        </div>

        <button type="submit">Submit Booking</button>
      </form>

<?php else: ?>

      <div class="success">Booking submitted successfully.</div>

      <div class="note">
        <h3>Important Note</h3>
        <p>Please ensure that the following are done before you hand back the centre key:</p>

        <ul>
          <li>Sound & speakers switched off</li>
          <li>All lights (including stage side light, verandah) are off</li>
          <li>All windows closed</li>
          <li>Side rooms, downstairs rooms and toilets locked</li>
          <li>All tissues and water bottles disposed of</li>
          <li>Chairs set neatly</li>
          <li>Alarm activated</li>
          <li>Main gate is closed</li>
        </ul>

        <p><strong>If the convenor is not available to ensure the above, please nominate a substitute.</strong></p>
      </div>

<?php endif; ?>

  </div>
</body>
</html>
