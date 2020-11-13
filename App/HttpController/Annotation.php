<?php declare(strict_types=1);
/**
 * This file is part of EasySwoole
 * @link     https://github.com/easy-swoole
 * @document https://www.easyswoole.com
 * @license https://github.com/easy-swoole/easyswoole/blob/3.x/LICENSE
 */

namespace App\HttpController;

use EasySwoole\HttpAnnotation\AnnotationController;
use EasySwoole\HttpAnnotation\AnnotationTag\Api;
use EasySwoole\HttpAnnotation\AnnotationTag\ApiAuth;
use EasySwoole\HttpAnnotation\AnnotationTag\ApiDescription;
use EasySwoole\HttpAnnotation\AnnotationTag\ApiFail;
use EasySwoole\HttpAnnotation\AnnotationTag\ApiFailParam;
use EasySwoole\HttpAnnotation\AnnotationTag\ApiGroup;
use EasySwoole\HttpAnnotation\AnnotationTag\ApiGroupAuth;
use EasySwoole\HttpAnnotation\AnnotationTag\ApiGroupDescription;
use EasySwoole\HttpAnnotation\AnnotationTag\ApiRequestExample;
use EasySwoole\HttpAnnotation\AnnotationTag\ApiSuccess;
use EasySwoole\HttpAnnotation\AnnotationTag\ApiSuccessParam;
use EasySwoole\HttpAnnotation\AnnotationTag\Method;
use EasySwoole\HttpAnnotation\AnnotationTag\Param;
use EasySwoole\HttpAnnotation\Utility\AnnotationDoc;

/**
 * @ApiGroup(groupName="测试注解")
 * @ApiGroupAuth(name="token",description="继承param注解 功能一致")
 * @ApiGroupDescription("测试注解描述")
 * Class Annotation
 * @package App\HttpController
 * @author gaobinzhan <gaobinzhan@gmail.com>
 */
class Annotation extends AnnotationController
{
    /**
     * @Api(name="index",path="/a/index")
     * @ApiAuth(name="token",description="继承param注解 功能一致 写了控制器auth注解 可不写这个")
     * @ApiDescription("index方法描述")
     * @Method(allow={"GET"})
     * @Param(name="test",required="must to be",notEmpty="not empty",description="测试")
     * @ApiSuccess("success")
     * @ApiSuccessParam(name="code")
     * @ApiSuccessParam(name="result")
     * @ApiSuccessParam(name="msg")
     * @ApiFail("fail")
     * @ApiFailParam(name="fail-code")
     * @ApiRequestExample("curl xxxxx")
     */
    public function index()
    {
        $this->response()->write('https://github.com/easy-swoole/http-annotation');
    }

    public function _doc()
    {
        $doc = new AnnotationDoc();
        $string = $doc->scan2Html(EASYSWOOLE_ROOT . '/App/HttpController');
        $this->response()->withAddedHeader('Content-type', 'text/html;charset=utf-8');
        $this->response()->write($string);
    }
}
