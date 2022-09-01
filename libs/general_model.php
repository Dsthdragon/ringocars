<?php

class general_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_models($make, $type = 'all'){
        $sth = $this->db->prepare("SELECT * FROM model WHERE make = :make");
        $sth->execute(array(':make' => $make));
        if($type == "count"){
            return $sth->rowCount();
        } else {
            return $sth->fetchAll();
        }
    }

    function get_models_data($make){
        return $this->db->select("SELECT * FROM model WHERE make = :make", array(':make' => $make));
    }

    function get_make_cars($make, $type = "all") {
        $sth = $this->db->prepare("SELECT * FROM ad WHERE make = :make");
        $sth->execute(array(':make' => $make));
        if($type == "count"){
            return $sth->rowCount();
        } else {
            return $sth->fetchAll();
        }
    }

    function getShop(){
        $sth = $this->db->prepare("SELECT * FROM shop");
        $sth->execute();
        return $sth->fetch();
    }

    function getCarFeatures($id, $limited = true, $limit = 5) {
        if($limited)
            return $this->db->select("SELECT ad.*, f.feature as feature_name FROM ad_feature ad LEFT JOIN feature f ON f.id = ad.feature WHERE ad.ad = :ad LIMIT {$limited}", array(':ad' => $id));
        else
            return $this->db->select("SELECT ad.*, f.feature as feature_name FROM ad_feature ad LEFT JOIN feature f ON f.id = ad.feature WHERE ad.ad = :ad", array(':ad' => $id));

    }

    function get_model_cars($model, $type = "all") {
        $sth = $this->db->prepare("SELECT * FROM ad WHERE model = :model");
        $sth->execute(array(':model' => $model));
        if($type == "count"){
            return $sth->rowCount();
        } else {
            return $sth->fetchAll();
        }
    }
}
