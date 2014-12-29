
<?
set_include_path('../include/');
$page = 'about';
$level = 1;
include 'header.php';

$team1 = array(
  array(
    "name" => "Kasina (Noon) Euchukanonchai",
    "title" => "Co-President",
    "email" => "kasinaeu @ college.harvard.edu",
    "class" => "2015",
    "hometown" => "Bangkok, Thailand",
    "concentration" => "Applied Math",
    "hobbies" => "Gardening, piano, reading, badminton",
    "img" => "../images/team/noon.JPG"
  ),
  array(
    "name" => "Anh Ton",
    "title" => "Co-President",
    "email" => "aton @ college.harvard.edu",
    "class" => "2015",
    "concentration" => "Economics and Psychology",
    "hometown" => "Hanoi, Vietnam",
    "hobbies" => "Dancing, wandering around Vietnamnese villages, getting lost in Tokyo, and enjoying street food",
    "img" => "../images/team/anh.jpg"
  ),
  array(
    "name" => "Le Le",
    "title" => "Event Planning Team",
    "email" => "tle @ college.harvard.edu",
    "class" => "2017",
    "concentration" => "Economics and East Asian Studies",
    "hometown" => "Jacksonville, Florida; Hue, Vietnam",
    "hobbies" => "Origami, Biking, Rambling, Wandering aimlessly",
    "img" => "../images/team/le.jpeg"
  ),
  array(
    "name" => "Rose-Ann Thomas",
    "title" => "Event Planning Team",
    "email" => "rthomas01 @ college.harvard.edu",
    "class" => "2015",
    "concentration" => "East Asian Studies",
    "hometown" => "Brooklyn, NY",
    "hobbies" => "Watching marathons of the Colbert Report and Daily Show; Learning languages",
    "img" => "../images/team/roseann.jpg"
  ),
  array(
    "name" => "Ben Chabanon",
    "title" => "Finance Team",
    "email" => "bchabanon @ college.harvard.edu",
    "class" => "2017",
    "concentration" => "Social Studies",
    "hometown" => "Miami, Florida; Paris, France",
    "hobbies" => "Traveling, Languages, and Film",
    "img" => "../images/team/ben.png"
  ),
  array(
    "name" => "Eunice Lee",
    "title" => "Finance Team",
    "email" => "eunicelee @ college.harvard.edu",
    "class" => "2017",
    "concentration" => "History",
    "hometown" => "Southlake, TX",
    "hobbies" => "Reading, NPR, and K-pop",
    "img" => "../images/team/eunice.jpg"
  ),
  array(
    "name" => "Jesse Cheng",
    "title" => "Finance Team",
    "email" => "dcheng @ college.harvard.edu",
    "class" => "2016",
    "concentration" => "Statistics",
    "hometown" => "Houston, TX",
    "hobbies" => "Basketball, climbing and racing",
    "img" => "../images/team/jesse.jpg"
  ),
);

$team2 = array(
  array(
    "name" => "Diane Yang",
    "title" => "Design Team",
    "email" => "dianeyang @ college.harvard.edu",
    "class" => "2016",
    "concentration" => "Computer Science",
    "hometown" => "Stamford, CT",
    "hobbies" => "Drawing, singing, and playing guitar",
    "img" => "../images/team/diane.jpg"
  ),
  array(
    "name" => "Brian J. Oh",
    "title" => "Marketing Team",
    "email" => "boh @ college.harvard.edu",
    "class" => "2015",
    "concentration" => "Statistics",
    "hometown" => "Los Angeles, California",
    "hobbies" => "Violin, computer games, traveling to foreign countries, hanging out",
    "img" => "../images/team/brian.jpg"
  ),
  array(
    "name" => "Schuyler Berland",
    "title" => "Marketing Team",
    "email" => "sberland @ college.harvard.edu",
    "class" => "2016",
    "concentration" => "Social Anthropology",
    "hometown" => "Dix Hills, NY",
    "hobbies" => "Photography and travel",
    "img" => "../images/team/schuyler.jpg"
  ),
  array(
    "name" => "Isabella Chiu",
    "title" => "Strategic Growth Team",
    "email" => "isabellachiu @ college.harvard.edu",
    "class" => "2017",
    "concentration" => "Undecided",
    "hometown" => "Auckland, New Zealand; Toronto, ON",
    "hobbies" => "Photography, learning different languages, exploring cities, eating!",
    "img" => "../images/team/isabella.JPG"
  ),
  array(
    "name" => "Pin-Wen Wang",
    "title" => "Senior Advisor",
    "email" => "pin-wen_wang @ college.harvard.edu",
    "class" => "2014",
    "concentration" => "Electrical Engineering",
    "hometown" => "Houston, TX; Taipei, Taiwan",
    "hobbies" => "Basketball and Ultimate Frisbee",
    "img" => "../images/team/pin_wen.jpg"
  ),
  array(
    "name" => "Sue Ling Dong",
    "title" => "Senior Advisor",
    "email" => "sldong @ college.harvard.edu",
    "class" => "2013",
    "concentration" => "Human Evolutionary Biology",
    "hometown" => "New York, NY",
    "hobbies" => "Yoga, Travelling, and Photography",
    "img" => "../images/team/sue_ling.jpg"
  ),
  array(
    "name" => "Michael Puett",
    "title" => "Academic Advisor",
    "email" => "puett @ college.harvard.edu",
    "description" => "Professor of Chinese History in the Department of East Asian Languages and Civilizations",
    "hobbies" => "Inter-relations between anthropology, history, religion, and philosophy",
    "img" => "../images/team/puett.jpg"
  ),
);

