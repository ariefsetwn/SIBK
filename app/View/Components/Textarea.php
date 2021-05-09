<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{

  public $name;
  public $text;
  public $value;
  public $ex;

  public function __construct($name, $text, $value = null, $ex = null)
  {
    $this->name = $name;
    $this->text = $text;
    $this->value = $value;
    $this->ex = $ex;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.textarea');
  }
}
