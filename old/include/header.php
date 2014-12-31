<?
if (isset($level))
{
  if ($level == 0)
    $include = '';
  else if ($level == 1)
    $include = '../';
  else if ($level == 2)
    $include = '../../';
  
}

?>
<!DOCTYPE php PUBLIC "-//W3C//DTD Xphp 1.0 Strict//EN" "http://www.w3.org/TR/xphp1/DTD/xphp1-strict.dtd">
<php xmlns="http://www.w3.org/1999/xphp">
  <head>
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta content="text/php; charset=utf-8" http-equiv="content-type">
    <link rel="shortcut icon" href="<? echo $include . 'images/favicon.ico' ?>">
    <title>IMUSE | <? 
    if(isset($page))
    {
      if ($page == 'current')
      {
        if (isset ($sub))
        {
          if ($sub == 'apply')
            echo "Apply";
        }
        else
          echo "Conference Info";
      }
      else if ($page == 'past')
      {
        if (isset ($sub))
        {
          if ($sub == 2013)
            echo "2013";
          else if ($sub == 2011)
            echo "2011";
          else if ($sub == 2008)
            echo "2008";
        }
        else
          echo "Past Programs";
      }
      else if ($page == 'about')
      {
        if (isset ($sub))
        {
          if ($sub == 'partners')
            echo "Our Partners";
          else if ($sub == 'sponsors')
            echo "Our Sponsors";
          else if ($sub == 'advisors')
            echo "Our Advisors";
        }
        else
          echo "Our Team";
      }
      else if ($page == 'contact')
      {
        if (isset ($sub))
        {
          if ($sub == 'join')
            echo "Join";
          else if ($sub == 'donate')
            echo "Donate";      
        }
        else
          echo "Contact";
      }
      else if ($page == 'sitemap')
        echo "Site Map";
      else
        echo "Welcome";
    }
    ?>
    </title>
    <link media="screen" type="text/css" rel="stylesheet" href="<? echo $include . 'styles/layout.css' ?>" >
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,900|Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29504865-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  </head>

<body id="top">
<div class="wrapper col1">
  <div id="topbar">
    <p><a href="http://www.harvard.edu">Harvard University</a> | <a href="http://english.pku.edu.cn/">Peking University</a> | <a href="http://www.tsinghua.edu.cn/publish/then/">Tsinghua University</a></p>
    <ul>
      <li><a href="<? echo $include . '' ?>">Home</a></li>
      <li><a href="<? echo $include . 'contact/' ?>">Contact Us</a></li>
      <li class="last"><a href="http://projectimuse.cn">中文</a></li>
    </ul>
    <br class="clear" />
  </div>
</div>
<div class="wrapper col2">
  <div id="header">
    <div id="topnav">
      <ul>  
        <li <?if(isset($page))echo ($page == 'current')? "class='active main'" : "class='main'";?>><a href="<? echo $include . 'programs' ?>">2014 Conference</a><span></span>
          <ul>
            <li><a href="<? echo $include . 'programs' ?>">Overview</a></li>
            <li><a href="<? echo $include . 'programs/apply.php' ?>">Apply</a></li>
          </ul>
        </li>
    <li <?if(isset($page))echo ($page == 'past')? "class='active main'" : "class='main'";?>><a href="<? echo $include . 'past' ?>">Past Programs</a><span></span>
      <ul>
      <li><a href="<? echo $include . 'past' ?>">Past Programs</a></li>
      <li><a href="<? echo $include . 'past/2013.php' ?>">2013</a></li>
        <li><a href="<? echo $include . 'past/2011.php' ?>">2011</a></li>
        <li><a href="<? echo $include . 'past/2008/2008.php' ?>">2008</a></li>
      </ul>
    </li>
        <li <?if(isset($page))echo ($page == 'about')? "class='active main'" : "class='main'";?>><a href="<? echo $include . 'aboutus' ?>">Our Team<br></a><span></span>
          <ul>
            <li><a href="<? echo $include . 'aboutus' ?>">Our Team</a></li>
            <li><a href="<? echo $include . 'aboutus/our_partners.php' ?>">Our Partners</a></li>
            <li><a href="<? echo $include . 'aboutus/our_sponsors.php' ?>">Our Sponsors</a></li>
      <li><a href="<? echo $include . 'aboutus/our_advisors.php' ?>">Our Advisors</a><li>
          </ul>
        </li>

    
    <li <?if(isset($page))echo ($page == 'contact')? "class='active last main'" : "class='last main'";?>><a href="<? echo $include . 'contact' ?>">Contact Us<br></a><span></span>
       <ul>
      <li><a href="<? echo $include . 'contact' ?>">Contact Us</a></li>
            <li><a href="<? echo $include . 'contact/join.php' ?>">Join our team</a></li>
            <li><a href="<? echo $include . 'contact/donate.php' ?>">Donate</a></li>
          </ul>
        </li>
  </ul>
    </div>
    <div id="logo">
      <a class="clear" href="<? echo $include . '' ?>"><img class="img" src="<? echo $include . 'images/logo.png' ?>" /></a>
    <h2><p><a style="background-color: white; " href="<? echo $include . '' ?>">Initiating <br>Mutual <br>Understanding Through <br>Student <br> Exchange</p></h2></a>
    </div>
  <br><br><br><br><br>
  </div>
</div>
