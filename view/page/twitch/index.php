<?php Template::includeTemplate('twitch/html_header.php'); ?>
<div class="wrapper">
	<?php Template::includeTemplate('twitch/navbar.php'); ?>
	<div class="panel player">
		<!-- <div class="mask"></div> -->
		<iframe src="https://player.twitch.tv/?channel=<?= Template::get('sTwitchChannel'); ?>&autoplay=true" frameborder="0" scrolling="no" allowfullscreen></iframe>
	</div>
	<div class="panel chat">
        <!-- <div class="mask"></div> -->
        <iframe src="https://www.twitch.tv/embed/<?= Template::get('sTwitchChannel'); ?>/chat" frameborder="0" scrolling="no"></iframe>
	</div>
</div>
<?php Template::includeTemplate('twitch/modals/poll.php'); ?>
<?php Template::includeTemplate('twitch/html_footer.php'); ?>
