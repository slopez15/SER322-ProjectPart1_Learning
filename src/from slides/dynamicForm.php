1 <?php print( '<?xml version = "1.0" encoding = "utf-8"?>' ) ?>
2 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
3 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
4
5 <!-- dynamicForm.php -->
6 <!-- Dynamic form. -->
7 <html xmlns = "http://www.w3.org/1999/xhtml">
8 <head>
9 <title>Sample form to take user input in XHTML</title>
10 <style type = "text/css">
11 td { padding-top: 2px;
12 padding-bottom: 2px;
13 padding-left: 10px;
14 padding-right: 10px }
15 div { text-align: center }
16 div div { font-size: larger }
17 .name { background-color: #ffffaa }
18 .email { background-color: #ffffbb }
19 .phone { background-color: #ffffcc }
20 .os { background-color: #ffffdd }
21 .smalltext { font-size: smaller }
22 .prompt { color: blue;
23 font-family: sans-serif;
24 font-size: smaller }
25 .largeerror { color: red }
26 .error { color: red;
27 font-size: smaller }
28 </style>
29 </head> 

30 <body>
31 <?php
32 extract( $_POST );
33 $iserror = false;
34
35 // array of book titles
36 $booklist = array( "Internet and WWW How to Program 4e",
37 "C++ How to Program 6e", "Java How to Program 7e",
38 "Visual Basic 2005 How to Program 3e" );
39
40 // array of possible operating systems
41 $systemlist = array( "Windows XP", "Windows Vista",
42 "Mac OS X", "Linux", "Other");
43
44 // array of name values for the text input fields
45 $inputlist = array( "fname" => "First Name",
46 "lname" => "Last Name", "email" => "Email",
47 "phone" => "Phone" );
48
49 // ensure that all fields have been filled in correctly
50 if ( isset ( $submit ) )
51 {
52 if ( $fname == "" )
53 {
54 $formerrors[ "fnameerror" ] = true;
55 $iserror = true;
56 } // end if
57

58 if ( $lname == "" )
59 {
60 $formerrors[ "lnameerror" ] = true;
61 $iserror = true;
62 } // end if
63
64 if ( $email == "" )
65 {
66 $formerrors[ "emailerror" ] = true;
67 $iserror = true;
68 } // end if
69
70 if ( !ereg( "^\([0-9]{3}\)[0-9]{3}-[0-9]{4}$", $phone ) )
71 {
72 $formerrors[ "phoneerror" ] = true;
73 $iserror = true;
74 } // end if
75
76 if ( !$iserror )
77 {
78 // build INSERT query
79 $query = "INSERT INTO contacts " .
80 "( LastName, FirstName, Email, Phone, Book, OS ) " .
81 "VALUES ( '$lname', '$fname', '$email', " .
82 "'" . quotemeta( $phone ) . "', '$book', '$os' )"; 

83
84 // Connect to MySQL
85 if ( !( $database = mysql_connect( "localhost",
86 "kona", "kona" ) ) )
87 die( "Could not connect to database" );
88
89 // open MailingList database
90 if ( !mysql_select_db( "MailingList", $database ) )
91 die( "Could not open MailingList database" );
92
93 // execute query in MailingList database
94 if ( !( $result = mysql_query( $query, $database ) ) )
95 {
96 print( "Could not execute query! <br />" );
97 die( mysql_error() );
98 } // end if
99
100 mysql_close( $database );
101
102 print( "<p>Hi<span class = 'prompt'>
103 <strong>$fname</strong></span>.
104 Thank you for completing the survey.<br />
105
106 You have been added to the
107 <span class = 'prompt'>
108 <strong>$book</strong></span>
109 mailing list.</p>
110 <strong>The following information has been saved
111 in our database:</strong><br />
112

113 <table><tr>
114 <td class = 'name'>Name </td>
115 <td class = 'email'>Email</td>
116 <td class = 'phone'>Phone</td>
117 <td class = 'os'>OS</td>
118 </tr><tr>
119
120 <!-- print each form field’s value -->
121 <td>$fname $lname</td>
122 <td>$email</td>
123 <td>$phone</td>
124 <td>$os</td>
125 </tr></table>
126
127 <br /><br /><br />
128 <div><div>
129 <a href = 'formDatabase.php'>
130 Click here to view entire database.</a>
131 </div>This is only a sample form.
132 You have not been added to a mailing list.
133 </div></body></html>" );
134 die();
135 } // end if
136 } // end if
137
138 print( "<h1>Sample Registration Form.</h1>
139 Please fill in all fields and click Register." );
140 

141 if ( $iserror )
142 {
143 print( "<br /><span class = 'largeerror'>
144 Fields with * need to be filled in properly.</span>" );
145 } // end if
146
147 print( "<!-- post form data to form.php -->
148 <form method = 'post' action = 'dynamicForm.php'>
149 <img src = 'images/user.gif' alt = 'User' /><br />
150 <span class = 'prompt'>
151 Please fill out the fields below.<br /> </span>
152
153 <!-- create four text boxes for user input -->" );
154 foreach ( $inputlist as $inputname => $inputalt )
155 {
156 $inputtext = $inputvalues[ $inputname ];
157
158 print( "<img src = 'images/$inputname.gif'
159 alt = '$inputalt' /><input type = 'text'
160 name = '$inputname' value = '" . $$inputname . "' />" );
161
162 if ( $formerrors[ ( $inputname )."error" ] == true )
163 print( "<span class = 'error'>*</span>" );
164
165 print( "<br />" );
166 } // end foreach
167
168 if ( $formerrors[ "phoneerror" ] )
169 print( "<span class = 'error'>" );

170 else
171 print("<span class = 'smalltext'>");
172
173 print( "Must be in the form (555)555-5555
174 </span><br /><br />
175
176 <img src = 'images/downloads.gif'
177 alt = 'Publications' /><br />
178
179 <span class = 'prompt'>
180 Which book would you like information about?
181 </span><br />
182
183 <!-- create drop-down list containing book names -->
184 <select name = 'book'>" );
185
186 foreach ( $booklist as $currbook )
187 {
188 print( "<option" );
189
190 if ( ( $currbook == $book ) )
191 print( " selected = 'true'" );
192
193 print( ">$currbook</option>" );
194 } // end foreach
195 

196 print( "</select><br /><br />
197 <img src = 'images/os.gif' alt = 'Operating System' />
198 <br /><span class = 'prompt'>
199 Which operating system are you currently using?
200 <br /></span>
201
202 <!-- create five radio buttons -->" );
203
204 $counter = 0;
205
206 foreach ( $systemlist as $currsystem )
207 {
208 print( "<input type = 'radio' name = 'os'
209 value = '$currsystem'" );
210
211 if ( $currsystem == $os )
212 print( "checked = 'checked'" );
213 elseif ( !$os && $counter == 0 )
214 print( "checked = 'checked'" );
215
216 print( " />$currsystem" );
217
218 // put a line break in list of operating systems
219 if ( $counter == 1 ) print( "<br />" );
220 ++$counter;
221 } // end foreach
222

223 print( "<!-- create a submit button -->
224 <br /><input type = 'submit' name = 'submit'
225 value = 'Register' /></form></body></html>" );
226 ?><!-- end PHP script -->







