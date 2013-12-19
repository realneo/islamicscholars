<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-ca">
<head>
   <?php $this->RenderAsset('Head'); ?>
<meta property="og:image" content="http://vanillaskins.com/fruit-forum/themes/fruit/design/images/vanillaSkinsAdvert.png"/>
<meta property="og:site_name" content="VanillaSkins"/>
<meta property="og:title" content="VanillaSkins custom Vanilla Forum Themes"/>
<meta property="og:description" content="VanillaSkins custom premium Forum Skins and Themes for Vanilla"/>
<link href='http://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
</head>
<body id="<?php echo $BodyIdentifier; ?>" class="<?php echo $this->CssClass; ?>">
   <div id="Frame">
		<div id="topBar"></div>
      <div id="Head">
		<div class="inner">
			<img src="http://vanillaskins.com/fruit-forum/themes/fruit/design/images/pressed.png">
		<h1><a class="Title" href="<?php echo Url('/'); ?>"><span><?php echo Gdn_Theme::Logo(); ?></span></a></h1>
		<!--the image below needs to be full url path -->
		<div class="advertSkin"><a href="http://www.vanillaskins.com"><img src="http://vanillaskins.com/fruit-forum/themes/fruit/design/images/adblockskin.png"></a></div>
		</div>
	  
		 <div class="menuBg">
         <div class="Menu">
            <?php
			      $Session = Gdn::Session();
					if ($this->Menu) {
						$this->Menu->AddLink('Dashboard', T('Dashboard'), '/dashboard/settings', array('Garden.Settings.Manage'));
						// $this->Menu->AddLink('Dashboard', T('Users'), '/user/browse', array('Garden.Users.Add', 'Garden.Users.Edit', 'Garden.Users.Delete'));
						$this->Menu->AddLink('Activity', T('Activity'), '/activity');
						if ($Session->IsValid()) {
							$Name = $Session->User->Name;
							$CountNotifications = $Session->User->CountNotifications;
							if (is_numeric($CountNotifications) && $CountNotifications > 0)
								$Name .= ' <span class="Alert">'.$CountNotifications.'</span>';

                     if (urlencode($Session->User->Name) == $Session->User->Name)
                        $ProfileSlug = $Session->User->Name;
                     else
                        $ProfileSlug = $Session->UserID.'/'.urlencode($Session->User->Name);
							$this->Menu->AddLink('User', $Name, '/profile/'.$ProfileSlug, array('Garden.SignIn.Allow'), array('class' => 'UserNotifications'));
							$this->Menu->AddLink('SignOut', T('Sign Out'), SignOutUrl(), FALSE, array('class' => 'NonTab SignOut'));
						} else {
							$Attribs = array();
							if (SignInPopup() && strpos(Gdn::Request()->Url(), 'entry') === FALSE)
								$Attribs['class'] = 'SignInPopup';
								
							$this->Menu->AddLink('Entry', T('Sign In'), SignInUrl($this->SelfUrl), FALSE, array('class' => 'NonTab'), $Attribs);
						}
						echo $this->Menu->ToString();
					}
				?>
				
            <div class="Search"><?php
					$Form = Gdn::Factory('Form');
					$Form->InputPrefix = '';
					echo 
						$Form->Open(array('action' => Url('/search'), 'method' => 'get', 'autocomplete' => 'off')),
						$Form->TextBox('Search', array('placeholder' => T('Search Forums'))),
						$Form->Button('Go', array('Name' => '')),
						$Form->Close();
				?>
			</div>
         </div>
		 </div>
		 </div>
		 
      
      <div id="Body">
         <div id="Content"><?php $this->RenderAsset('Content'); ?></div>
         <div id="Panel"><?php $this->RenderAsset('Panel'); ?></div>
      </div>
	  
      <div id="Foot"><div id="bottomBar">&nbsp;</div>
			<?php
				$this->RenderAsset('Foot');
				//echo Wrap(Anchor(T('Skin by VanillaSkins'), C('Garden.VanillaSkinsUrl')), 'div');
				$VanillaAnchor = Anchor('Vanilla', C('Garden.VanillaUrl'));
				$SkinsAnchor = Anchor('VanillaSkins', C('Garden.VanillaSkinsUrl'));
				$Version = APPLICATION_VERSION;
				echo "<div class='footLink'>Powered by $VanillaAnchor $Version | Skin by $SkinsAnchor &copy; 2011-2014</div>";
			?>
		<div class="footmain">
			<div class="footleft">
				<h3>Links</h3>
				<ul id="footlist">
					<li><a href="http://vanillaforums.com/?ref=vanillaskins" target=_"blank">Vanilla Forums</a></li>
					<li><a href="http://vanillaforums.com/plans?ref=vanillaskins" target=_"blank">Vanills Hosted Plans</a></li>
					<li><a href="http://vanillaforums.org" target=_"blank">Vanilla Help</a></li>
					<li><a href="http://vanillaskins.com" target=_"blank">VanillaSkins</a></li>
				</ul>
			</div>
			<div class="footright">
				<h3>Follow Us</h3>
				<ul id="sociallist">
					<li><a href="https://twitter.com/VanillaSkins">Twitter</a></li>
					<li><a href="http://www.facebook.com/VanillaSkins">Facebook</a></li>
					<li><a href="contact">Contact</a></li>
				</ul>
			</div>
			<div class="footfarright">
				<h3>Footer Advert</h3>
					<div class="footeradvertSkin"><a href="http://www.vanillaskins.com"><img src="http://vanillaskins.com/fruit-forum/themes/fruit/design/images/adblockskin.png"></a></div>
					</div>
			</div>
		</div>
		
		</div>
   </div>
	<?php $this->FireEvent('AfterBody'); ?>
	<!--additional js -->
			<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25730708-4']);
  _gaq.push(['_setDomainName', 'vanillaskins.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

			<!--// end above -->
</body>
</html>
