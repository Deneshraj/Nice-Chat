<?php 
    include "../classes/User.php";
    include "../classes/Post.php";
    require "../functions.php";
    include "../classes/Group.php";
?>
<?php $request = true;?>
<?php include("../includes/main_config.php");?>
<?php include "includes/profileheader.php";?>
<?php $lInUserId = $logged_in_user_obj->getId(); ?>

    <div class="vvb">
        <div class="vrbiue">
            <div class="rvkjb">
                <img src="../<?php echo $logged_in_user_obj->getCoverPic(); ?>" alt="" class="kjrb" />
                <img src="../<?php echo $logged_in_user_obj->getProfilePic(); ?>" alt="" class="rgx" /> 
                <?php
                    if(isset($_GET['id'])) {
                        $id = $_GET['id'];
                        if($id == $lInUserId) {
                ?>
                <div class="vvtj">
                    <a href="?id=<?php echo $logged_in_user_obj->getId(); ?>" class="cnkjv"><?php echo $logged_in_user_obj->getUserName(); ?></a>
                    <p style="text-align: center;"><?php echo $logged_in_user_obj->getFirstName(); ?> <?php echo $logged_in_user_obj->getLastName(); ?></p>
                </div>
                <?php
                        }
                        else {
                            $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM users WHERE id = {$id}"));
                ?>
                <div class="vvtj">
                    <a href="?id=<?php echo $id; ?>" class="cnkjv"><?php echo $row['username']; ?></a>
                    <p style="text-align: center;"><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></p>
                </div>
                <div class="vrh">
                    <a href="#" class="rvken">Add Friend</a>
                    <a href="#" class="rvken">Friends</a>
                    <a href="#" class="rvken">Groups</a>
                </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
        <div class="rvjb">
            <h3>Groups</h3>
            <div class="lskn">
                <?php echo $logged_in_user_obj->displayGroups(); ?>
            </div>
        </div>
    </div>
    </div>
</body>
</html>