<?php Template::includeTemplate('twitch/html_header.php'); ?>
<div class="wrapper">
	<?php Template::includeTemplate('twitch/navbar.php'); ?>
	<div class="panel player">
		<iframe src="http://player.twitch.tv/?channel=<?= Template::get('sTwitchChannel'); ?>&autoplay=true" frameborder="0" scrolling="no" allowfullscreen></iframe>
	</div>
	<div class="panel chat">
		<iframe src="http://www.twitch.tv/<?= Template::get('sTwitchChannel'); ?>/chat?popout=" frameborder="0" scrolling="no"></iframe>
	</div>
</div>
<?php Template::includeTemplate('twitch/modals/poll.php'); ?>
<?php Template::includeTemplate('twitch/html_footer.php'); ?>