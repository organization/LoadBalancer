<?php

namespace ifteam\LoadBalancer\dummy;

use pocketmine\network\protocol\DataPacket;
use pocketmine\network\protocol\FullChunkDataPacket;
use pocketmine\network\SourceInterface;
use pocketmine\Player;
use pocketmine\utils\UUID;

class DummyPlayer extends Player {
	public $name = "";
	public $loggedIn = true;
	public $randomUUID;
	public function __construct(SourceInterface $interface, $clientID, $ip, $port) {
		parent::__construct ( $interface, $clientID, $ip, $port );
		$this->randomUUID = UUID::fromRandom();
	}
	public function dataPacket(DataPacket $packet, $needACK = false) {
		return parent::dataPacket ( $packet, $needACK );
	}
	public function handleDataPacket(DataPacket $packet) {
		//parent::handleDataPacket ( $packet );
	}
	public function isOnline() {
		return true;
	}
	public function isAlive(){
		return false;
	}
	public function setName($name) {
		$this->name = $name;
	}
	public function getDisplayName() {
		return $this->name;
	}
	public function getUniqueId(){
		return $this->randomUUID;
	}
	public function sendChunk($x, $z, $payload, $ordering = FullChunkDataPacket::ORDER_COLUMNS){
		return;
	}
	public function getName() {
		return $this->name;
	}
}
?>