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
