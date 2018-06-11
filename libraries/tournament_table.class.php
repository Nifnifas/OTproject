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
        private $rungtynes_lentele = '';
	
	public function __construct() {
		$this->komandos_lentele = config::DB_PREFIX . 'komanda';
                $this->turnyro_lentele = config::DB_PREFIX . 'suvestine';
                $this->rungtynes_lentele = config::DB_PREFIX . 'rungtynes';
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
                                                   `{$this->turnyro_lentele}`.`praleista`,
                                                   `{$this->turnyro_lentele}`.`skirtumas`
					FROM `{$this->turnyro_lentele}`
						LEFT JOIN `{$this->komandos_lentele}`
							ON `{$this->turnyro_lentele}`.`fk_KOMANDAkom_id`=`{$this->komandos_lentele}`.`kom_id`
                                                        ORDER BY taskai DESC, skirtumas DESC LIMIT {$limit} OFFSET {$offset}";
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
        
        public function updateP(){
            $query = "UPDATE suvestine 
                SET zaista = (SELECT COUNT(rung_id) FROM rungtynes 
                WHERE fk_kom1_id = id_SUVESTINE OR fk_kom2_id = id_SUVESTINE)";
            mysql::query($query);
        }
        
        public function updateW(){
            $query = "UPDATE suvestine 
                SET laimejo = (SELECT COUNT(rung_id) FROM rungtynes 
                WHERE fk_kom1_id = id_SUVESTINE AND kom1_iv > kom2_iv OR fk_kom2_id = id_SUVESTINE AND kom2_iv > kom1_iv)";
            mysql::query($query);
        }
        
        public function updateD(){
            $query = "UPDATE suvestine 
                SET lygiasios = (SELECT COUNT(rung_id) FROM rungtynes 
                WHERE fk_kom1_id = id_SUVESTINE AND kom1_iv = kom2_iv OR fk_kom2_id = id_SUVESTINE AND kom2_iv = kom1_iv)";
            mysql::query($query);
        }
        
        public function updateL(){
            $query = "UPDATE suvestine 
                SET pralaimejo = zaista - (laimejo + lygiasios)";
            mysql::query($query);
        }
        
        public function updatePts(){
            $query = "UPDATE suvestine 
                SET taskai = laimejo * 3 + lygiasios";
            mysql::query($query);
        }
        
        public function updateImusta(){
            $query = "UPDATE suvestine
                SET imusta = (SELECT SUM(kom1_iv) FROM rungtynes 
                WHERE fk_kom1_id = id_SUVESTINE) + (SELECT SUM(kom2_iv) FROM rungtynes
                WHERE fk_kom2_id = id_SUVESTINE)";
            mysql::query($query);
        }
        
        public function updatePraleista(){
            $query = "UPDATE suvestine
                SET praleista = (SELECT SUM(kom1_iv) FROM rungtynes 
                WHERE fk_kom2_id = id_SUVESTINE) + (SELECT SUM(kom2_iv) FROM rungtynes
                WHERE fk_kom1_id = id_SUVESTINE)";
            mysql::query($query);
        }
        
        public function updateSkirtumas(){
            $query = "UPDATE suvestine
                SET skirtumas = imusta - praleista";
            mysql::query($query);
        }
}

