<?php
/**
 * class to load a file from a local or remote source
 *
 * Copyright (c) 2012-2014 Thomas Müller
 *
 * Permission is hereby granted, free of charge, to any person obtaining a
 * copy of this software and associated documentation files (the "Software"),
 * to deal in the Software without restriction, including without limitation
 * the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @category   FileLoader
 *
 * @copyright  2012-2014 Thomas Müller
 * @author     Thomas Müller <t_mueller_stolzenhain@yahoo.de>
 * @license    http://www.opensource.org/licenses/MIT MIT License
 *
 * @link       https://github.com/mimmi20/wurfl-data/
 */

namespace WurflData;

use Exception;
use Psr\Log\LoggerInterface;

/**
 * class to load the the content from a data file
 *
 * @author     Thomas Müller <t_mueller_stolzenhain@yahoo.de>
 * @copyright  Copyright (c) 2012-2014 Thomas Müller
 *
 * @version    1.2
 *
 * @license    http://www.opensource.org/licenses/MIT MIT License
 *
 * @link       https://github.com/mimmi20/FileLoader/
 */
class Loader
{
    /**
     * loads the the content from a data file
     *
     * @param string                   $wurflKey
     * @param \Psr\Log\LoggerInterface $logger
     *
     * @return array $data
     */
    public static function load($wurflKey, LoggerInterface $logger)
    {
        $allData = [];

        while (strcmp($wurflKey, 'root')) {
            if (!$wurflKey) {
                break;
            }

            $filename = __DIR__ . '/../data/' . $wurflKey . '.php';

            if (!file_exists($filename)) {
                $logger->error(new Exception('File "' . $filename . '" was not found'));
                break;
            }

            /** @var array $data */
            $data = require $filename;

            if (!array_key_exists('fallback', $data)) {
                $logger->error(new Exception('File "' . $filename . '" does not contain the fallback property'));
                break;
            }

            if (!file_exists(__DIR__ . '/../data/' . $data['fallback'] . '.php')) {
                $logger->error(
                    new Exception(
                        'File "' . $filename . '" contains a fallback property for a not existing file'
                        . ' (' . $data['fallback'] . '.php)'
                    )
                );
                break;
            }

            $wurflKey = $data['fallback'];

            if (!isset($data['capabilities'])) {
                $logger->error(new Exception('File "' . $filename . '" does not contain capabilities'));
                break;
            }

            $allData = array_merge($allData, $data['capabilities']);
        }

        return $allData;
    }
}
