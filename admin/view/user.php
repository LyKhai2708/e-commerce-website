<?php
    $html_user="";
    foreach($user as $u){
        $gender = "";
        $date = "";
        if(!$u['gender']){
            $gender = "Chưa Thiết Lập";
        }else{
            $gender = $u['gender'];
        }
        if(!$u['birth']){
            $date = "Chưa Thiết Lập";
        }else{
            $date = $u['birth'];
        }
        $html_user .= "<tr>
        <td>".$u['id']."</td>
        <td>".$u['user_name']."</td>
        <td>".$u['email']."</td>
        <td>".$u['phone']."</td>
        <td>".$gender."</td>
        <td>".$date."</td>
        </tr>";
    }
?>

<div class="admin-content">
                <div class="content-header">
                    <span>Tài Khoản Khách</span>
                </div>

                <div class="content-main--category" style="overflow-x:auto ;">
                        <table class="table" cellpadding="3" cellspacing="0">
                            <thead>
                                <th>ID</th>
                                <th>Tên Khách Hàng</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Giới tính</th>
                                <th>Ngày Sinh</th>
                            </thead>
                            <tbody>
                                <?= $html_user ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>