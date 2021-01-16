<style>
    table {
        width: 50rem;

        margin: auto;
        border: 3px solid var(--themeDarkest);
    }

    th,
    td {
        border: 3px solid var(--themeDarkest);
        padding: 10px 0 10px 10px;
        text-align: center;
    }

    .title-row {
        background-color: var(--peach);
    }

    .btn {
        background: var(--theme);
    }

    .del-btn {
        margin-left: 1rem;
    }

    .add-img-btn {
        margin-left: 66.5rem;
        margin-bottom: -4rem;
    }
</style>
<button type="button" class="btn add-img-btn" data-bs-toggle="modal" data-bs-target="#add-img">
    +新增大頭照
</button>
<div class="modal fade" id="add-img" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>新增大頭照</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="api/add_img.php" method="post" enctype="multipart/form-data">
                <div class="modal-body d-flex flex-column justify-content-between">
                    <p>照片名稱: </p>
                    <input type="text" name="name" id="name">
                    <p class="mt-1">請上傳圖片: </p>
                    <input type="file" name="img" id="img">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cancel-btn" data-bs-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary save-btn" name="save-it" value="儲存">儲存</button>
                </div>
            </form>
        </div>
    </div>
</div>
<table class="mt-5">
    <tbody>
        <tr class="title-row">
            <th scope="col">縮圖</th>
            <th scope="col">版本名稱</th>
            <th scope="col">顯示</th>
            <th scope="col">編輯/刪除</th>
        </tr>
        <?php
        $Img = new DB('img');
        $rows = $Img->all();
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><img src="uploads\<?=$row['img']?>" style="width:100px; height:100px" ></td>
                <td><?=$row['name']?></td>

                <td><?=(($row['sh'])==1)?'顯示':'不顯示'?></td>
                <td><button type="button" class="btn edit-img-btn" data-bs-toggle="modal"
                            data-bs-target="#edit-img-<?=$row['id']?>">編輯</button>
                        <!-- Modal -->
                        <div class="modal fade" id="edit-img-<?=$row['id']?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>修改自傳</b></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="api\edit_img.php" method="post">
                                    
                                        <div class="modal-body d-flex flex-column justify-content-between">
                                            <p>版本名稱: </p>
                                            <input type="text" name="name" id="name" value=<?= $row['name'] ?> <p>是否顯示:
                                            </p>
                                            <input type="checkbox" name="sh" id="sh" value=<?=$row['id']?> <?=($row['sh']==1)?'checked':''?> >
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary cancel-btn"
                                                data-bs-dismiss="modal">取消</button>
                                                 <input type="hidden" name="id" value=<?=$row['id']?>>

                                            <button type="submit" class="btn btn-primary edit-btn">儲存</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <button class="btn del-btn" name="del" value="<?= $row['id']; ?>">刪除</button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>