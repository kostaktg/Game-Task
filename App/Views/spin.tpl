
{include file="layouts/header.tpl"}

<input type="button" class="spin" value="Spin">

<div id="spin_result"></div>

<div><span>If you need all statistic data get $all_data from controller HomeController</span></div>

<script language="JavaScript" type="text/javascript">



    // -------------- SUBMISSION -----------------------
    $( ".spin" ).click(function() {
        var iterator=0;
        $.ajax({
            url: "{$smarty.const.SITE_URL}homecontroller/spin",
            type:'GET',

            success: function(response){
                console.log(response);
                $("#spin_result").empty();
                $("#spin_result").append('Spin '+iterator+' - '+response);
                iterator++
            }
        });

    });


</script>


{include file="layouts/footer.tpl"} 