<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{

  public $link;
  public $type;
  public $size;
  public $text;

  public function __construct($link = null, $type = null, $size = null, $text = null)
  {
    $this->link = $link;
    $this->type = $type;
    $this->size = $size;
    $this->text = $text;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.button');
  }
}
