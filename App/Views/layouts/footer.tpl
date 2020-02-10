
</body>
<script language="JavaScript" type="text/javascript">


    // ----------------- ANSWER -----------------------
    $( "#logout" ).click(function() {

        $.ajax({
            url: "{$smarty.const.SITE_URL}logincontroller/logout",
            type:'GET',
            dataType:"json",
            success: function(response){
                if(response.success){
                  $("#login_msg" ).empty();
                  $("#logout" ).hide();
                  $("#msg" ).empty();
                  //$("#login_msg" ).append('SUCCESSFULLY LOG OUT');
                    location.reload();
                }else{
                  $("#msg" ).empty();
                  $("#login_msg" ).empty();
                  $("#login_msg" ).append((response.errors).join('<br>'));
                  $("#logout" ).show();
                }
            }
        });

    });

</script>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</html>