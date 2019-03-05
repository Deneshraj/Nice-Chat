<?php
    if(isset($request)) {
        if($request == true) {
?>
    <script>
        $('#search').typeahead({
            source: function(query, process) {
                val = $(this).val();
                return $.ajax({
                    url: '../validation/handler/search.php',
                    type: 'post',
                    data: "query=" + query + "&val=" + val,
                    dataType: 'json',
                    success: function(json) {
                        return typeof json.options == 'undefined' ? false : process(json.options);
                    }
                });
            }
        });
        $('[data-toggle="changeCoverPic"]').tooltip();
        $('[data-toggle="changeProfilePic"]').tooltip();

    </script>
</body>
</html>

<?php
            }
        }
        else {
            header("Location: ../index.php");
        }
?>