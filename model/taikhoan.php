<?php

function taoTaiKhoanKhongDangKy($name, $email, $phone, $address, $date_of_birth, $image_path) {
    $sql = "INSERT INTO khachhang(Ten";
}

function insert_taikhoan($email, $user, $password)
{
    $sql = "insert into khachhang(Email,TenDangNhap,MatKhau) values('$email','$user','$password')";
    pdo_execute($sql);
}
function checkuser($user,$password) {
    $sql="select * from khachhang where TenDangNhap='".$user."' AND  MatKhau='".$password."'";
    $sp=pdo_query_one($sql);
    return $sp;
}
function checkemail($email)
{
    $sql = "select * from khachhang where Email='" . $email . "'";
    $kq = pdo_query_one($sql);
    return $kq;
}
function checkpass($password)
{
    $sql = "select * from khachhang where MatKhau='" . $password . "'";
    $kq = pdo_query_one($sql);
    return $kq;
}
function dangxuat()
{
    if (isset($_SESSION['Email'])) {
        unset($_SESSION['Email']);
    }
}
function getUserByUsernameAndEmail($user, $email)
{
    $sql = "select * from khachhang where TenKhachHang='" . $user . "' and Email='" . $email . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function update_taikhoan($user, $email, $address, $id, $tel, $date)
{
    $sql = "UPDATE khachhang SET TenKhachHang='$user', Email='$email', NgaySinh='$date', SoDienThoai='$tel', DiaChiNha='$address' WHERE ID=$id";
    pdo_execute($sql);
}
?>

