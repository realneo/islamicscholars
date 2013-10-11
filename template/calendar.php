<div id='calendar' class='span3'>
  <!--  <span class="blacktext_16" style="margin-left:20px; margin-top:10px;">Hijri Calendar</span>
    <span style="clear:left; float:left; margin-left:20px; margin-top:5px;"><img src="img/13_img.gif" /></span>
    <span class="blacktext_16" style="margin-left:10px; margin-top:10px; letter-spacing:-0.03em">Shawwal 1434</span>
    <div style="clear:both; float:left; margin-left:5px; margin-top:10px">
        <table cellspacing="0">
            <tr height="30" style="font-family:'Myriad Pro'; font-size:16; color:#333">
                <th width="40" scope="col">Mn</th>
                <th width="40" scope="col">Tu</th>
                <th width="40" scope="col">We</th>
                <th width="40" scope="col">Th</th>
                <th width="40" scope="col">Fr</th>
                <th width="40" scope="col">Sa</th>
                <th width="40" scope="col">Su</th>                                
            </tr>
            <tr align="center" style="font-family:'Myriad Pro'; font-size:16; color:#333">
                <td></td><td></td><td></td><td></td><td></td><td></td><td>1</td>
            </tr>
            <tr align="center" style="font-family:'Myriad Pro'; font-size:16; color:#333">
                <td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td>
            </tr>
            <tr align="center" style="font-family:'Myriad Pro'; font-size:16; color:#333">
                <td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td>
            </tr>
            <tr align="center" style="font-family:'Myriad Pro'; font-size:16; color:#333">
                <td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td>
            </tr>
            <tr align="center" style="font-family:'Myriad Pro'; font-size:16; color:#333">
                <td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td>
            </tr>
            <tr align="center" style="font-family:'Myriad Pro'; font-size:16; color:#333">
                <td>30</td><td>31</td><td></td><td></td><td></td><td></td><td></td>
            </tr>
        </table>
    </div>-->
	<?php
	/* draws a calendar */
function draw_calendar($month,$year){

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$headings = array('Su','Mo','Tu','We','Th','Fr','Sa');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	date_default_timezone_set('Africa/Nairobi');
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		if($list_day==date('d') && $month==date('n'))
		{
			$currentday='currentday';
		}else
		{
			$currentday='';
		}
		$calendar.= '<td class="calendar-day '.$currentday.'">';
		
			// Add in the day number
			if($list_day<date('d') && $month==date('n'))
			{
				$showtoday='<strong class="overday">'.$list_day.'</strong>';
			}else
			{
				$showtoday=$list_day;
			}
			$calendar.= '<div class="day-number">'.$showtoday.'</div>';

		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}

/* sample usages */
//echo '<h2>August 2013</h2>';
//echo draw_calendar(8,1434);
echo '<h2>'.date('M').' '.date('Y').'</h2>';
echo draw_calendar(date('n'),date('Y'));
?>
</div>