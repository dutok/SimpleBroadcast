<?php
/**
 * User: Michael Leahy
 * Date: 6/23/14
 * Time: 6:20 PM
 */

namespace SimpleBroadcast;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class SimpleBroadcast extends PluginBase{

    public $configFile;

    public function onEnable(){
        @mkdir($this->getDataFolder());
        $this->configFile = (new Config($this->getDataFolder()."config.yml", Config::YAML, array(
            "prefix" => "Broadcast",
            "color" => "§f"
        )))->getAll();
        $this->getLogger()->info("SimpleBroadcast has loaded!");
    }

    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        switch($command->getName()){
            case "broadcast":
                if (isset($args[0])) {
                    Server::getInstance()->broadcastMessage($this->configFile["color"]."[".$this->configFile["prefix"]."]" . ": " . implode(" ", $args));
                }
                else {
                    $sender->sendMessage("You need to specify a message to send.");
                }
                break;
        }

    }

    public function onDisable(){
        $this->getLogger()->info("SimpleBroadcast has disabled!");

    }

}