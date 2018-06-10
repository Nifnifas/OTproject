<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of teams
 *
 * @author lukkru2
 */

class teams {

	private $komandos_lentele = '';
	
	public function __construct() {
		$this->komandos_lentele = config::DB_PREFIX . 'komanda';
        }
                
        public function getTeamList($limit, $offset) {
		$query = "  SELECT *
					FROM {$this->komandos_lentele}";
                $data = mysql::select($query);
		return $data;
	}
        
	public function getTeamListCount() {
		$query = "  SELECT COUNT(`kom_id`) as `kiekis`
					FROM {$this->komandos_lentele}";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
        public function getTeam($id) {
		$query = "  SELECT *
					FROM `{$this->komandos_lentele}`
					WHERE `kom_id`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
        }
}
