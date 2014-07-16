<?php

namespace HeimrichHannot;

class InserttagDownload extends \Frontend
{
	protected $singleSRC;

	protected $objFile;

	protected $linkTitle;

	protected $strTemplate = 'ce_download';

	protected $strHref;

	public function getDownloadElement($strTag)
	{
		$params = preg_split('/::/', $strTag);

		if(is_array($params) && !empty($params))
		{
			if(strpos($params[0], 'download') === 0)
			{
				$singleSRC = strip_tags(($params[1])); // remove <span> etc, otherwise Validator::isuuid fail
				
				$objDownload = new \stdClass();
				
				$objDownload->singleSRC = $singleSRC;
				
				$objDownload->linkTitle = $params[2];
                $objDownload->cssID[1] = $params[3];
                $objDownload->cssID[0] = $params[4];
				$objContentDownload = new \ContentDownloadInserttag($objDownload);
				
				$output = $objContentDownload->generate();
				
				if($params[0] == 'download')
				{
					return $output;
				}
				
				if($params[0] == 'download_link')
				{
					return $objContentDownload->Template->href;
				}
				
				return '';
			}
		}
		return false;
	}

}