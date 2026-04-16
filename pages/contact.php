<?php require_once(__DIR__ . '/../config.php'); ?>
<?php include(BASE_PATH . '/includes/db.php'); ?>
<?php include(BASE_PATH . '/includes/header.php'); ?>
<?php
session_start();

/* HANDLE FORM */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $message = trim($_POST['message']);

  if (!empty($name) && !empty($email) && !empty($message)) {

    /* ✅ SECURE INSERT (PREPARED STATEMENT) */
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
      $_SESSION['success'] = "Message sent successfully!";
    } else {
      $_SESSION['success'] = "Something went wrong!";
    }

    $stmt->close();
  }

  /* ✅ PREVENT RESUBMISSION */
  header("Location: contact.php");
  exit();
}
?>

<section class="contact-section">

  <div class="container">

    <!-- LEFT -->
    <div class="contact-info">
      <h2>Contact Us</h2>
      <p>Have any questions or want to discuss your study plans? Fill out the form below and we’ll get back to you as soon as possible.</p>
    </div>

    <!-- RIGHT -->
    <div class="contact-form">
      <form method="POST" id="contactForm">

        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>

        <button type="submit">Send Message</button>

      </form>
    </div>

  </div>

</section>

<!-- SUCCESS MODAL -->
<?php if (isset($_SESSION['success'])): ?>
<div class="modal" id="successModal">
  <div class="modal-content">
    <div class="modal-icon">✅</div>
    <h3>Success</h3>
    <p><?php echo $_SESSION['success']; ?></p>
    <button onclick="closeModal()">OK</button>
  </div>
</div>
<?php unset($_SESSION['success']); endif; ?>


<?php include "../includes/footer.php"; ?>