1 <?php print( '<?xml version = "1.0" encoding = "utf-8"?>' ) ?>
2 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
3 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
4
5 <!-- readCookies.php -->
6 <!-- Displaying the cookie’s contents. -->
7 <html xmlns = "http://www.w3.org/1999/xhtml">
8 <head>
9 <title>Read Cookies</title>
10 <style type = "text/css">
11 body { font-family: arial, sans-serif }
12 table { border-width: 5px;
13 border-style: outset }
14 td { padding: 10px }
15 .key { background-color: #F0E68C }
16 .value { background-color: #FFA500 }
17 </style>
18 </head>
19 <body>
20 <p>
21 <strong>The following data is saved in a cookie on your
22 computer.</strong>
23 </p>
24 <table>
25 <?php
26 // iterate through array $_COOKIE and print
27 // name and value of each cookie 

28 foreach ( $_COOKIE as $key => $value )
29 print( "<tr><td class = 'key' >$key</td>
30 <td class = 'value' >$value</td></tr>" );
31 ?><!-- end PHP script -->
32 </table>
33 </body>
34 </html>





