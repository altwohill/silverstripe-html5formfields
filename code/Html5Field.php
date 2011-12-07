<?php
interface Html5Field {
	public function setRequired($bool);
	
	public function getRequired();
	
	public function setPlaceholder($string);
	
	public function getPlaceholder();
	
}