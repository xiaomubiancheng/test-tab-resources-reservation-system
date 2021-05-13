<?php
namespace  App\Common\Err;

/**
 * 错误的描述
 * Class ApiErrDesc
 * @package App\Common\Err
 */
class ApiErrDesc{
    const SUCCESS = [0,'Success'];
    const ERR_PARAMS = [1001,'人力未填,无法操作,请联系管理员'];
    const ERR_PARAMS1 = [1001,'所选时间后几周的工作日周期人力未填,无法操作,请联系管理员'];

    const ERR_MANPOWER = [1000,'人力不足'];
}
