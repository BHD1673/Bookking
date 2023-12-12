<?php
function pdo_get_connection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        // đặt lỗi PDO
        $conn = new PDO("mysql:host=$servername;dbname=aaa", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
// xử lý câu truy vấn (write)

// phần này là xử lý câu đơn giản
function pdo_execute($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);

    }
    catch(PDOException $e){
        throw $e;
    } 
    finally{
        unset($conn);
    }
}

// xử lý transaction đặc biệt.
function pdo_begin_transaction() {
    $conn = pdo_get_connection();
    $conn->beginTransaction();
    return $conn;
}

function pdo_commit($conn) {
    $conn->commit();
}

function pdo_rollback($conn) {
    $conn->rollBack();
}
// truy vấn nhiều dữ liệu
function pdo_query($sql){
    $sql_args=array_slice(func_get_args(),1);

    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows=$stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
// truy vấn  1 dữ liệu
function pdo_query_one($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        // đọc và hiển thị giá trị trong danh sách trả về
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
pdo_get_connection();



?>