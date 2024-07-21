<ul class="menu__category">

    <?php
    while ($Categories = mysqli_fetch_array($data['Categories'])) {
    ?>
        <div class="menu__category_POST" id="<?php echo $Categories['categoryName']; ?>">
            <li>
                <a href="/php_mvc/Home/Category/<?php echo $Categories["Id"] ?>">
                    <div class="icon_Categories">
                        <img class="icon_Categorie" src="/php_mvc/public/Assets/img/imgCategories/<?php echo $Categories['icon']; ?>"></img>
                    </div>
                    <div class="content_Categories">
                        <p>
                            <?php echo $Categories["categoryName"]; ?>
                        </p>
                    </div>
                </a>
            </li>
        </div>
    <?php } ?>
</ul>