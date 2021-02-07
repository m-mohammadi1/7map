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

    $sql = "INSERT INTO locations (title, lat, lng, type) VALUES (:title, :lat, :lng, :type)";
    // prepare the sql
    $stmt = $pdo->prepare($sql);
    // bind values
    $stmt->bindValue(':title', $data['title']);
    $stmt->bindValue(':lat', $data['lat']);
    $stmt->bindValue(':lng', $data['lng']);
    $stmt->bindValue(':type', $data['type']);
    $stmt->execute();

    return $stmt->rowCount();
}


function getLocations($parms = []) {
    global $pdo;
    
    $sql = "SELECT * FROM locations";

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
