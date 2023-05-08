
<?php
// include('connect.php');
if (session_id() === '')
session_start();
if (isset($_SESSION['user'])) {
    $user1 = $_SESSION['user'];
} else {
    $user1 = [];
}
//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
$str = '';


//Lấy giá trị POST từ form vừa submit
if (isset($user1['ten'])) {
    $ten2 = $user1['ten'];
} else {
    $ten2 = "";
}
if (isset($_POST["post_name"])) {
    $str = $_POST['post_name'];

    //Cắt chuỗi thông tin từ thẻ ra từng phần
    $pos1 = strpos($str, '|', 0);
    $pos2 = strpos($str, '|', $pos1 + 1);
    $pos3 = strpos($str, '|', $pos2 + 1);
    $pos4 = strpos($str, '<<', $pos3 + 1);
    
    $cmnd = substr($str,  0, $pos1);
    $ten = substr($str,  $pos1 + 1, $pos2 - $pos1 - 1);
    $ngaysinh = substr($str,  $pos2 + 1, $pos3 - $pos2 - 1);
    $sdt = substr($str,  $pos4 + 2, strlen($str) - $pos4);
    $trangthai="An toàn";
    
    //insert dữ liệu vào database table
    $sql = "INSERT INTO doituong(Cmnnd_Cccd,Hoten,Trangthai,Ngaysinh,Sdt,Thoigian,tentk) VALUES('$cmnd','$ten','$trangthai','$ngaysinh','$sdt',Now(),'$ten2')";

    if ($connect->query($sql) === TRUE) {
      
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
    // include('test.php');
}
if (isset($_POST["tendiadiem"])){
    $str1=$_POST["tendiadiem"];
    $sql = "INSERT INTO diadiem(tentk,tendiadiem) VALUES('$ten2','$str1')";
    if ($connect->query($sql) === TRUE) {
      
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//Đóng database

?>

<!-- lệnh mysql cập nhập id 
SET @count = 0;
UPDATE `doituong` SET `doituong`.`Id` = @count:= @count + 1; -->
