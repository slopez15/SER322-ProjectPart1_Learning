 <?php print( '<?xml version = "1.0" encoding = "utf-8"?>' ) ?>
2 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
3 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
4
5 <!-- formDatabase.php -->
6 <!-- Displaying the MailingList database. -->
7 <html xmlns = "http://www.w3.org/1999/xhtml">
8 <head>
9 <title>Search Results</title>
10 <style type = "text/css">
11 body { font-family: arial, sans-serif;
12 background-color: #F0E68C }
13 h3 { color: blue }
14 table { background-color: #ADD8E6 }
15 td { padding-top: 2px;
16 padding-bottom: 2px;
17 padding-left: 4px;
18 padding-right: 4px;
19 border-width: 1px;
20 border-style: inset }
21 </style>
22 </head>
23 <body>
24 <?php
25 extract( $_POST );
26
27 // build SELECT query
28 $query = "SELECT * FROM contacts";
29

30 // Connect to MySQL
31 if ( !( $database = mysql_connect( "localhost",
32 "kona", "kona" ) ) )
33 die( "Could not connect to database </body></html>" );
34
35 // open MailingList database
36 if ( !mysql_select_db( "MailingList", $database ) )
37 die( "Could not open MailingList database </body></html>" );
38
39 // query MailingList database
40 if ( !( $result = mysql_query( $query, $database ) ) )
41 {
42 print( "Could not execute query! <br />" );
43 die( mysql_error() . "</body></html>" );
44 } // end if
45 ?><!-- end PHP script -->
46
47 <h3>Mailing List Contacts</h3>
48 <table>
49 <tr>
50 <td>ID</td>
51 <td>Last Name</td>
52 <td>First Name</td>
53 <td>E-mail Address</td>
54 <td>Phone Number</td>
55 <td>Book</td>
56 <td>Operating System</td>
57 </tr>
58 <?php

59 // fetch each record in result set
60 for ( $counter = 0; $row = mysql_fetch_row( $result );
61 $counter++ )
62 {
63 // build table to display results
64 print( "<tr>" );
65
66 foreach ( $row as $key => $value )
67 print( "<td>$value</td>" );
68
69 print( "</tr>" );
70 } // end for
71
72 mysql_close( $database );
73 ?><!-- end PHP script -->
74 </table>
75 </body>
76 </html>
















