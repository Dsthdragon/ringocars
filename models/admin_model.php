<?php

class admin_model extends model {

    function __construct() {
        parent::__construct();
    }

    function getFeatures() {
        return $this->db->select("SELECT * FROM feature");
    }

    function addFeature() {
        $error = array();
        if($_POST['feature'] == null){
            $error[] = "Input a feature title!";
        }
        $sth = $this->db->prepare("SELECT * FROM feature WHERE feature = :feature");
        $sth->execute(array(':feature' => $_POST['feature']));
        if($sth->rowCount() > 0){
            $error[] = "Feature already in system";
        }
        if (empty($error)) {
            $data = array('feature' => $_POST['feature']);
            $this->db->insert("feature", $data);
            return "Feature added to database!";
        } else {
            return $error;
        }
    }

    function deleteFeature() {

        $sth = $this->db->prepare("SELECT * FROM feature WHERE id = :id");
        $sth->execute(array(':id' => $_POST['id']));
        if($sth->rowCount() > 0){
            $this->db->delete("feature", "id = {$_POST['id']}");
            return "Feature deleted from database!";
        } else {
            return array("Feature not found in database!");
        }
    }

    function getStores() {
        return $this->db->select("SELECT * FROM shop");
    }

    function addShop() {
        $error = array();
        foreach ($_POST as $key => $value){
            if($value == null){
                $error[] = "All fields are required!";
                break;
            }
        }

        if(empty($error)) {
            $data = array();
            $data['shop'] = $_POST['shop'];
            $data['address'] = $_POST['address'];
            $data['phone'] = $_POST['phone'];
            $data['sh_hours'] = $_POST['sh_hours'];
            $data['sc_hours'] = $_POST['sc_hours'];

            $this->db->insert("shop", $data);
            return "Shop added to database";
        } else {
            return $error;
        }
    }

    function deleteShop() {

        $sth = $this->db->prepare("SELECT * FROM shop WHERE id = :id");
        $sth->execute(array(':id' => $_POST['id']));
        if($sth->rowCount() > 0){
            $this->db->delete("shop", "id = {$_POST['id']}");
            return "Shop deleted from database!";
        } else {
            return array("Shop not found in database!");
        }
    }

    function getbrands() {
        return $this->db->select("SELECT * FROM make");
    }

    function addMake() {
        $error = array();
        if($_POST['make'] == null){
            $error[] = "Enter a valid car brand";
        }
        $sth = $this->db->prepare("SELECT * FROM make WHERE make = :make");
        $sth->execute(array(':make' => $_POST['make']));
        if($sth->rowCount() > 0){
            $error[] = "Brand already in system!";
        }
        if(empty($error)){
            $this->db->insert("make", array('make' => $_POST['make']));
            return "Brand added to database";
        } else {
            return $error;
        }
    }

    function deleteMake() {

        $sth = $this->db->prepare("SELECT * FROM make WHERE id = :id");
        $sth->execute(array(':id' => $_POST['id']));
        if($sth->rowCount() > 0){
            $this->db->delete("make", "id = {$_POST['id']}");
            return "Brand deleted from database!";
        } else {
            return array("Brand not found in database!");
        }
    }

    function getBrand($brand) {

        $sth = $this->db->prepare("SELECT * FROM make WHERE id = :id");
        $sth->execute(array(':id' => $brand));
        return $sth->fetch();
    }


    function getNextBrand($brand){
        $sth = $this->db->prepare("SELECT * FROM make WHERE id > :id ORDER BY id ASC LIMIT 1");
        $sth->execute(array(':id' => $brand));
        return $sth->fetch();
    }

    function getPreviousBrand($brand){
        $sth = $this->db->prepare("SELECT * FROM make WHERE id < :id ORDER BY id DESC LIMIT 1");
        $sth->execute(array(':id' => $brand));
        return $sth->fetch();
    }

    function getModel($model){
        $sth = $this->db->prepare("SELECT * FROM model WHERE id = :id");
        $sth->execute(array(':id' => $model));
        return $sth->fetch();
    }

    function getModels($brand) {
        return $this->db->select("SELECT * FROM model WHERE make = :id", array(':id' => $brand));
    }

