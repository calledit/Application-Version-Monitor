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

foreach($Applications AS $ApplicationName => $AppLastVersion){
    include('version_geters/'.$ApplicationName.'.php');
}

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
			<th>Application Version</th>
		</tr>
	<?php
	foreach($Applications AS $ApplicationName => $AppLastVersion){
        $AppVersionFunc = $ApplicationName.'Version';
		$ApplicationVersion = $AppVersionFunc();
	?>
		<tr>
			<td><?= $ApplicationName ?></td>
			<td><?= $ApplicationVersion ?></td>
		</tr>

	<?php
	}
	?>
	</table>
</div>
</body>
</html>
