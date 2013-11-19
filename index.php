<?php
ini_set('display_errors',1);
require_once('simplehtmldom/simple_html_dom.php');
include('version_geters/common_geters.php');

class SourceChangeException extends Exception { }

$Applications = array(
	'Java' => 'LastVersion',
	'Firefox' => 'LastVersion',
	'Chrome' => 'LastVersion',
	'Adobe_Acrobat' => 'LastVersion'
);

if(!is_dir("ApplicationVersions")){
    mkdir("ApplicationVersions", 0700);
}
$fileYesterday = "ApplicationVersions/".date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"))).".json";

$ApplicationInfoYesterday = array();
if(file_exists($fileYesterday)){
    $ApplicationInfoYesterday = json_decode(file_get_contents($fileYesterday), true);
}

$ApplicationInfo = array();
foreach($Applications AS $ApplicationName => $AppLastVersion){
    include('version_geters/'.$ApplicationName.'.php');

    $AppVersionFunc = $ApplicationName.'Version';
	$ApplicationInfo[$ApplicationName] = $AppVersionFunc();
}
$fileToday = "ApplicationVersions/".date("Y-m-d").".json";
file_put_contents($fileToday, json_encode($ApplicationInfo));

?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Application Version Monitor</title>
  <meta name="author" content="Calle S">
  <meta name="description" content="Manages network detection">
  <meta name="keywords" content="KEYWORDS,HERE">
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" type="text/css">
 </head>
 <body>
 <div class="container">
	<h1>Application Version Monitor</h1>
	<table class="table table-bordered">
		<tr>
			<th>Application Name</th>
			<th>Version</th>
			<th>Version Yesterday</th>
		</tr>
<?php	foreach($ApplicationInfo AS $ApplicationName => $ApplicationVersion):?>
		<tr>
			<td><?= $ApplicationName ?></td>
			<td><?= $ApplicationVersion ?></td>
			<td><?= isset($ApplicationInfoYesterday[$ApplicationName])?$ApplicationInfoYesterday[$ApplicationName]:'' ?></td>
		</tr>
<?php	endforeach; 	?>
	</table>
</div>
</body>
</html>
