<!DOCTYPE html>
<html>
<body>

<style type="text/css">
	.main{
		width: 60%;
		height: 85%;
		margin-left: 90px;
		border: thin solid black;
	}
</style>
<div class="main">
	<?php
	function scrapeWebsiteData($website_url){
		if (!function_exists('curl_init')) {
			die('cURL is not installed. Please install and try again.');
		}
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $website_url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($curl);
		curl_close($curl);
		return $output;
	}
	?>
	<?php 

	if(isset($_POST['submit'])){
	$html = scrapeWebsiteData('https://www.bbc.com/news');
	$start_point = strpos($html, '<html>');
	$end_point = strpos($html, '</html>', $start_point);
	$length = $end_point-$start_point;
	$html = substr($html, $start_point, $length);
	echo $html;
	}

	?>
</div>
</body>
</html>