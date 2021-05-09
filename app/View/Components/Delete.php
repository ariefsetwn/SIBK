<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Delete extends Component
{

  public $link;

  public function __construct($link)
  {
    $this->link = $link;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.delete');
  }
}
