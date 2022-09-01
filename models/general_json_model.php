<?php

class general_json_model extends model {
	function __construct(){
		parent::__construct();
	}

	function savedSearch($id){
		session::init();
		$sth = $this->db->prepare("SELECT * FROM ad WHERE id = :id");
		$sth->execute(array(':id' => $id));
		if($sth->rowCount() > 0) {

			$sth = $this->db->prepare("SELECT * FROM saved WHERE user = :user AND ad = :ad");
			$sth->execute(array(':ad' => $id, ':user' => session::get('id')));
			if($sth->fetch() == 0){
				$data = array();
				$data['ad']  = $id;
				$data['user'] = session::get('id');
				$this->db->insert('saved', $data);
				return 2;
			} else {
				return 1;
			}
		} else {
			return 0;
		}
	}

	function addToCompare($id){
		session::init();
		if(!session::get('compare')){
			session::set('compare', array());
			$compare = session::get('compare');
		} else {
			$compare = session::get('compare');
		}

		$sth = $this->db->prepare("SELECT * FROM ad WHERE id = :id");
		$sth->execute(array(':id' => $id));
		if($sth->rowCount() > 0) {
			if(!in_array($id,$compare)){
				$compare[] = $id;
				session::set('compare', $compare);
				return 2;
			}
			return 1;
		}else {
			return 0;
		}
	}

	function compareList(){
		session::init();
		$compare = implode(",", session::get('compare'));
		return $this->db->select("SELECT c.*,  b.make as make_name,  m.model as model_name,  t.type as type_name, ex.color as exterior_color_name, tr.transmission as transmission_name, cy.cylinders as cylinders_name, s.size as size_name, it.color as interior_color_name, sh.shop as shop_name FROM ad c LEFT JOIN make b ON  b.id = c.make LEFT JOIN model m ON m.id = c.model LEFT JOIN type t ON t.id = c.type LEFT JOIN color ex ON ex.id = c.exterior_color LEFT JOIN transmission tr ON tr.id = c.transmission LEFT JOIN cylinders cy ON cy.id = c.cylinders LEFT JOIN size s ON s.id = c.size LEFT JOIN color it ON it.id = c.interior_color LEFT JOIN shop sh ON sh.id = c.shop WHERE c.id in ({$compare})");
	}
}