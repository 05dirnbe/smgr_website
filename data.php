<?php include("head.php"); ?>
<iframe id="filebrowser" src="data_app.php" height="875px" width="100%" scrolling="no"
        marginheight="0px" frameborder="0" style="margin-top:-20px;"></iframe>
<?php include("footer.php"); ?>

<script>
    $('document').ready(function(){
        var footerHeight = $("footer").height();
        var headerHeight = document.getElementById("header").offsetHeight;
        var viewportHeight = window.innerHeight;
        var filebrowserHeight = viewportHeight - headerHeight - footerHeight - 8 ;
        var filebrowser = document.getElementById("filebrowser");
        filebrowser.style.height = filebrowserHeight + "px";
    });
</script>
