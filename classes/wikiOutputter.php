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

    private function output_wikilink_to_art_page_front_NofM(string $filename, int $year, string $month, int $which, int $quantity) : string
    {
	if($quantity > 1)
	{
            // prepend space to fix comma after filename if no N of M
            $nofm = " " . $this->NofM($which, $quantity);
	}
	else
	{
            $nofm = "";
	}
        return "[[File:$filename$nofm, $month $year.jpg|900px|$filename$nofm, $month $year]]\n";
    }
    public function output_art_page(string $filename, string $piece_blurb, int $year, string $month, int $quantity)
    {
        $N_front_images = "";
        for($count = 1; $count <= $quantity; $count++)
	{
            $N_front_images .= $this->output_wikilink_to_art_page_Front_NofM($filename, $year, $month, $count, $quantity);
        }
        echo "<div class='description'>This is for the art Page.  Copy-paste this text into the new art page:</div>";
	echo "<div class = 'wiki_text'>";
        echo nl2br(htmlspecialchars($N_front_images .
        "[[File:$filename, back.jpg|thumb|$filename back]]
        
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

    private function NofM(int $which, int $total, string $of = "of") : string
    {
        return " (" . $which . " " . $of . " " . $total . ")";
    }

// eventually return string instead of use side effect of echo
    private function output_art_file_front_NofM(string $filename, int $year, string $month, int $which, int $quantity)
    {
	if($quantity > 1)
	{
            $nofm = $this->NofM($which, $quantity);
	}
	else
	{
            $nofm = "";
	}
	echo "<div class = 'wiki_text'>";
        echo nl2br(htmlspecialchars("$filename, $nofm $month $year

// send these as an array to a separate private function to print categories
        [[Category:Marker]]
        [[Category:Shikishi]]
        [[Category:24cm x 27cm]]
        [[Category:$month $year]]
        [[Category:$year]]
        [[Category:Art]]"));
	echo "</div>";   // end class wiki_text
    }

    public function output_art_files_front(string $filename, int $year, string $month, int $quantity)
    {
        echo "<div class='description'>This is for the art File.  Copy-paste this text for the piece's front image:</div>";
	// loop through entire quantity of images
	for($count = 1; $count <= $quantity; $count++)
	{
            $this->output_art_file_front_NofM($filename, $year, $month, $count, $quantity);
        }
    }

    public function output_art_files_back(string $filename, int $year, string $month, int $quantity)
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
