<?php
function login() {
  if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    //so sánh vói db
    $userInfo = checkUser($user,$pass);
    /*
    echo '<pre>';
    var_dump($userInfo);
    echo '</pre>';
    exit;
    */
    if ($userInfo) {
      //tạo mảng
      $objuser = array("username" => $userInfo['username'], "role" => $userInfo['is_admin'], "user_id" => $userInfo['id']);
      //lưu session
      $_SESSION['objuser'] = $objuser;
      //chuyển trang
      if ($userInfo['is_admin'] == 1) header("Location: ../admin/index.php");
      else header("Location: index.php");
    } else {
      echo 'Tên đăng nhập hoặc tài khoản của bạn không chính xác!';
    }
  }
}

function logout() {
    unset($_SESSION['objuser']);
    header("Location: index.php");
}

function checkUser($user, $pass){
  $conn=connectdb();
  $stmt = $conn->prepare("SELECT * FROM users WHERE username='".$user."' AND password='".$pass."'");
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetch(); // Lấy 1 dòng
  if($result) return $result;
  else return 0;
}

function addUser($username, $password, $phone) {
  $conn=connectdb();
  $sql = "INSERT INTO `user` (`username`, `password`, `phone`)
  VALUES ('".$username."', '".$password."', '".$phone."')";
  $conn->exec($sql);
  return $conn->lastInsertId();
}
?>
