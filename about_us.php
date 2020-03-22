<!DOCTYPE html>
<?php
require 'includes/_header.php';
$title = "Page a propos de nous" ;
?>
<main>
    <section class="about-us-banner">
        <h1>Meet the team</h1>
        <p>Our passion for video games started when we were young so we love to share it. Non-contractual
            photographs</p>
    </section>
    <div class="gca_about_us align_center">
        <!-- Call  a php pag who is construct X card by user . see in page for more details  -->
        <?php include 'Cards/_About_Us_Card.php'; ?>
</main>

<?php require "includes/_footer.php" ?>