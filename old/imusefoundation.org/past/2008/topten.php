<?
set_include_path('../../include'); 
$page = 'past'; 
$level = 2;
$sub = 2008;
include 'header.php' 
?>

<div class="wrapper col4">
  <div id="container">
<h2>"My Top Ten" Survey</h2>
    <div id="content">
  <p>
    As part of its 2008 North American campus tour, IMUSE brought a group of Chinese students
    from Peking and Tsinghua Universities to hold structured discussions with prominent journalists
    and local student leaders in front of an audience. In order to help us decide the topics for
    these discussions, we wanted to know what issues you think are the most important to China today.
  </p>
  <p>
    The randomly selected winners of the survey drawing were:
  </p>
  <br>
  <p><h3>Grand prize (Beijing Olympic Summer Fellowship Program participation):</h3>
  <ul>
  <li>Eric Chiang</li>
  </ul>
  <br>
  <p><h3>Runners-up (Olympic souvenirs):</h3>
  <ul>
    <li>Sydney Efromovich</li>
    <li>Dominique Martinez</li>
    <li>Joseph Gordon Sims </li>
  </ul>
  <br><br><br><br><br><br><br><br><br><br>
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
	
<?$sub = 'topten'; include 'columnav.php';?>

    <div class="clear"></div>
</div>


<? include 'footer.php' ?>
