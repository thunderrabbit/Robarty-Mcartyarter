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

include "classes/wikiOutputter.php";

$wO = new wikiOutputter();

$wO->output_art_url("Lincoln Number", 2019, "December");
$wO->output_art_page("Lincoln Number", 2019);
$wO->output_art_file_front("Lincoln Number", 2019);
