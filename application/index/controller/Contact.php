<?php
namespace app\index\controller;

use think\Db;
use app\index\model\Group;
use app\index\model\Contact as ContactModel;


class Contact extends \think\Controller
{
    public function index()
    {
        $list = ContactModel::paginate(11);
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function add()
    {
        Db::transaction(function () {
            $user = $_REQUEST['contact'];
            $groupName = $user['group'];
            $groupId = Db::table('group')->where('name', $groupName)->value('id');
            unset($user['group']);
            $result = ContactModel::create($user);
            $group = Group::getByName($groupName);
            $result->groups()->attach($group);
        });
    }

    public function update()
    {
         $contact = $_REQUEST['contact'];
         ContactModel::update($contact);
         return "更新用户成功";
    }

    public function delete()
    {
        $Contact = ContactModel::get($_REQUEST['id']);
        if ($contact) {
            $contact->delete();
            return "删除用户成功";
        } else {
            return "删除的用户不存在";
        }
    }
    
}
