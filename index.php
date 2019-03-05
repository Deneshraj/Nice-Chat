<?php
    include "classes/User.php";
    include "classes/Post.php";
    require "functions.php";
?>
<?php include("includes/main_config.php");?>
<?php 
    $include = true;
    include("includes/header.php");
?>
        <ul class="right">
            <li><img src="<?php echo $profile_pic?>" class="img" /></li>
            <li><a href="assets/profile.php?id=<?php $logged_in_user_obj->getId(); ?>"><?php echo "$username";?></a></li>
            <li><a href="#"><i class="fas fa-home"></i></a></li>
            <li><a href="#"><i class="fas fa-envelope"></i></a></li>
            <li><a href="#"><i class="fas fa-bell"></i></a></li>
            <li><a href="#"><i class="fas fa-user-friends"></i></a></li>
            <li><a href="#"><i class="fas fa-cog"></i></a></li>
            <li><a href="index.php?source=logout"><i class="fas fa-power-off" alt="logout"></i></a></li>
        </ul>
        </nav>
    <div class="ssdfu">
        <div class="ksdjbj">
            <div class="kdb">
                <div class="sfejn">
                    <img src="<?php echo $logged_in_user_obj->getProfilePic();?>" alt="" class="dhjk" />
                    <a href="assets/profile.php?id=<?php echo $logged_in_user_obj->getId();?>" class="kesjw"><?php echo $logged_in_user_obj->getUserName() ?></a>
                </div>
                <div class="mndksj">
                    <div class="wcielk">
                        <a class="ksjdf" href="assets/subpages.php?source=group"><i class="fas fa-plus"></i> Groups</a>
                    </div>
                    <div class="wcielk">
                        <a class="ksjdf" href="assets/subpages.php?source=communities"><i class="fas fa-plus"></i> Communities</a>
                    </div>
                    <div class="wcielk">
                        <a class="ksjdf" href="assets/profile.php?id=<?php echo $logged_in_user_obj->getId(); ?>"><i class="fas fa-plus"></i> Profile</a>
                    </div>
                    <div class="wcielk">
                        <a class="ksjdf" href="assets/subpages.php?source=courses"><i class="fas fa-plus"></i> Enrolled Courses</a>
                    </div>
                    <div class="wcielk">
                        <a class="ksjdf" href="assets/subpages.php?source=events"><i class="fas fa-plus"></i> Events</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="sdkjb rt">
            <div class="ldsj">
                <form action="" method="post" class="kdsdkj" enctype="multipart/form-data">
                    <div class="input-group">
                        <textarea name="post" id="post" rows="5" placeholder="Wanna Say Something?"></textarea>
                    </div>
                    <div class="kdsjbf">
                        <label for="pic" class="dsbf">Add Image/Video
                            <input type="file" class="kjsd" id="pic" name="media[]" accept="image/gif,image/jpeg,image/jpg,image/png,video/mp4,video/x-m4v" multiple="" class="file-input js-tooltip" data-original-title="Add photos or video" data-delay="150">
                        </label>
                        <a href="#" class="dsbf">Tag Friends</a> 
                    </div>
                   
                    <button type="submit" name="status" class="btn">Post</button>
                </form>
            </div>

            <div class="lslj">
            </div>
        </div>
    </div>  
    
    <script>
        $('head').append('<link rel="stylesheet" href="styles/main.css?date=<?php echo date('Y-m-d H:i:s');?>" />');
        $(document).ready(function() {
            $('#nav').addClass('navbar-fixed');
        });
    </script>
</body>
</html>