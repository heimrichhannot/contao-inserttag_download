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
				$this->singleSRC = ltrim($params[1],'/'); // remove leading slash

				if (!strlen($params[1]) || !is_file(TL_ROOT . '/' . $params[1]))
				{
					return '';
				}

				$objFile = new \File($this->singleSRC);
				$allowedDownload = trimsplit(',', strtolower($GLOBALS['TL_CONFIG']['allowedDownload']));

				// Return if the file type is not allowed
				if (!in_array($objFile->extension, $allowedDownload))
				{
					return '';
				}

				$this->objFile = $objFile;

				$strHref = \Environment::get('request');

				// Remove an existing file parameter (see #5683)
				if (preg_match('/(&(amp;)?|\?)file=/', $strHref))
				{
					$strHref = preg_replace('/(&(amp;)?|\?)file=[^&]+/', '', $strHref);
				}

				$strHref .= (($GLOBALS['TL_CONFIG']['disableAlias'] || strpos($strHref, '?') !== false) ? '&amp;' : '?') . 'file=' . \System::urlEncode($this->objFile->value);

				$this->strHref = $strHref;

				// Send the file to the browser
				if (strlen($this->Input->get('file', true)) && $this->Input->get('file', true) == $this->singleSRC)
				{
					$this->sendFileToBrowser($this->Input->get('file', true));
				}

				if($params[0] == 'download')
				{
					$this->linkTitle = $params[2];
					return $this->compile();
				}
				if($params[0] == 'download_link')
				{
					return $this->strHref;
				}
			}
		}
		return false;
	}

	protected function compile()
	{
		if ($this->linkTitle == '')
		{
			$this->linkTitle = $this->objFile->basename;
		}

		$objTpl = new \FrontendTemplate($this->strTemplate);
		$objTpl->class = $this->strTemplate;
		$objTpl->link = $this->linkTitle;
		$objTpl->title = specialchars($this->titleText ?: $this->linkTitle);
		$objTpl->href = $this->strHref;
		$objTpl->filesize = $this->getReadableSize($this->objFile->filesize, 1);
		$objTpl->icon = TL_ASSETS_URL . 'assets/contao/images/' . $this->objFile->icon;
		$objTpl->mime = $this->objFile->mime;
		$objTpl->extension = $this->objFile->extension;
		$objTpl->path = $this->objFile->dirname;

		return $objTpl->parse();
	}

}