<?php Template::includeTemplate('html_header.php'); ?>
<div class="background"></div>
<div class="container-fluid center-box">
    <div class="row-fluid">
        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center"
             id="mainContent">
            <h1>404</h1>
            <p>Sorry, I couldn't find that page!</p>
            <p><a href="/" class="link-light">Click here</a> to return home and try again, or to contact me if you have
                any trouble.</p>
        </div>
		<?php Template::includeTemplate('copyright.php'); ?>
    </div>
</div>

<?php Template::includeTemplate('html_footer.php'); ?>
