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
<div class="wrapper col6">
  <div id="copyright">
    <p class="fl_left">&copy; 2011 <a href="<? echo $include . '' ?> ">IMUSE Foundation  |  Site design by Pin-Wen Wang </a></p>
    <p class="fl_right"><a class="clear" href="<? echo $include . 'aboutus/sitemap.php' ?> ">Sitemap</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://projectimuse.cn">中文</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>