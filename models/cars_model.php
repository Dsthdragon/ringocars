<?php

class cars_model extends model{

    function __construct(){
        parent::__construct();
    }

    function getMake($make = null){
        $sth = $this->db->prepare("SELECT * FROM make WHERE make = :make");
        $sth->execute(array(':make' => $make));
        return $sth->fetch();
    }

    function getModels($make){
        $statement = null;

        if($make != null){
            $make =$this->getMake($make);
            if(isset($_POST['makes'])){

                $_POST['makes'][] = $make['id'];
            } else {
                $_POST['makes'] = array($make['id']);
            }
            if(isset($_POST['makes'])) {
                $makes = implode(',', $_POST['makes']);
                $statement .= " WHERE make in ({$makes}) ";
            }
        }
        return $this->db->select("SELECT * FROM model {$statement}");
    }

    function getCars($make = null, $model = null, $getID = false){
        $statement = "WHERE 1=1 ";

        if($make != null){
            if($model != null) {
                $model = $this->getModel($make, $model);
                if(isset($_POST['models'])){

                    $_POST['models'][] = $model['id'];
                } else {
                    $_POST['models'] = array($model['id']);
                }
            }
            $make =$this->getMake($make);
            if(isset($_POST['makes'])){
                $_POST['makes'][] = $make['id'];
            } else {
                $_POST['makes'] = array($make['id']);
            }
        }
        if(isset($_POST['used']) && !isset($_POST['new']) ){
            $statement .= " AND used = 1 ";
        } else if(!isset($_POST['used']) && isset($_POST['new']) ){
            $statement .= " AND used = 0 ";
        }
        if(isset($_POST['makes'])) {
            $makes = implode(',', $_POST['makes']);
            $statement .= " AND make in ({$makes}) ";
        }
        if(isset($_POST['models'])) {
            $models = implode(',', $_POST['models']);
            $statement .= " AND model in ({$models}) ";
        }
        if(isset($_POST['type'])) {
            $type = implode(',', $_POST['type']);
            $statement .= " AND `type` in ({$type}) ";
        }
        if(isset($_POST['cylinders'])) {
            $cylinders = implode(',', $_POST['cylinders']);
            $statement .= " AND `cylinders` in ({$cylinders}) ";
        }
        if(isset($_POST['size'])) {
            $size = implode(',', $_POST['size']);
            $statement .= " AND `size` in ({$size}) ";
        }
        if(isset($_POST['transmission'])) {
            $transmission = implode(',', $_POST['transmission']);
            $statement .= " AND `transmission` in ({$transmission}) ";
        }
        if(isset($_POST['exterior_color'])) {
            $exterior_color = implode(',', $_POST['exterior_color']);
            $statement .= " AND `exterior_color` in ({$exterior_color}) ";
        }
        if(isset($_POST['interior_color'])) {
            $interior_color = implode(',', $_POST['interior_color']);
            $statement .= " AND `interior_color` in ({$interior_color}) ";
        }
        if(isset($_POST['title']) && $_POST['title'] != null){
            $statement .= " AND title LIKE '%{$_POST['title']}%' ";
        }
        if(isset($_POST['min_price']) && $_POST['min_price'] != null){
            $statement .= " AND price >= {$_POST['min_price']} ";
        }
        if(isset($_POST['max_price']) && $_POST['max_price'] != null){
            $statement .= " AND price <= {$_POST['max_price']} ";
        }
        if(isset($_POST['min_year']) && $_POST['min_year'] != null){
            $statement .= " AND year >= {$_POST['min_year']} ";
        }
        if(isset($_POST['max_year']) && $_POST['max_year'] != null){
            $statement .= " AND year <= {$_POST['max_year']} ";
        }
        if(isset($_POST['max_milage']) && $_POST['max_milage'] != null){
            $statement .= " AND milage <= {$_POST['max_milage']} ";
        }
        if($getID == false)
            return $this->db->select("SELECT a.*, COALESCE(im.thumb, null) as thumb  FROM ad a LEFT JOIN ad_image im ON im.ad = a.id AND im.main = 1  {$statement}");
        else
            return $this->db->select("SELECT GROUP_CONCAT(a.id) as id_set  FROM ad a {$statement}");

    }
    function getFeaturesWithMake($make, $model) {
        $make =$this->getCars($make, $model, true);
        $statement = null;
        if(!empty($make)){
            $statement = "WHERE ad IN (".$make[0]['id_set'].")";
        }
        return $this->db->select("SELECT * FROM feature WHERE id IN (SELECT DISTINCT feature FROM ad_feature {$statement})");
    }

    function getMakes(){
        return $this->db->select("SELECT * FROM make ORDER BY make ASC");
    }

    function getModel($make, $model){
        $make =$this->getMake($make);
        $sth = $this->db->prepare("SELECT * FROM model WHERE make = :make AND model = :model");
        $sth->execute(array(':make' => $make['id'], ':model' => $model));
        return $sth->fetch();
    }

    function getColors(){
        return $this->db->select("SELECT * FROM color ORDER BY color ASC");
    }

    function getCylinders(){
        return $this->db->select("SELECT * FROM cylinders ORDER BY cylinders ASC");
    }

    function getSize(){
        return $this->db->select("SELECT * FROM size ORDER BY size ASC");
    }

    function getTransmissions(){
        return $this->db->select("SELECT * FROM transmission ORDER BY transmission ASC");
    }

    function getTypes() {
        return $this->db->select("SELECT * FROM type ORDER BY type ASC");
    }

    function test(){
    }
}

