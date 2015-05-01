<?php

abstract class BaseArtLess extends CApplicationComponent {
	public $files = array();
	public $imports = array();
	public $checkFiles= true;
	public $defaultCssDir = null;
	
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
	
	public function registerLessFile($lessFile, $media = '') {
		if (!is_dir($this->defaultCssDir)) 
			throw new CExeption('Invalid default css dir in artless component!');
		if (!is_file($lessFile))
			throw new CExeption('Invalid less file: '.$lessFile);
		
		$cssFile = $this->defaultCssDir . '/' . basename($lessFile) . '_' . filemtime($lessFile);
		$this->checkedCompile($lessFile, $cssFile);
		Yii::app()->clientScript->registerCssFile($cssFile, $media);
	}
	
	abstract public function compile($lessfile, $cssfile);

	abstract public function checkedCompile($lessfile, $cssfile);
		
	
}
