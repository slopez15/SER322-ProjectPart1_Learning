<?php print( '<?xml version = "1.0" encoding = "utf-8"?>' ) ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- form.php -->
<!-- Process information sent from form.html. -->
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
<title>Form Validation</title>
<style type = "text/css">
body { font-family: arial, sans-serif }
div { font-size: 10pt;
text-align: center }
table { border: 0 }
td { padding-top: 2px;
padding-bottom: 2px;
padding-left: 10px;
padding-right: 10px }
.error { color: red }
.distinct { color: blue }
.name { background-color: #ffffaa }
.email { background-color: #ffffbb }
.phone { background-color: #ffffcc }
.os { background-color: #ffffdd }
</style>
</head>
<body> 

<?php
extract( $_POST );

// determine whether phone number is valid and print
// an error message if not
if ( !ereg( "^\([0-9]{3}\)[0-9]{3}-[0-9]{4}$", $phone ) )
{
print( "<p><span class = 'error'>
Invalid phone number</span><br />
A valid phone number must be in the form
<strong>(555)555-5555</strong><br />
<span class = 'distinct'>
Click the Back button, enter a valid phone
number and resubmit.<br /><br />
Thank You.</span></p>" );
die( "</body></html>" ); // terminate script execution
}
?><!-- end PHP script -->
<p>Hi
<span class = "distinct">
<strong><?php print( "$fname" ); ?></strong>
</span>.
Thank you for completing the survey.<br />
You have been added to the
<span class = "distinct">
<strong><?php print( "$book " ); ?></strong>
</span>
mailing list.

</p>
<p><strong>The following information has been saved
in our database:</strong></p>
<table>
<tr>
<td class = "name">Name </td>
<td class = "email">Email</td>
<td class = "phone">Phone</td>
<td class = "os">OS</td>
</tr>
<tr>
<?php
// print each form field’s value
print( "<td>$fname $lname</td>
<td>$email</td>
<td>$phone</td>
<td>$os</td>" );
?><!-- end PHP script -->
</tr>
</table>
<br /><br /><br />
<div>This is only a sample form.
You have not been added to a mailing list.</div>
</body>
</html> 

