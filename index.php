<<<<<<< HEAD
<?php include('template/header.php'); ?>
<title>Home Page</title>
<?php include('template/left_pane.php');?>       
    <div class="row">
		<div class='span9'>
        	<?php include('modules/image_slider.php'); ?>
	        <div id="welcome_msg" class="span9">
	            <div class="title_bar">Welcome to The Foundation of Sheikhs and Islamic Scholars of Tanzania <button type="submit" class="btn  btn-mini btn-inverse pull-right msg_read_btn">Read More</button></div><!-- title_bar -->
	            <div class="msg_body two_lines" id='msg_body'>
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
	                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.  
	                <a href="about.php" class="btn btn-small btn-inverse">Read More</a>
	            </div><!-- msg_body-->
	        </div><!-- welcome_msg -->
		
            <!--<div id="join_forum" class="span9">
                <div class="title_bar_brown">Join our Discussion Area Today</div>
                <div class="msg_body">
                    This is our discussion area
                </div>
        </div>-->
		
        <div id="recent_scholars" class="span6">
            <div class="title_bar_brown">Recently Added Scholars / Sheikhs</div><!-- title_bar -->
            <div class="msg_body">
                <table class='table table-condensed table-hover'>
                <?php
                    $q = mysql_query("SELECT * FROM  `h_scholartb` ORDER BY  `sclar_date` DESC LIMIT 4");
                    if(mysql_num_rows($q) > 0){
                        while($row = mysql_fetch_array($q)){
                            $row['sclar_date'] = date('jS M, Y', strtotime($row['sclar_date']));
                            $date = $row['sclar_date'];
                            $scholar_name = $row['sclar_name'];
                            $id = $row['sclar_id'];
                            echo "<tr>
                                    <td width='25%' style='font-weight:bold;'>$date</td>
                                        <td width='65%'>$scholar_name</td><td width='10%'>
                                            <a href='scholar.php?id={$id}' class='btn btn-small btn-inverse'>View </a>
                                        </td>
                                    </tr>";
                        }
                    }else{
                        echo "<tr><td></td><td>No Recently Added Scholars / Sheikhs</td><td></td></tr>";
                    }
                    ?>
                </table>
            </div><!-- msg_body -->
        </div><!-- recent_scholars -->
        <?php
            if(!isset($_SESSION["userlogin"])){
                echo "";
            }
            else{
                echo "<div class='span9'>
                        <br />
                        <div class='title_bar_brown'>ASK A QUESTION</div>
                        <div class='msg_body'>
                            <div class='input-append'>
                                <form name='new_question' action='' method='post' enctype='multipart/form-data'>
                                    <textarea placeholder='Type your Question' rows='1' style='width: 554px; height: 45px;' wrap='hard' name='ques' id='question'></textarea>
                                    <button class='btn btn-success' type='submit' name='send' id='q_btn'>Ask a Question</button>
                                </form>
                            </div>
                            <div id='msg'></div>
                        </div>
                </div>";
            }
        ?>
			<div class='span9' style="margin-top:10px;">
                <div class='msg_body'>
                    <table class='table table-condensed table-hover'>
						<?php
							$q = mysql_query("SELECT * FROM  `h_querytb` ORDER BY  `qu_id` DESC LIMIT 4");
							if(mysql_num_rows($q) > 0){
								while($row = mysql_fetch_array($q)){
									$row['qu_date'] = date('jS M, Y', strtotime($row['qu_date']));
									$date = $row['qu_date'];
									$content = $row['qu_content'];
									$id = $row['qu_id'];
									$quanswered = $row['qu_answered'];
									$msg = "";
									if($quanswered == 'yes')
									{
										$msg = "<a href='answers.php?id=$id'><button type='submit' class='btn btn-small btn-inverse'>View Answer</button></a>";
									}
									else{
										$msg = "<button class='btn btn-small btn-inverse'>Not Answered</button>";
									}
									echo "<tr><td width='15%' style='font-weight:bold;'>$date</td><td width='67%'>$content</td><td width='18%' style='text-align:right;'>$msg</td></tr>";
								}
							}
							else{
								echo "<tr><td></td><td>No Questions</td><td></td></tr>";
							}
                        ?>
                    </table>
                </div>
            </div>

    </div>
	</div><!-- row -->
