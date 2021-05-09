<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Email extends Component
{

  public $name;
  public $text;
  public $value;

  public function __construct($name, $text, $value = null)
  {
    $this->name = $name;
    $this->text = $text;
    $this->value = $value;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.email');
  }
}
