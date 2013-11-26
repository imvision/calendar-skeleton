<?php

/// get current month and year and store them in $cMonth and $cYear variables
(intval($_REQUEST["month"])>0) ? $cMonth = $_REQUEST["month"] : $cMonth = date("n");
(intval($_REQUEST["year"])>0) ? $cYear = $_REQUEST["year"] : $cYear = date("Y");

if ($cMonth<10) $cMonth = '0'.$cMonth;

// calculate next and prev month and year used for next / prev month navigation links and store them in respective variables
$prev_year = $cYear;
$next_year = $cYear;
$prev_month = intval($cMonth)-1;
$next_month = intval($cMonth)+1;

// if current month is Decembe or January month navigation links have to be updated to point to next / prev years
if ($cMonth == 12 ) {
	$next_month = 1;
	$next_year = $cYear + 1;
} elseif ($cMonth == 1 ) {
	$prev_month = 12;
	$prev_year = $cYear - 1;
}
?>
  <table width="100%">
  <tr>
      <td class="mNav" style="padding:10px 5px "><a href="javascript:LoadMonth('<?php echo $prev_month; ?>', '<?php echo $prev_year; ?>')"><img src="back-arrow.png" /></a></td>
      <td colspan="5" class="cMonth" style="padding:10px 5px "><?php echo date("F, Y",strtotime($cYear."-".$cMonth."-01")); ?></td>
      <td class="mNav" style="padding:10px 5px "><a href="javascript:LoadMonth('<?php echo $next_month; ?>', '<?php echo $next_year; ?>')"><img src="forward-arrow.png" /></a></td>
  </tr>
  <tr>
      <td class="wDays">Mon</td>
      <td class="wDays">Tue</td>
      <td class="wDays">Wed</td>
      <td class="wDays">Thu</td>
      <td class="wDays">Fri</td>
      <td class="wDays">Sat</td>
      <td class="wDays">Sun</td>
  </tr>
<?php 
$first_day_timestamp = mktime(0,0,0,$cMonth,1,$cYear); // time stamp for first day of the month used to calculate 
$maxday = date("t",$first_day_timestamp); // number of days in current month
$thismonth = getdate($first_day_timestamp); // find out which day of the week the first date of the month is
$startday = $thismonth['wday'] ; // 0 is for Sunday and as we want week to start on Mon we subtract 1
if (!$thismonth['wday']) $startday = 7;
for ($i=1; $i<($maxday+$startday); $i++) {
	
	if (($i % 7) == 1 ) echo "<tr>";
	
	if ($i < $startday) { echo "<td>&nbsp;</td>"; continue; };
	
	$current_day = $i - $startday + 1;
	
	$css='available'; 
	
	echo "<td class='".$css."'>". $current_day."<div class='small-box-container'><a href='javascript:;' style='background:red'></a><a href='javascript:;' style='background:purple'></a><a href='javascript:;' style='background:green'></a></div></td>";
	
	if (($i % 7) == 0 ) echo "</tr>";
}
?> 
<tr class="bottom-row">
<td > <div class="label-div"><a style="background:#411e02" href="javascript:;"></a><label>Jiwa</label></div></td>
<td > <div class="label-div"><a style="background:#439100" href="javascript:;"></a><label>Wael</label></div></td>
<td > <div class="label-div"><a style="background:#250489" href="javascript:;"></a><label>Mawahib</label></div></td>
<td > <div class="label-div"><a style="background:#d66d04"  href="javascript:;"></a><label>Lokman</label></div></td>
<td > <div class="label-div"><a style="background:#3c4100"  href="javascript:;"></a><label>Ranya</label></div></td>
<td > <div class="label-div"><a style="background:#9127fd"  href="javascript:;"></a><label>Seba</label></div></td>
<td > <div class="label-div"><a style="background:#8c0502"  href="javascript:;"></a><label>Anis</label></div></td>
</tr>

</table>
