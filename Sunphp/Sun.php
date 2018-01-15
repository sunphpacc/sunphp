<?php
/**
 * This file is start of Sunphp
 * @author sun
 */
namespace Sunphp;
use function Couchbase\defaultEncoder;
use Sunphp\Lib\Controls\Control;
use Sunphp\Lib\Runtimes\Data;
require_once __DIR__ . '/Autoloader.php';

class Sun{
    /**
     * Run mode
     * @var int
     */
    private $runMode = null;

    /**
     * Debug mode
     */
    public function debug()
    {
        //Check the abnormal data
        if (null != Data::$exception_list)
        {
            var_dump(Data::$exception_list);
        }
    }

    /**
     * Run mode execute
     */
    public function runModeExecute(){
        if (isset($this->runMode))
        {
            switch ($this->runMode)
            {
                case 1 :
                    $this->debug();
                    return;
                default :
                    return;

            }
        }
    }
    /**
     * @param int $runMode
     */
    public function setRunMode($runMode)
    {
        $this->runMode = $runMode;
    }
    /**
     * Start run
     */
    public function run()
    {
        $control = new Control();
        $control->start();
        $this->runModeExecute();
    }


}

