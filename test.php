<?php
$key = '<p><strong>October 2017</strong></p><table cellpadding="5">';
$newline = PHP_EOL . 'TESTLINE' . PHP_EOL;

//copy file to prevent double entry
$file = "newsadd.php";
$newfile = "newsaddbuffer.php";
copy($file, $newfile) or exit("failed to copy $file");

//load file into $lines array
 $fc = fopen ($file, "r");
 while (!feof ($fc))
 {
    $buffer = fgets($fc, 4096);
    $lines[] = $buffer;
 }

fclose ($fc);

//open same file and use "w" to clear file
$f=fopen($newfile,"w") or die("couldn't open $file");

//loop through array using foreach
foreach($lines as $line)
{
    if (strstr($line,$key)) //look for $key in each line
  {
		$pos = strpos($key, '">');
		$line = substr_replace($key, $newline, $pos + 2, 0);
  }
    fwrite($f,$line); //place $line back in file
}
fclose($f);

copy($newfile, $file) or exit("failed to copy $newfile");
?>
