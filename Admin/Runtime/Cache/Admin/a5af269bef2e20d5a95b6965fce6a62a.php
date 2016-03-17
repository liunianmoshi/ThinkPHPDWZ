<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
    <form method="post" action="/admin.php/Admin/Employee/Sava" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
    <div class="pageFormContent" layouth="56">
        <input type="hidden" name="ID" value="<?php echo ($model["id"]); ?>">
        <p>
            <label>权限角色：</label>
            <select name="RoleID" class="combox" >
                <option value="0">-请选择-</option>
            </select>
        </p>
        <p>
            <label>登陆账号：</label>
            <input type="text" value="<?php echo ($model["loginname"]); ?>" name="LoginName" >
        </p>
        <p>
            <label>姓名：</label>
            <input type="text" value="<?php echo ($model["username"]); ?>" name="UserName" >
        </p>
        <p>
            <label>是否启用：</label>
            <input type="checkbox"  <?php echo ($model[isuse] == 1?"checked='checked'":""); ?> name="IsUse" value="1" />
        </p>
    </div>
    <div class="formBar">
        <ul>
            <li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
            <li>
                <div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
            </li>
        </ul>
    </div>
    </form>
</div>