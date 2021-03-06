<?php
/**
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2005 - 2017, Fitz Zhang <alacner@gmail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @author Fitz Zhang <alacner@gmail.com>
 * @version $Id: phpdoc.php 8915 2017-11-05 03:38:45Z alacner $
 */

require_once __DIR__ . '/../../Bootstrap.php';
Tii_Config::setDir(__DIR__.'/../');
$output = $argv[1] ?: sys_get_temp_dir();
$packer = new Tii_Packer(
	__DIR__.'/../../',
	Tii_Filesystem::concat(
		$output,
		'Tii-' . preg_replace('|^(\d+\.\d+)(.*)|i', '$1', Tii_Version::VERSION) .'.phpdoc'
	)
);
$packer->exclude('.configs/*');
$packer->priority(
	//Bootstrap
	'Bootstrap.php',
	'Version.php',
	//Exception
	'Exception.php',
	'Application/Exception.php',
	'Application/IgnoreException.php',
	'Application/Controller/Exception.php',
	'Dao/Exception.php',
	//Abstract
	'Logger/Abstract.php',
	'Cache/Abstract.php',
	'Application/Abstract.php',
	'Application/Session/Abstract.php',
	'Application/Processor/Abstract.php',
	'Application/Helper/Pager/Abstract.php',
	'Application/Controller/Error/Abstract.php',
	'Application/Controller/Abstract.php'
);

$packer->execute(true, function($file)
{
	$content = file_get_contents($file);

	preg_match_all('|\s+/\*\*(.*) \*/\n([^\n]+)\n|iUs', $content, $m);
	return implode("", $m[0]);
});