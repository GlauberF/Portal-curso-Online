
<?php

$file = $_REQUEST['pdf'];
$filename = 'Custom file name for the.pdf'; /* Note: Always use .pdf at the end. */

header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary/octet-stream');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');
@readfile($file);
    
?>
