<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session{
	//Laad deze functie voordat een class aangeroepen word
	public function startSession(){
		session_start();
	}
}