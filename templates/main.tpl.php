<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="robots" content="noindex">
		<title>Online Tournament</title>
		<link rel="stylesheet" type="text/css" href="scripts/datetimepicker/jquery.datetimepicker.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="style/main.css" media="screen" />
		<script type="text/javascript" src="scripts/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="scripts/datetimepicker/jquery.datetimepicker.full.min.js"></script>
		<script type="text/javascript" src="scripts/main.js"></script>
	</head>
	<body>
		<div id="body">
			<div id="header">
				<h3 id="slogan"><a href="index.php">Online Tournament</a></h3>
			</div>
			<div id="content">
				<div id="topMenu">
					<ul class="float-left">
						<li><a href="index.php?module=team&action=list" title="Komandos"<?php if($module == 'team') { echo 'class="active"'; } ?>>Komandos</a></li>
                                                <li><a href="index.php?module=table&action=list" title="Turnyrinė Lentelė"<?php if($module == 'table') { echo 'class="active"'; } ?>>Turnyrinė lentelė</a></li>
                                                <li><a href="index.php?module=result&action=list" title="Rezultatai"<?php if($module == 'result') { echo 'class="active"'; } ?>>Rezultatai</a></li>
                                                <li><a href="index.php?module=player&action=list" title="Zaidejai"<?php if($module == 'player') { echo 'class="active"'; } ?>>Zaidejai</a></li>
                                                <li><a href="index.php?module=statistic&action=list" title="Statistika"<?php if($module == 'statistic') { echo 'class="active"'; } ?>>Statistika</a></li>
					</ul>
				</div>
				<div id="contentMain">
					<?php
						// įtraukiame veiksmų failą
						if(file_exists($actionFile)) {
							include $actionFile;
						}
					?>
					<div class="float-clear"></div>
				</div>
			</div>
			<div id="footer">

			</div>
		</div>
	</body>
</html>