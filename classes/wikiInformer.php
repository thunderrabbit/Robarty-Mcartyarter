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
    protected function selectedMonthSelect(string $selected_month) : string
    {
        $cal_info = cal_info(CAL_GREGORIAN);
	$options = "<option></option>";
	foreach($cal_info['months'] as $month_name)
	{
	    if($selected_month == $month_name)
	    {
		$selected = "selected";
	    }
	    else
	    {
		$selected = "";
	    }
	    $options .= "<option $selected>" . $month_name . "</option>";
	}
	return "<select name='month'>
                 $options
	    </select>";
    }

    public function suggestLink(string $valid_get_url)
    {
        echo "<div class='url'>Try this: <a href='$valid_get_url'>$valid_get_url</a></div>";
    }
    public function drawLink(string $filename = null, int $year = null, string $month = null)
    {
	$link = "?filename=$filename&year=$year&month=$month";
	echo "Come back via this link:</br/>";
        echo "<div class='url'>Try this: <a href='$link'>$link</a></div>";
    }

    public function drawForm(string $filename = null, int $year = null, string $month = null)
    {
	echo "Or fill out this form:<br/>";
	$selectedMonthSelect =	$this->selectedMonthSelect($month);
	$form = <<<FORM
        <form method="post" action="?" name="signup-form">
            <div class="form-element">
                <label>Name of piece</label>
                <input type="text" name="filename" required value="$filename"/>
            </div>
            <div class="form-element">
                <label>Month</label>
		$selectedMonthSelect
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
