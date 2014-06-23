<?php
/**
 * User: Michael Leahy
 * Date: 6/23/14
 * Time: 6:20 PM
 */

namespace SimpleBroadcast;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\scheduler\PluginTask;
use pocketmine\Server;

class SimpleBroadcast extends PluginBase{

    public $configFile;

    public function onEnable(){
        @mkdir($this->getDataFolder());
        $this->configFile = (new Config($this->getDataFolder()."config.yml", Config::YAML, array(
            "messages" => array(
                "message1",
                "message2",
                "message3"
            ),
            "prefix" => "Broadcast"
        )))->getAll();
        $this->getServer()->getScheduler()->scheduleRepeatingTask(new SimpleBroadcastTask($this), 120);
    }

    public function onDisable(){

    }

}

class SimpleBroadcastTask extends PluginTask{

    public function onRun($currentTick){
        //Put code to execute on 'task'
    }
}