?>
<div id="top" class="wrapper col4">
  <div id="container">
    <h2>2013-2014 Organizing Committee</h2>
  <div id="table">  
  <table>
  <tbody>
    <tr class="light">
    <td><a href="#harvard">Harvard University Team</a></td>
    <td><a href="#pku">Peking University Team</a></td>
    <td><a href="#thu">Tsinghua University Team</a></td>
    </tr>
   </tbody>
   </table>
   </div>
   <br><br>
   <div id="harvard">
      <h2>Harvard University Team</h2>
    <p>
    The U.S IMUSE Team consists of undergraduate students of Harvard University&nbsp;&nbsp;&nbsp;
    <a href="#top">Back to top</a><br><br>
    </p>
  </div>

<div style="float: left; width: 50%; ">
 <ul>
  <li>
    <? foreach($team1 as $member) {
        print "<div class='propic' style= \"background-image: url('" . $member["img"]. "');\"></div>
           <h3>". $member["name"] . "</h3>
           <strong>" . $member["title"] . "</strong>
         <br><i>" . $member["email"] . "</i><br>
         <br>Class of " . $member["class"] . " in " . $member["concentration"] .
           "<br>Hometown: " . $member["hometown"] .
           "<br>Hobbies: " . $member["hobbies"] .
           "<br><br><br><br>
       </li>"; 
      } ?>
  </ul>
</div>
<div style="float: right; width: 50%;">
  <ul>
    <? foreach($team2 as $member) {
    if($member["name"] === "Michael Puett") {
      print "<div class='propic' style= \"background-image: url('" . $member["img"]. "');\"></div>
         <h3>". $member["name"] . "</h3>
         <strong>" . $member["title"] . "</strong>
       <br><i>" . $member["email"] . "</i><br>
       <br>" . $member["description"] .
         "<br>Hobbies: " . $member["hobbies"] .
         "<br><br><br><br>
     </li>";
      }
    else {
      print "<div class='propic' style= \"background-image: url('" . $member["img"]. "');\"></div>
         <h3>". $member["name"] . "</h3>
         <strong>" . $member["title"] . "</strong>
       <br><i>" . $member["email"] . "</i><br>
       <br>Class of " . $member["class"] . " in " . $member["concentration"] .
         "<br>Hometown: " . $member["hometown"] .
         "<br>Hobbies: " . $member["hobbies"] .
         "<br><br><br><br>
     </li>";
      } 
    } ?>
  </ul>
</div>

    <div class="clear"></div>
  </div>

  <div id="container">
  <div  id="pku">
      <h2>Peking University Team</h2>  
    <p>
    The PKU IMUSE Team consists of undergraduate students of Peking University&nbsp;&nbsp;&nbsp;
    <a href="#top">Back to top</a>
    <br><br>
    </p>
