<head>
<style>
.url {margin:10px}
.art_page {padding:20px;
background-color:#eee}
</style>
</head>
<body>
<?php
/*
	This file is part of Robarty Mcartyarter
	Copyright (C) 2019 Rob Nugen
	
	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

ini_set('display_errors', 1);

include "classes/wikiRequestGetter.php";
include "classes/wikiOutputter.php";

$wRG = new wikiRequestGetter();
$wRG->loadRequest($_GET);

$wO = new wikiOutputter();

$wO->output_art_url($wRG->getFilename(), $wRG->getYear(), $wRG->getMonth());
$wO->output_art_page($wRG->getFilename(), $wRG->getYear(), $wRG->getMonth());
$wO->output_art_file_front($wRG->getFilename(), $wRG->getYear(), $wRG->getMonth());

?>
</body>