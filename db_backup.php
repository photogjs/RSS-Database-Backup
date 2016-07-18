<?php
//Parse the php file as xml
header('Content-Type: text/xml');
date_default_timezone_set('TIMEZONE');
// Grab all files in the DB backups folder
// open this directory
	$myDirectory = opendir("../FOLDER/");
// get each entry
while($entryName = readdir($myDirectory)) {
	$dirArray[] = $entryName;
}
// close directory
closedir($myDirectory);
//	count elements in array
$indexCount	= count($dirArray);
// sort 'em
rsort($dirArray);
// Output XML (RSS)
    echo '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
                <channel>
                        <title>SITENAME ~ DB Backup</title>
                        <link>https://SITENAME/FOLDER/PHPFILENAME.php</link>
                        <description>RSS DB Backup Feed</description>
                        <language>en</language>';
                        echo "\n";
						for($index=0; $index < $indexCount; $index++) {
								if (substr("$dirArray[$index]", 0, 1) != "."){ // don't list hidden files
									$thenameofthefile = $dirArray[$index];
									$postdate = date ("D, j M Y H:i:s -0600", filemtime("../FOLDER/$thenameofthefile"));
									echo "<item>\n<title>";
									//print("$dirArray[$index]");
									echo $thenameofthefile;
									echo"</title>\n<link>https://SITENAME/FOLDER/$thenameofthefile</link>\n<guid>https://SITENAME/FOLDER/$thenameofthefile</guid>\n<description>Backup File : $thenameofthefile</description>\n<pubDate>$postdate</pubDate>\n</item>\n";
									}
									}
				echo '</channel>
        </rss>';
?>