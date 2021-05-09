<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{

  public $act;
  public $method;

  public function __construct($act, $method)
  {
    $this->act = $act;
    $this->method = $method;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.form');
  }
}
