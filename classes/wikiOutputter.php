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

    public function output_art_page(string $filename, string $piece_blurb, int $year, string $month)
    {
        echo "<div class='description'>This is for the art Page.  Copy-paste this text into the new art page:</div>";
	echo "<div class = 'wiki_text'>";
        echo nl2br(htmlspecialchars("[[File:$filename, $year.jpg|900px|$filename, $month $year]]
        [[File:$filename, back.jpg|thumb|$filename back]]
        
        $piece_blurb

        $month $year
        
        <permalink/>
        
        [[Category:Marker]]
        [[Category:Shikishi]]
        [[Category:24cm x 27cm]]
        [[Category:$month $year]]
        [[Category:$year]]
        [[Category:Art_Pages]]
        "));
	echo "</div>";
    }

    public function output_art_file_front(string $filename, int $year, string $month, int $quantity)
    {
        echo "<div class='description'>This is for the art File.  Copy-paste this text for the piece's front image:</div>";
	echo "<div class = 'wiki_text'>";
        echo nl2br(htmlspecialchars("$filename, $month $year

        [[Category:Marker]]
        [[Category:Shikishi]]
        [[Category:24cm x 27cm]]
        [[Category:$month $year]]
        [[Category:$year]]
        [[Category:Art]]"));
	echo "</div>";   // end class wiki_text
    }

    public function output_art_file_back(string $filename, int $year, string $month, int $quantity)
    {
        echo "<div class='description'>This is for the art (back) File.  Copy-paste this text for the piece's back image:</div>";
	echo "<div class = 'wiki_text'>";
        echo nl2br(htmlspecialchars("$filename (back), $month $year

        [[Category:Marker]]
        [[Category:Shikishi]]
        [[Category:24cm x 27cm]]
        [[Category:$month $year]]
        [[Category:$year]]
        [[Category:Art_Back]]"));
	echo "</div>";   // end class wiki_text
    }
}
