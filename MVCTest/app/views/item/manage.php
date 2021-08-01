<!--/**-->
<!-- * Created by PhpStorm-->
<!-- * Author: sandmliu-->
<!-- * Date: 2020/3/22-->
<!-- * Time: 23:35-->
<!-- */-->
<form action=<?php echo isset($item['id']) ? '/item/update' :'/item/add' ;?> method="post">
    <?php if (isset($item['id'])): ?>
        <input name="id" value="<?php echo $item['id'] ?>">
    <?php endif; ?>
    <input type="text" name="value" value="<?php echo isset($item['item_name']) ? $item['item_name'] : '' ?>">
    <input type="submit" value="提交">
</form>

<a class="big" href="/item/index">返回</a>