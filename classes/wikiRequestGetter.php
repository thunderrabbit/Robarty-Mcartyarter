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

include "requestGetter.php";
include "genericRequestGetter.php";

class wikiRequestGetter extends genericRequestGetter implements requestGetter
{
    protected int $year;
    protected string $month;
    protected string $filename;
    protected string $piece_blurb;

    public function getYear() : int
    {
	return $this->year;
    }
    public function getMonth() : string
    {
	return $this->month;
    }
    public function getFilename() : string
    {
	return $this->filename;
    }
    public function getPieceBlurb() : string
    {
	return $this->piece_blurb;
    }
    public function getQuantity() : int
    {
	return $this->quantity;
    }

    /*  Trying to get away from globals, I plan to send the superglobal $_POST or $_GET here */
    public function loadRequest(array $request)
    {
        $this->year = $this->getOrElse($request, "year") ?: date("Y");			// must be int
        $this->month = $this->getOrElse($request, "month") ?: date("F");		// must be string
        $this->filename = $this->getOrElse($request, "filename") ?: "Linky Lee";
        $this->piece_blurb = $this->getOrElse($request, "piece_blurb", false) ?: "Started in Japan";
	$this->quantity = $this->getOrElse($request, "quantity", false) ?: 1;
	return true;
    }
}
