<?php
namespace  App\Common\Err;

/**
 * 错误的描述
 * Class ApiErrDesc
 * @package App\Common\Err
 */
class ApiErrDesc{
    const SUCCESS = [0,'Success'];
    const ERR_PARAMS = [1000,'人力未填,无法操作,请联系管理员'];
    const ERR_MANPOWER = [1000,'人力不足'];
}