<div>
<div style="float: left; width: 50%; ">
  <ul>
  <li>
      <img class="imgl" src="../images/team/pku/henry.jpg"/>
       <h3>Henry</h3>
       <strong>President</strong>
     <br><i>cyccy1108@126.com</i><br>
     <br>Class of 2015 in German History
       <br>Hometown: Suzhou, Jiangsu Province
       <br>Hobbies:Playing badminton, Watching soccer games, Reading history and literature, Traveling
       <br><br><br>
   </li>
   <li>
    <img class="imgl" src="../images/team/pku/ellen.jpg"/>
       <h3>Ellen</h3>
       <strong>Co-Vice President</strong>
     <br><i>ellen56@sina.com</i><br>
     <br>Class of 2015 in Hebrew
       <br>Hometown: Jinan, Shandong Province
       <br>Hobbies: Chinese Calligraphy, Brush Art, Public Speaking, Swimming, Traveling
       <br><br><br><br>
   </li>
   <li>
    <img class="imgl" src="../images/team/pku/hermione.jpg"/>
       <h3>Hermione</h3>
       <strong>Associate</strong>
     <br><i>hermionexiongmin@yahoo.cn</i><br>
     <br>Class of 2014 in Mass Communication
       <br>Hometown: Yueyang, Hunan Province
       <br>Hobbies: Traveling, Movies, Badminton
       <br><br><br>
   </li>
  <li>
    <img class="imgl" src="../images/team/pku/april.jpg"/>
       <h3>April</h3>
       <strong>Associate</strong>
     <br><i>wss19930404@gmail.com</i><br>
     <br>Class of 2014 in Finance
       <br>Hometown: Tianjin
       <br>Hobbies: Sports, Music, Reading novels, Playing computer games
       <br><br><br>
  </li>  
  <li>
    <img class="imgl" src="../images/team/pku/louis.jpg"/>
       <h3>Louis</h3>
       <strong>Associate</strong>
     <br><i>qqqlouis@gmail.com</i><br>
     <br>Class of 2016 in Korean Language and Culture
       <br>Hometown: Xiamen, Fujian Province
       <br>Hobbies: Traveling, Badminton, Swimming, Languae Studies
       <br><br><br>
  </li>
  <li>
    <img class="imgl" src="../images/team/pku/vivien.jpg"/>
       <h3>Vivien</h3>
       <strong>Associate</strong>
     <br><i>vivienni9@163.com</i><br>
     <br>Class of 2016 in Persian Language and Literature
       <br>Hometown: Shenzhen, Guangdong
       <br>Hobbies: Traveling, Photography, Reading books, Movies
       <br><br><br>
  </li>
    <li>
    <img class="imgl" src="../images/team/pku/riley.jpg"/>
       <h3>Riley</h3>
       <strong>Associate</strong>
     <br><i>wwwyounanriley@sina.com</i><br>
     <br>Class of 2016 in History
       <br>Hometown: Yangzhou, Jiangsu Province
       <br>Hobbies: Reading, Languages, Global affairs, Eating nice food
	   <br><br><br>
  </li>
      <li>
    <img class="imgl" src="../images/team/pku/philips.jpg"/>
       <h3>Philips</h3>
       <strong>Associate</strong>
     <br><i>osxfl@yahoo.com</i><br>
     <br>Class of 2015 in Economics
       <br>Hometown: Beijing
       <br>Hobbies: Writing, Drama, Literature, Classical music
	   <br><br><br><br>
  </li>
  <li>
  <li>
  <img style="padding: 0 0 0 150px;" class="fl_left" src="../images/team/pku/pku.jpg"/>
  </li>
  </ul>
