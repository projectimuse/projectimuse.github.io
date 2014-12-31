<?
set_include_path('../../include'); 
$page = 'past'; 
$level = 2;
$sub = 2008;
include 'header.php' 
?>

<div class="wrapper col4">
  <div id="container">

  <h2>2008 <i>China in My Eyes</i> Photography Contest</h2>
	<div id="content">
	What sorts of images confront your mind's eye when you think of China? The awesome grandeur of a Ming Dynasty temple? The adrenaline-stoking broadsword techniques of a kung fu master? The colorful façade of your favorite Chinese restaurant? Through photography, tell us about China in your eyes. Photos need not be of China itself; they need only creatively depict an aspect of the country that seems captivating to you. They may depict aspects of American life, the differences of which with Chinese life may have aroused your curiosity.<br><br>
	Their works were selected from a large number of extremely competitive entries and represent a wide range of approaches to analyzing China.<br>
	View the works of the grand prize winners as well as the distinguished works of the runner-ups of the <br>contest below.
<br><br>

<!--START SIMPLEVIEWER EMBED.-->
<script type="text/javascript" src="../../svcore/js/simpleviewer.js"></script>
<script type="text/javascript">
$(document).ready(function () {
SV.simpleviewer.load('sv-container', '600', '600', 'ffffff',true);
});
</script>
<!--END SIMPLEVIEWER EMBED. -->
<div id="sv-container"></div>
<div style="float: left; width:33%">
	<h3>Grand Prize Winners</h3>
	
	Shane Witnov<br>
	Jackie McMahon
	<br><br><br><br>
</div>
<div style="float: left; width:50%">
	<h3>Runner-Ups</h3>
	
	Rylan Burns &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Fang Lee<br>
	Jason Foong &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Rona Lee<br>
	Patricia Joong &nbsp&nbsp&nbsp&nbsp&nbsp Erica Swallow<br>
	Ken Lau &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp David Szerlip<br>
	Tyler Lau &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Thomas Wu<br>

	<br><br>
</div>
</div>

	<script type="text/javascript">
	
	function toggle(id) 
	{
	var toggle = document.getElementById(id);
	
	
	if(toggle.style.display=='')
		toggle.style.display ='none';
	else
		toggle.style.display='';
	}
	</script>
	
 <? $sub = 'eyes'; $contest = 'photog'; include '../../include/columnav.php'; ?>

    <div class="clear"></div>
  </div>
</div>

<? include '../../include/footer.php' ?>
