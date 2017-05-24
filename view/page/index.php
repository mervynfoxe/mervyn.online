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
		<div class="col-lg-6 col-lg-offset-4 col-md-6 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center" id="mainContent">
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
					<span><a href="#panel-other-links" id="other-links" title="Everywhre else" data-toggle="collapse" data-parent="#socialPanels"><img src="/img/social/icon-other.png" alt="other" /></a></span>
				<?php elseif (strpos(PATH::$HOST, 'arschaeffer') !== false): ?>
					<span><a href="http://static.amv-ph34r.com/files/resume.pdf" id="resume-link" title="My Resume" target="_blank"><img src="/img/social/icon-document.png" alt="resume" /></a></span>
					<span><a href="https://www.linkedin.com/in/arschaeffer" id="linkedin-link" title="Alex Schaeffer on LinkedIn" target="_blank"><img src="/img/social/icon-linkedin.png" alt="linkedin" /></a></span>
				<?php endif; ?>
			</div>
			<div class="panel-group" id="socialPanels">
				<?php if (strpos(PATH::$HOST, 'amv-ph34r') !== false): ?>
					<div class="panel panel-default">
						<div id="panel-other-links" class="panel-collapse collapse">
							<div class="panel-body flex-container">
								<div class="flex-item">
									<strong>Keybase</strong><br />
									<a href="https://keybase.io/amv_ph34r" target="_blank">AMV_Ph34r</a>
								</div>
								<div class="flex-item">
									<strong>Tumblr</strong><br />
									<a href="http://tumblr.amv-ph34r.com/" target="_blank">amv-ph34r</a>
								</div>
								<div class="flex-item">
									<strong>Discord</strong><br />
									AMV_Ph34r#4895
								</div>
								<div class="flex-item">
									<strong>Battle.net</strong><br />
									AMVPh34r#1898
								</div>
								<div class="flex-item">
									<strong>3DS</strong><br />
									4012-4350-8803
								</div>
								<div class="flex-item">
									<strong>Switch</strong><br />
									SW-6318-7125-1032
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php Template::includeTemplate('copyright.php'); ?>
	</div>
</div>

<?php Template::includeTemplate('html_footer.php'); ?>
