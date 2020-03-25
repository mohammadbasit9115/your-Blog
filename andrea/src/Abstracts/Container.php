<?php 
namespace App\Abstracts;


abstract class Container
{
protected $instances=[];
protected  $receipts=[];

public function make($name)
{
  if (!empty($this->instances[$name]))
  {
    return $this->instances[$name];
  }

  if (isset($this->receipts[$name])) {
    $this->instances[$name] = $this->receipts[$name]();
  }

  return $this->instances[$name];
}
}

    ?>