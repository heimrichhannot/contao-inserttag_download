<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Inserttag_download
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'HeimrichHannot',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'ContentDownloadInserttag'         => 'system/modules/inserttag_download/classes/ContentDownloadInserttag.php',
	'HeimrichHannot\InserttagDownload' => 'system/modules/inserttag_download/classes/InserttagDownload.php',
));
