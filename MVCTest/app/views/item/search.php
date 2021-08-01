<!--/**-->
<!-- * Created by PhpStorm-->
<!-- * Author: sandmliu-->
<!-- * Date: 2020/3/29-->
<!-- * Time: 23:48-->
<!-- */-->
<table>
    <tr>
        <th>ID</th>
        <th>内容</th>
    </tr>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?php echo $item['id'] ?></td>
            <td><?php echo $item['item_name'] ?></td>
        </tr>
    <?php endforeach ?>
</table>
<a href="/item/search">查询成功<?php echo $count ?>项，点击返回</a>