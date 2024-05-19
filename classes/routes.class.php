<?php 
class Routes
{
  private $routesList = [''];
  private $callbackList = [''];
  private $protectionList = [''];
  public function add($method, $route, $callback, $protection) 
  {
    $this->routesList[] = strtoupper($method).':'.$route;
    $this->callbackList[] = $callback;
    $this->protectionList[] = $protection;

    return $this;
  }
  public function go($route) 
  {
    $param = '';
    $protection = '';
    $callback = '';
    $methodServer = $_SERVER['REQUEST_METHOD'];
    $route = $methodServer.":/".$route;

    if (substr_count($route, '/') >= 3) {
      $param = substr($route, strrpos($route, '/') + 1);
      $route = substr($route, 0, strrpos($route, '/'))."/[ordernumber]";
      }

    $index = array_search($route, $this->routesList);
    if($index > 0){
      $callback = explode("::", $this->callbackList[$index]);
      $protection = $this->protectionList[$index];
    }

    $class = isset($callback[0]) ? $callback[0] : '';
    $method = isset($callback[1]) ? $callback[1] : '';

    if (class_exists($class))
    {
      if (method_exists($class, $method))
      {
        $instantiateClass = new $class();
          return call_user_func_array(
            array($instantiateClass, $method),
            array($param)
          );
      }
    }

  }
}