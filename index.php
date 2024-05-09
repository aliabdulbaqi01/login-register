<?php
include "inc/user.php";
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}
include "html/header.php";
?>
<div class="container mt-5">
<h3>Hello <?= $_SESSION['user'] ?></h3>

<h3><a href="logout.php" class="btn mt-3 btn-primary">logout</a></h3>
</div>
<?php
include "html/footer.php";
?>