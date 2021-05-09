<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Role extends Component
{

  public $x;

  public function __construct($x)
  {
    $this->x = $x;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.role');
  }
}