    function addModel($brand) {
        $error = array();
        if($_POST['model'] == null){
            $error[] = "Enter a valid car model";
        }
        $sth = $this->db->prepare("SELECT * FROM model WHERE make = :make AND model = :model");
        $sth->execute(array(':make' => $brand, ':model' => $_POST['model']));
        if($sth->rowCount() > 0){
            $error[] = "Model already in system!";
        }
        if(empty($error)){
            $models = explode(',', $_POST['model']);
            foreach($models as $model){
                $data = array();
                $data['make'] = $brand;
                $data['model'] = trim($model, " ");
                $this->db->insert("model",$data);
            }
            return "Model added to database";
        } else {
            return $error;
        }
    }

    function deleteModel() {

        $sth = $this->db->prepare("SELECT * FROM model WHERE id = :id");
        $sth->execute(array(':id' => $_POST['id']));
        if($sth->rowCount() > 0){
            $this->db->delete("model", "id = {$_POST['id']}");
            return "Model deleted from database!";
        } else {
            return array("Model not found in database!");
        }
    }

    function getColors() {
        return $this->db->select("SELECT * FROM color");
    }

    function addColor() {
        $error = array();
        if($_POST['color'] == null){
            $error[] = "Enter a valid color";
        }
        $sth = $this->db->prepare("SELECT * FROM color WHERE color = :color");
        $sth->execute(array(':color' => $_POST['color']));
        if($sth->rowCount() > 0){
            $error[] = "Color already in system!";
        }
        if(empty($error)){
            $data = array();
            $data['color'] = ucfirst($_POST['color']);
            $this->db->insert("color",$data);
            return "Color added to database";
        } else {
            return $error;
        }
    }

    function deleteColor() {
        $sth = $this->db->prepare("SELECT * FROM color WHERE id = :id");
        $sth->execute(array(':id' => $_POST['id']));
        if($sth->rowCount() > 0){
            $this->db->delete("color", "id = {$_POST['id']}");
            return "Color deleted from database!";
        } else {
            return array("Color not found in database!");
        }
    }

    function getCylinders() {
        return $this->db->select("SELECT * FROM cylinders");
    }

    function addCylinders() {
        $error = array();
        if($_POST['cylinders'] == null){
            $error[] = "Enter a valid cylinders";
        }
        $sth = $this->db->prepare("SELECT * FROM cylinders WHERE cylinders = :cylinders");
        $sth->execute(array(':cylinders' => $_POST['cylinders']));
        if($sth->rowCount() > 0){
            $error[] = "Cylinders already in system!";
        }
        if(empty($error)){
            $data = array();
            $data['cylinders'] = ucfirst($_POST['cylinders']);
            $this->db->insert("cylinders",$data);
            return "Cylinders added to database";
        } else {
            return $error;
        }
    }

    function deleteCylinders() {

        $sth = $this->db->prepare("SELECT * FROM cylinders WHERE id = :id");
        $sth->execute(array(':id' => $_POST['id']));
        if($sth->rowCount() > 0){
            $this->db->delete("cylinders", "id = {$_POST['id']}");
            return "Cylinders deleted from database!";
        } else {
            return array("Cylinders not found in database!");
        }
    }

    function getSizes() {
        return $this->db->select("SELECT * FROM size");
    }

    function addSize() {
        $error = array();
        if($_POST['size'] == null){
            $error[] = "Enter a valid size";
        }
        $sth = $this->db->prepare("SELECT * FROM size WHERE size = :size");
        $sth->execute(array(':size' => $_POST['size']));
        if($sth->rowCount() > 0){
            $error[] = "Size already in system!";
        }
        if(empty($error)){
            $data = array();
            $data['size'] = ucfirst($_POST['size']);
            $this->db->insert("size",$data);
            return "Size added to database";
        } else {
            return $error;
        }
    }

    function deleteSize() {

        $sth = $this->db->prepare("SELECT * FROM size WHERE id = :id");
        $sth->execute(array(':id' => $_POST['id']));
        if($sth->rowCount() > 0){
            $this->db->delete("size", "id = {$_POST['id']}");
            return "Size deleted from database!";
        } else {
            return array("Size not found in database!");
        }
    }

    function getTransmissions() {
        return $this->db->select("SELECT * FROM transmission");
    }

    function addTransmission() {
        $error = array();
        if($_POST['transmission'] == null){
            $error[] = "Enter a valid transmission";
        }
        $sth = $this->db->prepare("SELECT * FROM transmission WHERE transmission = :transmission");
        $sth->execute(array(':transmission' => $_POST['transmission']));
        if($sth->rowCount() > 0){
            $error[] = "Transmission already in system!";
        }
        if(empty($error)){
            $data = array();
            $data['transmission'] = ucfirst($_POST['transmission']);
            $this->db->insert("transmission",$data);
            return "Transmission added to database";
        } else {
            return $error;
        }
    }

