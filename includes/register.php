<?php
    if($called == true) {
?>

        <div class="skdjn">
            <h3>Register</h3>
            <form action="reg.php" method="post">
                <div class="input-group">
                    <label for="firstName">Enter your First Name</label>
                    <input type="text" id="firstName" name="first_name" required />
                    <span class="inval">*Enter your First Name</span>
                </div>
                <div class="input-group">
                    <label for="lastName">Enter your Last Name</label>
                    <input type="text" id="lastName" name="last_name" required />
                    <span class="inval">*Enter your Last Name</span>
                </div>
                <div class="input-group">
                    <label for="username">Enter your Username</label>
                    <input type="text" id="username" name="username" required />
                    <span class="inval">*Enter your Userame</span>
                </div>
                <div class="input-group">
                    <label for="email1">Enter your Email</label>
                    <input type="email" id="email1" name="em" required />
                    <span class="inval">*Enter your Email</span>
                </div>
                <div class="input-group">
                    <label for="email2">Confirm Email</label>
                    <input type="email" id="email2" name="confem" required />
                    <span class="inval">*Enter your Email again Correctly</span>
                </div>
                <div class="input-group">
                    <label for="password0">Enter your Password</label>
                    <input type="password" id="password0" name="pass" required />
                    <span class="inval">*Enter your password</span>
                </div>
                <div class="input-group">
                    <label for="password1">Confirm Password</label>
                    <input type="password" id="password1" name="confpass" required />
                    <span class="inval">*Enter same password again</span>
                </div>
                <button type="submit" name="register" class="btn">Register</button>
            </form>

            <a href="reg.php?source=login" class="jefch">Already having an account? Login</a>
        </div>

<?php
    }
    else {
        header("Location: ../index.php");
    }
?>