</div>
<div style="float: right; width: 50%;">
  <ul>
  <li>
      <img class="imgl" src="../images/team/pku/aishea.jpg"/>
       <h3>Aishea</h3>
       <strong>Co-Vice President</strong>
     <br><i>aisheaye@gmail.com</i><br>
     <br>Class of 2015 in German Language and Literature
       <br>Hometown: Shanghai
       <br>Hobbies: Film, Reading, Traveling
       <br><br><br>
   </li>
   <li>
    <img class="imgl" src="../images/team/pku/sophie.jpg"/>
       <h3>Sophia</h3>
       <strong>Director</strong>
     <br><i>xuanhaozhu@gmail.com</i><br>
     <br>Class of 2015 in International Relations
       <br>Hometown: Zhengzhou, Henan Province
       <br>Hobbies: Photography, Traveling
       <br><br><br>
   </li>
   <li>
    <img class="imgl" src="../images/team/pku/cathy.jpg"/>
       <h3>Cathy</h3>
       <strong>Associate</strong>
     <br><i>wangyatianzhuo@yahoo.cn</i><br>
     <br>Class of 2015 in English Literature
       <br>Hometown: Beijing
       <br>Hobbies: Novels, Movies, Music
       <br><br><br>
   </li>
  <li>
    <img class="imgl" src="../images/team/pku/yifan.jpg"/>
       <h3>Yang Yi Fan</h3>
       <strong>Associate</strong>
     <br><i>sisyangyifan@163.com</i><br>
     <br>Class of 2016 in International Relations
       <br>Hometown: Beijing
       <br>Hobbies: Italian, Traveling, Studying theories of international relations, Cycling, Fishing
       <br><br><br>
  </li>  
  <li>
    <img class="imgl" src="../images/team/pku/steven.jpg"/>
       <h3>Steven</h3>
       <strong>Associate</strong>
     <br><i>stevenliremix@gmail.com</i><br>
     <br>Class of 2014 in Arabic Language and Literature
       <br>Hometown: Shi Jiazhuang, Hebei Province
       <br>Hobbies: Break dancing, Tennis, Classical guitar
       <br><br><br>
  </li>
  <li>
    <img class="imgl" src="../images/team/pku/elissa.jpg"/>
       <h3>Elissa</h3>
       <strong>Associate</strong>
     <br><i>sjy93528@163.com</i><br>
     <br>Class of 2015 in Law School
       <br>Hometown: Chengdu, Sichuan
       <br>Hobbies: Photography, Traveling, Movies, Music, International Communication
       <br><br><br>
  </li>
    <li>
    <img class="imgl" src="../images/team/pku/angela.jpg"/>
       <h3>Angela</h3>
       <strong>Associate</strong>
     <br><i>powderblue7777@gmail.com</i><br>
     <br>Class of 2016 in Sociology
       <br>Hometown: Shanghai
       <br>Hobbies: Calligraphy, Drawing, Dancing, Volunteer work
	   <br><br><br><br>
  </li>

  </li>

  </ul>
</div>

    <div class="clear"></div>
  </div>

  <div id="container">
  <div id="thu">
      <h2>THU Team</h2>
    <p>
    The THU IMUSE Team consists of undergraduate students of Tsinghua University&nbsp;&nbsp;&nbsp;
    <a href="#top">Back to top</a>
    <br><br></p>
  </div>   
<div style="float: left; width: 50%; ">
  <ul>
      <li><img class="imgl" src="../images/team/thu/linyr.JPG"/>
       <h3>Lin Yang Rui</h3>
     <strong>President</strong>
     <br><i>linyr1993@gmail.com</i><br>
       <br>Class of 2011 in Economics and Management
       <br>Hometown: Fuzhou Fujian
       <br>Hobbies: Ballroom Dancing, Music
       <br><br><br><br>
   </li>
   <li>
    <img class="imgl" src="../images/team/thu/xuehao.JPG"/>
       <h3>Xue Hao</h3>
       <strong>Co-Vice President</strong>
     <br><i>kittyxuehao@gmail.com</i><br>
     <br>Class of 2015 in Foreign Languages and Literatures
       <br>Hometown: Shanghai
       <br>Hobbies: Chinese Calligraphy, Photography
       <br><br><br><br>
   </li>
   <li>
    <img class="imgl" src="../images/team/thu/wangyifan.jpg"/>
       <h3>Wang Yi Fan</h3>
       <strong>Finance and Planning Associate</strong>
     <br><i>wangyfsail@gmail.com</i><br>
     <br>Class of 2015 in Chinese Language and Literature
       <br>Hometown: Jinhua, Zhejiang Province
       <br>Hobbies: Reading, Creative Writing, Films, Swimming, Traveling
       <br><br><br><br>
   </li>
   <li>
    <img class="imgl" src="../images/team/thu/tujie.JPG"/>
       <h3>Tu Jie</h3>
       <strong>Finance and Marketing Associate</strong>
     <br><i>tujiecool@gmail.com</i><br>
     <br>Class of 2015 in Materials Science and Engineering
       <br>Hometown: Changsha, Hunan
       <br>Hobbies: Basketball, Music
       <br><br><br><br>
   </li>
  <li>
    <img class="imgl" src="../images/team/thu/chen.jpg"/>
       <h3>Chen Hao Xian</h3>
       <strong>Publicity Associate</strong>
     <br><i>chenhx.asic@gmail.com</i><br>
     <br>Class of 2016 in Electronic Engineering
       <br>Hometown: Zhuhai, Guangdong
       <br>Hobbies: Soccer
       <br><br><br><br>
  </li>
  <li>
      <img class="imgl" src="../images/team/thu/slillian.jpg"/>
       <h3>Sha Ye Xing</h3>
       <strong>Publicity Associate</strong>
     <br><i>hslillian0527@gmail.com@gmail.com</i><br>
     <br>Class of 2016 in Architecture
       <br>Hometown: Shanghai
       <br>Hobbies: Reading
       <br><br><br><br>
   </li>
     <li>
    <img class="imgl" src="../images/team/thu/zyx.jpg"/>
       <h3>Zhang Yun Xi</h3>
       <strong>Publicity Associate</strong>
     <br><i>onlyrafael.zyx@gmail.com</i><br>
     <br>Class of 2016 in Economics and Finance
       <br>Hometown: Beijing
       <br>Hobbies: Billards, Tennis
       <br>
  </li>
  </ul>
