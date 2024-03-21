<?php
require_once(header);
?>
<div class="card card-preview">
    <div class="card-inner">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">پایه</th>
                    <th scope="col">موضوع</th>
                    <th scope="col">لینک ورود</th>
                    <th scope="col">ورود به چت روم</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($chat_rooms as $key){
                    echo '<tr>
                    <th scope="row">'.$key["name"].'</th>
                    <td>'.$key["subject"].'</td>
                    <td><a href="'.url."start_chat/"."seven" .'">'.url."start_chat/"."seven" .'</a></td>
                    <td><a href="'.url."start_chat/"."seven" .'" class="btn btn-primary"><span>شروع چت</span></a></td>
                    
                </tr>';
                }
                
                
               
               ?>
            </tbody>
        </table>
    </div>
</div>
    

<?php

require_once(footer);