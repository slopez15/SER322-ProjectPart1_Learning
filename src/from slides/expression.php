<?php print( '<?xml version = "1.0" encoding = "utf-8"?>' ) ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- expression.php -->
<!-- Regular expressions. -->
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
<title>Regular expressions</title>
</head>
<body>
<?php
$search = "Now is the time";
print( "Test string is: '$search'<br /><br />" );

// call ereg to search for pattern 'Now' in variable search
if ( ereg( "Now", $search ) )
print( "String 'Now' was found.<br />" );

// search for pattern 'Now' in the beginning of the string
if ( ereg( "^Now", $search ) )
print( "String 'Now' found at beginning
of the line.<br />" );

// search for pattern 'Now' at the end of the string
if ( ereg( "Now$", $search ) )
print( "String 'Now' was found at the end
of the line.<br />" );


// search for any word ending in 'ow'
if ( ereg( "[[:<:]]([a-zA-Z]*ow)[[:>:]]", $search, $match ) )
print( "Word found ending in 'ow': " .
$match[ 1 ] . "<br />" );

// search for any words beginning with 't'
print( "Words beginning with 't' found: ");

while ( eregi( "[[:<:]](t[[:alpha:]]+)[[:>:]]",
$search, $match ) )
{
print( $match[ 1 ] . " " );

// remove the first occurrence of a word beginning
// with 't' to find other instances in the string
$search = ereg_replace( $match[ 1 ], "", $search );
} // end while
?><!-- end PHP script -->
</body>
</html>


