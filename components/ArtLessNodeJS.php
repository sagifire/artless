<?php

class ArtLessNodeJS extends BaseArtLess {
	public function compile($lessfile, $cssfile) {
		throw new CHttpException(501, "Not implemented");
	}
	
	public function checkedCompile($lessfile, $cssfile) {
		throw new CHttpException(501, "Not implemented");
	}
}
