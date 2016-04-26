1 <?php print( '<?xml version = "1.0" encoding = "utf-8"?>' ) ?>
2 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
3 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
4
5 <!-- expression.php -->
6 <!-- Regular expressions. -->
7 <html xmlns = "http://www.w3.org/1999/xhtml">
8 <head>
9 <title>Regular expressions</title>
10 </head>
11 <body>
12 <?php
13 $search = "Now is the time";
14 print( "Test string is: '$search'<br /><br />" );
15
16 // call ereg to search for pattern 'Now' in variable search
17 if ( ereg( "Now", $search ) )
18 print( "String 'Now' was found.<br />" );
19
20 // search for pattern 'Now' in the beginning of the string
21 if ( ereg( "^Now", $search ) )
22 print( "String 'Now' found at beginning
23 of the line.<br />" );
24
25 // search for pattern 'Now' at the end of the string
26 if ( ereg( "Now$", $search ) )
27 print( "String 'Now' was found at the end
28 of the line.<br />" );
29

30 // search for any word ending in 'ow'
31 if ( ereg( "[[:<:]]([a-zA-Z]*ow)[[:>:]]", $search, $match ) )
32 print( "Word found ending in 'ow': " .
33 $match[ 1 ] . "<br />" );
34
35 // search for any words beginning with 't'
36 print( "Words beginning with 't' found: ");
37
38 while ( eregi( "[[:<:]](t[[:alpha:]]+)[[:>:]]",
39 $search, $match ) )
40 {
41 print( $match[ 1 ] . " " );
42
43 // remove the first occurrence of a word beginning
44 // with 't' to find other instances in the string
45 $search = ereg_replace( $match[ 1 ], "", $search );
46 } // end while
47 ?><!-- end PHP script -->
48 </body>
49 </html>


