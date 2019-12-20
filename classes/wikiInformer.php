<?php
/*
	This file is part of Robarty Mcartyarter
	Copyright (C) 2019 Rob Nugen

        wikiInformer informs the user what options they have.

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

class wikiInformer
{
    protected function selectedMonthSelect(string $month) : string
    {
	return "yo momma";
    }
    public function suggestLink(string $valid_get_url)
    {
        echo "<div class='url'>Try this: <a href='$valid_get_url'>$valid_get_url</a></div>";
    }
    public function drawForm(string $filename = null, int $year = null, string $month = null)
    {
	echo "Or fill out this form:<br/>";
	$selectedMonthSelect =	$this->selectedMonthSelect("bbbb");
	$form = <<<FORM
        <form method="post" action="" name="signup-form">
            <div class="form-element">
            <label>Name of piece</label>
            <input type="text" name="filename" required value="$filename"/>
        </div>
$selectedMonthSelect
            <div class="form-element">
            <label>Month</label>
            <select name="month" required>
	        <option>January</option>
	        <option>February</option>
	        <option>March</option>
	        <option>April</option>
	        <option>May</option>
	        <option>June</option>
	        <option>July</option>
	        <option>August</option>
	        <option>September</option>
	        <option>October</option>
	        <option>November</option>
	        <option>December</option>
	    </select>
        </div>
            <div class="form-element">
            <label>Year</label>
            <input type="text" name="year" pattern="[0-9]*" value="$year" required />
        </div>
            <button type="submit" name="create wikitext" value="create wikitext">Create Wikitext</button>
        </form>
FORM;
        echo $form;
    }
}
