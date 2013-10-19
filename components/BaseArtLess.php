<?php

abstract class BaseArtLess extends CApplicationComponent {
	public $files = array();
	public $imports = array();
	public $checkFiles= true;
	
	public function init() {		
		foreach($this->files as $lessfile=>$cssfile) {
			$status = true;
			if ($this->checkFiles) {
				$status = $this->checkedCompile($lessfile, $cssfile);
			} else {
				$status = $this->compile($lessfile, $cssfile);
			}
			
			if (!$status) {
				Yii::log('Can\'t compile less file "'.$lessfile.'" to "'.$cssfile.'"','warning','artless.components.BaseArtLess');				
			}
				
		}
	}
	
	abstract public function compile($lessfile, $cssfile);

	abstract public function checkedCompile($lessfile, $cssfile);
		
	
}
