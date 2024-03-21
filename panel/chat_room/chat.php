<?php
$conn = new mysqli(server,username,password,db);
$sql = "SELECT * FROM `profile_db` WHERE `username`='".$_SESSION["username"]."'";
$res = $conn -> query($sql);
$p_row = $res->fetch_assoc();
require_once(header);
?>
<div class="container">
        <div class="row">
            <ul class="msg-list">
            </ul>
        </div>
        <form method="post" id="chatForm">
            <div class="form-group">
                <label for="message"></label>
                <input type="text" name="message" id="message" class="form-control" />
            </div>
            <div>
                <input type="submit" id="subBtn" class="btn btn-info" value="send">
            </div>
        </form>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script> 
    let name = "<?php echo $p_row["display_name"] ?>" 
    let username = "<?php echo $_SESSION["username"] ?>"
    $(document).ready(function() {
        var conn = new WebSocket('ws://localhost:8080');
        var chatForm = $('#chatForm');
        var userMessage = $("#message");
        var msgList = $('.msg-list');
        chatForm.on('submit', function(e){
            e.preventDefault();
            var message = userMessage.val();

            conn.send(JSON.stringify(
                {
                username : username , 
                msg : message,
                display_name : name,
            }
            ));
            msgList.prepend("<li style='color:blue;'>" + name + ":" + message +"</li>");
        });
        conn.onopen = function(e) {
            console.log("Connection stablished");
        }
        conn.onmessage = function(e) {
            console.log(e.data);
            msgList.prepend("<li style='color:red;'>" + "از طرف : " +JSON.parse(e.data)["name"] + "    متن : " +JSON.parse(e.data)["msg"]+ "</li>");
        }        
    });
    
    </script>
<?php
require_once(footer);
$conn -> close();