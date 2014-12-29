<?php 
set_include_path('../../include'); 
$page = 'past'; 
$level = 2;
$sub = 2008;
include 'header.php' 
?>

<div class="wrapper col4">
  <div id="container">
  <h2>2008 <i>China in My Eyes</i> Essay Contest</h2>
    <div id="content">

	Their works were selected from a large number of extremely competitive entries and represent a wide range of approaches to analyzing China.<br>
	Click the links below to read their essays.
<br><br>
<h3>Grand Prize Winners:</h3>
Winnie Tong - <a href="essays/winnietong.pdf">A Manicure</a><br>
Jae Wooten - <a href="essays/jaewooten.pdf">Do you Understand?</a><br>
Alex Mobley - <a href="essays/alexmobley.pdf">"China in my eyes": physical culture and the Pacific century</a><br>
<br>
<h3>Runner-Ups:</h3>
Erik Anderson - <a href="essays/erikanderson.pdf">Maps</a><br>
Shelby Gai - <a href="essays/shelbygai.pdf">Picture to the Past</a><br>
Eric Chiang - <a href="essays/ericchiang.pdf">My Uncle China</a><br>
Natalia Martinez - <a href="essays/nataliamartinez.pdf">The Echo of Laughter</a><br>
Lan Zhou - <a href="essays/lanzhou.pdf">Discovering My Fortune [in China]</a><br>
Michael Bartley - <a href="essays/michaelbartley.pdf">Open Your Eyes</a><br>
Kali Zhou - <a href="essays/kalizhou.pdf">Yin-Yang</a><br>
Chris Hearne - <a href="essays/chrishearne.pdf">Growing up in China</a><br>
Vanessa Crowley - <a href="essays/vanessacrowley.pdf">Flowers</a><br>
Ryan Woodring - <a href="essays/ryanwoodring.pdf">Why China's Invisible Army Fights</a><br>

<br><br><br><br>
 </div>
 
	<script type="text/javascript">
	
	function toggle(id) 
	{
	var toggle = document.getElementById(id);
	
	
	if(toggle.style.display=='')
	{
		toggle.style.display ='none';
		toggle.class = '';
	}
	else
	{
		toggle.style.display='';
		toggle.class = 'active';
	}
	}
	</script>
	
 <? $sub = 'eyes'; $contest = 'essays'; include '../../include/columnav.php'; ?>

    <div class="clear"></div> 
	</div>
</div>

<? include 'footer.php' ?>
