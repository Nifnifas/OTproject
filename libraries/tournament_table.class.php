<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tournament_table
 *
 * @author lukkru2
 */
class tournament_table {

	private $komandos_lentele = '';
        private $turnyro_lentele = '';
	
	public function __construct() {
		$this->komandos_lentele = config::DB_PREFIX . 'komanda';
                $this->turnyro_lentele = config::DB_PREFIX . 'suvestine';
        }
                
        public function getTableList($limit, $offset) {
		$query = "  SELECT `{$this->turnyro_lentele}`.`id_SUVESTINE`,
						   `{$this->komandos_lentele}`.`pavadinimas` AS `komanda`,
						   `{$this->turnyro_lentele}`.`zaista`,
                                                   `{$this->turnyro_lentele}`.`laimejo`, 
                                                   `{$this->turnyro_lentele}`.`lygiasios`,
                                                   `{$this->turnyro_lentele}`.`pralaimejo`,
                                                   `{$this->turnyro_lentele}`.`taskai`,
                                                   `{$this->turnyro_lentele}`.`imusta`,
                                                   `{$this->turnyro_lentele}`.`praleista`
					FROM `{$this->turnyro_lentele}`
						LEFT JOIN `{$this->komandos_lentele}`
							ON `{$this->turnyro_lentele}`.`fk_KOMANDAkom_id`=`{$this->komandos_lentele}`.`kom_id`
                                                        ORDER BY taskai DESC LIMIT {$limit} OFFSET {$offset}";
                $data = mysql::select($query);
		
		return $data;
	}
        
	public function getTableListCount() {
		$query = "  SELECT COUNT(`id_SUVESTINE`) as `kiekis`
					FROM {$this->turnyro_lentele}";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
        public function getTable($id) {
		$query = "  SELECT *
					FROM `{$this->turnyro_lentele}`
					WHERE `id_SUVESTINE`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
        }
}

