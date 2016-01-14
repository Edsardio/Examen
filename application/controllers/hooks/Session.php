<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session{
	public function startSession(){
		session_start();
	}
}