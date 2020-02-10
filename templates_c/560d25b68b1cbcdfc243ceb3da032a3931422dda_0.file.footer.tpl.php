<?php
/* Smarty version 3.1.30, created on 2020-02-10 23:27:54
  from "/var/www/html/mvc/core_one/App/Views/layouts/footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e41cadadab048_82821468',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '560d25b68b1cbcdfc243ceb3da032a3931422dda' => 
    array (
      0 => '/var/www/html/mvc/core_one/App/Views/layouts/footer.tpl',
      1 => 1581031829,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e41cadadab048_82821468 (Smarty_Internal_Template $_smarty_tpl) {
?>

</body>
<?php echo '<script'; ?>
 language="JavaScript" type="text/javascript">


    // ----------------- ANSWER -----------------------
    $( "#logout" ).click(function() {

        $.ajax({
            url: "<?php echo @constant('SITE_URL');?>
logincontroller/logout",
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

<?php echo '</script'; ?>
>
    <?php echo '<script'; ?>

    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"><?php echo '</script'; ?>
>
</html><?php }
}
