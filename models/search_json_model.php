<?php

class search_json_model extends model {
    function __construct(){
        parent::__construct();
    }

    function getCars($getID = false){

        $statement = "WHERE 1=1 ";
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
        
        if(isset($_POST['used']) && !isset($_POST['new']) ){
            $statement .= " AND used = 1 ";
        } else if(!isset($_POST['used']) && isset($_POST['new']) ){
            $statement .= " AND used = 0 ";
        }
        if(isset($_POST['transmission'])) {
            $transmission = implode(',', $_POST['transmission']);
            $statement .= " AND `transmission` in ({$transmission}) ";
        }
        if(isset($_POST['exterior_color'])) {
            $exterior_color = implode(',', $_POST['exterior_color']);
            $statement .= " AND `exterior_color` in ({$exterior_color}) ";
        }
        if(isset($_POST['features'])) {
            $features = implode(',', $_POST['features']);
            $statement .= " AND a.id in ( SELECT ad FROM ad_feature WHERE feature IN ({$features})) ";
        }
        if(isset($_POST['interior_color'])) {
            $interior_color = implode(',', $_POST['interior_color']);
            $statement .= " AND `interior_color` in ({$interior_color}) ";
        }
        if(isset($_POST['title']) && $_POST['title'] != null){
            $statement .= " AND title LIKE '%{$_POST['title']}%' ";
        }
        if(isset($_POST['min_price']) && ctype_digit($_POST['min_price']) && $_POST['min_price'] > 0){
            $statement .= " AND price >= {$_POST['min_price']} ";
        }
        if(isset($_POST['max_price']) && ctype_digit($_POST['max_price']) && $_POST['max_price'] > 0){
            $statement .= " AND price <= {$_POST['max_price']} ";
        }
        if(isset($_POST['min_year']) && ctype_digit($_POST['min_year']) && $_POST['min_year'] > 0){
            $statement .= " AND year >= {$_POST['min_year']} ";
        }
        if(isset($_POST['max_year']) && ctype_digit($_POST['max_year']) && $_POST['max_year'] > 0){
            $statement .= " AND year <= {$_POST['max_year']} ";
        }
        if(isset($_POST['max_milage']) && ctype_digit($_POST['max_milage']) && $_POST['max_milage'] > 0){
            $statement .= " AND milage <= {$_POST['max_milage']} ";
        }
        if($getID == false)
            return $this->db->select("SELECT a.*, COALESCE(im.thumb, null) as thumb  FROM ad a LEFT JOIN ad_image im ON im.ad = a.id AND im.main = 1  {$statement}");
        else
            return $this->db->select("SELECT GROUP_CONCAT(a.id) as id_set  FROM ad a {$statement}");
    }


    function getModels(){
        $statement = null;
        if(isset($_POST['makes'])) {
            $makes = implode(',', $_POST['makes']);
            $statement .= " WHERE make in ({$makes}) ";
        }
        return $this->db->select("SELECT * FROM model {$statement}");
    }


    function getFeaturesWithMake() {
        $ad =$this->getCars(true);
        $statement = null;
        if(!empty($ad)){
            $statement = "WHERE ad IN (".$ad[0]['id_set'].")";
        }
        return $this->db->select("SELECT * FROM feature WHERE id IN (SELECT DISTINCT feature FROM ad_feature {$statement})");
    }
}