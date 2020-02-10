<?php
/* Smarty version 3.1.30, created on 2020-02-10 23:36:37
  from "/var/www/html/mvc/core_one/App/Views/spin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e41cce507f949_96994331',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b23339c649dec34f108d7fbbcb4ea0eca2a47dfa' => 
    array (
      0 => '/var/www/html/mvc/core_one/App/Views/spin.tpl',
      1 => 1581370595,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/header.tpl' => 1,
    'file:layouts/footer.tpl' => 1,
  ),
),false)) {
function content_5e41cce507f949_96994331 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<input type="button" class="spin" value="Spin">

<div id="spin_result"></div>

<div><span>If you need all statistic data get $all_data from controller HomeController</span></div>

<?php echo '<script'; ?>
 language="JavaScript" type="text/javascript">



    // -------------- SUBMISSION -----------------------
    $( ".spin" ).click(function() {
        var iterator=0;
        $.ajax({
            url: "<?php echo @constant('SITE_URL');?>
homecontroller/spin",
            type:'GET',

            success: function(response){
                console.log(response);
                $("#spin_result").empty();
                $("#spin_result").append('Spin '+iterator+' - '+response);
                iterator++
            }
        });

    });


<?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:layouts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 <?php }
}
