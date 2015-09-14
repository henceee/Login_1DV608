<?php

class DateTimeView {


	public function show() {

		$timeString = new DateTime('NOW',new DateTimeZone('GMT+2'));
		$timeString = $timeString->format('l\, \t\h\e jS \o\f F Y\.\T\h\e \t\i\m\e \i\s G:i:s');

		return '<p>' . $timeString . '</p>';
	}
}