<?php if (!defined('APPLICATION')) exit();

// Cache
$Configuration['Cache']['Enabled'] = TRUE;
$Configuration['Cache']['Method'] = 'dirtycache';
$Configuration['Cache']['Filecache']['Store'] = '/Users/Administrator/Sites/islamicscholars/forum/cache/Filecache';

// Conversations
$Configuration['Conversations']['Version'] = '2.0.18.9';

// Database
$Configuration['Database']['Name'] = 'is_forum';
$Configuration['Database']['Host'] = 'localhost';
$Configuration['Database']['User'] = 'root';
$Configuration['Database']['Password'] = 'root';
$Configuration['Database']['Engine'] = 'MySQL';
$Configuration['Database']['ConnectionOptions']['12'] = FALSE;
$Configuration['Database']['ConnectionOptions']['1000'] = TRUE;
$Configuration['Database']['ConnectionOptions']['1002'] = "set names 'utf8'";
$Configuration['Database']['CharacterEncoding'] = 'utf8';
$Configuration['Database']['DatabasePrefix'] = 'GDN_';
$Configuration['Database']['ExtendedProperties']['Collate'] = 'utf8_unicode_ci';

// EnabledApplications
$Configuration['EnabledApplications']['Dashboard'] = 'dashboard';
$Configuration['EnabledApplications']['Conversations'] = 'conversations';
$Configuration['EnabledApplications']['Vanilla'] = 'vanilla';

// EnabledPlugins
$Configuration['EnabledPlugins']['GettingStarted'] = 'GettingStarted';
$Configuration['EnabledPlugins']['HtmLawed'] = 'HtmLawed';
$Configuration['EnabledPlugins']['embedvanilla'] = TRUE;
$Configuration['EnabledPlugins']['AllViewed'] = TRUE;
$Configuration['EnabledPlugins']['Emotify'] = TRUE;
$Configuration['EnabledPlugins']['VanillaInThisDiscussion'] = TRUE;
$Configuration['EnabledPlugins']['OpenID'] = TRUE;
$Configuration['EnabledPlugins']['GoogleSignIn'] = TRUE;
$Configuration['EnabledPlugins']['Facebook'] = TRUE;
$Configuration['EnabledPlugins']['Twitter'] = TRUE;
$Configuration['EnabledPlugins']['cleditor'] = TRUE;
$Configuration['EnabledPlugins']['VanillaStats'] = TRUE;
$Configuration['EnabledPlugins']['Gravatar'] = TRUE;
$Configuration['EnabledPlugins']['Flagging'] = TRUE;

