<?php
//Include the database configuration file
include 'dbConfig.php';

if(!empty($_POST["type_id"])){
    //Fetch all state data
    $query = $db->query("SELECT * FROM category WHERE type_id = ".$_POST['type_id']."  ORDER BY category_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    //State option list
    if($rowCount > 0){
        
        echo '<option value="">Select Category</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['category_id'].'">'.$row['category_name'].'</option>';
        }
    }else{
        echo '<option value="">Category not available</option>';
    }
}elseif(!empty($_POST["category_id"])){
    //Fetch all city data
    $query = $db->query("SELECT * FROM subcategory WHERE category_id = ".$_POST['category_id']."  ORDER BY subcategory_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //City option list
    if($rowCount > 0){
        echo '<option value="">Select subcategory</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['subcategory_id'].'">'.$row['subcategory_name'].'</option>';
        }
    }else{
        echo '<option value="">Subcategory not available</option>';
    }
}
?>