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

class wikiOutputter
{
    private function spaces_to_underscores(string $name_with_spaces)
    {
        return str_replace(' ', '_', $name_with_spaces);
    }

    public function output_art_url(string $filename, int $year, string $month)
    {
	$url = "https://wiki.robnugen.com/wiki/Art:$filename - $month $year";
	$underscore_url = $this->spaces_to_underscores($url);
	echo "<div class = 'url'>";
        echo "<a href='$underscore_url'>$underscore_url</a>";
	echo "</div>";
    }

    public function output_art_page(string $filename, int $year)
    {
        echo "This is for the art Page.  Copy-paste this text into the new art page:<br/>";
	echo "<div class = 'art_page'>";
        echo nl2br(htmlspecialchars("[[File:$filename, $year.jpg|900px|$filename, $year]]
        [[File:$filename, back.jpg|thumb|$filename back]]
        
        An experiment in how many times lines could pass under and over one another, I started this in approximately $year.
        
        <permalink/>
        
        [[Category:Marker]]
        [[Category:Shikishi]]
        [[Category:24cm x 27cm]]
        [[Category:$year]]
        [[Category:art_pages]]
        "));
	echo "</div>";
    }

    public function output_art_file_front(string $filename, int $year)
    {
        echo nl2br(htmlspecialchars("
        $filename, $year

        [[Category:Marker]]
        [[Category:Shikishi]]
        [[Category:24cm x 27cm]]
        [[Category:$year]]
        [[Category:art]]
        "));
    }
}
