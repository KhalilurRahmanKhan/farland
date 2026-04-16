<?php require_once(__DIR__ . '/../config.php'); ?>
<?php include(BASE_PATH . '/includes/db.php'); ?>
<?php include(BASE_PATH . '/includes/header.php'); ?>
<?php
session_start();

/* HANDLE FORM */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $phone = trim($_POST['phone']);
  $country = trim($_POST['country']);
  $message = trim($_POST['message']);

  if (!empty($name) && !empty($email)) {

    $stmt = $conn->prepare("INSERT INTO applications (name, email, phone, country, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $country, $message);

    if ($stmt->execute()) {
      $_SESSION['success'] = "Application submitted successfully!";
    } else {
      $_SESSION['success'] = "Something went wrong!";
    }

    $stmt->close();
  }

  header("Location: apply.php");
  exit();
}
?>

<section class="apply-section">

  <div class="apply-container">

    <h1>Apply Now</h1>
    <p>Start your journey to study abroad with us.</p>

    <form method="POST" class="apply-form">

      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="text" name="phone" placeholder="Phone Number">

      <select name="country">
        <option value="">Preferred Country</option>
        <option>UK</option>
        <option>Canada</option>
        <option>Australia</option>
        <option>USA</option>
        <option>Malaysia</option>
      </select>

      <textarea name="message" placeholder="Your Message"></textarea>

      <button type="submit">Submit Application</button>

    </form>

  </div>

</section>

<!-- SUCCESS MODAL -->
<?php if (isset($_SESSION['success'])): ?>
<div class="modal" id="successModal">
  <div class="modal-content">
    <div class="modal-icon">🎉</div>
    <h3>Success</h3>
    <p><?php echo $_SESSION['success']; ?></p>
    <button id="closeModalBtn">OK</button>
  </div>
</div>
<?php unset($_SESSION['success']); endif; ?>

<?php include "../includes/footer.php"; ?>