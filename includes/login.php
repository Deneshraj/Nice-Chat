<?php
if($called == true) {
?>

    <div class="skdjn">
        <h3>Login</h3>
        <form action="reg.php" method="post" class="staff">
            <div class="input-group">
                <label for="email">Enter your Email</label>
                <input type="email" id="email" name="email">
                <span class="inval">*Enter your Email</span>
            </div>
            <div class="input-group">
                <label for="password">Enter your Password</label>
                <input type="password" id="password" name="password">
                <span class="inval">*Enter your Password</span>
            </div>
            <button type="submit" name="login" class="btn">Login</button>
        </form>

        <a href="reg.php?source=register" class="jefch">Don't have an account? Sign up</a>
    </div>

<?php
}
else {
    header("Location: ../reg.php");
}
?>