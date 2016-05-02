<?php print( '<?xml version = "1.0" encoding = "utf-8"?>' ) ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- dynamicForm.php -->
<!-- Dynamic form. -->
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
<title>Sample form to take user input in XHTML</title>
<style type = "text/css">
td { padding-top: 2px;
padding-bottom: 2px;
padding-left: 10px;
padding-right: 10px }
div { text-align: center }
div div { font-size: larger }
.name { background-color: #ffffaa }
.email { background-color: #ffffbb }
.phone { background-color: #ffffcc }
.os { background-color: #ffffdd }
.smalltext { font-size: smaller }
.prompt { color: blue;
font-family: sans-serif;
font-size: smaller }
.largeerror { color: red }
.error { color: red;
font-size: smaller }
</style>
</head> 

<body>
<?php
extract( $_POST );
$iserror = false;

// array of book titles
$booklist = array( "Internet and WWW How to Program 4e",
"C++ How to Program 6e", "Java How to Program 7e",
"Visual Basic 2005 How to Program 3e" );

// array of possible operating systems
$systemlist = array( "Windows XP", "Windows Vista",
"Mac OS X", "Linux", "Other");

// array of name values for the text input fields
$inputlist = array( "fname" => "First Name",
"lname" => "Last Name", "email" => "Email",
"phone" => "Phone" );

// ensure that all fields have been filled in correctly
if ( isset ( $submit ) )
{
if ( $fname == "" )
{
$formerrors[ "fnameerror" ] = true;
$iserror = true;
} // end if


if ( $lname == "" )
{
$formerrors[ "lnameerror" ] = true;
$iserror = true;
} // end if

if ( $email == "" )
{
$formerrors[ "emailerror" ] = true;
$iserror = true;
} // end if

if ( !ereg( "^\([0-9]{3}\)[0-9]{3}-[0-9]{4}$", $phone ) )
{
$formerrors[ "phoneerror" ] = true;
$iserror = true;
} // end if

if ( !$iserror )
{
// build INSERT query
$query = "INSERT INTO contacts " .
"( LastName, FirstName, Email, Phone, Book, OS ) " .
"VALUES ( '$lname', '$fname', '$email', " .
"'" . quotemeta( $phone ) . "', '$book', '$os' )"; 


// Connect to MySQL
if ( !( $database = mysql_connect( "localhost",
"kona", "kona" ) ) )
die( "Could not connect to database" );

// open MailingList database
if ( !mysql_select_db( "MailingList", $database ) )
die( "Could not open MailingList database" );

// execute query in MailingList database
if ( !( $result = mysql_query( $query, $database ) ) )
{
print( "Could not execute query! <br />" );
die( mysql_error() );
} // end if

mysql_close( $database );

print( "<p>Hi<span class = 'prompt'>
<strong>$fname</strong></span>.
Thank you for completing the survey.<br />

You have been added to the
<span class = 'prompt'>
<strong>$book</strong></span>
mailing list.</p>
<strong>The following information has been saved
in our database:</strong><br />


<table><tr>
<td class = 'name'>Name </td>
<td class = 'email'>Email</td>
<td class = 'phone'>Phone</td>
<td class = 'os'>OS</td>
</tr><tr>

<!-- print each form field’s value -->
<td>$fname $lname</td>
<td>$email</td>
<td>$phone</td>
<td>$os</td>
</tr></table>

<br /><br /><br />
<div><div>
<a href = 'formDatabase.php'>
Click here to view entire database.</a>
</div>This is only a sample form.
You have not been added to a mailing list.
</div></body></html>" );
die();
} // end if
} // end if

print( "<h1>Sample Registration Form.</h1>
Please fill in all fields and click Register." );


if ( $iserror )
{
print( "<br /><span class = 'largeerror'>
Fields with * need to be filled in properly.</span>" );
} // end if

print( "<!-- post form data to form.php -->
<form method = 'post' action = 'dynamicForm.php'>
<img src = 'images/user.gif' alt = 'User' /><br />
<span class = 'prompt'>
Please fill out the fields below.<br /> </span>

<!-- create four text boxes for user input -->" );
foreach ( $inputlist as $inputname => $inputalt )
{
$inputtext = $inputvalues[ $inputname ];

print( "<img src = 'images/$inputname.gif'
alt = '$inputalt' /><input type = 'text'
name = '$inputname' value = '" . $$inputname . "' />" );

if ( $formerrors[ ( $inputname )."error" ] == true )
print( "<span class = 'error'>*</span>" );

print( "<br />" );
} // end foreach

if ( $formerrors[ "phoneerror" ] )
print( "<span class = 'error'>" );

else
print("<span class = 'smalltext'>");

print( "Must be in the form (555)555-5555
</span><br /><br />

<img src = 'images/downloads.gif'
alt = 'Publications' /><br />

<span class = 'prompt'>
Which book would you like information about?
</span><br />

<!-- create drop-down list containing book names -->
<select name = 'book'>" );

foreach ( $booklist as $currbook )
{
print( "<option" );

if ( ( $currbook == $book ) )
print( " selected = 'true'" );

print( ">$currbook</option>" );
} // end foreach


print( "</select><br /><br />
<img src = 'images/os.gif' alt = 'Operating System' />
<br /><span class = 'prompt'>
Which operating system are you currently using?
<br /></span>

<!-- create five radio buttons -->" );

$counter = 0;

foreach ( $systemlist as $currsystem )
{
print( "<input type = 'radio' name = 'os'
value = '$currsystem'" );

if ( $currsystem == $os )
print( "checked = 'checked'" );
elseif ( !$os && $counter == 0 )
print( "checked = 'checked'" );

print( " />$currsystem" );

// put a line break in list of operating systems
if ( $counter == 1 ) print( "<br />" );
++$counter;
} // end foreach


print( "<!-- create a submit button -->
<br /><input type = 'submit' name = 'submit'
value = 'Register' /></form></body></html>" );
?><!-- end PHP script -->







