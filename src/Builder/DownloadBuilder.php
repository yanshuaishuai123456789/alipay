<?php
/**
 * Created by PhpStorm.
 * User: sepia
 * Date: 2017/11/1
 * Time: 9:33
 */

namespace Sepia\Alipay\Builder;


class DownloadBuilder
{
    // 账单类型
    private $billType;

    // 	账单时间
    private $billDate;

    private $bizContentarr = array();

    private $bizContent = NULL;

    public function getBizContent()
    {
        if(!empty($this->bizContentarr)){
            $this->bizContent = json_encode($this->bizContentarr,JSON_UNESCAPED_UNICODE);
        }
        return $this->bizContent;
    }

    public function getBillType()
    {
        return $this->billType;
    }

    public function setBillType($billType)
    {
        $this->billType = $billType;
        $this->bizContentarr['bill_type'] = $billType;
    }

    public function getBillDate()
    {
        return $this->billDate;
    }

    public function setBillDate($billDate)
    {
        $this->billDate = $billDate;
        $this->bizContentarr['bill_date'] = $billDate;
    }
}