<?php

if(isset($_GET['link'])){
	$link = $_GET['link'];
	$pos = strpos($link,"https");
	$substr = substr($link, $pos);
	$tempstr1 = str_replace("=2", ":", $substr);
	$tempstr2 = str_replace("=1", ".", $tempstr1);
	$tempstr3 = str_replace("jpg.2", "jpg", $tempstr2);
	$request_url = $tempstr3;
	$hitsFile = fopen("hitCounter.txt", "r+"); 
	$prevHits = intval(fread($hitsFile, filesize("hitCounter.txt")));
	$newHits = $prevHits+1;
	fclose($hitsFile);
	$hitsFileWrite = fopen("hitCounter.txt", "w+");
	fwrite($hitsFileWrite, $newHits);
	fclose($hitsFileWrite);
	header("Location: $request_url");
}else
{

?>
<!DOCTYPE html>
<html>
<head>
	<title>InstaSaver</title>
	<style type="text/css">
		body{
			background-color: #e3e3e3;
			text-align: justify;
			margin: 0 auto;
			padding: 20px;
			box-shadow: 0px 5px grey;
		}
	</style>
</head>
<body>
<?php
	$showHits = file_get_contents("hitCounter.txt");
	echo "<h1>InstaSaver</h1><hr>";
	echo "<h2>Intro</h2>";
	echo "<p>Ever wanted to download Instagram photos on your desktop.There are some beautiful
	images where sometimes touches your hearts, mind and soul.So how to download the images?<br>";
	echo "Why I am writing this if you can just right click and save the images?<br>
	Nope you cant.But yes you can download the images.How is the next part.</p>";
	echo "Just paste the link of the <em>data-reactid</em>";
	echo "<br>The link looks something like this:<hr>";
	echo "<b><i>.0.1.0.0.0.$1015791523972872833.\$https=2//igcdn-photos-e-a=1akamaihd=1net/hphotos-ak-xaf1/t51=12885-15/11372328_1579186602343388_152751987_n=1jpg.2</i></b><hr>";
	echo "<p>Enter the link in the following input box:</p><form method='GET' action=''>
			<input type='text' name='link' id='link' placeholder='insta-link'/>
			<input type='submit' name='submit' value='Submit'/>
		  </form>";
    echo "<p>From where do I get this link????.";
    echo "Head over to my blog post here to know why and how to get the link.<br>";
    echo "Link to the Blog Post : <a href=''>How to get Instagram CDN link of the photos</a></p>";
    echo "No of hits : " . $showHits;
}
?>
</body>
</html>