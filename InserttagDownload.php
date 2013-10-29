<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

class InserttagDownload extends Frontend
{

	protected $singleSRC;
	
	protected $objFile;
	
	protected $linkTitle;
	
	protected $strTemplate = 'ce_download';
	
	public function getDownloadElement($strTag)
	{
		$params = preg_split('/::/', $strTag);
		
		if(is_array($params) && !empty($params))
		{
			if($params[0] == 'download')
			{
				$this->singleSRC = ltrim($params[1],'/'); // remove leading slash
				
				$this->linkTitle = $params[2];
				
				if (!strlen($params[1]) || !is_file(TL_ROOT . '/' . $params[1]))
				{
					return '';
				}
				
				$objFile = new File($this->singleSRC);
				$allowedDownload = trimsplit(',', strtolower($GLOBALS['TL_CONFIG']['allowedDownload']));
				
				// Return if the file type is not allowed
				if (!in_array($objFile->extension, $allowedDownload))
				{
					return '';
				}
				
				$this->objFile = $objFile;
				
				// Send the file to the browser
				if (strlen($this->Input->get('file', true)) && $this->Input->get('file', true) == $this->singleSRC)
				{
					$this->sendFileToBrowser($this->Input->get('file', true));
				}

				return $this->compile();
			}
		}
		return false;
	}
	
	protected function compile()
	{
		if (!strlen($this->linkTitle))
		{
			$this->linkTitle = $this->objFile->basename;
		}
		
		$objTpl = new FrontendTemplate($this->strTemplate);
		$objTpl->class = $this->strTemplate;
		$objTpl->link = $this->linkTitle;
		$objTpl->title = specialchars($this->linkTitle);
		$objTpl->href = $this->Environment->request . (($GLOBALS['TL_CONFIG']['disableAlias'] || strpos($this->Environment->request, '?') !== false) ? '&amp;' : '?') . 'file=' . $this->urlEncode($this->singleSRC);
		$objTpl->filesize = $this->getReadableSize($this->objFile->filesize, 1);
		$objTpl->icon = TL_FILES_URL . 'system/themes/' . $this->getTheme() . '/images/' . $this->objFile->icon;
		$objTpl->mime = $this->objFile->mime;
		$objTpl->extension = $this->objFile->extension;
		$objTpl->path = $this->objFile->dirname;
		
		return $objTpl->parse();
	}	
}