    <div id="columnav">
      <div class="subnav">
        <h2>2008 Programs</h2>
        <ul>
          <li><a <?if(isset($sub)) echo ($sub == 'overview')? "class='active'" : "";?> href="2008.php#container"><strong>Overview</a></strong></li>
          <li><a <?if(isset($sub)) echo ($sub == 'north')? "class='active'" : "";?> onclick="toggle('panel')"><strong>North American Campus Tour Program</a></strong>
			<ul id="panel" >
				
				<li><a <?if(isset($events)) echo ($events == 'panel')? "class='active'" : "";?> href="panel.php#container">Campus Events</a></li>
				<li><a <?if(isset($events)) echo ($events == 'delegates')? "class='active'" : "";?> href="delegates.php#container">Meet the Delegates</a></li>
			</ul>
		   </li>
          <li><a <?if(isset($sub)) echo ($sub == 'eyes')? "class='active'" : "";?> onclick="toggle('contests')"><strong>China in My Eyes</a></strong>
            <ul id="contests" >
              <li><a <?if(isset($contest)) echo ($contest == 'essays')? "class='active'" : "";?> href="essays.php#container">Essay Contest</a></li>
              <li><a <?if(isset($contest)) echo ($contest == 'photog')? "class='active'" : "";?> href="photog.php#container">Photograph Contest</a></li>
            </ul>
          </li>
          <li><a <?if(isset($sub)) echo ($sub == 'topten')? "class='active'" : "";?> href="topten.php#container"><strong>My Top Ten Survey</a></strong></li>
		  <li><a <?if(isset($sub)) echo ($sub == 'blogs')? "class='active'" : "";?> onclick="toggle('summer')"><strong>Beijing Summer Fellowship Program</a></strong>
		  	<ul id="summer">
				<li><a onclick="toggle('names')">Delegate Reflections</a>
					<ul id="names">
						<li><a <?if(isset($blog)) echo ($blog == 'eric')? "class='active'" : "";?> href="blogs_eric.php#container">Eric Chiang</a></li>
						<li><a <?if(isset($blog)) echo ($blog == 'alex')? "class='active'" : "";?> href="blogs_alex.php#container">Alex Mobley</a></li>
						<li><a <?if(isset($blog)) echo ($blog == 'winnie')? "class='active'" : "";?> href="blogs_winnie.php#container">Winnie Tong</a></li>
						<li><a <?if(isset($blog)) echo ($blog == 'jae')? "class='active'" : "";?> href="blogs_jae.php#container">Jae Wooten</a></li>
					</ul>
				</li>  
			</ul>
		  </li>
        </ul>
      </div>	  	  
    </div>