<?php
/**
 * Created by PhpStorm.
 * User: sepia
 * Date: 2017/11/1
 * Time: 9:33
 */

namespace Sepia\Alipay\Builder;


class Builder
{

    public $close;

    public $download;

    public $query;

    public $refund;

    public $refund_query;

    public $wap_pay;   //手机网站支付

    public $page_pay;    //电脑网站支付

    public function __construct()
    {
        $this->close        = new CloseBuilder();
        $this->download     = new DownloadBuilder();
        $this->query        = new QueryBuilder();
        $this->refund       = new RefundBuilder();
        $this->refund_query = new RefundQueryBuilder();
        $this->wap_pay      = new WapPayBuilder();

        $this->page_pay      = new PagePayBuilder(); //电脑网站支付
    }
}