    function deleteTransmission() {

        $sth = $this->db->prepare("SELECT * FROM transmission WHERE id = :id");
        $sth->execute(array(':id' => $_POST['id']));
        if($sth->rowCount() > 0){
            $this->db->delete("transmission", "id = {$_POST['id']}");
            return "Transmission deleted from database!";
        } else {
            return array("Transmission not found in database!");
        }
    }

    function getTypes() {
        return $this->db->select("SELECT * FROM type");
    }

    function addType() {
        $error = array();
        if($_POST['type'] == null){
            $error[] = "Enter a valid type";
        }
        $sth = $this->db->prepare("SELECT * FROM type WHERE type = :type");
        $sth->execute(array(':type' => $_POST['type']));
        if($sth->rowCount() > 0){
            $error[] = "Type already in system!";
        }
        if(empty($error)){
            $data = array();
            $data['type'] = ucfirst($_POST['type']);
            $this->db->insert("type",$data);
            return "Type added to database";
        } else {
            return $error;
        }
    }

    function deleteType() {

        $sth = $this->db->prepare("SELECT * FROM type WHERE id = :id");
        $sth->execute(array(':id' => $_POST['id']));
        if($sth->rowCount() > 0){
            $this->db->delete("type", "id = {$_POST['id']}");
            return "Type deleted from database!";
        } else {
            return array("Type not found in database!");
        }
    }

