<?php
/**
 * Created by PhpStorm.
 * User: kniej
 * Date: 2017-07-22
 * Time: 12:44
 */

class MTR_Reviews_Block_Index extends Mage_Core_Block_Template
{
    public function __construct()
    {
        parent::__construct();
        $reviews = Mage::getModel('review/review')->getCollection();
        $this->setCollection($reviews);
//        die('dbg-msg');
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        $pager = $this->getLayout()->createBlock('page/html_pager', 'custom.pager');
        $pager->setCollection($this->getCollection());
        $this->setChild('pager', $pager);
        $this->getCollection()->load();

        return $this;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    public function getCollection()
    {
        $limit = 5;
        $currPage = 1;

        if (Mage::app()->getRequest()->getParam('p')) {
            $currPage = Mage::app()->getRequest()->getParam('p');
        }

        $offset = ($currPage - 1) * $limit;
//        die('getReviews');
        $reviews = Mage::getModel('review/review')->getCollection();
        $reviews->getSelect()->limit($limit, $offset);

        return $reviews;

    }
}