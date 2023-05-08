<?php 
include('connect.php');
if (session_id() === '')
session_start();
if (isset($_POST['dkten'])) {
    $dkten = $_POST['dkten'];
    $dksdt = $_POST['dksdt'];
    $dkpass = $_POST['dkpass'];

    $sql = "INSERT INTO taikhoan(ten,sdt,mk) VALUES('$dkten','$dksdt','$dkpass')";

    if ($connect->query($sql) === TRUE) {
     echo "<div class=\"alert-box success\"><span>thông báo: </span>Đăng ký thành công.</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
if (isset($_POST['sdt'])) {
    $sdt = $_POST['sdt'];
    $pass = $_POST['mk'];

    $sql = "Select * from taikhoan where sdt = '$sdt'";
    $query = mysqli_query($connect,$sql);
    $data = mysqli_fetch_assoc($query);
    $checkSDT=mysqli_num_rows($query);
    if($checkSDT==1){
        if($data['mk']==$pass){
            
            $_SESSION['user']=$data;
            header('location: index.php');
        }
            
    }else{
        echo "<div class=\"alert-box error\"><span>thông báo: </span>Tài khoản hoặc mật khẩu không đúng.</div>";
    }
}

?>
<html>

<head>
    <link href="css/stylelogin.css" rel="stylesheet">

</head>

<body>

    <h2>Đăng Nhập/Đăng Ký</h2><a href="index.php">Quay lại</a>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="post">
                <h1>Tạo Tài Khoản</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <!-- <span>or use your email for registration</span> -->
                <input type="text" name="dkten" placeholder="Tên" />
                <input type="text" name="dksdt" placeholder="Số điện thoại" />
                <input type="password" name="dkpass" placeholder="Mật Khẩu" />
                <button type="submit"  >Đăng Ký</button>
              
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="" method="post">
                <h1>Đăng Nhập</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <!-- <span>or use your account</span> -->
                <input type="sdt" name="sdt" placeholder="Số điện thoại" />
                <input type="password" name="mk" placeholder="Mật Khẩu" />
                <a href="#">Quên mật khẩu</a>
                <button type="submit" >Đăng Nhập</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>Hãy tạo tài khoản của bạn</p>
                    <button class="ghost" id="signIn">Đăng Nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Hãy đăng nhập để sử dụng</p>
                    <button class="ghost" id="signUp">Đăng Ký</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
    
        <!-- <p>
            Created with <i class="fa fa-heart"></i> by
            <a target="_blank" href="https://florin-pop.com">Florin Pop</a>
            - Read how I created this and how you can join the challenge
            <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
        </p> -->
    </footer>
    <script src="js/login.js"></script>
</body>

</html>