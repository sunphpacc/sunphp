<?php
/**
 * Autoload.
 * @author  sun
 * @date: 2018/1/12 14:43
 */
namespace Sunphp;
use Sunphp\Lib\Exceptions\FileException;
use Sunphp\Lib\Runtimes\Data;

/**
 * Autoload.
 */
class Autoloader
{
    /**
     * Autoload root path.
     *
     * @var string
     */
    protected static $_autoloadRootPath = '';

    /**
     * Set autoload root path.
     *
     * @param string $root_path
     * @return void
     */
    public static function setRootPath($root_path)
    {
        self::$_autoloadRootPath = $root_path;
    }

    /**
     * Load files by namespace.
     *
     * @param string $name
     * @return boolean
     */
    public static function loadByNamespace($name)
    {
        $class_path = str_replace('\\', DIRECTORY_SEPARATOR, $name);

        if (self::$_autoloadRootPath) {
            $class_file = self::$_autoloadRootPath . DIRECTORY_SEPARATOR . $class_path . '.php';
        }

        if (empty($class_file) || !is_file($class_file)) {
            $class_file = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . "$class_path.php";
        }

        try
        {
            if (is_file($class_file)) {
                /** @noinspection PhpIncludeInspection */
                require_once($class_file);
                if (class_exists($name, false)) {
                    return true;
                }
            }else{
                throw new FileException( $class_file." File doesn't exist");
            }
        }
        catch(FileException $e)
        {
            Data::$exception_list[] = $e->getException();
        }
        return false;
    }
}

spl_autoload_register('Sunphp\Autoloader::loadByNamespace');