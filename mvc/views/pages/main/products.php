
<div class="grid wide row">
    <div class="category l-3">
        <?php include ('./mvc/views/pages/blocks/sidebar.php') ?>
    </div>
    <div class="products l-9">

        <?php
            while($p = mysqli_fetch_array($data['Product'])){
        ?>
                
            <div class="product l-3">
                <a href="../product/Detail/<?php echo $p['id']?>" class="product-link text-decoration">
                    <?php echo '<img src='.$p['img'].' alt="" class="product-img">';?>
                    <p class="product-title"><?php echo $p["name"] ?></p>
                    <p class="product-price"><?php echo number_format($p["price"],0,',','.').'₫'  ?></p>
                </a>
            </div>
                    
        <?php
            }
        ?>
        

        <a href="detail.php?id=<?php echo $row['ID_product']?>">
    </div>
        