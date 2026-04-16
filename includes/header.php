<?php require_once(__DIR__ . '/../config.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Farland</title>

  <link rel="stylesheet" href="<?= BASE_URL ?>css/style.css">
</head>
<body>

<nav class="navbar" id="navbar">

<div class="logo">
  <a href="#">
    <img src="<?= BASE_URL ?>images/logo.PNG">
  </a>
</div>

  <!-- Menu -->
  <ul class="nav-links" id="navLinks">

    <li><a href="<?= BASE_URL ?>">Home</a></li>
    <li><a href="<?= BASE_URL ?>#about">About</a></li>
    <li><a href="<?= BASE_URL ?>#services">Services</a></li>
    <li><a href="<?= BASE_URL ?>pages/contact.php">Contact</a></li>

    <!-- Dropdown
    <li class="dropdown">
      <a href="#" class="drop-btn">
        Services <span class="arrow">▼</span>
      </a>

      <div class="dropdown-menu">
        <a href="#">🎓 Admission</a>
        <a href="#">🛂 Visa Support</a>
        <a href="#">💬 Counseling</a>
      </div>
    </li> -->

  <li></li>

  </ul>

  <!-- Right -->
  <div class="nav-right">
    <a href="<?= BASE_URL ?>pages/apply.php"  class="cta-btn">Apply Now</a>

    <div class="menu-toggle" id="menuToggle">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

</nav>