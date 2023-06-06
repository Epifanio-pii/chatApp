<?php   
    include_once "config.php";
     while($row = mysqli_fetch_assoc($sql)){

            $sql2= "SELECT * FROM tbl_mensagem WHERE (incoming_msg_id = {$row['unique_id']} 
                    OR outgoing_msg_id =  {$row['unique_id']}) AND (outgoing_msg_id =  {$outgoing_id}
                    OR outgoing_msg_id =  {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
            
            $query2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($query2);

            if(mysqli_num_rows($query2) > 0){
                $result = $row2['msg'];
            }else{
                $result = "Sem mensagem";
            }

            
            (strlen($result) > 28) ? $msg = substr($result, 0, 25).'...' : $msg = $result;

            ($row['status'] == "Offline") ? $offline = "offline" : $offline = "";

            $output .= '<a href="../html/chat.php?user_id=' . $row['unique_id'] . ' ">       
                        <div class="content">
                        <div class="circle"  style="text-align: center;margin-right:10px; "><p id ="letter" style="margin-top: 7px; font-size:25px; font-weight:700;">
                        ' . substr($row['nome'],0,1) .'  
                       </p>
                       </div>
                        <div class="details" style="width:80%;">
                            <span>'. $row['nome'] . " " . $row['sobrenome']. '</span>
                            <p>'. $msg .'</p>
                        </div>
                        </div>
                        <div class="status-dot '.$offline.' "><i class="fas fa-circle"></i></div>
                        </a>';
        }
?>