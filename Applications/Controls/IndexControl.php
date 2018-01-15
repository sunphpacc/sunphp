<?php
/* This is the user test file.
 * @author sun
 */
namespace Applications\Controls;
use Sunphp\Lib\Controls\TemplateControl;
class IndexControl extends TemplateControl{
    /**
     *	The default controller callback method.
     */
    public function indexAction(){
        //The template below shows the default folder
        $this->display("index.html");
    }

    public function guideAction(){
        //The following template according to specified folder
        $this->display("common.html","include");
    }

    /**
     * Test the custom callback method.
     */
    public function testAction(){
        var_dump("IndexControl testAction");
    }


}


