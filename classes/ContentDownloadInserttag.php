<?php 

class ContentDownloadInserttag extends \ContentDownload
{
	
	public function __construct($objElement=null)
	{
		$this->singleSRC = $objElement->singleSRC;
		$this->linkTitle = $objElement->linkTitle;
	}
	
	
}