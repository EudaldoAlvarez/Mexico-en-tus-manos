<?php
	// define("HOST", "localhost");
	// define("USER", "id16996498_root");
	// define("PSWD", "0DEV[|qY~C9sQopR");
	// define("DBNM", "id16996498_mexicoentusmanos");
	define("HOST", "localhost");
	define("USER", "root");
	define("PSWD", "root");
	define("DBNM", "mexicoentusmanos");

	function connect(){
		$conn = new mysqli(HOST,USER,PSWD,DBNM);
		if ($conn) {
			return $conn;
		}
		return null;
	}
