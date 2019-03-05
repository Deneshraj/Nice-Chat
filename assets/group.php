<?php 
    include "../classes/User.php";
    include "../classes/Post.php";
    require "../functions.php";
    include "../classes/Group.php";
?>
<?php $request = true;?>
<?php include("../includes/main_config.php");?>
<?php include "includes/header.php";?>
<?php
    if(isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $group = new Group($link, $id, $logged_in_user_obj->getUserName());
        if(isset($_POST['group_post'])) {
            $result1 = false;
            $result2 = false;
            $result = true;
            $image_name = "";

            $group_post_body = $_POST['group_post_body'];
            if(isset($_FILES['pic'])) {
                $target_dir = "../images/group/post/";
                $target_file = $target_dir . basename($_FILES['pic']['name']);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES['pic']['tmp_name']);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
                // Check if file already exists
                $i = 1;
                $target_file1 = $target_file;
                while (file_exists($target_file1)) {
                    $target_file1 = $target_file . $i;
                    $i = $i + 1;
                }
                $target_file = $target_file1;
                $image_name = $target_file;
                // Check file size
                if ($_FILES['pic']['size'] > 2000000) {
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES['pic']['tmp_name'], $target_file)) {
                        $result = true;
                    } else {
                        $result = false;
                    }
                }                
            }
            else {
                echo "File not Selected...";
                $result = false;
            }
            if($result) {
                $result2 = $group->post($id, $group_post_body, $logged_in_user_obj->getUserName(), ',', "{$image_name}");
            }

            if($result2 == false) {
                echo "There is an Error in uploading!!!";
            }
        }

        if(isset($_GET['post_id'])) {
            $post_id = $_GET['post_id'];
            header("Location: group_posts.php?post_id={$post_id}&id={$id}");
        }

    }
    else {
        header("Location: subpages.php");
    }
?>

<?php

?>

    <div class="sdkjb rt">
        <div class="vsju">
            <?php
                if($group->isAdmin($logged_in_user_obj->getUserName())) {

            ?>
            <form enctype="multipart/form-data" id="coverPicForm">
                <label for="coverPic" class="dtb" data-toggle="changeCoverPic" data-placement="bottom" title="Change Cover pic?">
                    <input type="file" name="file" class="dlj" id="coverPic" />
                    <img src="<?php echo $group->getGroupCoverPic(); ?>" alt="Cover Picture">
                </label>
            </form>
            <?php
                }
                else {
                    echo "<div class='oij'>
                        <img src='{$group->getGroupCoverPic()}' alt='Profile Picture' />     
                    </div>";
                }
            ?>

            <div class="lkhu">
                <?php
                    if($group->isAdmin($logged_in_user_obj->getUserName())) {

                ?>
                <form enctype="multipart/form-data" id="profilePicForm">
                    <label for="profilePic" class="oij" data-toggle="changeProfilePic" data-placement="bottom" title="Change Profile pic?">
                        <input type="file" name="file" class="dlj" id="profilePic" />
                        <img src="<?php echo $group->getGroupProfilePic();?>" alt="Profile Picture"/>
                    </label>
                </form>
                <?php
                    }
                    else {
                        echo "<div class='oij'>
                            <img src='{$group->getGroupProfilePic()}' alt='Profile Picture' />     
                        </div>";
                    }
                ?>

                <h3><?php echo $group->getGroupName(); ?></h3>
                <div class="juh">
                    <div class="ejb">
                        <button class="_veb" onclick="flwpg()"><i class="fas fa-wifi"></i> <span class="jrhv">Follow</span></button>
                        <button class="_veb" onclick="flwpg()"><i class="far fa-heart"></i> <span class="jsklv">Like</span></button>
                        <?php
                            if($group->isAdmin($logged_in_user_obj->getUserName())) {
                        ?>
                            <div class="rver">
                                <button class="c_ienf" onclick="dsplMeM()" id="followers">Followers</button>
                                <div class="btrkj" id="dispfol">
                                    <?php echo $group->displayFollowers(); ?>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="slk">
            <?php
                if($group->isAdmin($logged_in_user_obj->getUserName())) {

            ?>
                <div class="ldsj">
                    <form action="" method="post" class="kdsdkj" enctype="multipart/form-data">
                        <div class="input-group">
                            <textarea name="group_post_body" id="post" rows="5" placeholder="Wanna Say Something?"></textarea>
                        </div>
                        <div class="kdsjbf">
                            <label for='pic' class="dsbf">Add Image/Video
                                <input type="file" class="kjsd" id='pic' class="file-input js-tooltip" name='pic'>
                                <!-- accept="image/gif,image/jpeg,image/jpg,image/png,video/mp4,video/x-m4v" multiple="" -->
                            </label>
                            <a href="#" class="dsbf" name='tags'>Tag Members</a> 
                        </div>
                    
                        <button type="submit" name="group_post" class="btn">Post</button>
                    </form>
                </div>

            <?php
                }
            ?>
        </div>

        <?php
            echo $group->displayGroupPosts();
        ?>
    </div>
    </div>
    <script>
        function dsplMeM() {
            if($('#dispfol').css("display") == "block")
                $('#dispfol').hide(200, 'linear');
            else 
                $('#dispfol').show(200, 'linear');
        }
    </script>
<?php 
    $request = true;
    include "includes/script.php";
    include "includes/footer.php";
?>

            
