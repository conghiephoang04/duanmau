<?php
function getAllProduct() {
    $conn=connectdb();
    $sql = "SELECT * FROM `products`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll(); // lấy nhiều dòng
    return $kq;
}

function producstList($cataId = 0){
    $conn = connectdb();
    if ($cataId != 0)
        $querySQL="SELECT * FROM pro WHERE id_cata = " . $cataId;
    else 
        $querySQL="SELECT * FROM pro";

    $stmt = $conn->prepare($querySQL); // chuẩn bị thực thi câu lệnh
    $stmt->execute(); // thực thi câu lệnh Sql
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //$result = $stmt->fetch(); // Lấy 1 dòng
    $result = $stmt->fetchAll(); // Lấy nhiều dòng
    if(count($result) > 0) return $result;
    else return 0;
  }

  function deleteProduct($id) {
    $conn=connectdb();
    $sql = "DELETE FROM `pro` WHERE id = " . $id;
    $conn->exec($sql);
  }

  function addProduct($id_cata, $name, $description, $price , $status, $img){
    $conn=connectdb();
    $sql = "INSERT INTO pro (`id_cata`, `name`, `description`, `price`, `status`, `img`) 
    VALUES ('".$id_cata."','".$name."','".$description."','".$price."','".$status."','".$img."')";
    // use exec() because no results are returned
    $conn->exec($sql);
}

function updateProduct($id, $id_cata, $name, $description, $price , $status,) {
  $conn=connectdb();
    $sql = "UPDATE pro SET `id_cata`='".$id_cata."', 
    `name` = '".$name."',
    `description` = '".$description."',
    `price` = '".$price."',
    `status` = '".$status."',
    `img` = '".$status."'
     WHERE id=".$id;
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
}

  function categoryList(){
    $conn = connectdb();
    $querySQL="SELECT * FROM categoris";
    $stmt = $conn->prepare($querySQL); // chuẩn bị thực thi câu lệnh
    $stmt->execute(); // thực thi câu lệnh Sql
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //$result = $stmt->fetch(); // Lấy 1 dòng
    $result = $stmt->fetchAll(); // Lấy nhiều dòng
    if(count($result) > 0) return $result;
    else return 0;
  }

  function getOneProduct($id) {
    $conn=connectdb();
    $sql = "SELECT * FROM `pro` WHERE id = " . $id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch(); // Lấy 1 dòng
    return $result;
}



function getLastestProduct() {
    $conn=connectdb();
    $sql = "SELECT * FROM `pro` WHERE `promo` = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll(); // lấy nhiều dòng
    return $kq;
}




?>