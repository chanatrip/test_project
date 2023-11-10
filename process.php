<?php
include 'connect_db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataType = $_POST['dataType'];
    // echo  $dataType;
    // ตัวอย่างการเปลี่ยน SQL query ตามตัวเลือก
    $stmt = $conn->prepare("SELECT * FROM tbl_product WHERE name_product = :dataType");
    $stmt->bindParam(':dataType', $dataType);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // ทำสิ่งที่คุณต้องการกับข้อมูลที่ดึงมา
        echo "<p>{$row['name_product']}</p>";
    }
}
?>
