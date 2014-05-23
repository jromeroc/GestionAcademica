<?php

class DocsMatriculaController extends Controller
{
	public function printDocs()
	{
		$html = '<html><body>'
            . '<p>Put your html here, or generate it with your favourite '
            . 'templating system.</p>'
            . '</body></html>';
    	return PDF::load($html, 'carta', 'portrait')->show();
	}
}