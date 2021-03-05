<?php


function getTypes() 
{
    global $pdo;
    return $pdo->query("SELECT * FROM types")->fetchAll(PDO::FETCH_OBJ);
}

function get_type($id) 
{
    global $pdo;

    $sql = "SELECT * FROM types where id = :id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    return $stmt->fetch(PDO::FETCH_OBJ);
}

function edit_type($id, $title)
{
    global $pdo;

    $sql = "UPDATE types SET title = :title where id = :id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id, 'title' => $title]);

    return $stmt->rowCount();
}

function add_type($title)
{
    global $pdo;

    $sql = "INSERT INTO types SET title = :title";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['title' => $title]);

    return $stmt->rowCount();
}

