<?php
class Beef{
	private $cowsName;
	
	//setter
	//take a private variable and allow you to change it
	public function setCowsName($x){//makes it accessable   //set + variable name in camelCase
		$this->cowsName=$x;  //sets the private variable equal to the function
	}
	
	//getter
	//allows you to retrieve private variables (so you can see it)
	public function getCowsName(){ //no paramaters because you are just returning info
		return $this->cowsName;  //returns what the variable is (public allows you to use anywhere in the program)
	}
	
}
?>