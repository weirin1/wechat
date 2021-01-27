<?php

namespace Weirin\Wechat\Pay\Data;

use Weirin\Wechat\Pay\Config;
use Weirin\Wechat\Pay\Data\Base;

/**
 *
 * 企业转账订单输入对象
 * @author widyhu
 *
 */
class TransfersOrder extends Base
{
    /**
     * 设置微信分配的公众账号ID
     * @param string $value
     **/
    public function SetAppid($value)
    {
        $this->values['mch_appid'] = $value;
    }
    /**
     * 获取微信分配的公众账号ID的值
     * @return 值
     **/
    public function GetAppid()
    {
        return $this->values['mch_appid'];
    }
    /**
     * 判断微信分配的公众账号ID是否存在
     * @return true 或 false
     **/
    public function IsAppidSet()
    {
        return array_key_exists('mch_appid', $this->values);
    }


    /**
     * 设置微信支付分配的商户号
     * @param string $value
     **/
    public function SetMch_id($value)
    {
        $this->values['mchid'] = $value;
    }
    /**
     * 获取微信支付分配的商户号的值
     * @return 值
     **/
    public function GetMch_id()
    {
        return $this->values['mchid'];
    }
    /**
     * 判断微信支付分配的商户号是否存在
     * @return true 或 false
     **/
    public function IsMch_idSet()
    {
        return array_key_exists('mchid', $this->values);
    }


    /**
     * 设置微信支付分配的终端设备号，商户自定义
     * @param string $value
     **/
    public function SetDevice_info($value)
    {
        $this->values['device_info'] = $value;
    }
    /**
     * 获取微信支付分配的终端设备号
     * @return 值
     **/
    public function GetDevice_info()
    {
        return $this->values['device_info'];
    }
    /**
     * 判断微信支付分配的终端设备号是否存在
     * @return true 或 false
     **/
    public function IsDevice_infoSet()
    {
        return array_key_exists('device_info', $this->values);
    }


    /**
     * 设置随机字符串，不长于32位。推荐随机数生成算法
     * @param string $value
     **/
    public function SetNonce_str($value)
    {
        $this->values['nonce_str'] = $value;
    }
    /**
     * 获取随机字符串
     * @return 值
     **/
    public function GetNonce_str()
    {
        return $this->values['nonce_str'];
    }
    /**
     * 判断随机字符串是否存在
     * @return true 或 false
     **/
    public function IsNonce_strSet()
    {
        return array_key_exists('nonce_str', $this->values);
    }

    /**
     * 设置: 企业付款操作说明信息。必填。
     * @param string $value
     **/
    public function SetDesc($value)
    {
        $this->values['desc'] = $value;
    }
    /**
     * 获取: 企业付款操作说明信息
     * @return 值
     **/
    public function GetDesc()
    {
        return $this->values['desc'];
    }
    /**
     * 判断: 企业付款操作说明信息是否存在
     * @return true 或 false
     **/
    public function IsDescSet()
    {
        return array_key_exists('desc', $this->values);
    }


    /**
     * 设置: 校验用户姓名选项(必填)
     *  NO_CHECK：不校验真实姓名
        FORCE_CHECK：强校验真实姓名（未实名认证的用户会校验失败，无法转账）
        OPTION_CHECK：针对已实名认证的用户才校验真实姓名（未实名认证用户不校验，可以转账成功）
     * @param string $value
     **/
    public function SetCheck_name($value)
    {
        $this->values['check_name'] = $value;
    }
    /**
     * 获取: 校验用户姓名选项
     * @return 值
     **/
    public function GetCheck_name()
    {
        return $this->values['check_name'];
    }
    /**
     * 判断 校验用户姓名选项是否存在
     * @return true 或 false
     **/
    public function IsCheck_nameSet()
    {
        return array_key_exists('check_name', $this->values);
    }


    /**
     * 设置: 收款用户真实姓名。如果check_name设置为FORCE_CHECK或OPTION_CHECK，则必填用户真实姓名(可选)
     * @param string $value
     **/
    public function SetRe_user_name($value)
    {
        $this->values['re_user_name'] = $value;
    }
    /**
     * 获取: 收款用户真实姓名
     * @return 值
     **/
    public function GetRe_user_name()
    {
        return $this->values['re_user_name'];
    }
    /**
     * 判断: 收款用户真实姓名是否存在
     * @return true 或 false
     **/
    public function IsRe_user_nameSet()
    {
        return array_key_exists('re_user_name', $this->values);
    }


    /**
     * 设置商户订单号，需保持唯一性
     * @param string $value
     **/
    public function SetPartner_trade_no($value)
    {
        $this->values['partner_trade_no'] = $value;
    }
    /**
     * 获取商户订单号
     * @return 值
     **/
    public function GetPartner_trade_no()
    {
        return $this->values['partner_trade_no'];
    }
    /**
     * 判断商户订单号是否存在
     * @return true 或 false
     **/
    public function IsPartner_trade_noSet()
    {
        return array_key_exists('partner_trade_no', $this->values);
    }

    /**
     * 设置企业付款金额，单位为分
     * @param string $value
     **/
    public function SetAmount($value)
    {
        $this->values['amount'] = $value;
    }
    /**
     * 获取企业付款金额，单位为分
     * @return 值
     **/
    public function GetAmount()
    {
        return $this->values['amount'];
    }
    /**
     * 判断企业付款金额
     * @return true 或 false
     **/
    public function IsAmountSet()
    {
        return array_key_exists('amount', $this->values);
    }


    /**
     * 设置调用接口的机器Ip地址
     * @param string $value
     **/
    public function SetSpbill_create_ip($value)
    {
        $this->values['spbill_create_ip'] = $value;
    }
    /**
     * 获取调用接口的机器Ip地址
     * @return 值
     **/
    public function GetSpbill_create_ip()
    {
        return $this->values['spbill_create_ip'];
    }
    /**
     * 判断调用接口的机器Ip地址是否存在
     * @return true 或 false
     **/
    public function IsSpbill_create_ipSet()
    {
        return array_key_exists('spbill_create_ip', $this->values);
    }

    /**
     * 设置: 商户appid下，某用户的openid。下单前需要调用【网页授权获取用户信息】接口获取到用户的Openid。
     * @param string $value
     **/
    public function SetOpenid($value)
    {
        $this->values['openid'] = $value;
    }
    /**
     * 获取: 商户appid下，某用户的openid
     * @return 值
     **/
    public function GetOpenid()
    {
        return $this->values['openid'];
    }
    /**
     * 判断: 商户appid下，某用户的openid是否存在
     * @return true 或 false
     **/
    public function IsOpenidSet()
    {
        return array_key_exists('openid', $this->values);
    }
}
