<?php 

    session_start();
    require "functions.php";

    $request = true;
    require "validation/register.php";

    require "validation/login.php";

    if(isset($_COOKIE['user'])) {
        $username = $_COOKIE['user'];
        $username_query = mysqli_query($link, "SELECT `login` FROM users WHERE username = '$username'");
        $row = mysqli_fetch_assoc($username_query);
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
    }

    if(isset($_SESSION['login'])) {
        if($_SESSION['login'] == true) {
        header("Location: index.php");
    }
}
?>
<?php 
    $include = true;
    include("includes/header.php");
?>
    </nav>
        <?php
            if(isset($_GET['source'])) {
                $source = $_GET['source'];
                $called = true;
                switch($source) {
                    case 'login':
                        // Including the Login page
                        include("includes/login.php");
                        break;
                    case 'register':
                        include("includes/register.php");
                        break;
                    default:
                        include("includes/loginreg.php");
                        break;
                }
            }
            else {
                header("Location: reg.php?source=1");
            }
        ?>
    </div>

    <script>

            function check() {
                if($("#firstName").val().length > 0) {
                    $(this).next().addClass("focused");
                }
                else {
                    console.log(" Has No Value ");
                }

                if($("#lastName").val().length > 0) {
                    $(this).next().addClass("focused");
                }
                else {
                    console.log(" Has No Value ");
                }

                if($("#username").val().length > 0) {
                    console.log("Hello 1");
                    $(this).next().addClass("focused");
                }
                else {
                    console.log(" Has No Value ");
                }

                if($("#email1").val().length > 0) {
                    $(this).next().addClass("focused");
                }
                else {
                    console.log(" Has No Value ");
                }

                if($("#email2").val().length > 0) {
                    $(this).next().addClass("focused");
                }
                else {
                    console.log(" Has No Value ");
                }

                if($("#password0").val().length > 0) {
                    $(this).next().addClass("focused");
                }
                else {
                    console.log(" Has No Value ");
                }
                
                if($("#password1").val().length > 0) {
                    $(this).next().addClass("focused");
                }
                else {
                    console.log(" Has No Value ");
                }
            }

        $(document).ready(function() {

            $('#nav').addClass('navbar-absolute');

            $('.input-group input').focusout(function() {
                if($(this).val() === "") {
                    console.log(" Has No Value ");
                    $(this).addClass('invalid');
                    $(this).parent().children('.inval').show().addClass('invalt');
                }
                else {
                    console.log(" Has Value ");
                    $(this).removeClass('invalid');
                    $(this).parent().children('.inval').hide().removeClass('invalt');
                }
            });

        });

    </script>
</body>
</html>