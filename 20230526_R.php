<?php

header("Access-Control-Allow-Origin: *");

header("Content-Type:text/html; charset=utf-8");

$servername = "localhost";
$username = "testuser";
$password = "123456";
$dbname = "test_202305";

// 創立連線
$conn = mysqli_connect($servername, $username, $password, $dbname);

// 測試連線
if (!$conn) {
    die("連線失敗: " . mysqli_connect_error());
}

// echo "連線成功";

$sql = "SELECT ID, Pname, Price, Pnum, Premark, Created_at FROM test_202305";

$result = mysqli_query($conn, $sql);

//宣告陣列
$data = Array();

while($row = mysqli_fetch_assoc($result)){
    // echo $row["ID"]."<br>";
    // echo $row["Pname"]."<br>";
    // echo $row["Price"]."<br>";
    // echo $row["Pnum"]."<br>";
    // echo $row["Premark"]."<br>";
    // echo $row["Created_at"]."<br>";

    //宣告二維陣列
    $data[] = $row;
}

//宣告json
echo json_encode($data);

//關閉資料庫
mysqli_close($conn);

?>