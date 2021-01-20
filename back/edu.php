<style>
    table {
        /* width: 70rem;
 */
        margin: 0 auto 2rem auto;
        border: 3px solid var(--themeDarkest);
        text-align:center;

    }

    th,
    td {
        border: 3px solid var(--themeDarkest);
        /* padding: 10px 0 10px 10px; */
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
            +新增教育程度
        </button>
        <div class="modal fade" id="add-skill" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>新增教育程度</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="api/add_edu.php" method="post">
                        <div class="modal-body d-flex flex-column justify-content-between">
                            <p>教育程度: </p>
                            <input type="text" name="deg">
                            <p>學校名稱: </p>
                            <input type="text" name="name" id="name">
                            <p>入學年分: </p>
                            <input type="date" name="strt">
                            <p>畢業年分: </p>
                            <input type="date" name="end">
                            <p>是否顯示:</p>
                            <input type="checkbox" name="sh" value="1">
                            <p>敘述: </p>
                            <input type="text" name="content[]">
                            <button type="button" class="addContent">+</button>
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
                <th scope="col" class="col-1">教育程度</th>
                <th scope="col" class="col-2">學校名稱</th>
                <th scope="col" class="col-3">入學年分</th>
                <th scope="col" class="col-4">畢業年分</th>
                <th scope="col" class="col-5">顯示狀態</th>
                <th scope="col" class="col-6">敘述</th>
                <th scope="col" class="col-7">編輯</th>
            </tr>
            <?php
            $Edu = new DB('edu');
            $eduu = $Edu->all();
            foreach ($eduu as $edu) {

            ?>
                <tr>
                    <td><?= $edu['deg'] ?></td>
                    <td><?= $edu['name'] ?></td>
                    <td><?= $edu['strt'] ?></td>
                    <td><?= $edu['end'] ?></td>
                    <td><?= ($edu['sh'] == 1) ? '顯示' : '不顯示'; ?></td>
                    <td>
                        <ul>
                            <?php

                            $aa = unserialize($edu['content']);
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
                                        <h5 class="modal-title" id="exampleModalLabel"><b>修改教育程度</b></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="api/edit_edu.php" method="post">

                                        <div class="modal-body d-flex flex-column justify-content-between">
                                            <p>教育程度: </p>
                                            <input type="text" name="deg" value=<?= $edu['deg'] ?>>
                                            <p>學校名稱: </p>
                                            <input type="text" name="name" value=<?= $edu['name'] ?> <p>入學年分: </p>
                                            <input type="date" name="strt" value=<?= $edu['strt'] ?>>
                                            <p>畢業年分: </p>
                                            <input type="date" name="end" value=<?= $edu['end'] ?>>
                                            <p>是否顯示:</p>
                                            <input type="checkbox" name="sh" value=<?= $edu['id'] ?> <?= ($edu['sh'] == 1) ? 'checked' : '' ?>>
                                            <p>敘述: </p>
                                            <?php
                                            $rows = unserialize($edu['content']);
                                            foreach ($rows as $row) {

                                                echo "<input type='text' name='content[]'  value=" . $row . ">";
                                            }
                                            ?>
                                            <button type="button" class="addContent">+</button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary cancel-btn" data-bs-dismiss="modal">取消</button>
                                            <input type="hidden" name="id" value=<?= $edu['id'] ?>>

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
    $('.addContent').click(function() {
        console.log('you clicked it!');
        $(this).before('<input type="text" name="content[]" >');
    });
</script>