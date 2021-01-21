<style>
    table {
        width: 50rem;
        overflow-y:auto;
        margin: auto;
        border: 3px solid var(--themeDarkest);
        
    }

    th,
    td {
        border: 3px solid var(--themeDarkest);
        padding: 10px 0 10px 10px;
    }

    .title-row {
        background-color: var(--peach);
    }

    .btn {
        background: var(--theme);
    }

    .del-btn {
        margin-left: 1rem;
        background:var(--darkPeach);
    }

    .add-title-btn {
        margin-left: 66.5rem;
        margin-bottom: -4rem;
    }
    .cushion{
        height:5rem;
        width:100%;
    }
</style>
<button type="button" class="btn add-title-btn" data-bs-toggle="modal" data-bs-target="#add-title">
    +新增標題
</button>
<div class="modal fade" id="add-title" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>新增標題</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="api/add_title.php" method="post">
                <div class="modal-body d-flex flex-column justify-content-between">
                    <p>標題內容: </p>
                    <input type="text" name="title" id="title">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cancel-btn" data-bs-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary save-btn" name="save-it" value="儲存">儲存</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

<table class="mt-5">
    <tbody>
        <tr class="title-row">
            <th scope="col">標題</th>
            <th scope="col">顯示</th>
            <th scope="col">編輯</th>
        </tr>
        <?php
        $Title = new DB('title');
        $rows = $Title->all();
        foreach ($rows as $row) {

        ?>
            <tr>
                <td><?= $row['title'] ?></td>

                <td><?= ($row['sh'] == 1) ? '顯示' : '不顯示' ?></td>
                <td> <button type="button" class="btn edit-title-btn" data-bs-toggle="modal" data-bs-target="#edit-title-<?= $row['id'] ?>">編輯</button>
                    <!-- Modal -->
                    <div class="modal fade" id="edit-title-<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><b>修改標題</b></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="api/edit_title.php" method="post">

                                    <div class="modal-body d-flex flex-column justify-content-between">
                                        <p>標題內容: </p>
                                        <input type="text" name="title" id="title" value="<?= $row['title'] ?>">
                                        <p>是否顯示:
                                        </p>
                                        <input type="checkbox" name="sh" id="sh" value=<?= $row['id'] ?> <?= ($row['sh'] == 1) ? 'checked' : '' ?>>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary cancel-btn" data-bs-dismiss="modal">取消</button>
                                        <input type="hidden" name="id" value=<?= $row['id'] ?>>

                                        <button type="submit" class="btn btn-primary edit-btn">儲存</button>
                    <button class="btn del-btn" name="del" value="<?= $row['id']; ?>">刪除</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </td>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<div class="cushion"></div>