// Garden
$Configuration['Garden']['Title'] = 'Foundation of Sheikhs and Islamic Scholars of Tanzania Forum';
$Configuration['Garden']['Cookie']['Salt'] = '7724XTUELI';
$Configuration['Garden']['Cookie']['Domain'] = '';
$Configuration['Garden']['Cookie']['Name'] = 'Vanilla';
$Configuration['Garden']['Cookie']['Path'] = '/';
$Configuration['Garden']['Cookie']['HashMethod'] = 'md5';
$Configuration['Garden']['Registration']['ConfirmEmail'] = TRUE;
$Configuration['Garden']['Registration']['Method'] = 'Captcha';
$Configuration['Garden']['Registration']['DefaultRoles'] = array('8');
$Configuration['Garden']['Registration']['ApplicantRoleID'] = 4;
$Configuration['Garden']['Registration']['InviteExpiration'] = '-1 week';
$Configuration['Garden']['Registration']['InviteRoles'] = FALSE;
$Configuration['Garden']['Registration']['ConfirmEmailRole'] = 3;
$Configuration['Garden']['Email']['SupportName'] = 'Foundation of Sheikhs and Islamic Scholars of Tanzania Forum';
$Configuration['Garden']['Email']['UseSmtp'] = FALSE;
$Configuration['Garden']['Email']['SmtpHost'] = '';
$Configuration['Garden']['Email']['SmtpUser'] = '';
$Configuration['Garden']['Email']['SmtpPassword'] = '';
$Configuration['Garden']['Email']['SmtpPort'] = '25';
$Configuration['Garden']['Email']['SmtpSecurity'] = '';
$Configuration['Garden']['Email']['MimeType'] = 'text/plain';
$Configuration['Garden']['Email']['SupportAddress'] = '';
$Configuration['Garden']['ContentType'] = 'text/html';
$Configuration['Garden']['Charset'] = 'utf-8';
$Configuration['Garden']['FolderBlacklist'] = array('.', '..', '_svn', '.git');
$Configuration['Garden']['Locale'] = 'en-CA';
$Configuration['Garden']['LocaleCodeset'] = 'UTF8';
$Configuration['Garden']['Domain'] = '';
$Configuration['Garden']['WebRoot'] = FALSE;
$Configuration['Garden']['StripWebRoot'] = FALSE;
$Configuration['Garden']['Debug'] = FALSE;
$Configuration['Garden']['RewriteUrls'] = FALSE;
$Configuration['Garden']['Session']['Length'] = '15 minutes';
$Configuration['Garden']['Authenticator']['DefaultScheme'] = 'password';
$Configuration['Garden']['Authenticator']['RegisterUrl'] = '/entry/register?Target=%2$s';
$Configuration['Garden']['Authenticator']['SignInUrl'] = '/entry/signin?Target=%2$s';
$Configuration['Garden']['Authenticator']['SignOutUrl'] = '/entry/signout/{Session_TransientKey}?Target=%2$s';
$Configuration['Garden']['Authenticator']['EnabledSchemes'] = array('password');
$Configuration['Garden']['Authenticator']['SyncScreen'] = 'smart';
$Configuration['Garden']['Authenticators']['password']['Name'] = 'Password';
$Configuration['Garden']['Errors']['LogEnabled'] = FALSE;
$Configuration['Garden']['Errors']['LogFile'] = '';
$Configuration['Garden']['SignIn']['Popup'] = TRUE;
$Configuration['Garden']['UserAccount']['AllowEdit'] = TRUE;
$Configuration['Garden']['TermsOfService'] = '/dashboard/home/termsofservice';
$Configuration['Garden']['UpdateCheckUrl'] = 'http://vanillaforums.org/addons/update';
$Configuration['Garden']['AddonUrl'] = 'http://vanillaforums.org/addons';
$Configuration['Garden']['CanProcessImages'] = TRUE;
$Configuration['Garden']['Installed'] = TRUE;
$Configuration['Garden']['Forms']['HoneypotName'] = 'hpt';
$Configuration['Garden']['Upload']['MaxFileSize'] = '50M';
$Configuration['Garden']['Upload']['AllowedFileExtensions'] = array('txt', 'jpg', 'jpeg', 'gif', 'png', 'bmp', 'tiff', 'zip', 'gz', 'tar.gz', 'tgz', 'psd', 'ai', 'fla', 'swf', 'pdf', 'doc', 'xls', 'ppt', 'docx', 'xlsx', 'log', 'rar', '7z');
$Configuration['Garden']['Picture']['MaxHeight'] = 1000;
$Configuration['Garden']['Picture']['MaxWidth'] = 600;
$Configuration['Garden']['Profile']['MaxHeight'] = 1000;
$Configuration['Garden']['Profile']['MaxWidth'] = 250;
$Configuration['Garden']['Profile']['Public'] = TRUE;
$Configuration['Garden']['Profile']['ShowAbout'] = TRUE;
$Configuration['Garden']['Profile']['EditUsernames'] = FALSE;
$Configuration['Garden']['Preview']['MaxHeight'] = 100;
$Configuration['Garden']['Preview']['MaxWidth'] = 75;
$Configuration['Garden']['Thumbnail']['Size'] = 50;
$Configuration['Garden']['Menu']['Sort'] = array('Dashboard', 'Discussions', 'Questions', 'Activity', 'Applicants', 'Conversations', 'User');
$Configuration['Garden']['InputFormatter'] = 'Html';
$Configuration['Garden']['Html']['SafeStyles'] = TRUE;
$Configuration['Garden']['Search']['Mode'] = 'matchboolean';
$Configuration['Garden']['Theme'] = 'Noise';
$Configuration['Garden']['MobileTheme'] = 'mobile';
$Configuration['Garden']['Roles']['Manage'] = TRUE;
$Configuration['Garden']['VanillaUrl'] = 'http://vanillaforums.org';
$Configuration['Garden']['AllowSSL'] = TRUE;
$Configuration['Garden']['PrivateCommunity'] = FALSE;
$Configuration['Garden']['EditContentTimeout'] = -1;
$Configuration['Garden']['Modules']['ShowGuestModule'] = TRUE;
$Configuration['Garden']['Modules']['ShowSignedInModule'] = FALSE;
$Configuration['Garden']['Modules']['ShowRecentUserModule'] = FALSE;
$Configuration['Garden']['Format']['Mentions'] = TRUE;
$Configuration['Garden']['Format']['Hashtags'] = FALSE;
$Configuration['Garden']['Format']['YouTube'] = TRUE;
$Configuration['Garden']['Format']['Vimeo'] = TRUE;
$Configuration['Garden']['Format']['EmbedSize'] = 'normal';
$Configuration['Garden']['Version'] = '2.0.18.9';
$Configuration['Garden']['Analytics']['AllowLocal'] = TRUE;
$Configuration['Garden']['InstallationID'] = '20DE-9B19EE9E-A94D6EF9';
$Configuration['Garden']['InstallationSecret'] = '8354583a0e21a094304643425630320ba4ab260a';

