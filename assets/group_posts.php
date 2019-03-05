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
    if((isset($_GET['post_id']) && (isset($_GET['id'])))) {
        $post_id = (int)$_GET['post_id'];
        $id = (int)$_GET['id'];
        $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM group_posts WHERE id = {$post_id}"));
        $group = new Group($link, $id, $logged_in_user_obj->getUserName());
        $group_post_comments = new GroupPostComments($link, $post_id);

        if(isset($_POST['comment'])) {
            $comment = mysqli_real_escape_string($link, $_POST['comment_body']);
            $group_post_comments->postComment($logged_in_user_obj->getUserName(), $logged_in_user_obj->getId(), "", $comment);
            header("Refresh: 0");
        }

?>
        <div class="vkjer rt">
            <div class="sdkjb gn">
                <?php echo $group->displayGroupPost($post_id); ?>
                <div class="vrjb">
                    <form action="" method="POST">
                        <div class="input-group">
                            <textarea name="comment_body" rows="5" placeholder="Enter your Comments..."></textarea>
                        </div>
                        <button type="submit" name="comment" class="btn">Post Comment</button>
                    </form>
                </div>
                <div class="bwvu">
                    <?php echo $group_post_comments->getComments(); ?>
                </div>
            </div>
        </div>
    </div>
<?php 
    $request = true;
    include "includes/script.php";
    include "includes/footer.php";
?>
<?php        
    }
    else {
        header("Location: ../subpages.php");
    }
?>