<?php
    if(isset($request)) {
        if($request) {

?>
<?php
    $groups = $logged_in_user_obj->getGroupName();
    $groups_array = explode(',', $groups);

    $str = "<div class='lskn'>";

    foreach($groups_array as $i) {
        if($i == " " || $i == "\n" || $i == "\t") {
            continue;
        }

        $i = str_replace(' ', '', $i);
        if($i == '') {
            continue;
        }
        $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM groups WHERE group_name = '{$i}'"));
        $id = $row['id'];
        $str .= "<div class='cl'>
            <a href='group.php?id=$id'>
                <img src='{$row['group_profile_pic']}' alt='$i' />
                <p>$i</p>
            </a>
        </div>";
    }

    $str .= "   <div class='cl cktm'>
            <a href='#'>
                <svg xmlns='http://www.w3.org/2000/svg' width='150' height='150' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-plus-circle'>
                    <circle cx='12' cy='12' r='10'></circle>
                    <line x1='12' y1='8' x2='12' y2='16'></line>
                    <line x1='8' y1='12' x2='16' y2='12'></line>
                </svg>
                <p>Add To a Group</p>
            </a>
        </div>    
    </div>"
?>

            <div class="csjek rt">
                <div class="dkbf">
                    <h3>Your Groups</h3>
                    <?php echo $str; ?>

                </div>
            </div>

<?php
        }
    }else {
        header("Location: ../../index.php");
    }
?>