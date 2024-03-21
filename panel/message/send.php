<br>
<span style="text-align : center;color:white">لطفا کاربری را انخاب کنید</span>
<table class="table table-dark table-hover"  >
<thead>
  <tr>
    <th scope="col">نام کاربری</th>
    <th scope="col">ایمیل</th>
    <th scope="col">سطح دسترسی</th>
  </tr>
</thead>
<tbody>
  <?php
  
// اتصال به پایگاه داده
$servername = server;
$username = username;
$password = password;
$dbname = db;

$conn = new mysqli($servername, $username, $password, $dbname);

// چک کردن اتصال
if ($conn->connect_error) {
  die("اتصال به پایگاه داده انجام نشد: " . $conn->connect_error);
}

// استفاده از SQL برای دریافت اطلاعات کاربران
$sql = "SELECT id, username, password, email, tel, access FROM users_db ORDER BY 'id' ASC";
$result = $conn->query($sql);
$user_count =  0;
if ($result->num_rows > 0) {
  // خروجی داده‌ها در جدول HTML
  
  while ($row = $result->fetch_assoc()) {
      $user_count++;
      $you = null;
      if(  $_SESSION['username']===$row["username"]){
          $you = "(شما)";
      }
      echo "<tr onclick ='user_send(".'"'.$row['username'].'"'.")' ><td>" . $row["username"]  .$you. "</td><td>" . $row["email"] . "</td><td>".print_access($row["access"])."</td></tr>";
  }
} else {
  echo "هیچ کاربری یافت نشد.";
}

// قطع اتصال به پایگاه داده
$conn->close();
?>

</tbody>
</table>

