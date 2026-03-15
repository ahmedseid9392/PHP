<!-- <?php 
$text="Ahmed  Seid Ali  ";

echo  "to lower case  ".strtolower($text)."<br>";
echo  "to upper case  ".strtoupper($text)."<br>";
echo  "to capitalize  ".ucfirst($text)."<br>";
echo  "to length  ".strlen($text)."<br>";
echo  "to trim  " .trim($text)."<br>";
echo  "to word count  ".str_word_count($text)."<br>";
echo  "to capitalize first leter of word  ".ucwords($text)."<br>";
echo  "string reverse  ".strrev($text)."<br>";
echo  "search  ".strpos($text,"Ali")."<br>";
echo  "sub string  ".substr($text,0,10)."<br>";
echo  "to capitalize first leter of word  ".ucwords($text)."<br>";

?> -->

<?php 
$firstString = "The quick brown fox"; 
$secondString = " jumped over the lazy dog."; 
$thirdString = $firstString; 
$thirdString .= $secondString; // Concatentation 
echo $thirdString; ?><br />
Lowercase: <?php echo strtolower($thirdString); ?><br /> 
Uppercase: <?php echo strtoupper($thirdString); ?><br /> 
Uppercase first-letter: <?php echo ucfirst($thirdString); ?><br /> 
Uppercase words: <?php echo ucwords($thirdString); ?><br /> 
Length: <?php echo strlen($thirdString); ?><br /> 
Number of Word: <?php echo str_word_count($thirdString); ?><br /> 
Trim: <?php echo $firstString . trim($secondString); ?><br /> 
Replace by string: <?php echo str_replace("quick", "super-fast", $thirdString); ?><br /> 