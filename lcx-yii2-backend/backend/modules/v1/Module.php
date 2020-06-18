<?php

namespace backend\modules\v1;

    /**
     * @OA\Info(title="small video", version="v1")
     * @OA\Tag(
     *     name="Sysinfo",
     *     description="系统配置信息",
     * ),
     * @OA\Tag(
     *     name="SmsCode",
     *     description="验证码模块",
     * ),
     * @OA\Tag(
     *     name="Login",
     *     description="登录模块",
     * ),
     * @OA\Tag(
     *     name="User",
     *     description="用户模块",
     * ),
     * @OA\Tag(
     *     name="UserFans",
     *     description="用户粉丝模块",
     * ),
     * @OA\Tag(
     *     name="Video",
     *     description="小视频模块",
     * ),
     * @OA\Tag(
     *     name="VideoBgm",
     *     description="小视频背景音乐模块",
     * ),
     * @OA\Tag(
     *     name="VideoComment",
     *     description="小视频评论模块",
     * ),
     * @OA\Tag(
     *     name="Goods",
     *     description="商品模块",
     * ),
     * @OA\Tag(
     *     name="Category",
     *     description="商品分类",
     * ),
     * @OA\Tag(
     *     name="WishUser",
     *     description="心愿用户",
     * ),
     * @OA\Tag(
     *     name="Wish",
     *     description="心愿",
     * ),
     * @OA\Tag(
     *     name="RichPkg",
     *     description="土豪包",
     * ),
     * @OA\Tag(
     *     name="Cart",
     *     description="购物车模块",
     * ),
     * @OA\Tag(
     *     name="Order",
     *     description="订单模块",
     * ),
     * @OA\Tag(
     *     name="Payment",
     *     description="订单支付",
     * ),
     * @OA\Tag(
     *     name="Shipping",
     *     description="收货地址",
     * ),
     *
     * @OA\Tag(
     *     name="Message",
     *     description="消息",
     * ),
     * @OA\Tag(
     *     name="Banner",
     *     description="轮播Banner",
     * ),
     * @OA\Tag(
     *     name="GiftcardRecord",
     *     description="礼品券记录明细",
     * ),
     * @OA\Tag(
     *     name="GoldfishRecord",
     *     description="余额明细",
     * ),
     * @OA\Tag(
     *     name="Channel",
     *     description="栏目模块",
     * ),
     * @OA\Tag(
     *     name="Category",
     *     description="商品分类",
     * ),
     * @OA\Tag(
     *     name="Energy",
     *     description="助力能量相关",
     * ),
     * @OA\Tag(
     *     name="AppAnimate",
     *     description="app启动广告管理",
     * ),
     * @OA\Tag(
     *     name="DeliveryDoc",
     *     description="发货单相关",
     * ),
     * @OA\Tag(
     *     name="ExpressRoute",
     *     description="发货单相关",
     * ),
     * @OA\Tag(
     *     name="PickupOrder",
     *     description="土豪包提货单",
     * ),
     * @OA\Tag(
     *     name="Lottery",
     *     description="抽奖相关",
     * ),
     * @OA\Tag(
     *     name="ShareChains",
     *     description="分享信息",
     * ),
     * @OA\Tag(
     *     name="HotKeyword",
     *     description="热门关键字",
     * ),
     * @OA\Tag(
     *     name="Config",
     *     description="配置",
     * ),
     * @OA\Tag(
     *     name="WeChat",
     *     description="微信相关",
     * ),
     * @OA\Tag(
     *     name="Report",
     *     description="举报",
     * ),
     * @OA\Tag(
     *     name="AppVersion",
     *     description="app版本发布信息",
     * ),
     */


/**
 * v1 module definition class.
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\v1\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
