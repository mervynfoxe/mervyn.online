<?php Template::includeTemplate('twitch/html_header.php'); ?>
<div class="wrapper">
	<?php Template::includeTemplate('twitch/navbar.php'); ?>
	<div class="player">
		<iframe src="http://player.twitch.tv/?channel=amvph34r&autoplay=true" frameborder="0" scrolling="no" allowfullscreen></iframe>
	</div>
	<div class="chat">
		<iframe src="http://www.twitch.tv/amvph34r/chat?popout=" frameborder="0" scrolling="no"></iframe>
	</div>
</div>
<?php Template::includeTemplate('twitch/html_footer.php'); ?>