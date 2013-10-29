<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package   LazyImage
 * @author    Arne Stappen
 * @license   GNU/LGPL
 * @copyright A. Stappen (2013)
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
	'HeimrichHannot\InserttagDownload' => 'system/modules/inserttag_download/classes/InserttagDownload.php',
));
