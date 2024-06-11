<?php
function getAllCategory() {
    $conn=connectdb();
    $sql = "SELECT * FROM `categoris`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll(); // lấy nhiều dòng
    return $kq;
}

function getOneCategory($id) {
    $conn=connectdb();
    $sql = "SELECT * FROM `categoris` WHERE id = " . $id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch(); // Lấy 1 dòng
    return $result;
}

function addCategory($name, $description, $position) {
    $conn=connectdb();
    $sql = "INSERT INTO categoris (`name`) VALUES ('".$name."')";
    $conn->exec($sql);
}

function updateCategory($id, $name, $description, $position) {
    $conn=connectdb();
    $sql = "UPDATE `categoris` SET `name` = '".$name."' WHERE `categoris`.`id` = " . $id;
    $conn->exec($sql);
}

function deleteCategory($id) {
    $conn=connectdb();
    $sql = "DELETE FROM categoris WHERE `categoris`.`id` = " . $id;
    $conn->exec($sql);
}
?>