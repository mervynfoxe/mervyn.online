<?php
$text_arr = array(
    'Web Dev',
    'Internet Fox',
    'Slacker',
    'Bad to the Bone',
    'Bad at Games',
    'Time-waster',
    'Coffee-consumer',
    'Lucio Main',
    'No one of Importance',
    'Never Sleeps',
    'Key Smasher',
    'Soft Friend'
);
shuffle($text_arr);
?>
<?php Template::includeTemplate('html_header.php'); ?>
<div class="background"></div>
<?php if (Config::$sCurrentEnv == 'public' && FALSE): ?>
	<div class="row-fluid">
		<div class="hidden-xs logo"></div>
		<div class="visible-xs logo small"></div>
	</div>
<?php endif; ?>
<div class="container-fluid center-box">
	<div class="row-fluid">
		<div class="col-lg-6 col-lg-offset-4 col-md-6 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center" id="mainContent">
			<?php if (Config::$sCurrentEnv == 'public'): ?>
                <h1>Mervyn Fox</h1>
                <p><?= implode(' | ', array_slice($text_arr, 0, 3)); ?></p>
			<?php elseif (Config::$sCurrentEnv == 'professional'): ?>
                <h1>Alex Schaeffer</h1>
				<p>Applications | Websites | Databases</p>
			<?php endif; ?>
			<div id="social">
				<?php if (Config::$sCurrentEnv == 'public'): ?>
					<span><a href="https://steamcommunity.com/id/MervynFoxe" id="steam-link" title="Mervyn on Steam" target="_blank"><img src="/img/social/icon-steam.png" alt="steam" /></a></span>
					<span><a href="https://twitter.com/MervynFoxe" id="twitter-link" title="@MervynFoxe on Twitter" target="_blank"><img src="/img/social/icon-twitter.png" alt="birdsite" /></a></span>
					<span><a href="https://www.flickr.com/photos/mervynfoxe" id="flickr-link" title="Mervyn Fox on Flickr" target="_blank"><img src="/img/social/icon-flickr.png" alt="flickr" /></a></span>
					<span><a href="/twitch" id="twitch-link" title="MervynFoxe on Twitch"><img src="/img/social/icon-twitch.png" alt="twitch" /></a></span>
					<span><a href="#panel-other-links" id="other-links" title="Everywhere else" data-toggle="collapse" data-parent="#socialPanels"><img src="/img/social/icon-other.png" alt="other" /></a></span>
                    <span><a href="#panel-support" id="support-me" title="Support me" data-toggle="collapse" data-parent="#socialPanels"><img src="/img/social/icon-money.png" alt="support" /></a></span>
				<?php elseif (Config::$sCurrentEnv == 'professional'): ?>
					<span><a href="http://static.amv-ph34r.com/files/resume.pdf" id="resume-link" title="My Resume" target="_blank"><img src="/img/social/icon-document.png" alt="resume" /></a></span>
					<span><a href="https://www.linkedin.com/in/arschaeffer" id="linkedin-link" title="Alex Schaeffer on LinkedIn" target="_blank"><img src="/img/social/icon-linkedin.png" alt="linkedin" /></a></span>
                    <span><a href="#panel-email-link" id="email-link" title="Email me" data-toggle="collapse" data-parent="#socialPanels"><img src="/img/social/icon-email.png" alt="email" /></a></span>
				<?php endif; ?>
			</div>
			<div class="panel-group" id="socialPanels">
				<?php if (Config::$sCurrentEnv == 'public'): ?>
					<div class="panel panel-default">
						<div id="panel-other-links" class="panel-collapse collapse">
							<div class="panel-body flex-container">
								<div class="flex-item">
									<strong>Keybase</strong><br />
									<a href="https://keybase.io/mervynfoxe" target="_blank">mervynfoxe</a>
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
									MervynFoxe#1946
								</div>
								<div class="flex-item">
									<strong>3DS</strong><br />
									4012-4350-8803
								</div>
								<div class="flex-item">
									<strong>Switch</strong><br />
									SW-6318-7125-1032
								</div>
                                <div class="flex-item">
                                    <strong>Telegram</strong><br />
                                    <a href="https://t.me/MervynFoxe" target="_blank">@MervynFoxe</a>
                                </div>
                                <div class="flex-item">
                                    <strong>Mastodon</strong><br />
                                    <a href="https://yiff.life/@mervyn" target="_blank">@mervyn@yiff.life</a>
                                </div>
							</div>
						</div>
                        <div id="panel-support" class="panel-collapse collapse">
                            <div class="panel-body flex-container">
                                <div class="flex-item">
                                    <a href="https://paypal.me/AMVPh34r" target="_blank">PayPal</a>
                                </div>
                                <div class="flex-item">
                                    <a href="https://cash.app/$MervynFoxe" target="_blank">Cash App</a>
                                </div>
                                <div class="flex-item">
                                    <a href="https://ko-fi.com/mervyn" target="_blank">Ko-fi</a>
                                </div>
                                <div class="flex-item">
                                    <a href="https://streamlabs.com/mervynfoxe/tip" target="_blank">Streamlabs</a>
                                </div>
                            </div>
                        </div>
					</div>
				<?php endif; ?>
                <?php if (Config::$sCurrentEnv == 'professional'): ?>
                <div class="panel panel-default">
                    <div id="panel-email-link" class="panel-collapse collapse">
                        <div class="panel-body">
                            <a href="#" target="_blank">%email%</a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="panel panel-default nobg">
                    <div id="codePanel" class="panel-collapse collapse">
                        <div class="panel-body encoded">
                            Bu nera'g lbh n fzneg bar? Fbeel ohg V'z gbb ynml gb npghnyyl qb fbzrguvat pbby urer.
                        </div>
                    </div>
                </div>
			</div>
		</div>
		<?php Template::includeTemplate('copyright.php'); ?>
	</div>
</div>
<?php Template::includeTemplate('html_footer.php'); ?>
