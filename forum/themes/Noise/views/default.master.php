<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-ca">
<head>
   <?php $this->RenderAsset('Head'); ?>
        <link rel="stylesheet" type="text/css" title="brown" href="themes/Noise/other/css/brown.css" />
        <link rel="stylesheet" type="text/css" title="blue" href="themes/Noise/other/css/blue.css" />
	 <link rel="stylesheet" type="text/css" title="green" href="themes/Noise/other/css/green.css" />
	<link rel="stylesheet" type="text/css" title="red" href="themes/Noise/other/css/red.css" />
	<link rel="stylesheet" type="text/css" title="yellow" href="themes/Noise/other/css/yellow.css" />
    <script src="themes/Noise/other/js/styles.js" type="text/javascript"></script>
</head>
<body id="<?php echo $BodyIdentifier; ?>" class="<?php echo $this->CssClass; ?>">
    <a href="../" class="btn btn-inverse btn-large"><- Back to Main Website</a>
   <div id="Frame">
      <div id="Head">
         <div class="Menu">
            <h1><a class="Title" href=""><span><?php echo Gdn_Theme::Logo(); ?></span></a></h1>
            <?php
			      $Session = Gdn::Session();
					if ($this->Menu) {
						$this->Menu->AddLink('Dashboard', T('Dashboard'), '/dashboard/settings', array('Garden.Settings.Manage'));
						// $this->Menu->AddLink('Dashboard', T('Users'), '/user/browse', array('Garden.Users.Add', 'Garden.Users.Edit', 'Garden.Users.Delete'));
						$this->Menu->AddLink('Activity', T('Activity'), '/activity');
						if ($Session->IsValid()) {
							$Name = T('Profile');
							$CountNotifications = $Session->User->CountNotifications;
							if (is_numeric($CountNotifications) && $CountNotifications > 0)
								$Name .= ' <span class="Alert">'.$CountNotifications.'</span>';

                     if (urlencode($Session->User->Name) == $Session->User->Name)
                        $ProfileSlug = $Session->User->Name;
                     else
                        $ProfileSlug = $Session->UserID.'/'.urlencode($Session->User->Name);
							$this->Menu->AddLink('User', $Name, '/profile/'.$ProfileSlug, array('Garden.SignIn.Allow'), array('class' => 'UserNotifications'));
							$this->Menu->AddLink('SignOut', '<img title="'.T('SignOut').'" src="themes/Noise/design/images/logout.png"/>', SignOutUrl(), FALSE, array('class' => 'NonTab SignOut'));
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
						$Form->Open(array('action' => Url('/search'), 'method' => 'get')),
						$Form->TextBox('Search'),
						$Form->Button('Go', array('Name' => '')),
						$Form->Close();
				?></div>
         </div>
      </div>
      <div id="Body">
         <div id="Content">
<?php $this->RenderAsset('Content'); ?><div id="social"> 
<!-- Picons Social by Picons: http://picons.me/, modified by sevmc22: www.makeitsound.org -->
<a href="discussions/feed.rss"><img src="themes/Noise/design/images/RSS.png" title="RSS"/></a>
<a href="#"><img src="themes/Noise/design/images/Twitter.png" title="Twitter"/></a>
<a href="#"><img src="themes/Noise/design/images/Facebook.png" title="Facebook"/></a>
<a href="#"><img src="themes/Noise/design/images/Google+.png" title="Google+"/></a>
<a href="#"><img src="themes/Noise/design/images/YouTube.png" title="YouTube"/></a>
<a href="#"><img src="themes/Noise/design/images/Delicious.png" title="Delicious"/></a>
<a href="#"><img src="themes/Noise/design/images/linked-In.png" title="Linked In"/></a>
</div>
<div id="styles"><a href="#" onclick="setActiveStyleSheet('brown'); return false;"><img src="themes/Noise/design/images/s-brown.png" title="Brown"/></a>
<a href="#" onclick="setActiveStyleSheet('green'); return false;"><img src="themes/Noise/design/images/s-green.png" title="Green"/></a>
<a href="#" onclick="setActiveStyleSheet('blue'); return false;"><img src="themes/Noise/design/images/s-blue.png" title="Blue"/></a>
<a href="#" onclick="setActiveStyleSheet('red'); return false;"><img src="themes/Noise/design/images/s-red.png" title="Red"/></a>
<a href="#" onclick="setActiveStyleSheet('yellow'); return false;"><img src="themes/Noise/design/images/s-yellow.png" title="Yellow" /></a>
<!-- Theme icon by New Mooon: http://code.google.com/u/newmooon/ -->
<img src="themes/Noise/design/images/styles.png" title="Styles"/></div></div>
         <div id="Panel"><?php $this->RenderAsset('Panel'); ?></div>
      </div>
      <div id="Foot">
	         <?php	
	         $this->RenderAsset('Foot'); 
			 ?>
			<div id="credits" style="cursor: pointer"><a><img src="themes/Noise/design/images/credits.png" title="Credits"/><b> Credits</b></a><span id="showcredits" style="display: none"><a>: </a><a href="http://yoteyote.com/" target="_blank">Powered by Yoteyote</a></span></div>			
</div>
   </div>
	<?php $this->FireEvent('AfterBody'); ?>
	<script>
    $("#credits").click(function () {
    $("#showcredits").show("slow");
    });
    </script>
</body>
</html>