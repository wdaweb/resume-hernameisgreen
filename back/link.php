<style>
    table {
        width: 40rem;

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
        border: 1px transparent solid;
        color: var(--dark);
    }

    .del-btn {
        margin-left: 1rem;
        background: var(--darkPeach);
    }

    .add-bio-btn {

        background: var(--themeDarker);


    }

    .button-box {
        margin-left: 47.9rem;
        margin-bottom: -2rem;
        margin-top: 4rem;
    }

    .save-btn:hover {
        background: var(--themeDarkest);
        border: 1px transparent solid;
    }

    #bio,
    #name {
        border: 3px solid var(--themeDarkest);
    }

    #name {
        width: 98%;
    }

    .col-1 {
        width: 30%;
    }

    .col-2 {
        width: 30%;
    }
</style>

<div class="container">
    <div class="button-box">
        <button type="button" class="btn add-link-btn" data-bs-toggle="modal" data-bs-target="#add-link">
            +新增連結
        </button>
        <div class="modal fade" id="add-link" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>新增連結</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="api/add_link.php" method="post">
                        <div class="modal-body d-flex flex-column justify-content-between">
                            <p>連結名稱: </p>
                            <input type="text" name="name" id="name">
                            <p class="mt-1">請輸入連結: </p>
                            <input type="text" name="link" id="link">
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
                <th scope="col" class="col-1">連結名稱</th>
                <th scope="col" class="col-2">連結</th>
                <th scope="col" class="col-4">編輯/刪除</th>
            </tr>
            <?php
            $Links = new DB('links');
            $rows = $Links->all();

            foreach ($rows as $row) {

            ?>

                <tr>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['link']; ?></td>

                    <td><button type="button" class="btn edit-bio-btn" data-bs-toggle="modal" data-bs-target="#edit-link-<?= $row['id'] ?>">編輯</button>
                        <!-- Modal -->
                        <div class="modal fade" id="edit-link-<?= $row['id'] ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>修改連結</b></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="api/edit_link.php" method="post">

                                        <div class="modal-body d-flex flex-column justify-content-between">
                                            <p>連結名稱: </p>
                                            <input type="text" name="name" id="name" value=<?= $row['name'] ?> <p class="mt-1">請輸入自傳內容: </p>
                                            <input type="text" name="link" id="link" value=<?= $row['link'] ?>>
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
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>

</div>