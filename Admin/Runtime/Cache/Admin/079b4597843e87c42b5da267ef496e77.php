<?php if (!defined('THINK_PATH')) exit();?>    <form ID="pagerForm" method="post" action="/admin.php/Admin/Employee/Index">
    <input type="hidden" name="employee_keyword" value="<?php echo ($employee_keyword); ?>" />
    <input type="hidden" name="pageNum" value="<?php echo ($pageList["pageNum"]); ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo ($pageList["pageSize"]); ?>" />
    </form>

    <div class="pageHeader">
        <form onsubmit="return navTabSearch(this);" action="/admin.php/Admin/Employee/Index" method="post">
        <div class="searchBar">
            <table class="searchContent">
                <tr>
                    <td>
                        登陆账号：<input type="text" name="employee_keyword" value="<?php echo ($employee_keyword); ?>" />
                    </td>
                    <td><div class="buttonActive"><div class="buttonContent"><button type="submit">查询</button></div></div></td>
                </tr>
            </table>
        </div>
        </form>
    </div>
    <div class="pageContent">
        <div class="panelBar">
            <ul class="toolBar">
                <li><a class="add" href="/admin.php/Admin/Employee/Edit" target="dialog" mask="true"><span>添加</span></a></li>
                <li><a class="edit" href="/admin.php/Admin/Employee/Edit?ID={ID}" target="dialog" mask="true"><span>修改</span></a></li>
                <li><a class="delete" href="/admin.php/Admin/Employee/Delete?ID={ID}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
                <li class="line">line</li>
            </ul>
        </div>
        <table class="table" width="100%" layouth="112">
            <thead>
            <tr>
                <th width="120" align="center">登陆账号</th>
                <th width="100" align="center">姓名</th>
                <th width="150" align="center">上次登陆IP</th>
                <th width="80" align="center">登陆次数</th>
                <th width="80" align="center">状态</th>
                <th width="80" align="center">所属角色</th>
                <th width="80" align="center">上次登陆时间</th>
                <th width="80" align="center">创建时间</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr target="ID" rel="<?php echo ($item["id"]); ?>">
                    <td><?php echo ($item["loginname"]); ?></td>
                    <td><?php echo ($item["username"]); ?></td>
                    <td><?php echo ($item["latestloginip"]); ?></td>
                    <td><?php echo ($item["logintimes"]); ?></td>
                    <td><?php echo ($item[isuse] == 1 ? "启用":"禁用"); ?></td>
                    <td></td>
                    <td><?php echo ($item["latestlogintime"]); ?></td>
                    <td><?php echo ($item["createtime"]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo ($htmlPage); ?>
    </div>