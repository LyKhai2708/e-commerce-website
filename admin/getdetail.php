<?php
    include '../DAO/connectdb.php';
    include '../DAO/order.php';
    include '../DAO/product.php';
    if(isset($_GET['id'])){
        $od_detail = get_all_order_product($_GET['id']);
        foreach($od_detail as $pd){
        $product = get_product_fromid($pd['proid']);
?>
    <div class="card-product">
        <div class="product_info">
            <div class="product_img"><img src="../upload/<?= $product['avt']  ?>"></div>
            <div class="product_name"><?= $product['product_name']  ?></div>
        </div>
        <div class="product_cost">
            <div class="quantity"><p>Số lượng: <?= $pd['pd_quantity'] ?></p></div>
            <div class="cost"><p>Tổng tiền: <?= format_money($pd['total_price'])  ?></p></div>
        </div>
    </div>
<?php
        }
    }

?>