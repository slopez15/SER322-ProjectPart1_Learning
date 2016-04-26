1 <?php print( '<?xml version = "1.0" encoding = "utf-8"?>' ) ?>
2 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
3 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
4
5 <!-- form.php -->
6 <!-- Process information sent from form.html. -->
7 <html xmlns = "http://www.w3.org/1999/xhtml">
8 <head>
9 <title>Form Validation</title>
10 <style type = "text/css">
11 body { font-family: arial, sans-serif }
12 div { font-size: 10pt;
13 text-align: center }
14 table { border: 0 }
15 td { padding-top: 2px;
16 padding-bottom: 2px;
17 padding-left: 10px;
18 padding-right: 10px }
19 .error { color: red }
20 .distinct { color: blue }
21 .name { background-color: #ffffaa }
22 .email { background-color: #ffffbb }
23 .phone { background-color: #ffffcc }
24 .os { background-color: #ffffdd }
25 </style>
26 </head>
27 <body> 

28 <?php
29 extract( $_POST );
30
31 // determine whether phone number is valid and print
32 // an error message if not
33 if ( !ereg( "^\([0-9]{3}\)[0-9]{3}-[0-9]{4}$", $phone ) )
34 {
35 print( "<p><span class = 'error'>
36 Invalid phone number</span><br />
37 A valid phone number must be in the form
38 <strong>(555)555-5555</strong><br />
39 <span class = 'distinct'>
40 Click the Back button, enter a valid phone
41 number and resubmit.<br /><br />
42 Thank You.</span></p>" );
43 die( "</body></html>" ); // terminate script execution
44 }
45 ?><!-- end PHP script -->
46 <p>Hi
47 <span class = "distinct">
48 <strong><?php print( "$fname" ); ?></strong>
49 </span>.
50 Thank you for completing the survey.<br />
51 You have been added to the
52 <span class = "distinct">
53 <strong><?php print( "$book " ); ?></strong>
54 </span>
55 mailing list.

56 </p>
57 <p><strong>The following information has been saved
58 in our database:</strong></p>
59 <table>
60 <tr>
61 <td class = "name">Name </td>
62 <td class = "email">Email</td>
63 <td class = "phone">Phone</td>
64 <td class = "os">OS</td>
65 </tr>
66 <tr>
67 <?php
68 // print each form field’s value
69 print( "<td>$fname $lname</td>
70 <td>$email</td>
71 <td>$phone</td>
72 <td>$os</td>" );
73 ?><!-- end PHP script -->
74 </tr>
75 </table>
76 <br /><br /><br />
77 <div>This is only a sample form.
78 You have not been added to a mailing list.</div>
79 </body>
80 </html> 