<br />
<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>
=======
<?php

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
	//define('ENVIRONMENT', 'development');
	define('ENVIRONMENT', 'production');
	define("WEB_URL", "http://".$_SERVER["HTTP_HOST"]);
	define('PROJECTNAME', 'islamicscholars');
	define('STATIC_URL', WEB_URL.'/'.PROJECTNAME);
	define('EVENT_UPLOAD_URL', 'data/upload/event');
	define('LIB_UPLOAD_URL', 'data/upload/lib');
	define('SCHOLAR_UPLOAD_URL', 'data/upload/scholar');

/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

/*
 * ---------------------------------------------------------------
 * add by  wanglei  smarty  路径配置
 * ---------------------------------------------------------------
 */


if(!defined('ROOT'))
	define('ROOT',dirname(__FILE__));
if (!defined('DS'))
	define('DS', DIRECTORY_SEPARATOR);//兼容linux,windows. 表示"/"



if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
		break;
	
		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}

/*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" folder.
 * Include the path if the folder is not in the same  directory
 * as this file.
 *
 */
	$system_path = 'system';

/*
 *---------------------------------------------------------------
 * APPLICATION FOLDER NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * folder then the default one you can set its name here. The folder
 * can also be renamed or relocated anywhere on your server.  If
 * you do, use a full server path. For more info please see the user guide:
 * http://codeigniter.com/user_guide/general/managing_apps.html
 *
 * NO TRAILING SLASH!
 *
 */
	$application_folder = 'application';

/*
 * --------------------------------------------------------------------
 * DEFAULT CONTROLLER
 * --------------------------------------------------------------------
 *
 * Normally you will set your default controller in the routes.php file.
 * You can, however, force a custom routing by hard-coding a
 * specific controller class/function here.  For most applications, you
 * WILL NOT set your routing here, but it's an option for those
 * special instances where you might want to override the standard
 * routing in a specific front controller that shares a common CI installation.
 *
 * IMPORTANT:  If you set the routing here, NO OTHER controller will be
 * callable. In essence, this preference limits your application to ONE
 * specific controller.  Leave the function name blank if you need
 * to call functions dynamically via the URI.
 *
 * Un-comment the $routing array below to use this feature
 *
 */
	// The directory name, relative to the "controllers" folder.  Leave blank
	// if your controller is not in a sub-folder within the "controllers" folder
	// $routing['directory'] = '';

	// The controller class file name.  Example:  Mycontroller
	// $routing['controller'] = '';

	// The controller function you wish to be called.
	// $routing['function']	= '';


/*
 * -------------------------------------------------------------------
 *  CUSTOM CONFIG VALUES
 * -------------------------------------------------------------------
 *
 * The $assign_to_config array below will be passed dynamically to the
 * config class when initialized. This allows you to set custom config
 * items or override any default config values found in the config.php file.
 * This can be handy as it permits you to share one application between
 * multiple front controller files, with each file containing different
 * config values.
 *
 * Un-comment the $assign_to_config array below to use this feature
 *
 */
	// $assign_to_config['name_of_config_item'] = 'value of config item';



// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
// --------------------------------------------------------------------

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

	// Set the current directory correctly for CLI requests
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	// ensure there's a trailing slash
	$system_path = rtrim($system_path, '/').'/';

	// Is the system path correct?
	if ( ! is_dir($system_path))
	{
		exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// The PHP file extension
	// this global constant is deprecated.
	define('EXT', '.php');

	// Path to the system folder
	define('BASEPATH', str_replace("\\", "/", $system_path));

	// Path to the front controller (this file)
	define('FCPATH', str_replace(SELF, '', __FILE__));

	// Name of the "system folder"
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));


	// The path to the "application" folder
	if (is_dir($application_folder))
	{
		define('APPPATH', $application_folder.'/');
	}
	else
	{
		if ( ! is_dir(BASEPATH.$application_folder.'/'))
		{
			exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
		}

		define('APPPATH', BASEPATH.$application_folder.'/');
	}

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 *
 */
require_once BASEPATH.'core/CodeIgniter.php';



/* End of file index.php */
/* Location: ./index.php */
>>>>>>> 52c70a0be4f8225b22b7d3ef71d074a8bee5574b