// Modules
$Configuration['Modules']['Garden']['Panel'] = array('UserPhotoModule', 'UserInfoModule', 'GuestModule', 'Ads');
$Configuration['Modules']['Garden']['Content'] = array('MessageModule', 'Notices', 'Content', 'Ads');
$Configuration['Modules']['Vanilla']['Panel'] = array('NewDiscussionModule', 'SignedInModule', 'GuestModule', 'Ads');
$Configuration['Modules']['Vanilla']['Content'] = 'a:6:{i:0;s:13:"MessageModule";i:1;s:7:"Notices";i:2;s:21:"NewConversationModule";i:3;s:19:"NewDiscussionModule";i:4;s:7:"Content";i:5;s:3:"Ads";}';
$Configuration['Modules']['Conversations']['Panel'] = array('NewConversationModule', 'SignedInModule', 'GuestModule', 'Ads');
$Configuration['Modules']['Conversations']['Content'] = 'a:6:{i:0;s:13:"MessageModule";i:1;s:7:"Notices";i:2;s:21:"NewConversationModule";i:3;s:19:"NewDiscussionModule";i:4;s:7:"Content";i:5;s:3:"Ads";}';

// Plugins
$Configuration['Plugins']['GettingStarted']['Dashboard'] = '1';
$Configuration['Plugins']['GettingStarted']['Categories'] = '1';
$Configuration['Plugins']['GettingStarted']['Discussion'] = '1';
$Configuration['Plugins']['GettingStarted']['Plugins'] = '1';
$Configuration['Plugins']['GettingStarted']['Profile'] = '1';

// Preferences
$Configuration['Preferences']['Email']['ConversationMessage'] = '1';
$Configuration['Preferences']['Email']['AddedToConversation'] = '1';
$Configuration['Preferences']['Email']['BookmarkComment'] = '1';
$Configuration['Preferences']['Email']['WallComment'] = '0';
$Configuration['Preferences']['Email']['ActivityComment'] = '0';
$Configuration['Preferences']['Email']['DiscussionComment'] = '0';
$Configuration['Preferences']['Email']['DiscussionMention'] = '0';
$Configuration['Preferences']['Email']['CommentMention'] = '0';
$Configuration['Preferences']['Popup']['ConversationMessage'] = '1';
$Configuration['Preferences']['Popup']['AddedToConversation'] = '1';
$Configuration['Preferences']['Popup']['BookmarkComment'] = '1';
$Configuration['Preferences']['Popup']['WallComment'] = '1';
$Configuration['Preferences']['Popup']['ActivityComment'] = '1';
$Configuration['Preferences']['Popup']['DiscussionComment'] = '1';
$Configuration['Preferences']['Popup']['DiscussionMention'] = '1';
$Configuration['Preferences']['Popup']['CommentMention'] = '1';

// Routes
$Configuration['Routes']['DefaultController'] = 'discussions';
$Configuration['Routes']['DefaultForumRoot'] = 'discussions';
$Configuration['Routes']['Default404'] = array('dashboard/home/filenotfound', 'NotFound');
$Configuration['Routes']['DefaultPermission'] = array('dashboard/home/permission', 'NotAuthorized');
$Configuration['Routes']['UpdateMode'] = 'dashboard/home/updatemode';

// Vanilla
$Configuration['Vanilla']['Version'] = '2.0.18.9';

// Last edited by admin (::1)2013-12-19 15:46:14