</div>
<div style="float: right; width: 50%;">
  <ul>
   <li>
   <img class="imgl" src="../images/team/thu/letian.jpg"/>
       <h3>Shi Le Tian</h3>
       <strong>Co-Vice President</strong>
     <br><i>lane.ontheway@gmail.com</i><br>
     <br>Class of 2015 in Electrical Engineering
       <br>Hometown: Suzhou, Jiangsu
       <br>Hobbies: Photography
       <br><br><br><br>
   </li>
   <li>
    <img class="imgl" src="../images/team/thu/majiaqi.JPG"/>
       <h3>Ma Jia Qi</h3>
       <strong>Finance and Planning Associate</strong>
     <br><i>majiaqihill@gmail.com</i><br>
     <br>Class of 2015 in Economics and Finance
       <br>Hometown: Lanzhou, Gansu
       <br>Hobbies: Astronomy, DOTA, Movies
       <br><br><br><br>
   </li>
   <li>
    <img class="imgl" src="../images/team/thu/zhangfan.JPG"/>
       <h3>Zhang Fan</h3>
       <strong>Finance and Planning Associate</strong>
     <br><i>tempszf@gmail.com</i><br>
     <br>Class of 2016 in Electrical Engineering
       <br>Hometown: Danyang, Jiansu
       <br>Hobbies: Literature
       <br><br><br>
   </li>
   <li>
    <img class="imgl" src="../images/team/thu/maoxinyi.jpg"/>
       <h3>Mao Xin Yi</h3>
       <strong>Finance and Planning Associate</strong>
     <br><i>maoxinyihey@gmail.com</i><br>
     <br>Class of 2016 in Social Science
       <br>Hometown: Nanjing, Jiangsu
       <br>Hobbies: Traveling, Violin, Reading
       <br><br><br>
   </li>
  <li>
    <img class="imgl" src="../images/team/thu/songyiqiao.jpg"/>
       <h3>Sun Yi Qiao</h3>
       <strong>Publicity Associate</strong>
     <br><i>sunyiqiaothu@gmail.com</i><br>
     <br>Class of 2016 in Electronic Engineering
       <br>Hometown: Neijiang, Sichuan
       <br>Hobbies: DOTA, Literature
       <br><br><br>
  </li>  
    <li>
    <img class="imgl" src="../images/team/thu/yanxue.jpg"/>
       <h3>Yan Xue</h3>
       <strong>Publicity Associate</strong>
     <br><i>yanxu.miao@gmail.com</i><br>
     <br>Class of 2016 in Electronic Engineering
       <br>Hometown: Neijiang, Sichuan
       <br>Hobbies: DOTA, Literature
       <br><br><br>
  </li>  
  <li>
    <img class="imgl" src="../images/team/thu/sitianliao.jpg"/>
       <h3>Shi Tian Lin </h3>
       <strong>Publicity Associate</strong>
     <br><i>stl501@gmail.com</i><br>
     <br>Class of 2015 in Computer Science
       <br>Hometown: Shanghai
       <br>Hobbies: Music, Game, Technology
       <br>
  </li>
  </ul>
</div>

    <div class="clear"></div>
  </div>
</div>
</div>
<? include 'footer.php'; ?>