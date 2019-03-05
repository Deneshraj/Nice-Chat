<?php
    if($called == true) {
?>
    <div class="skdbf">
        <a href="reg.php?source=login" class="sdfb">Login</a>
        <a href="reg.php?source=register" class="sdfb">Register</a>
    </div>
<?php
    }
    else {
        header("Location: ../reg.php");
    }
?>