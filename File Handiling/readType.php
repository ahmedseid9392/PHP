<?php
$filename="abc.txt";
$fh=fopen("$filename", "r");
if (!file_exists($filename))
{ // Check for file existence
print "No such file or directory";
exit(); }
else {
while(!feof($fh)) // feof if check the file end
{
$content= fgets($fh);
echo $content ."<br>";
}

$filename="test.txt";
$content=file_get_contents($filename);
echo $content; 
fclose($fh); }
?>
