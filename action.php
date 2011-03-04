<?php

include "connect.php";

if(isset($_POST['submit']))

{

   $name=$_POST['name'];

   $comment=$_POST['comment'];

   if(strlen($name)<1)

   {

      print "You did not enter a name.";

   }

   else if(strlen($comment)<1)

   {

      print "You did not enter a comment.";

   }

   else

   {

      $insert="Insert into visitordata (name,comment) values('$name','$comment')";

      mysql_query($insert) or die("Could not insert comment");

   }

}

?>

<script type="text/javascript">
location.replace("index.php");
</script>