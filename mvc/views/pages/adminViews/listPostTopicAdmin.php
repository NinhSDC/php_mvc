<h1 style="padding: 10px;">Danh sách Các Đề Tài</h1>
<div class="middle_option_bar">
    <form action="" method="POST" class="middle_option_block">
        <div class="middle_option_block-item">
            <span><i class="fa-sharp fa-solid fa-magnifying-glass"></i></span>
            <input name="search" id="search" type="text" placeholder="Tìm kiếm.." />
        </div>
    </form>

</div>
<div class="table_content" style = "max-height :59%">

    <table class="table-2_col">
        <thead>
            <tr>
                <th>Hình Ảnh</th>
                <th>Tên Đề Tài</th>
                <th>Mô Tả</th>
                <th>Lớp Học</th>
                <th>Loại Đề Tài</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php

            while ($listPostTopicAdmin = mysqli_fetch_array($data['listPostTopic'])) {
                
            ?>
                <tr>
                    <td>
                        <img src="<?= $listPostTopicAdmin['topic_img'] ?>" alt="">
                    </td>
                    <td><?= $listPostTopicAdmin['topic_name'] ?></td>
                    <th><?= $listPostTopicAdmin['topic_description'] ?></th>
                    <th><?= $listPostTopicAdmin['faculty_name'] ?></th>
                    <th><?= $listPostTopicAdmin['topic_sort'] ?></th>
                    <th>
                        <a href="/quanly_lv_tl/admin/infPostTopicAdmin/<?=$listPostTopicAdmin['topic_id']?>">
                            <i class="fa fa-info-circle icons" aria-hidden="true"></i>
                        </a>
                    </th>
                   
                </tr>
            <?php
            }

            ?>

        </tbody>
    </table>
</div>

<script>

</script>