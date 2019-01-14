<!DOCTYPE html>
<html class="no-js" lang="en">
<?php echo $page["css"]; ?>
<?php echo $page['js'];?>
<style type="text/css">
<?php if(isset($css)){ echo $css; } ?>
</style>
<body>
	<div class="wrapper ">
		<?php echo $page["sidebar"]; ?>
		<div class="main-panel">
			<?php echo $page["header"]; ?>
			<?php echo $content;?>
		</div>
	</div>
	<script type="text/javascript">
		<?php if(isset($javascript)){ echo $javascript; } ?>
	</script>
</body>
</html>