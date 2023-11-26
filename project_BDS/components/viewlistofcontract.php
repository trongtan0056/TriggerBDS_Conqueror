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
    <content>
        <div class="content">
            <div class="ct1" style="display:flex;">
                <p id="1" class="text-primary">CAFE LAND</p><p> > Danh sách hợp đồng > Loại thanh toán 1 lần</p>
            </div>
            <div class="ct2" style="font-weight: bold;"><p>Danh sách hợp đồng nhà đất Việt Nam năm 2023</p></div>
            <div class="ct3" style="display: flex;"><p style="font-weight: bold;">
                Khu vực miền Nam
            </p> <div class="btn4">
                <button>Tìm kiếm hợp đồng</button>
                <button><a href="./addfullcontract.php" style="text-decoration:none; color:white">Thêm hợp đồng</a>
                </button>
                <button>In hợp đồng</button>
                <button>Cập nhật hợp đồng</button></div></div>
          </div>

          <?php
$serverName = "DESKTOP-ES22IQC";
$connectionOptions = array(
    "Database" => "QUANLYBDS_CONQUEROR",
    "Uid" => "sa",
    "PWD" => "123456"
);

// $conn = sqlsrv_connect($serverName, $connectionOptions);

// if ($conn) {
//     echo "Kết nối đến SQL Server thành công!";
//     sqlsrv_close($conn); // Đóng kết nối sau khi kiểm tra
// } else {
//     echo "Lỗi kết nối đến SQL Server: " . sqlsrv_errors();
// }

$conn = sqlsrv_connect($serverName, $connectionOptions);
$query = "SELECT * FROM Full_Contract";
$result = sqlsrv_query($conn, $query);
?>


<table>
    <tr>
        <th>STT</th>
        <th>MÃ HỢP ĐỒNG</th>       
        <th>THÔNG TIN KHÁC HÀNG</th>       
        <th>CHI TIẾT HỢP ĐỒNG</th>
        <th>TRẠNG THÁI</th>    
    </tr>
    <?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['Full_Contract_Code']; ?></td>
            <td><?php echo 'Họ và tên: '.$row['Customer_Name'].
                '<br>Ngày sinh:'.$row['Year_Of_Birth'].
                '<br> CCCD: '.$row['SSN'].               
                '<br> Địa chỉ: '.$row['Customer_Address'].
                '<br> Số địa thoại:'.$row['Mobile']; ?></td>
            <td><?php echo
                'Mã bất động sản: '.$row['Property_ID'].
                '<br> Hạn hợp đồng: '.$row['Date_Of_Contract']->format('Y-m-d').
                '<br> Giá cả: '.$row['Price'].
                '<br> Đầu tư: '.$row['Deposit'].
                '<br> Duy trì: '.$row['Remain']; ?></td>
            <td><?php echo $row['Status']; ?></td>
            <!-- Thêm các cột khác tương ứng -->
        </tr>
    <?php } ?>
</table>
    </content>

    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
        </ul>
        <p class="text-center" style="padding-top:20px;">Công ty bất động sản Cafe Land</p>
        <p class="text-center text-body-secondary">&copy; 2023 Copyright by TeamConqueror, Inc</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>