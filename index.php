<?php
include('connect.php');
include('insertdata.php');
if (session_id() === '')
    session_start();
// $user = $_SESSION['user'];

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    $user = [];
}

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chống dịch bệnh</title>
    <meta name="description" content="">
    <meta name="author" content="Cemre Tellioğlu Tunçay">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="css/responsive.css" rel="stylesheet">
    <script src="js/html5-qrcode.min.js"></script>
</head>

<body>
    <!-- header -->
    <div class="col-md-12 noPadding fixedArea">
        <div class="container topOff">
            <div class="col-lg-2 col-md-2 col-xs-4 col-sm-2">
                <img alt="Bootstrap Image Preview" src="img/kloof.jpg">
            </div>
            <div class="col-lg-8 col-md-8 col-xs-8 col-sm-10">
                <nav class="navbar navbar-expand-lg navbar-light bg-light myNavbar">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav myNavUl">

                                <li class="nav-item active"><a href="#section1" class="nav-link text-uppercase font-weight-bold js-scroll-trigger">Quét QR</a></li>
                                <li class="nav-item"><a href="#section2" class="nav-link text-uppercase font-weight-bold js-scroll-trigger">Lịch sử quét mã</a></li>
                                <li class="nav-item"><a href="#section3" class="nav-link text-uppercase font-weight-bold js-scroll-trigger">Đăng ký địa điểm</a></li>
                                <?php if (isset($user['ten'])) {
                                    echo "<li class=\"nav-item\"><a href=\"logout.php\" class=\"nav-link text-uppercase font-weight-bold js-scroll-trigger\" style=\"border: 2px solid black; border-radius:10px; padding:6px 15px\">Đăng Xuất</a></li>";
                                } else {
                                    echo "<li class=\"nav-item\"><a href=\"login.php\" class=\"nav-link text-uppercase font-weight-bold js-scroll-trigger\" style=\"border: 2px solid black; border-radius:10px; padding:6px 15px\">Đăng Nhập</a></li>";
                                } ?>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>


            </div>
            <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12 marginTop ">
                <ul class="list-inline centerMobil">
                    <li><a href="#"><img src="img/face.png"></a></li>
                    <li><a href="#"><img src="img/twit.png"></a></li>
                    <li><a href="#"><img src="img/google-plus.png"></a></li>

                </ul>
                <?php if (isset($user['ten'])) echo "<p>Tài khoản:" . $user['ten'] . "</p>"; ?>
            </div>
        </div>
    </div>
    <!-- end header -->
    
    <div id="section2" class="Material-contact-section section-dark">
        <h3 class="mainText1">Lịch sử </h3>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <span class="box-tieude">Lịch sử quét mã </span>
                    <form class="form-chinh" action="#" method="post" name="abc">
                        <select name="chon" class="theselect1" id="">
                            <option value="tatca">Tất cả</option>
                            <option value="humnay">Hôm nay</option>
                            <option value="humqua">Hôm qua</option>
                            <option value="tuantruoc">Tuần trước</option>
                            <option value="thangtruoc">Tháng trước</option>
                        </select>
                        <input class="inputsubmit1" type="submit" name="submit" value="Xác nhận" />
                    </form>

                    <p class="text-muted">
                        <!-- Add class <code>.table</code> -->
                    </p>
                    <div class="table-test">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">CMND/CCCD</th>
                                    <th class="border-top-0">Họ Tên</th>
                                    <th class="border-top-0">Trạng Thái</th>
                                    <th class="border-top-0">Ngày sinh</th>
                                    <th class="border-top-0">Số điện thoại</th>
                                    <th class="border-top-0">Ngày tiếp xúc</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($user['ten'])) {
                                    $ten1 = $user['ten'];
                                } else {
                                    $ten1 = "";
                                }

                                $sql = "SELECT Cmnnd_Cccd,Hoten,TrangThai,Ngaysinh,Sdt,Thoigian FROM `doituong` WHERE  tentk='$ten1'";
                                if (isset($_POST['submit'])) {
                                    $selected_val = $_POST['chon'];  // Lưu trữ giá trị được chọn trong biến
                                    // echo "Bạn đã chọn :" . $selected_val;  // Hiển thị giá trị đã chọn
                                    if ($selected_val == "humnay") {
                                        $sql = "SELECT * FROM `doituong` WHERE  DATE(Thoigian)=DATE(now())  AND tentk='$ten1'";
                                    } else
                                    if ($selected_val == "humqua") {
                                        $sql = "SELECT * FROM `doituong` WHERE DATE(Thoigian)>subdate(current_date, 2) AND DATE(Thoigian)<DATE(now()) AND tentk='$ten1'";
                                    } else
                                    if ($selected_val == "tatca") {
                                        $sql = "SELECT * FROM `doituong` WHERE tentk='$ten1'";
                                    } else
                                    if ($selected_val == "tuantruoc") {
                                        $sql = "SELECT * FROM `doituong` WHERE  WEEK(DATE(Thoigian))=WEEK(DATE(now()))-1 AND tentk='$ten1'";
                                    } else {
                                        $sql = "SELECT * FROM `doituong` WHERE MONTH(DATE(Thoigian))=MONTH(DATE(now()))-1 AND tentk='$ten1'";
                                    }
                                }

                                $result = $connect->query($sql);
                                $i = 0;
                                if ($result->num_rows > 0) {

                                    // Load dữ liệu lên website
                                    while ($row = $result->fetch_assoc()) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row["Cmnnd_Cccd"]; ?></td>
                                            <td><?php echo $row["Hoten"]; ?></td>
                                            <td><?php echo $row["TrangThai"]; ?></td>
                                            <td><?php echo $row["Ngaysinh"]; ?></td>
                                            <td><?php echo $row["Sdt"]; ?></td>
                                            <td><?php echo $row["Thoigian"]; ?></td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "0 results";
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="suachu">Số người quét:<span class="chudam"><?php echo " " . $i; ?></span> </div>
                </div>
            </div>
        </div>

    </div>

    <div id="section1" class="Material-contact-section section-dark">

        <div class="trai">
            <h3 class="mainText2">Vui lòng quét mã</h3>
            <div style="width: 600px" id="reader"></div>
        </div>
        <div class="phai">
            <?php if (isset($user['ten'])) {

                $sql = "SELECT tendiadiem FROM `diadiem` WHERE tentk ='$ten1'";
                $result = $connect->query($sql);

                if ($result->num_rows > 0) {

                    // Load dữ liệu lên website
                    while ($row = $result->fetch_assoc()) {
                        echo "<h3 class=\"mainText\">" . $row['tendiadiem'] . "</h3>";
                    }
                } else {
                    echo "<h3 class=\"mainText\">Chưa Đăng Ký Địa Điểm</h3>";
                }
            } else {
                echo "<h3 class=\"mainText\">Chưa Đăng Nhập</h3>";
            }
            ?>
            <!-- <h3 class="mainText">Trường ĐH Sư Phạm Kỹ Thuật</h3> -->
            <img src="img/shapegreen.png">
            <form action="#" method="post">
                <div id="result"><input class="result" type="text" placeholder="Kết quả"></div>
            </form>

        </div>

    </div>


    <div id="section3" class="Material-contact-section section-dark">

        <div class="custumform">
            <h3 class="mainText1">Đăng ký địa điểm </h3>
            <div class="form-dki">
                <div class="title-wrap"></div>
                <div class="title-wrap-in">
                <form action="" method="post" >
                    <input class="thenhap" type="text" name="tendiadiem" placeholder="Tên địa điểm">
                    <input class="thenhap" type="text" placeholder="Số nhà, phố, tổ dân phố/thôn/đội">
                    <select class="theselect" id="city">
                        <option value="" selected>Chọn tỉnh thành</option>
                    </select>

                    <select class="theselect" id="district">
                        <option value="" selected>Chọn quận huyện</option>
                    </select>

                    <select class="theselect" id="ward">
                        <option value="" selected>Chọn phường xã</option>
                    </select>
                    <input class="thenhap" type="text" placeholder="Họ và tên người đăng ký">
                    <input class="inputsubmit" type="submit" value="Xác nhận">
                </form>
                </div>

            </div>
        </div>


    </div>


    <!-- footer  -->
    <div class="col-md-12 noPadding text-center backFooter">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-4 col-xs-12 marginTop">
                    <h3 class="footertext">Đức Lưu Luuvanduc2206@gmail.com </h3>
                </div>

                <div class="col-md-4 col-xs-12 marginTop">
                    <img alt="Bootstrap Image Preview" src="img/kloof.jpg">

                </div>
                <div class="col-md-4 col-xs-12 marginTop ">
                    <ul class="list-inline centerMobil">
                        <li><a href=" #"><img src="img/face.png">
                        <li><a href="#"><img src="img/twit.png"></a></li>
                        <li><a href="#"><img src="img/google-plus.png"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/qr.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>