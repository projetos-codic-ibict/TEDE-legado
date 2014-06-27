<?php
$CONTENT_TYPE = 'Content-type: text/xsl;';
header($CONTENT_TYPE);
header('Content-Disposition: attachment; filename="oainav3.xsl"');
readfile('oainav3.xsl');
?>
