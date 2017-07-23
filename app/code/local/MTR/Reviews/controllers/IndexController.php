<?php
/**
 * Created by PhpStorm.
 * User: kniej
 * Date: 2017-07-23
 * Time: 20:25
 */

class MTR_Reviews_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->getLayout()->getBlock('head')->setTitle($this->__("Reviews"));

        $this->renderLayout();
    }
}