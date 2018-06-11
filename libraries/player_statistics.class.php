<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of player_statistics
 *
 * @author lukkru2
 */
class player_statistics {

	private $zaideju_lentele = '';
        private $statistikos_lentele = '';
	
	public function __construct() {
		$this->zaideju_lentele = config::DB_PREFIX . 'zaidejas';
                $this->statistikos_lentele = config::DB_PREFIX . 'charakteristika';
        }
                
        public function getStatList($limit, $offset) {
		$query = "  SELECT `{$this->statistikos_lentele}`.`id_CHARAKTERISTIKA`,
						   `{$this->zaideju_lentele}`.`vardas` AS `name`,
						   `{$this->zaideju_lentele}`.`pavarde` AS `surname`,
                                                   `{$this->statistikos_lentele}`.`ivarciai`, 
                                                   `{$this->statistikos_lentele}`.`perdavimai`,
                                                   `{$this->statistikos_lentele}`.`g_korteles`,
                                                   `{$this->statistikos_lentele}`.`r_korteles`
					FROM `{$this->statistikos_lentele}`
						LEFT JOIN `{$this->zaideju_lentele}`
							ON `{$this->statistikos_lentele}`.`fk_ZAIDEJASzaid_id`=`{$this->zaideju_lentele}`.`zaid_id`
                                                        ORDER BY ivarciai DESC, perdavimai DESC LIMIT {$limit} OFFSET {$offset}";
                $data = mysql::select($query);
		
		return $data;
	}
        
	public function getStatListCount() {
		$query = "  SELECT COUNT(`id_CHARAKTERISTIKA`) as `kiekis`
					FROM {$this->statistikos_lentele}";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
        public function getStat($id) {
		$query = "  SELECT *
					FROM `{$this->statistikos_lentele}`
					WHERE `id_CHARAKTERISTIKA`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
        }
        
        public function updateStat($data) {
		$query = "  UPDATE `{$this->statistikos_lentele}`
					SET    `ivarciai`= `ivarciai` + '{$data['ivarciai']}',
                                               `perdavimai`=`perdavimai` + '{$data['perdavimai']}',
                                               `g_korteles`= `g_korteles` + '{$data['g_korteles']}',
                                               `r_korteles`=`r_korteles` + '{$data['r_korteles']}'
					WHERE `fk_ZAIDEJASzaid_id`='{$data['fk_ZAIDEJASzaid_id']}'";
		mysql::query($query);
	}
}

