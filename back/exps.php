<style>
    table {
        /* width: 70rem;
 */
        margin: 0 auto 2rem auto;
        border: 3px solid var(--themeDarkest);
        table-layout: auto;
        width: 100%;
        text-align:center;

    }

    th,
    td {
        border: 3px solid var(--themeDarkest);

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

    .add-edu-btn {

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

    .col-1, .col-2, .col-3, .col-4, .col-5 {
        width: 10%;
    }

    table ul{
        text-align:left;
    }
    .col-6{
        width:30%;
    }

</style>

<div class="container">

    <div class="button-box">
        <button type="button" class="btn add-skill-btn" data-bs-toggle="modal" data-bs-target="#add-skill">
            +新增工作經驗
        </button>
        <div class="modal fade" id="add-skill" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>新增工作經驗</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="api/add_exps.php" method="post">
                        <div class="modal-body d-flex flex-column justify-content-between">

                            <p>公司名稱: </p>
                            <input type="text" name="name" id="name">
                            <p>職稱: </p>
                            <input type="text" name="title">
                            <p>開始日期: </p>
                            <input type="date" name="start">
                            <p>結束日期: </p>
                            <input type="date" name="end">
                            <p>是否顯示:</p>
                            <input type="checkbox" name="sh" value="1">
                            <p>敘述: </p>
                            <input type="text" name="list[]" class="list">
                            <button type="button" class="addList">+</button>
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
                <th scope="col" class="col-1">公司名稱</th>
                <th scope="col" class="col-2">職稱</th>
                <th scope="col" class="col-3">開始</th>
                <th scope="col" class="col-4">結束</th>
                <th scope="col" class="col-5">顯示狀態</th>
                <th scope="col" class="col-6">敘述</th>
                <th scope="col" class="col-7">編輯</th>
            </tr>
            <?php
            $Exps = new DB('exps');
            $exps = $Exps->all();
            foreach ($exps as $exp) {

            ?>
                <tr>
                    <td><?= $exp['name'] ?></td>
                    <td><?= $exp['title'] ?></td>
                    <td><?= $exp['start'] ?></td>
                    <td><?= $exp['end'] ?></td>
                    <td><?= ($exp['sh'] == 1) ? '顯示' : '不顯示'; ?></td>
                    <td>
                        <ul>
                            <?php

                            $aa = unserialize($exp['list']);
                            foreach ($aa as $a) {
                                echo "<li>".$a."</li>";
                            }

                            ?>
                        </ul>
                    </td>


                    <td>
                        <button type="button" class="btn edit-edu-btn" data-bs-toggle="modal" data-bs-target="#edit-edu">編輯</button>
                        <!-- Modal -->
                        <div class="modal fade" id="edit-edu" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>修改技能</b></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="api/edit_exps.php" method="post">
                                        <div class="modal-body d-flex flex-column justify-content-between">

                                            <p>學校名稱: </p>
                                            <input type="text" name="name" value=<?= $exp['name'] ?>>
                                            <p>職稱: </p>
                                            <input type="text" name="title" value=<?= $exp['title'] ?>>
                                            <p>開始日期: </p>
                                            <input type="date" name="start" value=<?= $exp['start'] ?>>
                                            <p>結束日期: </p>
                                            <input type="date" name="end" value=<?= $exp['end'] ?>>
                                            <p>是否顯示:</p>
                                            <input type="checkbox" name="sh" value=<?= $exp['id'] ?> <?= ($exp['sh'] == 1) ? 'checked' : '' ?>>

                                            <p>敘述: </p>
                                            <?php
                                            $rows = unserialize($exp['list']);
                                            foreach ($rows as $row) {

                                                echo "<input type='text' name='list[]'  value=" . $row . ">";
                                            }
                                            ?>
                                            <button type="button" class="addList" class="list">+</button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary cancel-btn" data-bs-dismiss="modal">取消</button>
                                            <input type="hidden" name="id" value=<?= $exp['id'] ?>>

                                            <button type="submit" class="btn btn-primary edit-btn">儲存</button>
                                            <button class="btn del-btn" name="del" value="<?= $row['id']; ?>">刪除</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>

</div>
<script>
    $('.addList').click(function() {
        console.log('you clicked it!');
        $(this).before('<input type="text" name="list[]" class="list">');
    });
</script>