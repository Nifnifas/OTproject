<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of results
 *
 * @author lukkru2
 */
class results {

	private $rezultatu_lentele = '';
        private $komandos_lentele = '';

        public function __construct() {
		$this->rezultatu_lentele = config::DB_PREFIX . 'rungtynes';
                $this->komandos_lentele = config::DB_PREFIX . 'komanda';
        }
                
        public function getResultList($limit, $offset) {
		$query = "  SELECT                 s.rung_id,
						   t1.pavadinimas as pavadinimas1,
                                                   t2.pavadinimas as pavadinimas2,
                                                   s.kom1_iv,
                                                   s.kom2_iv,
                                                   s.data
					FROM rungtynes as s
						LEFT OUTER JOIN komanda as t1 ON s.fk_kom1_id=t1.kom_id
                                                LEFT OUTER JOIN komanda as t2 ON s.fk_kom2_id=t2.kom_id";
                $data = mysql::select($query);
		
		return $data;
	}
        
	public function getResultListCount() {
		$query = "  SELECT COUNT(`rung_id`) as `kiekis`
					FROM {$this->rezultatu_lentele}";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
        public function getResult($id) {
		$query = "  SELECT *
					FROM `{$this->rezultatu_lentele}`
					WHERE `rung_id`='{$id}'";
		$data = mysql::select($query);
		
		return $data[0];
        }
}
