<?php
/**
* author: Michael Chelen http://mikechelen.com http://twitter.com/mikechelen
* license: Creative Commons Zero
* returns some lines of a csv file
*/

if (isset($_GET["url"])) {
// file url
  $url = $_GET["url"];
// first line
  $first = $_GET["first"];
// last line
  $last = $_GET["last"];
// include header?
  $header = $_GET["header"];
// open remote file
  $handle = fopen($url, "r");
  $i = 0;
  while (($line = fgets($handle)) && (($i<$last)||($last==-1))) {
// get each line of the file
      $i++;
      if ($i>=$first||($i==1)&&($header==true)){
// if the line is in range, print it
// encoded in UTF-8
        print utf8_encode($line);
      }
  }
  fclose($handle);
}
else {
print '
<html>
  <form method="get">
    URL: <input type="text" name="url" /><br />
    First line: <input type="text" name="first" value="1"/><br />
    Last line: <input type="text" name="last" value="-1"/> (-1 for unlimited)<br />
    Include header: <input type="checkbox" name="header" value="TRUE" /><br />
    <input type="submit" />
  </form>
</html>
';

}
