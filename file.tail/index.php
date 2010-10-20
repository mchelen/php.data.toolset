<?php
/**
* author: Michael Chelen http://mikechelen.com http://twitter.com/mikechelen
* license: Creative Commons Zero
* returns some lines of a csv file
*/
if ((strlen($_GET["url"])>0)&&($_GET["count"]>0)) {
  // file url
  $url = $_GET["url"];
  $count = $_GET["count"];
  // open remote file
  $lines = file($url);
  $total = count($lines);
  for ($i=$total-$count;$i<=$total;$i++) {
    print $lines[$i];
  }
}
else {
print '
<html>
  <form method="get">
    URL: <input type="text" name="url" /><br />
    Line Count: <input type="text" name="count" /><br />
    <input type="submit" />
  </form>
</html>
';

}
