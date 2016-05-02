<?php print( '<?xml version = "1.0" encoding = "utf-8"?>' ) ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- readCookies.php -->
<!-- Displaying the cookie’s contents. -->
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
<title>Read Cookies</title>
<style type = "text/css">
body { font-family: arial, sans-serif }
table { border-width: 5px;
border-style: outset }
td { padding: 10px }
.key { background-color: #F0E68C }
.value { background-color: #FFA500 }
</style>
</head>
<body>
<p>
<strong>The following data is saved in a cookie on your
computer.</strong>
</p>
<table>
<?php
// iterate through array $_COOKIE and print
// name and value of each cookie 

foreach ( $_COOKIE as $key => $value )
print( "<tr><td class = 'key' >$key</td>
<td class = 'value' >$value</td></tr>" );
?><!-- end PHP script -->
</table>
</body>
</html>





