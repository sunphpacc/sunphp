<?php
/**
 * This is a controller class.
 * @author  sun
 * @date: 2018/1/11 18:43
 */

namespace Sunphp\Lib\Controls;
use Sunphp\Lib\Configs\Config;
use Sunphp\Lib\Exceptions\ControlException;
use Sunphp\Lib\Runtimes\Data;

/**
 * This is a controller class.
 */
 class Control{

     /**
      * @var string
      */
     protected $controlName = "c";

     /**
      * @var string
      */
     protected $controlDefault = "Index";
     /**
      * @var string
      */
     protected $controlPostfix = "Control";
     /**
      * @var string
      */
     protected $functionName = "a";
     /**
      * @var string
      */
     protected $functionDefault = "index";
     /**
      * @var string
      */
     protected $functionPostfix = "Action";

	 /**
     *
     * @param null
     */
    public function __construct()
    {

    }

    public function start()
	{	
		$url_c = isset($_GET[$this->controlName]) ? $_GET[$this->controlName] : $this->controlDefault;
		$url_control = $url_c . $this->controlPostfix;
		
		$url_a = isset($_GET[$this->functionName]) ? $_GET[$this->functionName] : $this->functionDefault;
		$url_action = $url_a . $this->functionPostfix;

        $class_name = Config::CONTROL_ADDRESS . $url_control;
        $fn_name = $url_action;
		$params = array();
		try
		 {
             if (class_exists($class_name)) {
                 if (method_exists(new $class_name, $fn_name)) {
                     call_user_func_array(array(new $class_name, "$fn_name") , $params);
                 } else {
                     throw new ControlException($class_name . "->" . $fn_name. " function doesn't exist");
                     //If the exception is thrown, this text will not be shown
                 }
             } else {
                 throw new ControlException($class_name . " class doesn't exist");
             }
		 }
		catch(ControlException $e)
		 {
             Data::$exception_list[] = $e->getException();
		 }

	}
 }
