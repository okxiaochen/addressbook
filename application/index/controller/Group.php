<?php
namespace app\index\controller;

use app\index\model\Group as GroupModel;
use app\index\model\Contact;

class Group extends \think\Controller
{
    public function add()
    {

        // $group['name'] = '测试';
        $group = $_REQUEST['contact'];
        if ($result = GroupModel::create($group)) {
            return '分组[ ' . $result->name . ' ]新增成功';
        } else {
            return "新增错误";
        }
    }

    public function update()
    {
        /*$group['id'] = 6;
        $group['name'] = '同学';*/
        $group = $_REQUEST['contact'];
        GroupModel::update($group);
        return "更新用户成功";
    }

    public function delete()
    {
        $group = GroupModel::getByName('测试');
        if ($group) {
            $group->delete();
            return "删除用户成功";
        } else {
            return "删除的用户不存在";
        }
    }

    public function read()
    {
        // $group = $_REQUEST['group'];
        $group = "同学";
        $group = GroupModel::getByName($group,'contacts');
        $list = $group->contacts;
        $this->assign('list', $list);
        return $this->fetch();
    }
}