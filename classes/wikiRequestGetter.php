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

class wikiRequestGetter implements requestGetter
{
    protected int $year;
    protected string $month;
    protected string $filename;

    private function getOrDie(array $request, string $param_name)
    {
	if(empty($request[$param_name]))
	{
	    throw new Exception('Could not find parameter named ' . $param_name);
	}
	else
	{
	    return $request[$param_name];
	}
    }

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

    /*  Trying to get away from globals, I plan to send the superglobal $_POST or $_GET here */
    public function loadRequest(array $request)
    {
        $this->year = $this->getOrDie($request, "year");
        $this->month = $this->getOrDie($request, "month");
        $this->filename = $this->getOrDie($request, "filename");
    }
}
