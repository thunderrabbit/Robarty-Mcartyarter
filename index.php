<head>
<style>
.url {margin:10px}
.description {padding:20px 0 0}
.wiki_text {padding:20px;
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
include "classes/wikiInformer.php";

$wRG = new wikiRequestGetter();
$wI = new wikiInformer();
$requestLoaded = false;

try
{
    $requestLoaded = $wRG->loadRequest($_REQUEST);
}
catch (Exception $e)
{
    echo 'Caught exception: ',  $e->getMessage(), "<br/>";
    $wI->suggestLink("https://arty.robnugen.com/arty/?filename=Linky%20Lee&year=2020&month=January");
    $wI->drawForm();
}

if($requestLoaded)
{
    $wO = new wikiOutputter();

    $wO->output_art_url($wRG->getFilename(), $wRG->getYear(), $wRG->getMonth());
    $wO->output_art_page($wRG->getFilename(), $wRG->getYear(), $wRG->getMonth());
    $wO->output_art_file_front($wRG->getFilename(), $wRG->getYear(), $wRG->getMonth());
    $wO->output_art_file_back($wRG->getFilename(), $wRG->getYear(), $wRG->getMonth());

    $wI->drawForm();   // will soon get $wRG
}

?>
</body>