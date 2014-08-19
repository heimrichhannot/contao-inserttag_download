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
	'HeimrichHannot\InserttagDownload' => 'system/modules/inserttag_download/classes/InserttagDownload.php',
	'ContentDownloadInserttag'         => 'system/modules/inserttag_download/classes/ContentDownloadInserttag.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_download_inserttag'   => 'system/modules/inserttag_download/templates/elements',
	'block_searchable_inline' => 'system/modules/inserttag_download/templates/blocks',
));
