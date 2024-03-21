
<br>
<span style="text-align:center;color:white">برای مشاهده پیام روی آن کلیک نمایید</span>
<table class="table table-dark table-hover">
<thead>
  <tr>
    <th>id</th>
    <th scope="col">از</th>
    <th scope="col">به</th>
    <th scope="col">موضوع</th>
  </tr>
</thead>
<tbody>
  <?php
  require_once(dirname(__DIR__)."/config/config.php");
  require_once(dirname(__DIR__)."/config/db_config.php");
  require_once(login_check_dir);
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

  // استفاده از Prepared Statements برای جلوگیری از تزریق SQL
  $sql = "SELECT * FROM message_db WHERE `receiver` = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $_SESSION["username"]);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // خروجی داده‌ها در جدول HTML
    while ($row = $result->fetch_assoc()) {
      echo "<tr onclick='readMessage(" . $row['id'] . ")'><td>" . $row["id"] . "</td><td>" . $row["sender"] . "</td><td>" . $row["receiver"] . "</td><td>".$row["subject"]."</td></tr>";
    }
  } else {
    echo "<br><span style='color:white'>هیچ پیامی یافت نشد</span>";
  }

  // بستن اتصال به پایگاه داده
  $stmt->close();
  $conn->close();
  ?>
</tbody>
</table>
