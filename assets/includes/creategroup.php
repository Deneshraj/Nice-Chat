<?php
    if(isset($request)){
        if($request == true) {

?>
<?php
    if(isset($_POST['create_group'])) {
        $group_name = $_POST['group_name'];
        $group_type = $_POST['group_type'];
        $group_desc = $_POST['group_desc'];
        if($group_name != '') {
            $username = $logged_in_user_obj->getUserName();
            $group_name_by_user = $group_name;
            $group_name = str_replace(' ', '', $group_name);
            $group_name = strtolower($group_name);
            $group = new CreateGroup($link, $group_name, $group_name_by_user, $group_type, $group_desc, $username, $logged_in_user_obj->getId(), $logged_in_user_obj->getGroupName());
            $id = $group->getId();
            header("Location: group.php?id={$id}");
        }
    }
?>
    <div class="sviuer rt">
        <div class="frm">
            <form action="" method="post">
                <h3>Create Group</h3>
                <div class="input-group">
                    <label for="groupName">Group Name</label>
                    <input type="text" name="group_name" id="groupName" />
                </div>
                <div class="input-group">
                    <label for="groupType">Group Type</label>
                    <input type="text" name="group_type" id="groupType" />
                </div>
                <div class="input-group">
                    <label for="groupDesc">Group Description</label>
                    <input type="text" name="group_desc" id="groupDesc" />
                </div>
                <button type="submit" name="create_group" class="btn">Create Group</button>
            </form>
        </div>
    </div>
<?php
        }
    }
    else {
        header("Location: ../index.php");
    }
?>
