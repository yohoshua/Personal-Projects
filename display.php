<?php

include "connect.php";

$getdata="SELECT * from visitordata order by entryID DESC";

$getdata2=mysql_query($getdata) or die("Could not get data");

$rowsPerPage = 10;
$pageNum = 1;

if(isset($_GET['page']))
{
$pageNum = $_GET['page'];
}

$offset = ($pageNum - 1) * $rowsPerPage;

$query = "SELECT * FROM visitordata ORDER BY entryID DESC LIMIT $offset, $rowsPerPage";
$result = mysql_query($query) or die('Error, query failed');

while(list($entryID, $name, $comment) = mysql_fetch_array($result))
{
echo "<div id='guestbook_name'>$name<br/></div><div id='guestbook_comment'>$comment<br/></div><hr>";
}

// .... previous code

$query    = "SELECT COUNT(entryID) AS numrows FROM visitordata";
$result   = mysql_query($query) or die('Error, query failed');
$row      = mysql_fetch_array($result, MYSQL_ASSOC);
$numrows  = $row['numrows'];

$maxPage  = ceil($numrows/$rowsPerPage);
$nextLink = '';

if($maxPage > 1)
{
   $self = $_SERVER['PHP_SELF'];

   $nextLink = array();

   for($page = 1; $page <= $maxPage; $page++)
   {
      $nextLink[] = "<a href=\"$self?page=$page\">$page</a>";
   }

   $nextLink = "Go to page : " . implode(' - ', $nextLink);
}

?>

<?=$nextLink;?>

