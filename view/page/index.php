<script>
<?php if (strpos(PATH::$HOST, 'amv-ph34r') !== false): ?>
	var sEmail = 'NZICu34e@tznvy.pbz';
<?php elseif (strpos(PATH::$HOST, 'arschaeffer') !== false): ?>
	var sEmail = 'nyrk.e.fpunrssre@tznvy.pbz';
<?php endif; ?>
</script>

<?php Template::includeTemplate('html_header.php'); ?>
<div class="background"></div>
<?php if (strpos(PATH::$HOST, 'amv-ph34r') !== false): ?>
	<div class="row-fluid">
		<div class="hidden-xs logo"></div>
		<div class="visible-xs logo small"></div>
	</div>
<?php endif; ?>
<div class="container-fluid center-box">
	<div class="row-fluid">
		<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center" id="mainContent">
			<h1>Alex Schaeffer</h1>
			<?php if (strpos(PATH::$HOST, 'amv-ph34r') !== false): ?>
				<p>Web Developer | Programmer | Slacker</p>
			<?php elseif (strpos(PATH::$HOST, 'arschaeffer') !== false): ?>
				<p>Web Developer | Programmer | Database Manager</p>
			<?php endif; ?>
			<div id="social">
				<?php if (strpos(PATH::$HOST, 'amv-ph34r') !== false): ?>
					<span><a href="https://steamcommunity.com/id/AMV-Ph34r/" id="steam-link" title="AMV_Ph34r on Steam" target="_blank"><img src="/img/social/icon-steam.png" alt="steam" /></a></span>
					<span><a href="https://twitter.com/AMV_Ph34r" id="twitter-link" title="@AMV_Ph34r on Twitter" target="_blank"><img src="/img/social/icon-twitter.png" alt="twitter" /></a></span>
					<span><a href="https://www.youtube.com/user/AMVPh34r" id="youtube-link" title="AMVPh34r on YouTube" target="_blank"><img src="/img/social/icon-youtube.png" alt="youtube" /></a></span>
					<span><a href="/twitch" id="twitch-link" title="AMVPh34r on Twitch"><img src="/img/social/icon-twitch.png" alt="twitch" /></a></span>
				<?php elseif (strpos(PATH::$HOST, 'arschaeffer') !== false): ?>
					<span><a href="http://static.amv-ph34r.com/files/resume.pdf" id="resume-link" title="My Resume" target="_blank"><img src="/img/social/icon-document.png" alt="resume" /></a></span>
					<span><a href="https://www.linkedin.com/in/arschaeffer" id="linkedin-link" title="Alex Schaeffer on LinkedIn" target="_blank"><img src="/img/social/icon-linkedin.png" alt="linkedin" /></a></span>
				<?php endif; ?>
			</div>
			<div class="panel-group" id="socialPanels"></div>
		</div>
		<?php Template::includeTemplate('copyright.php'); ?>
	</div>
</div>

<?php Template::includeTemplate('html_footer.php'); ?>
