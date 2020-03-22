<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Call  a php page who is contain head code about us  -->
    <?php require_once 'includes/_head_fusion.html'; ?>
    <title>About Us pager</title>
</head>
<body>
<?php require_once 'includes/_header.html'; ?>
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
<footer>
    <!-- Call  a php page who is contain footer code  -->
    <?php require_once 'includes/_footer.html'; ?>
</footer>

<?php require_once 'js/_burger_menu_click.js'; ?>
</body>
</html>
