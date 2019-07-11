<?php

namespace onebone\itemcloud;

use pocketmine\scheduler\Task;

class SaveTask extends Task{
  public $plugin;
  public function __construct(MainClass $plugin){
    $this->plugin = $plugin;
  }

  public function onRun($currentTick){
    $this->plugin->save();
  }
}