<?php 

class ContentDownloadInserttag extends \ContentDownload
{
	protected $strTemplate = 'ce_download_inserttag';
	
	public function __construct($objElement=null)
	{
        $this->type = 'download';
		$this->singleSRC = $objElement->singleSRC;
		$this->linkTitle = $objElement->linkTitle;
        $this->cssID = $objElement->cssID;
		$this->id = $objElement->singleSRC;
	}
	
	
}