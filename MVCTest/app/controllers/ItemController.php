<?php
/**
 * Created by PhpStorm
 * Author: sandmliu
 * Date: 2020/3/22
 * Time: 23:32
 */
namespace app\controllers;

use fastphp\base\Controller;
use app\models\ItemModel;

class ItemController extends Controller
{
    // 首页方法，测试框架自定义DB查询
    public function index()
    {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

        if ($keyword) {
            $items = (new ItemModel())->search($keyword);
        } else {
            // 查询所有内容，并按倒序排列输出
            // where()方法可不传入参数，或者省略
            $items = (new ItemModel)->where()->order(['id DESC'])->fetchAll();
        }

        $this->assign('title', '全部条目');
        $this->assign('keyword', $keyword);
        $this->assign('items', $items);
        $this->render();
    }

    public function search()
    {
        var_dump($_POST['item_name']);
        $items = (new ItemModel())->where(["item_name = ?"], [$_POST['item_name']])->fetch();
        var_dump($items);
        $count = count($items);
        $this->assign('title','查询结果');
        $this->assign('items',$items);
        $this->assign("count",$count);
        $this->render();
    }

    // 查看单条记录详情
    public function detail($id)
    {
        // 通过?占位符传入$id参数
        $item = (new ItemModel())->where(["id = ?"], [$id])->fetch();

        $this->assign('title', '条目详情');
        $this->assign('item', $item);
        $this->render();
    }

    // 添加记录，测试框架DB记录创建（Create）
    public function add()
    {
//        $data = array('item_name' => $_POST['value']);
        $data['item_name'] = $_POST['value'];
        $count = (new ItemModel)->add($data);

        $this->assign('title', '添加成功');
        $this->assign('count', $count);
        $this->render();
    }

    // 操作管理
    public function manage($id = 0)
    {
        $item = array();
        if ($id) {
            // 通过名称占位符传入参数
            $item = (new ItemModel())->where(["id = :id"], [':id' => $id])->fetch();
        }

        $this->assign('title', '管理条目');
        $this->assign('item', $item);
        $this->render();
    }

    // 更新记录，测试框架DB记录更新（Update）
    public function update()
    {
        $item_id = $_POST['id'];
        $item_value = $_POST['value'];
        $data = array('id' => $item_id, 'item_name' => $item_value);
        $count = (new ItemModel)->where(['id = :id'], [':id' => $data['id']])->update($data);

        $this->assign('title', '修改成功');
        $this->assign('count', $count);
        $this->render();
    }

    // 删除记录，测试框架DB记录删除（Delete）
    public function delete($id = null)
    {
        $count = (new ItemModel)->delete($id);

        $this->assign('title', '删除成功');
        $this->assign('count', $count);
        $this->render();
    }
}