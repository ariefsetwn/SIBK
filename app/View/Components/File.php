<?php

namespace App\View\Components;

use Illuminate\View\Component;

class File extends Component
{

  public $name;
  public $text;

  public function __construct($name, $text)
  {
    $this->name = $name;
    $this->text = $text;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.file');
  }
}
