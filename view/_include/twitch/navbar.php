<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/"><img src="/img/logo-a.png" />Home</a>
	</div>
	<div class="collapse navbar-collapse" id="navbar-collapse">
		<ul class="nav navbar-nav">
			<li><a href="http://twitch.tv/<?= Template::get('sTwitchChannel'); ?>" target="_blank">Twitch Channel</a></li>
			<li><a href="#" data-toggle="modal" data-target="#poll-modal">Stream Poll</a></li>
            <?php if (Template::get('discord_enabled')): ?>
			<li><a href="https://discord.gg/<?= Template::get('discord_invite') ?>" target="_blank">Discord Server</a></li>
            <?php endif; ?>
		</ul>
	</div>
</nav>
