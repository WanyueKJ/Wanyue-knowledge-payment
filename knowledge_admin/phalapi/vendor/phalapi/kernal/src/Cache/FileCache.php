<?php

// +----------------------------------------------------------------------
// |万岳科技开源系统 [山东万岳信息科技有限公司]
// +----------------------------------------------------------------------
// | Copyright (c) 2020~2022 https://www.sdwanyue.com All rights reserved.
// +----------------------------------------------------------------------
// | 万岳科技相关开源系统代码并不是自由软件，未经授权许可不能去掉wanyue【万岳科技】相关版权并商用
// +----------------------------------------------------------------------
// | Author: 万岳科技开源官方 < wanyuekj2020@163.com >
// +----------------------------------------------------------------------

namespace PhalApi\Cache;

use PhalApi\Cache;
use PhalApi\Exception\InternalServerErrorException;

/**
 * FileCache 文件缓存
 *
 * @package     PhalApi\Cache
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2015-02-26
 */

class FileCache implements Cache {

    /**
     * @var string $folder 文件缓存保存的目录
     */
    protected $folder;

    /**
     * @var string $prefix 文件缓存的key前缀
     */
    protected $prefix;

    /**
     * @var boolean $enableFileNameFormat 是否格式化文件名
     */
    protected $enableFileNameFormat = TRUE;

    public function __construct($config) {
        $this->folder = rtrim($config['path'], '/');

        $cacheFolder = $this->createCacheFileFolder();

        if (!is_dir($cacheFolder)) {
            mkdir($cacheFolder, 0777, TRUE);
        }

        $this->prefix = isset($config['prefix']) ? $config['prefix'] : 'phapapi';
        $this->enableFileNameFormat = isset($config['enable_file_name_format']) ? (boolean)$config['enable_file_name_format'] : $this->enableFileNameFormat;
    }

    public function set($key, $value, $expire = 600) {
        if ($key === NULL || $key === '') {
            return;
        }

        $filePath = $this->createCacheFilePath($key);

        $expireStr = sprintf('%010d', $expire + time());
        if (strlen($expireStr) > 10) {
            throw new InternalServerErrorException(
                \PhalApi\T('file expire is too large')
            );
        }

        if (!file_exists($filePath)) {
            touch($filePath);
            chmod($filePath, 0777);
        }
        file_put_contents($filePath, $expireStr . serialize($value));
    }

    public function get($key) {
        $filePath = $this->createCacheFilePath($key);

        if (file_exists($filePath)) {
            $expireTime = file_get_contents($filePath, FALSE, NULL, 0, 10);

            if ($expireTime > time()) {
                return @unserialize(file_get_contents($filePath, FALSE, NULL, 10));
            }
        }

        return NULL;
    }

    public function delete($key) {
        if ($key === NULL || $key === '') {
            return;
        }

        $filePath = $this->createCacheFilePath($key);

        @unlink($filePath);
    }

	/**
	 * 考虑到Linux同一目录下的文件个数限制，这里拆分成1000个文件缓存目录
	 */
    protected function createCacheFilePath($key) {
        $folderSufix = sprintf('%03d', hexdec(substr(sha1($key), -5)) % 1000);
        $cacheFolder = $this->createCacheFileFolder() . DIRECTORY_SEPARATOR . $folderSufix;
        if (!is_dir($cacheFolder)) {
            mkdir($cacheFolder, 0777, TRUE);
        }

        // 避免撞key，增强唯一性
        $filename = $this->enableFileNameFormat ? 
            sprintf('%s_%s_%s_%s.dat', md5($this->prefix), strlen($this->prefix), md5($key), strlen($key))
            : $this->prefix . $key;

        return $cacheFolder . DIRECTORY_SEPARATOR . $filename;
    }

    protected function createCacheFileFolder() {
        return $this->folder . DIRECTORY_SEPARATOR . 'cache';
    }
}

