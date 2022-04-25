<!doctype html>
<html lang="en">
  <head>
  <title>LFI</title>
  
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
</head>
<body>

<style>
#first {
padding-top: 5%;

}

#mask {
padding-top: 10%;

}

#block {
display: block;
padding: 10px;
}

</style>
<center>
<h1 id="first">Vunerable Directory Transversal</h1>
<p>Vulnerable parameter 'file'</p>
</center>

<center >
<a href="lfi_fix.php?file=OWASP-top10-2020.pdf">file1.pdf</a>
<a id="block" href="lfi_fix.php?file=SET.pdf">file2.pdf</a>
<a href="lfi_fix.php?file=the-web-application-hackers-handbook.pdf">file3.pdf</a>
</center>

<?php
if (isset($_GET["file"])) { //vulnerable GET parameter, vulnerable to blind xss
$file = $_GET["file"];
$path = getcwd();
$realpath = realpath($file);
if (strpos($realpath, $path) === false)  { 
echo "<center>exploit failed</center>";
}

else {
header('Content-Type: application/pdf');
include($file);
}
}
?>

<center>
<img id="first" src="img/anonymous.png" height="350">
</center>


</body>
</html>

