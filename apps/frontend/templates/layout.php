<!DOCTYPE html>
<html>
    <head>
        <title>
			<?php if (!isset($title)) { ?>
				FamilyPlanning
			<?php } else { echo $title; } ?>
		</title>
		<link rel="shortcut icon" href="/favicon.ico" />
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<!--<link rel="stylesheet" media="screen" type="text/css" title="Styles" href="css/<?php if (isset($css2)) echo $css2; else echo "mail_user.css"; ?>" />
		<link rel="stylesheet" media="screen" type="text/css" title="Styles" href="css/<?php if (isset($css1)) echo $css1; else echo "main.css"; ?>" />-->
		<link rel="stylesheet" href="css/foundation-4.1.2/normalize.css" />
        <link rel="stylesheet" href="css/foundation-4.1.2/foundation.min.css" />
        <script type="text/javascript" src="js/calendrio/modernizr.custom.63321.js"></script>
        <link rel="stylesheet" href="css/style.css" />
        <script>
            document.write('<script src="js/libs/foundation-4.1.2/vendor/jquery.js"><\/script>');
        </script>
        <script type="text/javascript" src="js/jquery.smooth-scroll.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("header a:not([href='#connexion'])").smoothScroll();
            });

        </script>
        <link rel="stylesheet" href="css/calendrio/calendar.css" />
        <link rel="stylesheet" href="css/calendrio/custom_2.css" />
        <link rel="stylesheet" href="css/backgroundslideshow/component.css" />
	</head>
	
	<body>
		<header>
            <div class="row" >
                <div class="large-3 columns"><span class="fam">Family</span> <span class="pl">Planning</span></div>
                <div class="large-8 columns">
                    <div class="row nav">
                        <div class="large-3 columns red"><a href="index.html#fisrt">A propos</a></div>
						<?php if ($user->isAuthenticated())
							{
						?>
								<div class="large-3 columns yellow"><a href="users-update-<?php echo $user->getAttribute('id') ?>-1.html">Paramètres du compte</a></div>
						<?php
							}
							else
							{
						?>
								<div class="large-3 columns yellow"><a href="index.html#second">Inscription</a></div>
						<?php						
							}
						?>
                        <?php if ($user->isAuthenticated())
							{
						?>
								<div class="large-3 columns green"><a href="calendrier.html">Calendrier</a></div>
						<?php
							}
							else
							{
						?>
								<div class="large-3 columns green"><a href="index.html#third">Calendrier</a></div>
						<?php						
							}
						?>
						<?php if ($user->isAuthenticated())
							{
						?>
								<div class="large-3 columns black"><a href="quit.html">Déconnexion</a></div>
						<?php
							}
							else
							{
						?>
								<div class="large-3 columns black"><a href="index.html#connexion" data-reveal-id="connexion">Connexion</a></div>
						<?php						
							}
						?>
                    </div>
                </div>
                <div class="large-1 columns">&nbsp;</div>
            </div>
        </header>
		
		
		
		<div id="body">
			<?php if ($user->hasFlash('notice')): ?>
				<div class="m-alert">
					<div class="row">
						<div class="large-12 columns ">
							<div data-alert class="alert-box success">
								<?php echo $user->getFlash('notice') ?>
								<a href="#" class="close">&times;</a>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			
			<?php if ($user->hasFlash('error')): ?>
				<div class="m-alert">
					<div class="row">
						<div class="large-12 columns ">
							<div data-alert class="alert-box alert">
								<?php echo $user->getFlash('error') ?>
								<a href="#" class="close">&times;</a>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			
			<ul id="cbp-bislideshow" class="cbp-bislideshow">
                <li><img src="images/Mother-child.jpg" alt="image01"/></li>
                <li><img src="images/mother-child1.jpg" alt="image02"/></li>
                <li><img src="images/family.jpg" alt="image03"/></li>
            </ul>
			
			<?php echo $content; ?>
		</div>
 
 
 
		<footer>

        </footer>
		<script src="js/backgroundslideshow/jquery.imagesloaded.min.js"></script>
        <script src="js/backgroundslideshow/cbpBGSlideshow.min.js"></script>
        <script>
            $(function() {
                cbpBGSlideshow.init();
            });
        </script>
        <script type="text/javascript" src="js/libs/foundation-4.1.2/foundation/foundation.js"></script>
        <script type="text/javascript" src="js/libs/foundation-4.1.2/foundation/foundation.magellan.js"></script>
        <script type="text/javascript" src="js/libs/foundation-4.1.2/foundation/foundation.reveal.js"></script>
		<script type="text/javascript" src="js/libs/foundation-4.1.2/foundation/foundation.alerts.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
</html>