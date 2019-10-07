<?php 
include_once("header.php")
?>
<?php 
include_once("nav.php")
?>
<?php 
$maSinhVien = $Ho = $Ten = $ngaySinh = $email ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maSinhVien = $_REQUEST["txtMaSinhVien"];
    $Ho = $_REQUEST["txtHo"];
    $Ten = $_REQUEST["txtTen"];
    $ngaySinh = $_REQUEST["txtNgaySinh"];
    $email = $_REQUEST["txtEmail"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Bạn đã nhập email định dạng";
    } else 
    echo "Bạn đã nhập email không đúng định dạng";
    //var_dump($_FILES); 
    if ($_FILES["fileAnhDaiDien"]["name"] != "")
    move_uploaded_file($_FILES["fileAnhDaiDien"]["tmp_name"],"uploads/avatar.jpg");
}
//var_dump($_SERVER); //chứa thông tin đến server

?>
<form method="post" enctype="multipart/form-data"> 
    <div>
        <div>
            <label>Mã sinh viên</label>
        </div>
        <div>
            <input required type="text" name="txtMaSinhVien" value="<?php echo $maSinhVien;?>">
        </div>
        <div>
            <label>Họ</label>
        </div>
        <div>
            <input required type="text" name="txtHo" value="<?php echo $Ho;?>">
        </div>
        <div>
            <label>Tên</label>
        </div>
        <div>
            <input required type="text" name="txtTen" value="<?php echo $Ten;?>">
        </div>
        <div>
            <label>Ngày sinh</label>
        </div>
        <div>
            <input required type="date" name="txtNgaySinh" value="<?php echo $ngaySinh;?>">
        </div>
        <div>
            <label>Email</label>
        </div>
        <div>
            <input required type="email" name="txtEmail" value="<?php echo $email;?>">
        </div>
        <div>
            <label>Ảnh đại diện</label>
        </div>
        <div>
            <input type="file" name="fileAnhDaiDien" value="">
        </div>

        <div>
          
        </div>
        <div>
            <input type="submit" name="txtSave" value="Lưu">
        </div>
    </div>
</form>
<?php 
include_once("footer.php")
?>