<link href="<?php echo CSSPATH;?>radar_admin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSSPATH;?>base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=JSPATH?>tiny_mce/tiny_mce.js"></script> 
<script type="text/javascript" src="<?=JSPATH?>jquery.js"></script>
<script type="text/javascript" src="<?=JSPATH?>jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo JSPATH;?>jquery.colorbox-min.js"></script>
<link href="<?php echo CSSPATH;?>colorbox.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.clearfix:after {
	content: ".";
	display: block;
	height: 0;
	clear: both;
	visibility: hidden;
}
</style>
<script>
	$(function() {
		$( "#tabs" ).tabs();
		$(".lightbox").colorbox({iframe:true, innerWidth:600, innerHeight:710, opacity:0.75});
	});
	</script>

<!--[if IE]>
<style type="text/css">
  .clearfix {
    zoom: 1;     /* triggers hasLayout */
    }  /* Only IE can see inside the conditional comment
    and read this CSS rule. Don't ever use a normal HTML
    comment inside the CC or it will close prematurely. */
</style>
<![endif]-->