<?php /*a:2:{s:53:"/www/wwwroot/测试/app/admin/view/address/index.html";i:1643994998;s:61:"/www/wwwroot/测试/app/admin/view/../../admin/view/main.html";i:1633927242;}*/ ?>
<div class="layui-card"><style>
	.red-span{
		color:#fff;
		padding:3px 5px;
		background-color:#D24D57;
		border-radius:3px;
		font-weight:600;
		width:20px;
		display: flex;
		justify-content:center;
		align-items:center;
	}
	.blue-span{
		color:#fff;
		padding:3px 5px;
		background-color:#6495ed;
		border-radius:3px;
		font-weight:600;
		width:20px;
		display: flex;
		justify-content:center;
		align-items:center;
	}
</style><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body"><div class="think-box-shadow"><button class="layui-btn layui-btn-sm reload" data-reload type="button">刷 新</button><table class="layui-table margin-top-10" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><!-- <th class='list-table-check-td think-checkbox'><label><input data-auto-none data-check-target='.list-check-box' type='checkbox'></label></th> --><th width="50" class="text-center nowrap">序号</th><th width="50" class="text-left nowrap">类型</th><th class="text-left nowrap">地址</th><th class="text-left nowrap">私钥</th><th width="100" class="text-center nowrap">操作</th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr data-dbclick><!-- <td class='list-table-check-td think-checkbox'><label><input class="list-check-box" type='checkbox' value='<?php echo htmlentities($vo['id']); ?>'></label></td> --><td class="text-center nowrap"><?php echo htmlentities((isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:'')); ?></td><td class="text-left nowrap"><span class="<?php echo $vo['type']=='erc' ? 'red-span'  :  'blue-span'; ?>"><?php echo htmlentities((isset($vo['type']) && ($vo['type'] !== '')?$vo['type']:'')); ?></span></td><td class="text-left nowrap"><?php echo htmlentities((isset($vo['address']) && ($vo['address'] !== '')?$vo['address']:'')); ?></td><td class="text-left nowrap"><?php echo htmlentities((isset($vo['pri_key']) && ($vo['pri_key'] !== '')?$vo['pri_key']:'')); ?></td><td class='text-center nowrap'><?php if(auth("edit")): ?><a class="layui-btn layui-btn-sm" data-modal="<?php echo url('address/edit'); ?>?id=<?php echo htmlentities($vo['id']); ?>" data-title="编辑授权地址" data-width="500px">编辑</a><?php endif; ?></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div></div></div>