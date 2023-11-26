<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/assets/css/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>View List Full Contract</title>
</head>

    <style>
          table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
<body> 
    <header>
    <div class="logo">
        <img src="/assets/ima/logo.png" alt="logo" width="300px" height="120px">
        <div class="login">
        <p class="text-bg-warning">
            Đăng xuất
        </p>
        </div>
        <div class="post text-bg-info text-white">
            Trọng Tấn
        </div>

        <div class="post text-bg-success">
            Đăng tin
        </div>
        
    </div>
    <div>
    <ul style="background:rgb(159, 159, 250); color:white; font-weight: bold;">
        <li>Home</li>
        <li>Thị Trường</li>
        <li>Video</li>
        <li>Quy Hoạch</li>
        <li>Vật liệu xây dựng</li>
        <li>Xu Hướng</li>
        <li>Cẩm nang</li>
        <li>Kiến trúc</li>
        <li class="text-success">Hợp đồng</li>
    </ul>
    </div>
    </header>
    <div class="content">
    <div class="ct1" style="display:flex;">
        <p id="1" class="text-primary">CAFE LAND</p><p> > Danh sách hợp đồng > Thêm hợp đồng</p>
    </div>
    <div class="ct2" style="font-weight: bold;"><p>Thêm hợp đồng dự án</p></div>
    <div class="ct3" style="display: flex;"><p style="font-weight: bold;">
        Điền thông tin chi tiết
    </div>
  
    <div class="info">
    <form action="connect.php" method="post">
  <div class="info1 bg-light text-info">
    THÔNG TIN KHÁCH HÀNG
  </div>
      <label for="customerName">Họ và tên:</label> 
      <input type="text" name="customerName" id="customerName"> <br>
    
      <label for="yearOfBirth">Ngày sinh: </label>
      <input type="text" name="yearOfBirth" id="yearOfBirth"> <br>
    
      <label for="ssn">CCCD: </label>
      <input type="text" name="ssn" id="ssn"> <br>
   
      <label for="customerAddress">Địa chỉ: </label>
      <textarea name="customerAddress" id="customerAddress"></textarea> <br>
    
      <label for="sdt">Số điện thoại: </label>
      <input type="text" name="mobile" id="mobile"> <br>
  
  <div class="info2 bg-light text-info">
    CHI TIẾT HỢP ĐỒNG
  </div>

      
      <label for="mbds">Mã bất động sản: </label>
      <?php
        $connectionOptions = array(
          "Database" => "QUANLYBDS_CONQUEROR",
          "Uid" => "sa",
          "PWD" => "123456"
        );
        
        $connection = sqlsrv_connect("DESKTOP-ES22IQC", $connectionOptions);
        
        // Lấy danh sách tất cả các giá trị Property_ID hiện có
        $query = "SELECT ID
        FROM Property";
        
        $result_pro = sqlsrv_query($connection, $query);
        // Tạo một danh sách các giá trị Property_ID
        $propertyID = array();
        while ($row = sqlsrv_fetch_array($result_pro, SQLSRV_FETCH_ASSOC)) {
          $propertyID[] = $row['ID'];
        }
      ?>
      <!-- Đọc mã bất động sản khi bạn muốn thêm hợp đồng cho bất động sản đó. Ví dụ ở dưới là BDS đầu tiên -->
      <input type="text" name="propertyID" id="propertyID" value="<?php echo $propertyID[0]; ?>" readonly> <br>

      <label for="hhd">Hạn hợp đồng: </label>
      <input type="text" name="dateOfContract" id="hhd"> <br>
    
      <label for="price">Giá cả: </label>
      <input type="number" name="price" id="price"> <br>
 
      <label for="invest">Đầu tư: </label>
      <input type="number" name="deposit" id="deposit"> <br>
   
      <label for="remain">Duy trì: </label>
      <input type="number" name="remain" id="remain"> <br>


  <div class="info3 bg-light text-info">
    TRẠNG THÁI
  </div>

 
    <label for="status">Trạng thái: </label>
    <input type="number" name="status" id="status"> <br>
    
    <input type="submit" name="insert" value="Xác nhận hợp đồng"> 
</form>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>