    function getCar($id) {
        $sth = $this->db->prepare("SELECT c.*,  b.make as make_name,  m.model as model_name,  t.type as type_name, ex.color as exterior_color_name, tr.transmission as transmission_name, cy.cylinders as cylinders_name, s.size as size_name, it.color as interior_color_name, sh.shop as shop_name, COALESCE(im.thumb, null) as thumb FROM ad c LEFT JOIN make b ON  b.id = c.make LEFT JOIN model m ON m.id = c.model LEFT JOIN type t ON t.id = c.type LEFT JOIN color ex ON ex.id = c.exterior_color LEFT JOIN transmission tr ON tr.id = c.transmission LEFT JOIN cylinders cy ON cy.id = c.cylinders LEFT JOIN size s ON s.id = c.size LEFT JOIN color it ON it.id = c.interior_color LEFT JOIN shop sh ON sh.id = c.shop LEFT JOIN ad_image im ON im.ad = c.id AND im.main = 1 WHERE c.id = :id");
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    function getCarFeatures($id) {
        return $this->db->select("SELECT ad.*, f.feature as feature_name FROM ad_feature ad LEFT JOIN feature f ON f.id = ad.feature WHERE ad.ad = :ad", array(':ad' => $id));
    }

    function getCarSpecification($id) {
        $sth = $this->db->prepare("SELECT * FROM ad_specification WHERE ad  = :ad");
        $sth->execute(array(':ad' => $id));
        return $sth->fetch();
    }

    function updateFeature($id) {
        $total = count($_POST['features']);
        $had = 0;
        $car = $this->getCar($id);
        foreach($_POST['features'] as $key => $value){
            $sth = $this->db->prepare("SELECT * FROM ad_feature WHERE ad = :ad AND feature = :feature");
            $sth->execute(array(':ad' => $id,':feature' => $value));
            if($sth->rowCount() > 0 ){
                $had++;
            } else {
                $data = array();
                $data['ad'] = $id;
                $data['feature'] = $value;
                $data['make'] = $car['make'];
                $data['model'] = $car['model'];
                $this->db->insert('ad_feature', $data);
            }
        }
        if($had == 0 && $total != 0){
            return "All features are added!";
        } else if($had != 0){
            $added = $total - $had;
            return array($added. " of  " . $total . " added!");
        } else {
            return array("No feature added!");
        }
    }

    function deleteCarFeature() {
        $total = count($_POST['id']);
        $deleted = 0;
        foreach($_POST['id'] as $key => $value) {
            $sth = $this->db->prepare("SELECT * FROM ad_feature WHERE id = :id");
            $sth->execute(array(':id' => $value));
            if($sth->rowCount() > 0 ){
                $this->db->delete("ad_feature", "id = {$value}");
                $deleted++;
            }
        }
        if($total != 0 && $total == $deleted) {
            return "All selected features removed from car!";
        } else {
            return array($deleted . " of " . $total . " features removed from car!");
        }
    }

    function getCars($make = null, $model = null)
    {
        $makeStatement = null;
        if($make != null) {
            $makeStatement = " WHERE a.make = " . $make;
        }
        $modelStatement = null;
        if($model != null) {
            $modelStatement = " AND a.model = " . $model;
        }

        return $this->db->select("SELECT a.*, m.make as make_name, mo.model as model_name, sh.shop as shop_name FROM ad a LEFT JOIN make m ON m.id = a.make LEFT JOIN model mo ON mo.id = a.model LEFT JOIN shop sh ON sh.id = a.shop {$makeStatement} {$modelStatement}");
    }

    function getCarImages($id)
    {
        return $this->db->select("SELECT * FROM ad_image WHERE ad = :ad", array(':ad' => $id));
    }

    function addCarImage($id) {
        $total = count($_FILES['img']['name']);
        $uploaded = 0;
        for($x= 0; $x < count($_FILES['img']['name']); $x++) {
            $ext = explode('.', $_FILES['img']['name'][$x]);
            $ext = end($ext);
            $ext = strtolower($ext);
            $file = generato::random(20);
            $image = "public/upload/pictures/product/".$file.'.'.$ext;
            $thumb = "public/upload/pictures/product/thumb/".$file.'.'.$ext;

            copy($_FILES['img']['tmp_name'][$x], $image);

            $thumbSav = new resize($image);
            $thumbSav->resizeImage(150, 150, "crop");
            $thumbSav->saveImage($thumb, 100);

            $resize = new resize($image);
            $resize->resizeImage(500, 500, 'auto');
            $resize->saveImage($image, 100);

            $data = array();

            $data['ad'] = $id;
            $data['image'] = $image;
            $data['thumb'] = $thumb;
            $sth = $this->db->prepare("SELECT * FROM  ad_image WHERE ad = :ad");
            $sth->execute(array(":ad" => $id));
            if($sth->rowCount() == 0){
                $data['main'] = 1;
            }
            $this->db->insert('ad_image', $data);
            $uploaded++;
        }

        if($uploaded == $total && $total != 0) {
            return "All images uploaded";
        } else {
            return array("Kindly select an image to upload");
        }
    }

    function getSpecification($id) {
        $sth = $this->db->prepare("SELECT * FROM ad_specification  WHERE ad = :ad");
        $sth->execute(array(':ad' => $id));
        return $sth->fetch();
    }

    function editCarSpecification($id){
        $error = array();
        foreach($_POST as $key => $value){
            if($value == null){
                $error[] = "All fields are required!";
                break;
            }
        }

        if(empty($error)){
            $data = array();
            foreach($_POST as $key => $value){
                if($key != "form"){
                    $data[$key] = $value;
                }
            }

            $sth = $this->db->prepare("SELECT * FROM ad_specification  WHERE ad = :ad");
            $sth->execute(array(':ad' => $id));
            if($sth->rowCount() == 1){
                $this->db->update("ad_specification", $data, "ad = {$id}");
                return "Specification updated!";
            } else {
                $data['ad'] = $id;
                $this->db->insert("ad_specification", $data);
                return "Specification added!";
            }
        } else {
            return $error;
        }
    }

    function makeMain($id){
        $sth = $this->db->prepare("SELECT * FROM ad_image WHERE id = :id");
        $sth->execute(array(':id' => $_POST['id']));
        $data = $sth->fetch();
        if($data['main'] == false) {
            $this->db->update("ad_image", array('main' => 0 ), "ad = {$id}");
            $this->db->update("ad_image", array('main' => 1 ), "id = {$_POST['id']}");
            return "Car main image set!";
        } else {
            return array("Image already set as main");
        }
    }

    function deleteCarImage() {
        $total = count($_POST['id']);
        $delete = 0;
        foreach($_POST['id'] as $key => $value){
            $status = $this->deleteCarImageFunction($value);
            if($status == true){
                $delete++;
            }
        }
        if($total != 0 && $total == $delete) {
            return "All selected images deleted successfully!";
        } else {
            return array($delete . " of " . $total . " Images Deleted!");
        }
    }

    function deleteCarImageFunction($id) {
        $sth = $this->db->prepare("SELECT * FROM ad_image WHERE id = :id");
        $sth->execute(array(':id' => $id));
        if($sth->rowCount() > 0){
            $data = $sth->fetch();
            if(!empty($data['img'])){
                if (file_exists(ROOT . "/" . $data['image'])) {
                    unlink(ROOT . "/" . $data['image']);
                }
            }
            if(!empty($data['thumb'])){
                if (file_exists(ROOT . "/" . $data['thumb'])) {
                    unlink(ROOT . "/" . $data['thumb']);
                }
            }
            $this->db->delete("ad_image", "id = {$id}");
            return true;
        } else {
            return false;
        }
    }

    function addCar()
    {
        $error = array();
        foreach($_POST as $key => $value)
        {
            if($value == null){
                $error[] = "All fields are required!";
                echo $key;
                break;
            }
        }
        if(empty($error)){
            $data = array();
            foreach($_POST as $key => $value){
                if($key != 'form' && $key != 'redirect'){
                    $data[$key] = $value;
                }
            }
            $brand = $this->getBrand($data['make']);
            $model = $this->getModel($data['model']);
            $data['title'] = $data['year']." ".ucfirst($brand['make'])." ".ucfirst($model['model']);
            $this->db->insert('ad', $data);
            if(isset($_POST['redirect'])){
                $id = $this->db->lastinsertid();
                header('location:'.URL.'admin/car/'.$id);
            } else {
                return "Car added to database";
            }
        } else {
            return $error;
        }
    }



    function getAppointments()
    {
        return $this->db->select("SELECT s.*, sh.shop as shop_name FROM schedule s LEFT JOIN shop sh ON sh.id = s.shop WHERE s.appointment >= NOW() ORDER BY s.appointment ASC");
    }

    function getOldAppointments()
    {
        return $this->db->select("SELECT s.*, sh.shop as shop_name  FROM schedule s LEFT JOIN shop sh ON sh.id = s.shop WHERE s.appointment < NOW() ORDER BY s.appointment DESC");
    }

    function getAdmins(){
        return $this->db->select("SELECT * FROM admin");
    }

    function addAdmin(){
        $error = array();
        foreach($_POST as $key => $value){
            if($value == null){
                $error[] = "All fields are required!";
                break;
            }
        }

        $email = $this->db->prepare("SELECT * FROM admin WHERE email = :email");
        $email->execute(array(':email' => $_POST['email']));
        if($email->rowCount() > 0){
            $error[] = "Email already in system!";
        }

        if(empty($error)){
            $data = array();
            $data['fullname'] = $_POST['fullname'];
            $data['email'] = $_POST['email'];
            $data['password'] = hash::create("sha256", "123456", HASH_PASSWORD_KEY);
            $data['role'] = $_POST['role'];

            $this->db->insert("admin", $data);
            return "Admin created!";
        } else {
            return $error;
        }
    }

    function deleteAdmin(){
        $sth = $this->db->prepare("SELECT * FROM admin WHERE id = :id");
        $sth->execute(array(':id' => $_POST['id']));
        if($sth->rowCount() > 0){
            $admin = $sth->fetch();
            if($admin['role'] == "owner"){
                $sth = $this->db->prepare("SELECT * FROM admin WHERE role = 'owner'");
                $sth->execute();
                if($sth->rowCount() == 1){
                    return array("Can not delete selected admin!");
                }
            }
            $this->db->delete("admin","id = {$_POST['id']}");
            return "Admin deleted!";
        } else {
            return array("Admin not found!");
        }
    }

    function updatePassword(){

        $error = array();
        foreach($_POST as $key => $value){
            if($value == null){
                $error[] = "All fields are required!";
                break;
            }
        }
        $user = $this->getAdmin();
        if($user['password'] != hash::create("sha256", $_POST['password'], HASH_PASSWORD_KEY)) {
            $error[] = "Invalid password inputted";
        }
        if(strlen($_POST['password1']) < 6)
        {
            $error[] = "Password must be atleast 6 characters long";
        }
        if($_POST['password'] == $_POST['password1'])
        {
            $error[] = "new and old password are the same!";
        }
        if($_POST['password1'] != $_POST['password2'])
        {
            $error[] = "Password confirmation not a match!";
        }
        if(empty($error))
        {
            $data = array();
            $data['password'] = hash::create("sha256", $_POST['password1'], HASH_PASSWORD_KEY);
            $this->db->update("admin", $data, "id = {$_SESSION['id']}");
            return "password updated";
        } else {
            return $error;
        }

    }

    function getAdmin(){
        $sth = $this->db->prepare("SELECT * FROM admin WHERE id = :id");
        $sth->execute(array(':id' => $_SESSION['id']));
        return $sth->fetch();
    }
}
