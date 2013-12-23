<?php

if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );

//ini_set('display_errors','On');
//error_reporting(E_ALL);
class M_calendar extends CI_Controller {
	/**
	 * Userchannel controller.
	 * http://example.com/index.php/Userchannel/index
	 * Create at 2012,8,24 By Chris Wong , Copyright mx Inc.
	 * 
	 */
	
	function __construct()
    {
        parent::__construct();
		$this->load->model ( 'calendar_model' );
       
    }	

	public function index() {
		$this->load->library('cismarty'); 
		$this->load->model('common_model_admin');

		if(!$this->common_model_admin->islogin){
			$seturl ="/".PROJECTNAME."/index.php/m_login/index";
			Header("Location: $seturl"); 		
		}

		if(isset($_POST['addData']) && $_POST['addData'] != ""){
			$year	= $_POST['year'];
			$month  = $_POST['month'];
			$day   	= $_POST['day'];
//			$hour	= $_POST['hour'];
//			$minute  = $_POST['minute'];
//			$second   	= $_POST['second'];
			$hour	 = date("H");
			$minute  = date("i");
			$second  = date("s");
			$this->calendar_model->remove();
			$this->calendar_model->insert($year, $month, $day, $hour, $minute, $second);
		}

		$data =$this->calendar_model->get_datas();
		$calendar_data = array();
		$year = "";
		$month = "";
		$day = "";
		$hour = "";
		$minute = "";
		$second = "";

		if(count($data) > 0){
			$calendar_data = $data[0];
			$today = date("Y-m-d H:i:s");			
			$timestamp1 = strtotime($calendar_data["cld_cur_time"]);						
			$timestamp2 = strtotime($today);						
			$timestamp_delta = $timestamp2 - $timestamp1;
			if($timestamp_delta < 0)
				$timestamp_delta = 0;
			$second_delta = $timestamp_delta % 60;
			$minutes = $timestamp_delta / 60;
			$minute_delta = $minutes % 60;
			$hours = $minutes / 60;
			$hour_delta = $hours % 24;
			$days = $hours / 24;
			$day_delta = $days % 31;
/*
			$months = $days / 31;
			$month_delta = $months % 12;
			$year_delta = $months / 12;
			
			$year = $calendar_data["cld_year"] + (int)$year_delta;
			$month = $calendar_data["cld_month"] + (int)$month_delta;
*/
			$year = $calendar_data["cld_year"];
			$month = $calendar_data["cld_month"];

			$day = $calendar_data["cld_day"] + (int)$day_delta;
			
			$hour = $calendar_data["cld_hour"] + (int)$hour_delta;
			$minute = $calendar_data["cld_minute"] + (int)$minute_delta;
			$second = $calendar_data["cld_second"] + (int)$second_delta;
			$second_remove = 0;
			$minute_remove = 0;
			$hour_remove = 0;
			$day_remove = 0;
			$month_remove = 0;
			$year_remove = 0;

			if($second > 60){
				$second_remove = $second / 60;
				$second = $second % 60;
				$minute += $second_remove;
			}
			if($minute > 60){
				$minute_remove = $minute / 60;
				$minute = $minute % 60;
				$hour += $minute_remove;
			}
//echo("1 day = ".$day."<br>");
			if($calendar_data["cld_hour"] < 18 || ($calendar_data["cld_hour"] == 18 && $calendar_data["cld_minute"] < 30)){			
				if($hour == 18 && $minute > 30){
					$day ++;
//echo("2 day = ".$day."<br>");
				}else if($hour > 18){
					$temp_hour = $hour - 18;
//echo("3 day = ".$day."<br>");
					while($temp_hour >= 0){
						if($temp_hour == 0 && $minute > 30){
							$day ++;
//echo("4 day = ".$day."<br>");
							break;
						}else if($temp_hour > 0){
							$day ++;
//echo("5 day = ".$day."<br>");
						}
						$temp_hour -= 24;
					}
				}
			}else{
//echo("6 day = ".$day."<br>");
				if($hour > 18){
//echo("7 day = ".$day."<br>");
					$temp_hour = $hour - 18 - 24;
					while($temp_hour >= 0){
//echo("8 day = ".$day."<br>");
						if($temp_hour == 0 && $minute > 30){
							$day ++;
//echo("9 day = ".$day."<br>");
							break;
						}else if($temp_hour > 0){
							$day ++;
//echo("10 day = ".$day."<br>");
						}
						$temp_hour -= 24;
					}
				}
			}
			$hour = $hour % 24;
			if($day > 31){
				$day_remove = $day / 31;
				$day = $day % 31;
//				$month += $day_remove;
			}
/*
			if($month > 12){
				$month_remove = $month / 12;
				$month = $month % 12;
				$year += $month_remove;
			}
*/
			$year	= (int)$year;
			$month 	= (int)$month;
			$day 	= (int)$day;
			$hour 	= (int)$hour;
			$minute = (int)$minute;
			$second = (int)$second;
			
			$month_string = "";

			switch ($month) {
				case '1':
					$month_string = "Muharram";
					break;
				case '2':
					$month_string = "Safar";
					break;
				case '3':
					$month_string = "Rabiul Awal";
					break;
				case '4':
					$month_string = "Rabiul Akhir";
					break;
				case '5':
					$month_string = "Jamadil Awal";
					break;
				case '6':
					$month_string = "Jamadil Akhir";
					break;
				case '7':
					$month_string = "Rejab";
					break;
				case '8':
					$month_string = "Syaaban";
					break;
				case '9':
					$month_string = "Ramadhan";
					break;
				case '10':
					$month_string = "Syawal";
					break;
				case '11':
					$month_string = "Zulkaedah";
					break;
				case '12':
					$month_string = "Zulhijjah";
					break;
				default:
					$month_string = "Muharram";
					break;
			}
			
		}
		$this->cismarty->view('m_calendar_edit',get_defined_vars());
	}
	
