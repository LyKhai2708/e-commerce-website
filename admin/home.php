        
            <div class="admin-content">
                <div class="content-header">
                    <span>TRANG CHỦ</span>
                </div>

                <div class="content-main--home">
                    <div class="row">
                        <div class="card">
                            <div class="card--info">
                                <h4><?= $numuser ?></h4>
                                <h3>USER</h3>
                            </div>

                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="card">
                            <div class="card--info">
                                <h4><?= $numord ?></h4>
                                <h3>Đơn Hàng</h3>
                            </div>
                            <i class="fa-regular fa-clipboard"></i>
                        </div>
                        <div class="card">
                            <div class="card--info">
                                <h4><?= $numpro ?></h4>
                                <h3>Sản Phẩm</h3>
                            </div>
                            <i class="fa-solid fa-laptop"></i>
                        </div>
                        <div class="card">
                            <div class="card--info">
                                <?php $avenue = avenue_month();
                                    $total = 0;
                                    foreach ($avenue as $a){
                                        $total += $a['total_price']; 
                                    }
                                 ?>
                                <h4><?= format_money($total)?></h4>
                                <h3>Doanh Thu Tháng</h3>
                            </div>
                            <i class='bx bx-bar-chart-alt-2'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        