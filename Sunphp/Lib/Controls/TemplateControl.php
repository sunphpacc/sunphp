<?php
/**
 * This is a class that controls the template.
 * @author: sun<798049214@qq.com>
 * @date: 2018/1/12 18:40
 */

namespace Sunphp\Lib\Controls;
use Sunphp\Lib\Configs\Config;
use Sunphp\Lib\Exceptions\ControlException;
use Sunphp\Lib\Runtimes\Data;

class TemplateControl
{


    /**
     * @param $name
     * @param string $folder
     * @return bool
     */
    public function display($name,$folder = '')
    {
        if ('' != Config::$template) {
           $template_folder = Config::$template . DIRECTORY_SEPARATOR;
        } else {
            $template_folder = '';
        }
        $control_template = str_replace(array(Config::CONTROL_ADDRESS,'Control'),"", get_class($this));
        $dir =  __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR ;
        if ('' == $folder) {
            $template_file = $dir . Config::TEMPLATE_ADDRESS .$template_folder. $control_template . DIRECTORY_SEPARATOR . $name;
        } else {
            $template_file = $dir . Config::TEMPLATE_ADDRESS .$template_folder. $folder . DIRECTORY_SEPARATOR . $name;
        }
        $template_file = str_replace('\\', DIRECTORY_SEPARATOR, $template_file);
        try
         {
             if (is_file($template_file)) {
                 require($template_file);
                 return true;
             } else {
                 throw new ControlException($template_file . " doesn't exist");
                 //If the exception is thrown, this text will not be shown

             }
         }
        catch(ControlException $e)
         {
                 Data::$exception_list[] = $e->getException();
         }
        return false;
    }

}
