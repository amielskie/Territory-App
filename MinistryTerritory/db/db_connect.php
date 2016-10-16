

<?php 
/* ENABLE FOR CHECKING LOCAL SERVER */
$dbc = @mysql_connect('localhost', 'root', '') 
or die('Error connecting to MySQL server.'); 

mysql_select_db('Milano', $dbc)
        or die('Cannot Find Database.');

?>


