<!--/**-->
<!-- * Created by PhpStorm-->
<!-- * Author: sandmliu-->
<!-- * Date: 2020/3/22-->
<!-- * Time: 23:34-->
<!-- */-->
<form action="/item/search" method="post">
    <input type="text" value="<?php echo $keyword ?>" name="item_name">
    <input type="submit" value="搜索">
</form>

<p><a href="/item/manage">新建</a></p>

<table>
    <tr>
        <th>ID</th>
        <th>内容</th>
        <th>操作</th>
    </tr>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?php echo $item['id'] ?></td>
            <td><?php echo $item['item_name'] ?></td>
            <td>
                <a href="/item/manage/<?php echo $item['id'] ?>">编辑</a>
                <a href="/item/delete/<?php echo $item['id'] ?>">删除</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>