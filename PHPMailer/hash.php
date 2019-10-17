<?php
	class Hash
	{
		private $hashcode;

		public function __construct(){
			$this->hashcode = array(
				// Numbers
				'1' => '/','2' => '?','3' => 'f','4' => '>','5' => '6','6' => 'V','7' => '<','8' => '*','9' => 'e','0' => 'R',
				// Upper_Case
				'A' => '!','B' => '@','C' => '#','D' => 'Y','E' => '$','F' => 'u','G' => 'a','H' => '%','I' => '1','J' => '2',
				'K' => 'X','L' => '3','M' => '^','N' => 'Q','O' => '4','P' => 't','Q' => 'j','R' => 'i','S' => 'k','T' => 'h',
				'U' => '&','V' => '5','W' => 'g','X' => 'W','Y' => 'G','Z' => 'C',
				// Lower_Case
				'a' => 'F','b' => '|','c' => '7','d' => 'l','e' => 'm','f' => 'n','g' => 'd','h' => 'o','i' => 'U','j' => '=',
				'k' => 'p','l' => 'E','m' => 'B','n' => 'A','o' => 'c','p' => 'q','q' => '8','r' => 'D','s' => '-','t' => '_',
				'u' => 'z','v' => 'S','w' => '+','x' => 'y','y' => 'r','z' => 'T',
				// Special Char
				'!' => 'x','@' => 'b','#' => 'K','$' => 'L','%' => 'M','^' => 'w','&' => 'N','*' => 'J','-' => 'I','_' => 'O',
				'+' => 'H','=' => 's','|' => '9','<' => 'v','>' => '0','?' => 'Z','/' => 'P'
			);
		}

		public function cypher($userpswd){
			$cypheredPswd = "";

			for($i = 0; $i < strlen($userpswd); $i++){
				foreach(array_keys($this->hashcode) as $key){
					if(strcmp($key, substr($userpswd, $i, 1)) == 0){
						$cypheredPswd .= $this->hashcode[$key];
						break;
					}
					// if(substr($userpswd, $i, 1) == $key){
					// 	$cypheredPswd .= $this->hashcode[$key];
					// 	break;
					// }
				}
			}
			return $cypheredPswd;
		}

		public function decypher($cypheredpswd){
			$decypheredPswd = "";

			for($i = 0; $i < strlen($cypheredpswd); $i++){
				foreach(array_keys($this->hashcode) as $key){
					if(substr($cypheredpswd, $i, 1) == $this->hashcode[$key]){
						$decypheredPswd .= $key;
						break;
					}
				}
			}
			return $decypheredPswd;
		}
	}

	// $cypherpswd = new Hash();
	// $userpin = "123ewq#W";
	// echo "Original pin: " . $userpin . "<br/>" .
	// 			"Cyphered: " . $cypherpswd->cypher($userpin) . "<br/>"
	// 			."Decyphered: " . $cypherpswd->decypher($cypherpswd->cypher($userpin));
	// echo $cypherpswd->cypher(strtolower($userpin));
?>
