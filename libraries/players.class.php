<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of players
 *
 * @author lukkru2
 */

class players {

	private $zaideju_lentele = '';
        private $poziciju_lentele = '';
        private $komandu_lentele = '';


        public function __construct() {
		$this->zaideju_lentele = config::DB_PREFIX . 'zaidejas';
                $this->poziciju_lentele = config::DB_PREFIX . 'pozicija';
                $this->komandu_lentele = config::DB_PREFIX . 'komanda';
        }
        
        public function getList() {
		$query = "  SELECT *
					FROM {$this->zaideju_lentele}";
                $data = mysql::select($query);
		
		return $data;
	}
                
        public function getPlayerList($limit, $offset) {
		$query = "  SELECT `{$this->zaideju_lentele}`.`zaid_id`,
						   `{$this->poziciju_lentele}`.`name` AS `poz`,
						   `{$this->zaideju_lentele}`.`vardas`,
                                                   `{$this->zaideju_lentele}`.`pavarde`, 
                                                   `{$this->zaideju_lentele}`.`tautybe`,
                                                   `{$this->komandu_lentele}`.`pavadinimas` AS `pavadinimas`
					FROM `{$this->zaideju_lentele}`
						LEFT JOIN `{$this->poziciju_lentele}`
							ON `{$this->zaideju_lentele}`.`pozicija`=`{$this->poziciju_lentele}`.`id`
                                                LEFT JOIN `{$this->komandu_lentele}`
							ON `{$this->zaideju_lentele}`.`fk_KOMANDAkom_id`=`{$this->komandu_lentele}`.`kom_id` LIMIT {$limit} OFFSET {$offset}";
                $data = mysql::select($query);
		
		return $data;
	}
        
	public function getPlayerListCount() {
		$query = "  SELECT COUNT(`zaid_id`) as `kiekis`
					FROM {$this->zaideju_lentele}";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
        public function getPlayer($id) {
		$query = "  SELECT *
					FROM `{$this->zaideju_lentele}`
					WHERE `zaid_id`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
        }
}
