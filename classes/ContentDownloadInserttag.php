<?php 

class ContentDownloadInserttag extends \ContentDownload
{
	
	public function __construct($objElement=null)
	{
        $this->type = 'download';
		$this->singleSRC = $objElement->singleSRC;
		$this->linkTitle = $objElement->linkTitle;
        $this->cssID = $objElement->cssID;
	}
	
	
}