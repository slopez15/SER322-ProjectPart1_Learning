 <?php
2 // cookies.php
3 // Writing a cookie to the client.
4 extract( $_POST );
5
6 // write each form field’s value to a cookie and set the
7 // cookie’s expiration date
8 setcookie( "Name", $Name, time() + 60 * 60 * 24 * 5 );
9 setcookie( "Height", $Height, time() + 60 * 60 * 24 * 5 );
10 setcookie( "Color", $Color, time() + 60 * 60 * 24 * 5 );
11 ?><!-- end PHP script -->
12
13 <?php print( '<?xml version = "1.0" encoding = "utf-8"?>' ) ?>
14 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
15 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
16
17 <html xmlns = "http://www.w3.org/1999/xhtml">
18 <head>
19 <title>Cookie Saved</title>
20 <style type = "text/css">
21 body { font-family: arial, sans-serif }
22 span { color: blue }
23 </style>
24 </head>
25 <body>
26 <p>The cookie has been set with the following data:</p>
27
28 <!-- print each form field’s value -->
29 <br /><span>Name:</span><?php print( $Name ) ?><br /> 

30 <span>Height:</span><?php print( $Height ) ?><br />
31 <span>Favorite Color:</span>
32 <span style = "color: <?php print( "$Color\">$Color" ) ?>
33 </span><br />
34 <p>Click <a href = "readCookies.php">here</a>
35 to read the saved cookie.</p>
36 </body>
37 </html> 




