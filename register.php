<?php
include "inc/user.php";
$error = false;
if (isset($_SESSION['user'])) {
    header("location: index.php");
}


include "html/header.php";
?>

<!-- main -->
<div class="container mt-5 card px-4 shadow-lg p-3 bg-body rounded">
    <h2 class="text-center mt-3 mb-2">Register page</h2>
    <?php
    if ($error) {
        echo "<div class='alert alert-info' role='alert'>";
        echo $error;
        echo "</div>";
    }

    ?>
    <form action="" method="post">
        <div class="group-from mt-3">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">

        </div>
        <div class="group-from mt-3">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">

        </div>
        <div class="group-from mt-3">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="123456kK#">

        </div>
        <div class="group-from mt-3">
            <label for="repassword">Confirm Password:</label>
            <input type="password" name="re_password" class="form-control" id="repassword" placeholder="123456kK#">

        </div>
        <input type="submit" class="btn btn-primary mt-2 " value="login">

        <p>have an account? <a href="login.php">login</a></p>
    </form>
</div>
<?php
include "html/footer.php";
?>