<?php
/**
 *
 * @author: sun<798049214@qq.com>
 * @date: 2018/1/13 15:17
 */

namespace Sunphp\Lib\Exceptions;
use Exception;

class FileException extends Exception
{
    public function getException($type = 1)
    {
        $err = [
            'type' => "file_exception",
            'msg'  => $this->getMessage(),
            'file' => $this->getFile(),
            'line' => $this->getLine()
        ];
        if ($type == 1) {
            return json_encode($err);
        }
        return $err;
    }
}