	public function getDate() {

		$data =$this->calendar_model->get_datas();
		$calendar_data = array();
		$year = "";
		$month = "";
		$day = "";
		$hour = "";
		$minute = "";
		$second = "";

		if(count($data) > 0){
			$calendar_data = $data[0];
			$today = date("Y-m-d H:i:s");			
			$timestamp1 = strtotime($calendar_data["cld_cur_time"]);						
			$timestamp2 = strtotime($today);						
			$timestamp_delta = $timestamp2 - $timestamp1;
			if($timestamp_delta < 0)
				$timestamp_delta = 0;
			$second_delta = $timestamp_delta % 60;
			$minutes = $timestamp_delta / 60;
			$minute_delta = $minutes % 60;
			$hours = $minutes / 60;
			$hour_delta = $hours % 24;
			$days = $hours / 24;
			$day_delta = $days % 31;
			$year = $calendar_data["cld_year"];
			$month = $calendar_data["cld_month"];

			$day = $calendar_data["cld_day"] + (int)$day_delta;
			
			$hour = $calendar_data["cld_hour"] + (int)$hour_delta;
			$minute = $calendar_data["cld_minute"] + (int)$minute_delta;
			$second = $calendar_data["cld_second"] + (int)$second_delta;
			$second_remove = 0;
			$minute_remove = 0;
			$hour_remove = 0;
			$day_remove = 0;
			$month_remove = 0;
			$year_remove = 0;

			if($second > 60){
				$second_remove = $second / 60;
				$second = $second % 60;
				$minute += $second_remove;
			}
			if($minute > 60){
				$minute_remove = $minute / 60;
				$minute = $minute % 60;
				$hour += $minute_remove;
			}
			if($calendar_data["cld_hour"] < 18 || ($calendar_data["cld_hour"] == 18 && $calendar_data["cld_minute"] < 30)){			
				if($hour == 18 && $minute > 30){
					$day ++;
				}else if($hour > 18){
					$temp_hour = $hour - 18;
					while($temp_hour >= 0){
						if($temp_hour == 0 && $minute > 30){
							$day ++;
							break;
						}else if($temp_hour > 0){
							$day ++;
						}
						$temp_hour -= 24;
					}
				}
			}else{
				if($hour > 18){
					$temp_hour = $hour - 18 - 24;
					while($temp_hour >= 0){
						if($temp_hour == 0 && $minute > 30){
							$day ++;
							break;
						}else if($temp_hour > 0){
							$day ++;
						}
						$temp_hour -= 24;
					}
				}
			}
			$hour = $hour % 24;
			if($day > 31){
				$day_remove = $day / 31;
				$day = $day % 31;
			}
			$year	= (int)$year;
			$month 	= (int)$month;
			$day 	= (int)$day;
			$hour 	= (int)$hour;
			$minute = (int)$minute;
			$second = (int)$second;
			
			$month_string = "";

			switch ($month) {
				case '1':
					$month_string = "Muharram";
					break;
				case '2':
					$month_string = "Safar";
					break;
				case '3':
					$month_string = "Rabiul Awal";
					break;
				case '4':
					$month_string = "Rabiul Akhir";
					break;
				case '5':
					$month_string = "Jamadil Awal";
					break;
				case '6':
					$month_string = "Jamadil Akhir";
					break;
				case '7':
					$month_string = "Rejab";
					break;
				case '8':
					$month_string = "Syaaban";
					break;
				case '9':
					$month_string = "Ramadhan";
					break;
				case '10':
					$month_string = "Syawal";
					break;
				case '11':
					$month_string = "Zulkaedah";
					break;
				case '12':
					$month_string = "Zulhijjah";
					break;
				default:
					$month_string = "Muharram";
					break;
			}
			
		}
//		echo($day." ".$month_string." ".$year." &nbsp;&nbsp;&nbsp; ".$hour." : ".$minute." : ".$second);
		echo($day." ".$month_string." ".$year);
	}
}
