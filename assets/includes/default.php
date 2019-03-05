<?php
    if(isset($request)) {
        if($request == true){
?>
        <div class="cehb rt">
                    <div class="lsfk">
                        <h3>Your Groups</h3>
                        <p>Currently You are in no group</p>
                    </div>
                    <div class="sljfb">
                        <div class="sdljn">
                            <h3>Suggested Groups</h3>
                            <div class="lskn">
                                <div class="cl">
                                    <img src="https://www.eccouncil.org/wp-content/uploads/2016/07/CEH-portfolio.jpg" alt="Group 1">
                                    <a href="?source=group&groupid=1">Group 1</a>
                                </div>
                                <div class="cl">
                                    <img src="https://www.eccouncil.org/wp-content/uploads/2016/07/CEH-portfolio.jpg" alt="Group 1">
                                    <a href="?source=group&groupid=1">Group 2</a>
                                </div>
                                <div class="cl">
                                    <img src="https://www.eccouncil.org/wp-content/uploads/2016/07/CEH-portfolio.jpg" alt="Group 1">
                                    <a href="?source=group&groupid=1">Group 3</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>   
            </div> 
<?php        
            }
        }
        else {
            header("Location: ../index.php");
        }

?>