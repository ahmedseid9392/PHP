<?php
// read file
$file = fopen("test.txt","r");
fread($file ,'r');
// read entir file
//echo fread($file, filesize("test.txt"));

// create and write file and delete existing file data
// $file = fopen("hello.txt", "a");
// fwrite($file, "Hello World");
//echo fread($file, filesize("test.txt"));
$file=fopen("hello.txt","w");
fwrite($file,"how are you?");
$file = fopen("hello.txt", "a");// append content in to existing file
fwrite($file, "Hello World");
// get file size
echo filesize("hello.txt");
 // check file exist
// if(file_exists("data.txt")){
//     echo "file exist";
// }

// delete file
unlink("data.txt");
// close file
fclose($file);
?>