<?php

namespace HeimrichHannot;

use Contao\FilesModel;

class InserttagDownload extends \Frontend
{
	protected $singleSRC;

	protected $objFile;

	protected $linkTitle;

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

				if (strpos($singleSRC, '/') !== false)
				{
					if (($objFile = FilesModel::findByPath($singleSRC)) !== null && $objFile->uuid)
					{
						$singleSRC = \StringUtil::binToUuid($objFile->uuid);
					}
				}

				$objDownload->singleSRC = $singleSRC;

				$objDownload->linkTitle = strip_tags($params[2]); // remove <span> etc
                $objDownload->cssID[1] = 'inserttag_download ' . strip_tags($params[3]);
                $objDownload->cssID[0] = strip_tags($params[4]);
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

                if($params[0] == 'download_size')
                {
                    return $objContentDownload->Template->filesize;
                }

				return '';
			}
		}
		return false;
	}

}