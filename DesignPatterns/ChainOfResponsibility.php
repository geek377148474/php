<?php
/*
 * 请求对象
 */
class Request
{
  /**
   * 请求对象身份标识
   * @var string
   */
  private $_requestId = '';

  /**
   * 魔术方法 设置私有属性
   * @param string $name  属性名称
   * @param string $value 属性值
   */
  public function __set($name='', $value='')
  {
    $name = '_' . $name;
    $this->$name = $value;
  }

  /**
   * 魔术方法 获取私有属性
   * @param string $name  属性名称
   */
  public function __get($name='')
  {
    $name = '_' . $name;
    return $this->$name;
  }
}

abstract class Handler{
    /**
     * 下一个hanler对象
     *
     * @var [type]
     */
    private $_nextHandler;

    /**
     * 校验方法
     *
     * @param Request $request
     * @return void
     */
    abstract public function Check(Request $request);
    
    /**
     * 设置下一个handler
     *
     * @param Handler $handler
     * @return void
     */
    public function setNext(Handler $handler){
        $this->_nextHandler = $handler;
        return $this->_nextHandler;
    }

    /**
     * 启动
     *
     * @param Request $request
     * @return void
     */
    public function start(Request $request){
        $this->Check($request);
        if (!empty($this->_nextHandler)) {
            $this->_nextHandler->start($request);
        }
    }
}

/*
 * 令牌校验的handler
 */
class HandlerAccessToken extends Handler
{
  /**
   * 校验方法
   *
   * @param Request $request 请求对象
   */
  public function Check(Request $request)
  {
    echo "请求{$request->requestId}: 令牌校验通过～ \n";
  }
}
/*
 * handler接口
 */
class HandlerFrequent extends Handler
{
  /**
   * 校验方法
   *
   * @param Request $request 请求对象
   */
  public function Check(Request $request)
  {
    echo "请求{$request->requestId}: 请求频率校验通过～ \n";
  }
}
/*
 * handler接口
 */
class HandlerArguments extends Handler
{
  /**
   * 校验方法
   *
   * @param Request $request 请求对象
   */
  public function Check(Request $request)
  {
    echo "请求{$request->requestId}: 参数校验通过～ \n";
  }
}
/*
 * handler接口
 */
class HandlerSign extends Handler
{
  /**
   * 校验方法
   *
   * @param Request $request 请求对象
   */
  public function Check(Request $request)
  {
    echo "请求{$request->requestId}: 签名校验通过～ \n";
  }
}
/*
 * handler接口
 */
class HandlerAuthority extends Handler
{
  /**
   * 校验方法
   *
   * @param Request $request 请求对象
   */
  public function Check(Request $request)
  {
    echo "请求{$request->requestId}: 权限校验通过～ \n";
  }
}
try {
    // 下面我们用责任链模式实现一个api-gateway即接口网关
    // 初始化一个请求对象
    $request            =  new Request();
    // 设置一个请求身份id
    $request->requestId = uniqid();
    // 初始化一个：令牌校验的handler
    $handlerAccessToken =  new HandlerAccessToken();
    // 初始化一个：访问频次校验的handler
    $handlerFrequent    =  new HandlerFrequent();
    // 初始化一个：必传参数校验的handler
    $handlerArguments   =  new HandlerArguments();
    // 初始化一个：签名校验的handler
    $handlerSign        =  new HandlerSign();
    // 初始化一个：访问权限校验的handler
    $handlerAuthority   =  new HandlerAuthority();
    // 构成对象链
    $handlerAccessToken->setNext($handlerFrequent)
        ->setNext($handlerArguments)
        ->setNext($handlerSign)
        ->setNext($handlerAuthority);
    // 启动网关
    $handlerAccessToken->start($request);
} catch (\Exception $e) {
    echo $e->getMessage();
}
