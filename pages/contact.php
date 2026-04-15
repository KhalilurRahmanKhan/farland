            <?php include "../includes/header.php"; ?>
<?php
session_start();
include "../includes/db.php";

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
      <p>We help students achieve their dream of studying abroad.</p>

      <div class="info-box">
        <div class="info-icon">📍</div>
        <div>Kuala Lumpur, Malaysia</div>
      </div>

      <div class="info-box">
        <div class="info-icon">📞</div>
        <div>+60 123 456 789</div>
      </div>

      <div class="info-box">
        <div class="info-icon">📧</div>
        <div>info@farland.com</div>
      </div>
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