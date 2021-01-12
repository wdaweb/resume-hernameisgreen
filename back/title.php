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
</style>
<button class="btn add-bio-btn">+新增標題</button>
<table class="mt-5">
    <tbody>
        <tr class="title-row">
            <th scope="col">#</th>
            <th scope="col">標題</th>
            <th scope="col">顯示</th>
            <th scope="col">編輯</th>
        </tr>
        <tr>
            <td>1</td>
            <td>後端工程</td>
            
            <td><input type="radio" name="sh"></td>
            <td> <button class="btn edit-btn">編輯</button>
            <button class="btn del-btn">刪除</button></td>
        </tr>
    </tbody>
</table>