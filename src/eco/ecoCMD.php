<?php

declare(strict_types=1);

namespace eco;

use jojoe77777\FormAPI\FormAPI;
use onebone\economyapi\EconomyAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as T;

class ecoCMD extends Command implements PluginIdentifiableCommand{
	
	public function getPlugin() : Plugin{
   return true;
}
	
	private $main;
	
	public function __construct(Loader $main){
		$this->main = $main;
		parent::__construct("economyui", "EconomyUI Menu", "/ecoui", ["ecui", "ecoui", "eu"]);
	}

public function execute(CommandSender $sender, string $label, array $args){
		if(!$sender instanceof Player){
			$sender->sendMessage("§crun command in game!");
			return false;
		}
		if(!isset($args[0]) || $args[0] !== "op"){
			if($sender->hasPermission("eco.cmd.use")){
				$this->memberForm($sender);
				return true;
			}else{
				$sender->sendMessage("§eYou don't have permission");
				return false;
			}
		}
		if($args[0] === "op"){
			if($sender->hasPermission("eco.use.op")){
				$this->opForm($sender);
			}else{
				$sender->sendMessage("§cYou don't have permission!");
				return false;
			}
		}
		return false;
	}

            }
          });
public function top(Player $player){
		$money = $this->main->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		$money_top = $money->getAllMoney();
		$message = "";
		if(count($money_top) > 0){
			arsort($money_top);
			$i = 1;
			foreach($money_top as $name => $money){
				$message .= "  §f".$i.". ".$name.":    ".$money." §a$"."\n";
				if($i >= 10){
					break;
					}
					++$i;
				}}
	    $api = $this->main->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $player, int $data = null){
			$result = $data;
			if($result === null){
				return true;
				}
				switch($result){
					case "0";
					break;
				}
			});
			$form->setTitle(T::GREEN . "Top 10 Richest Player");
			$form->setContent("".$message);
	                $form->addButton("Exit");
			$form->sendToPlayer($player);
                        $form->sendToPlayer($sender);
			return $form;
     }
}
