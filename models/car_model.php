<?php

class car_model extends model{

    function __construct() {
        parent::__construct();
    }

    function getCar($id) {
        $sth = $this->db->prepare("SELECT c.*,  b.make as make_name,  m.model as model_name,  t.type as type_name, ex.color as exterior_color_name, tr.transmission as transmission_name, cy.cylinders as cylinders_name, s.size as size_name, it.color as interior_color_name, sh.shop as shop_name, COALESCE(im.thumb, null) as thumb FROM ad c LEFT JOIN make b ON  b.id = c.make LEFT JOIN model m ON m.id = c.model LEFT JOIN type t ON t.id = c.type LEFT JOIN color ex ON ex.id = c.exterior_color LEFT JOIN transmission tr ON tr.id = c.transmission LEFT JOIN cylinders cy ON cy.id = c.cylinders LEFT JOIN size s ON s.id = c.size LEFT JOIN color it ON it.id = c.interior_color LEFT JOIN shop sh ON sh.id = c.shop LEFT JOIN ad_image im ON im.ad = c.id AND im.main = 1 WHERE c.id = :id");
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    function getGallery($id) {
    	return $this->db->select("SELECT * FROM ad_image WHERE ad = :ad", array(':ad' => $id));
    }

    function getCarFeatures($id) {
        return $this->db->select("SELECT ad.*, f.feature as feature_name FROM ad_feature ad LEFT JOIN feature f ON f.id = ad.feature WHERE ad.ad = :ad", array(':ad' => $id));
    }

    function getCarSpecification($id) {
        $sth = $this->db->prepare("SELECT * FROM ad_specification WHERE ad = :ad");
        $sth->execute(array(':ad' => $id));
        return $sth->fetch();
    }

}
