<style>
    table {
        width: 65rem;
        /*  text-align: center; */
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
    }

    .add-bio-btn {
        margin-left: 66.5rem;
        margin-bottom: -4rem;
    }

    ul {
        list-style: none;
    }
</style>
<button type="button" class="btn add-bio-btn" data-bs-toggle="modal" data-bs-target="#add-works">
    +新增作品
</button>
<div class="modal fade" id="add-works" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>新增作品</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="api/add_works.php" method="post" enctype="multipart/form-data">
                <div class="modal-body d-flex flex-column justify-content-between">
                    <p>作品名稱: </p>
                    <input type="text" name="name" id="name">
                    <p class="mt-1">作品縮圖: </p>
                    <input type="file" name="img" id="img">
                    <p>作品網址: </p>
                    <input type="text" name="link" id="link">
                    <p>使用技術: </p>
                    <select name="tech[]" class="tech-select" multiple="multiple">
                        <option value="html">HTML</option>
                        <option value="css">CSS</option>
                        <option value="php">PHP</option>
                        <option value="javascript">JavaScript</option>
                        <option value="jquery">jQuery</option>

                    </select>
                    <p>作品敘述: </p>
                    <input type="text" name="des[]" class="des">
                    <button type="button" id="addDes">+</button>
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
            <th scope="col">作品名稱名稱</th>
            <th scope="col">作品縮圖</th>
            <th scope="col">顯示</th>
            <th scope="col">作品連結</th>
            <th scope="col">使用技術</th>
            <th scope="col">作品敘述</th>
            <th scope="col">編輯</th>
        </tr>
        <?php
        $Works = new DB('works');
        $rows = $Works->all();
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><img src="uploads/<?= $row['img'] ?>" style="width:100px; height:100px"></td>
                <td><?= ($row['sh'] == 1) ? '顯示' : '不顯示'; ?></td>
                <td><?= $row['link'] ?></td>
                <td>
                    <ul>
                        <?php
                        if (!empty($row['tech'])) {
                            $techs = unserialize($row['tech']);
                            foreach ($techs as $tech) {
                                echo "<li>" . $tech . "</li>";
                            }
                        }

                        ?>
                    </ul>
                </td>
                <td>
                    <ul>
                        <?php
                        $rowro = unserialize($row['des']);
                        foreach ($rowro as $ro) {
                            echo "<li>" . $ro . "</li>";
                        }
                        ?>
                    </ul>
                </td>


                <td><button type="button" class="btn edit-works-btn" data-bs-toggle="modal" data-bs-target="#edit-works-<?= $row['id'] ?>">編輯</button>
                    <!-- Modal -->
                    <div class="modal fade" id="edit-works-<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><b>修改作品</b></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="api/edit_works.php" method="post">

                                    <div class="modal-body d-flex flex-column justify-content-between">
                                        <p>作品名稱: </p>
                                        <input type="text" name="name" id="name" value=<?= $row['name'] ?>>
                                        <p>是否顯示:
                                        </p>
                                        <input type="checkbox" name="sh" id="sh" value=<?= $row['id'] ?> <?= ($row['sh'] == 1) ? 'checked' : '' ?>>
                                        <p>作品連結: </p>
                                        <input type="text" name="link" value=<?= $row['link'] ?> >
                                        <p>使用技術: </p>
                                        <select name="tech[]" class="tech-select" multiple="multiple">
                                            <option value="html" <?php
                                                                    $t = unserialize($row['tech']);
                                                                    $a = (in_array("html", $t)) ? "selected" : "";
                                                                    echo $a;
                                                                    ?>>
                                                HTML
                                            </option>
                                            <option value="css" <?php

                                                                $a = (in_array("css", $t)) ? "selected" : "";
                                                                echo $a;
                                                                ?>>CSS</option>
                                            <option value="php" <?php

                                                                $a = (in_array("php", $t)) ? "selected" : "";
                                                                echo $a;
                                                                ?>>PHP</option>
                                            <option value="javascript" <?php

                                                                        $a = (in_array("javascript", $t)) ? "selected" : "";
                                                                        echo $a;
                                                                        ?>>JavaScript</option>
                                            <option value="jquery" <?php

                                                                    $a = (in_array("jquery", $t)) ? "selected" : "";
                                                                    echo $a;
                                                                    ?>>jQuery</option>

                                        </select>
                                        <p>作品敘述: </p>
                                        <?php
                                        $rowro = unserialize($row['des']);
                                        foreach ($rowro as $ro) {

                                            echo "<input type='text' name='des[]' class='des' value=" . $ro . ">";
                                        }
                                        ?>

                                        <button type="button" id="addDesEdit">+</button>
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
                </td>


            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('.tech-select').select2();
    });
    console.log($('#addDes'));
    $('#addDes').click(function() {
        console.log('you clicked it!');
        $(this).before('<input type="text" name="des[]" class="des">');
    });
    $('#addDesEdit').click(function() {
        console.log('you clicked it!');
        $(this).before('<input type="text" name="des[]" class="des">');
    });
</script>