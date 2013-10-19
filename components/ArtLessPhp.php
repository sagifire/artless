<?php

require_once "BaseArtLess.php"; 

class ArtLessPhp extends BaseArtLess {
	protected $_service = null;
	
	public function compile($lessfile, $cssfile) {
		if (null === $this->_service)
			$this->initService();
		
		return $this->_service->compileFile($lessfile, $cssfile);
	}
	
	public function checkedCompile($lessfile, $cssfile) {
		if (null === $this->_service)
			$this->initService();
		
		return $this->_service->checkedCompile($lessfile, $cssfile);
	}
	
	protected function initService() {
		if (null === $this->_service) {
			require_once dirname(dirname(__file__))."/vendors/lessphp/lessc.inc.php";
			$this->_service = new lessc();
			
			foreach($this->imports as $importPath) {
				$this->_service->addImportDir($importPath);
			}
		}
	}
}
