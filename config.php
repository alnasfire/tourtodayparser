<?php
$dblocation = "localhost";
$dbname = "tourtoday";
$dbuser = "root";
$dbpasswd = "";
$dbcnx = @mysql_connect($dblocation, $dbuser, $dbpasswd);
if (!$dbcnx) {
    echo( "<P>Fucking Error 1!!!.</P>" );
    exit();
}
if (!@mysql_select_db($dbname, $dbcnx)) {
    echo( "<P>Fucking Error 2!!!.</P>" );
    exit();
}
?>