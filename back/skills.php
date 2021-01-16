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

<div class="container-bio">

    <div class="button-box">
        <button type="button" class="btn add-skill-btn" data-bs-toggle="modal" data-bs-target="#add-skill">
            +新增技能
        </button>
        <div class="modal fade" id="add-skill" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>新增技能</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="api/add_skills.php" method="post">
                        <div class="modal-body d-flex flex-column justify-content-between">
                            <p>技能名稱: </p>
                            <input type="text" name="name" id="name">

                            <p>技能分類: </p>
                            <select name="tech" class="tech-select">
                                <option value="frontend">前端</option>
                                <option value="backend">後端</option>
                                <option value="visual">視覺</option>
                                <option value="misc">其他</option>
                            </select>
                            <p>是否顯示:</p>
                            <input type="checkbox" name="sh" value="1">
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
                <th scope="col" class="col-1">技能名稱</th>
                <th scope="col" class="col-2">技能分類</th>
                <th scope="col" class="col-3">顯示狀態</th>
                <th scope="col" class="col-4">編輯</th>
            </tr>
            <?php
            $Skills = new DB('skills');
            $rows = $Skills->all();

            foreach ($rows as $row) {

            ?>
                <tr>
                    <td><?= $row['name']; ?></td>
                    <td><?php switch($row['tech']){
                        case "frontend":
                            echo "前端";
                            break;
                        case "backend":
                            echo "後端";
                            break;
                        case "visual":
                            echo "視覺";
                            break;
                        case "misc":
                            echo "其他";
                            break;
                    } ?></td>
                    <td><?= ($row['sh'] == 1) ? '顯示' : '不顯示'; ?></td>
                    <td><button type="button" class="btn edit-bio-btn" data-bs-toggle="modal" data-bs-target="#edit-skills-<?= $row['id'] ?>">編輯</button>
                        <!-- Modal -->
                        <div class="modal fade" id="edit-skills-<?= $row['id'] ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>修改技能</b></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="api/edit_skills.php" method="post">

                                        <div class="modal-body d-flex flex-column justify-content-between">
                                            <p>技能名稱: </p>
                                            <input type="text" name="name" id="name" value=<?= $row['name'] ?>>
                                            <p>是否顯示:
                                            </p>
                                            <input type="checkbox" name="sh"  value=<?= $row['id'] ?> <?= ($row['sh'] == 1) ? 'checked' : '' ?>>
                                            <p>請選擇技能類別: </p>
                                            <select name="tech" class="tech-select-edit">
                                                <option value="frontend" <?= ($row['tech'] == "frontend") ? 'selected' : ''; ?>>
                                                    前端
                                                </option>
                                                <option value="backend" <?= ($row['tech'] == "backend") ? 'selected' : ''; ?>>
                                                    後後端
                                                </option>
                                                <option value="visual" <?= ($row['tech'] == "visual") ? 'selected' : ''; ?>>
                                                    視覺
                                                </option>
                                                <option value="misc" <?= ($row['tech'] == "misc") ? 'selected' : ''; ?>>
                                                    其他
                                                </option>


                                            </select>
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
<script>
    $(document).ready(function() {
        $('.tech-select').select2();
    });
</script>