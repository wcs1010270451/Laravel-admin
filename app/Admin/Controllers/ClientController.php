<?php

namespace App\Admin\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ClientController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('列表')
            ->description('客户列表信息')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('详情')
            ->description('客户详细信息')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('修改')
            ->description('修改客户信息')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('添加')
            ->description('添加客户信息')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Client);

//        $grid->id('Id');
//        $grid->classify_id('Classify id');
        $grid->name('姓名');
        $grid->contacts('联系人');
        $grid->sex('性别');
        $grid->email('邮箱');
        $grid->phone('联系电话');
        $grid->age('年龄');
//        $grid->out_lable('Out lable');
//        $grid->in_lable('In lable');
        $grid->nature('性质');
        $grid->wx_char('微信');
        $grid->important_grade('重要等级');
//        $grid->remarks('Remarks');
//        $grid->cooperationing('Cooperationing');
//        $grid->cooperationed('Cooperationed');
        $grid->scale('规模');
//        $grid->created_at('Created at');
//        $grid->updated_at('Updated at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Client::findOrFail($id));

        $show->id('Id');
        $show->classify_id('Classify id');
        $show->name('Name');
        $show->contacts('Contacts');
        $show->sex('Sex');
        $show->email('Email');
        $show->phone('Phone');
        $show->age('Age');
        $show->out_lable('Out lable');
        $show->in_lable('In lable');
        $show->nature('Nature');
        $show->wx_char('Wx char');
        $show->important_grade('Important grade');
        $show->remarks('Remarks');
        $show->cooperationing('Cooperationing');
        $show->cooperationed('Cooperationed');
        $show->scale('Scale');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Client);

        $form->number('classify_id', '分类ID');
        $form->text('name', '姓名');
        $form->text('contacts', '联系人');
        $form->switch('sex', '性别');
        $form->email('email', '邮箱');
        $form->mobile('phone', '联系电话');
        $form->switch('age', '年龄');
        $form->text('out_lable', '公司外部标签');
        $form->text('in_lable', '公司内部标签');
        $form->text('nature', '性质');
        $form->text('wx_char', '微信');
        $form->text('important_grade', '重要等级');
        $form->text('remarks', '备注');
        $form->text('cooperationing', '合作中的项目');
        $form->text('cooperationed', '合作过的项目');
        $form->text('scale', '规模');

        return $form;
    }
}
