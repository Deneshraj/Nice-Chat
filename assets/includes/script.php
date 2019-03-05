<?php
    if(isset($request)){
        if($request == true) {
?>
            <script>
        var response = "";                            
        function check() {
            var username = "<?php echo $logged_in_user_obj->getUserName();?>";
            var selector = "._veb";
            var ajaxreq = $.ajax ({
                type: 'POST',
                cache: false,
                data: "like=1&id=" + "<?php echo $group->getId(); ?>" + "&username=" + "<?php echo $logged_in_user_obj->getUserName(); ?>" + "&check=true",
                url: "../validation/handler/follow_page.php",
                success: function(result) {
                    if(result == 1) {
                        $(selector).addClass("act");
                        $('.jsklv').html(" Dislike");
                        $('.jrhv').html(" UnFollow");
                    }
                    else {
                        $(selector).removeClass("act");
                        $('.jsklv').html(" Like");
                        $('.jrhv').html(" Follow");
                    }
                }
            });
        }

        check();

        function lk(id) {
            var selector = '#lkbtn' + id;
            var selector2 = '#unlkbtn' + id;
            var ajaxreq = $.ajax({
                type: 'POST',
                cache: false,
                data: "like=1&id=" + id + "&username=" + "<?php echo $logged_in_user_obj->getUserName();?>" + "&check=false",
                url: "../validation/handler/likes_handler.php",
                success: function(result) {
                    if(result == 2) {
                        $(selector).removeClass('act');
                    }
                    else if(result == 1){
                        $(selector).addClass('act');
                    }
                    else if(result == 3) {
                        $(selector).addClass('act');
                        $(selector2).removeClass('act');
                    }
                }
            });
        }

        function unlk(id) {
            var selector = '#unlkbtn' + id;
            var selector2 = '#lkbtn' + id;
            var ajaxreq = $.ajax({
                type: 'POST',
                cache: false,
                data: "unlike=1&id=" + id + "&username=" + "<?php echo $logged_in_user_obj->getUserName();?>" + "&check=false",
                url: "../validation/handler/unlikes_handler.php",
                success: function(result) {
                    if(result == 2) {
                        $(selector).removeClass('act');
                    }
                    else if(result == 1){
                        $(selector).addClass('act');
                    }
                    else if(result == 3) {
                        $(selector).addClass('act');
                        $(selector2).removeClass('act');
                    }
                }
            });
        }

        function flwpg() {
            var selector = "._veb";
            var username = "<?php echo $logged_in_user_obj->getUserName();?>";
            var ajaxreq = $.ajax ({
                type: 'POST',
                cache: false,
                data: "like=1&id=" + "<?php echo $group->getId(); ?>" + "&username=" + username + "&check=false",
                url: "../validation/handler/follow_page.php",
                success: function(result) {
                    if(result == 1) {
                        $(selector).addClass("act");
                        $('.jsklv').html(" Dislike");
                        $('.jrhv').html(" UnFollow");
                    }
                    else {
                        $(selector).removeClass("act");
                        $('.jsklv').html(" Like");
                        $('.jrhv').html(" Follow");
                    }
                }
            });
        }

        function sendToServer(response) {
            $.ajax({
                url: '../validation/handler/cndppicup.php',
                cache: false,
                type: 'POST',
                data: "location=" + response + "&id=" + "<?php echo $group->getId(); ?>",
                success: function(response2) {
                    alert(response);
                    alert(response2);
                }
            });
        }

        function sendToServerPPic(response) {
            $.ajax({
                url: '../validation/handler/pndcpicup.php',
                cache: false,
                type: 'POST',
                data: "location=" + response + "&id=" + "<?php echo $group->getId(); ?>",
                success: function(response2) {
                    alert(response);
                    alert(response2);
                }
            });
        }

        $(document).ready(function() {
            var x = window.response;
            $("#coverPicForm").on("change", function(e) {
                // var file_data = $('#coverPicForm').prop('files')[0];   
                // var form_data = new FormData(this);                  
                // form_data.append('file', file_data);
                // alert(form_data);
                $.ajax({
                    url: '../validation/handler/cndppic.php', // point to server-side PHP script 
                    dataType: 'text',  // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: new FormData(this),
                    type: 'POST',
                    success: function(php_script_response){
                        window.response = php_script_response;
                        alert("location=" + window.response)
                        sendToServer(php_script_response); // display response from the PHP script, if any
                    }
                });
            });

            $("#profilePicForm").on("change", function(e) {
                $.ajax({
                    url: '../validation/handler/pndcpic.php',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: new FormData(this),
                    type: 'POST',
                    success: function(response) {
                        alert("Location: " + response);
                        sendToServerPPic(response);
                    }
                });
            });
        });
    </script>
<?php
        }
    }

    else {
        header("Location: ../subpages.php");
    }
?>