<?php


/**
 * $data = location data (user_id, title, lat, lng, type)
 *
 * @param array $data
 * @return bool
 */
function addLocation($data = [])
{
    global $pdo;

   

    $sql = "INSERT INTO locations (user_id, title, lat, lng, type) VALUES (:user_id, :title, :lat, :lng, :type)";
    // prepare the sql
    $stmt = $pdo->prepare($sql);
    // bind values
    $stmt->bindValue(':user_id', $data['user_id']);
    $stmt->bindValue(':title', $data['title']);
    $stmt->bindValue(':lat', $data['lat']);
    $stmt->bindValue(':lng', $data['lng']);
    $stmt->bindValue(':type', $data['type']);
    $stmt->execute();

    return $stmt->rowCount();
}


function getLocations($params = []) {
    global $pdo;

    $condition = "";
    // for user id
    if (
        array_key_exists('user_id', $params)
        && 
        !empty($params['user_id']) 
        && 
        is_numeric($params['user_id'])
        ) {
        $condition = " WHERE user_id = {$params['user_id']} and verified = 1";
    }
    

    $sql = "SELECT * FROM locations $condition";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}


// search for locations
function search($keyword) 
{
    global $pdo;
    $sql = "SELECT * FROM locations where title like '%{$keyword}%' and verified = 1";

    // where title like '%{$params['keyword']}%' and verified = 1
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}


// get location by id
function getLocation($id) {
    global $pdo;
    
   
    $sql = "SELECT * FROM locations WHERE id = :id and verified = 1 LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}
