<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp"/>
	<meta name="google" content="notranslate">
	<meta name="robots" content="noindex">
	<title>索引：<?php echo urldecode($path);?> - <?php echo config('site_name'); ?></title>
	<link rel="stylesheet" href="/view/awsl/css/awsl.min.css">
	<link rel="stylesheet" href="/view/awsl/css/awsl-polyfix.css">
	<style>
	.title-bar {
		display: flex;
		justify-content: space-between;
		flex-direction: row;
		align-items: center;
	}

	.title-bar h1 {
		margin: 5em 0;
	}

	.address-bar {
		font-size: 14px;
		font-family: "JetBrainsMono", SFMono-Regular, Consolas, Liberation Mono, Menlo, monospace;
		background: #f0f0f0;
		border: 1px solid #ccc;
		word-break: break-all;
		padding: .25em .5em;
	}

	table.aw-table.file-list tr:hover {
		background: #f0f0f0;
	}
	</style>
</head>
<body class="aw-body" style="min-width: 768px">
	<div class="aw-container aw-container-ah" style="box-sizing: content-box;">
		<div class="title-bar">
			<h1 class="aw-title" style="margin: 1em 0"><?php echo config('site_name'); ?></h1>
			<a class="aw-btn aw-btn-s aw-bg-luotianyi" style="float: right" href="/admin" target="_blank">登录</a>
		</div>
		<div class="address-bar">
			<?php echo urldecode($path);?>
		</div>
		
		<table class="aw-table file-list aw-table-fixed" style="width: 100%;margin-top: 30px;">
			<tr>
				<th class="file-name" style="min-width: 20em">文件名</th>
				<th class="file-size" style="width: 5em">大小</th>
				<th class="file-date-modified" style="width: 10em">修改日期</th></tr>
			<?php if($path != '/'):?>
				<tr>
					<td colspan="3">
						<a class="aw-link" href="<?php echo get_absolute_path($root.$path.'../');?>">[返回父目录..]</a>
					</td>
				</tr>
			<?php endif;?>
			<?php foreach((array)$items as $item):?>
				<?php if(!empty($item['folder'])):?>
					<tr>
						<td>
							<a style="max-width: 100%; vertical-align: middle;" title="<?php echo $item['name'];?>" class="aw-link aw-ellipsis" href="<?php echo get_absolute_path($root.$path.rawurlencode($item['name']));?>">
								&#x1F4C1; <?php echo $item['name'];?>
							</a>
						</td>
						<td><?php echo onedrive::human_filesize($item['size']);?></td>
						<td><?php echo date("Y-m-d H:i:s", $item['lastModifiedDateTime']);?></td>
					</tr>
				<?php else:?>
					<tr>
						<td>
							<a style="max-width: 100%; vertical-align: middle;" title="<?php echo $item['name'];?>" class="aw-link  aw-ellipsis" href="<?php echo get_absolute_path($root.$path).rawurlencode($item['name']);?>">
								<?php echo $item['name'];?>
							</a>
						</td>
						<td><?php echo onedrive::human_filesize($item['size']);?></td>
						<td class="file-date-modified"><?php echo date("Y-m-d H:i:s", $item['lastModifiedDateTime']);?></td>
					</tr>
				<?php endif;?>
			<?php endforeach;?>
		</table>
		<?php if (!is_null($readme)) { ?>
			<div class="aw-pnl" style="margin-top: 100px">
				<?php echo $readme; ?>
			</div>
			<div style="height: 100px"></div>
		<?php } ?>
	</div>
	<footer class="aw-footer">
		<div class="aw-footer-copyright aw-footer-copyright-s">
			<ul>
				<li>&copy; <?php echo date("Y"); ?> <a href="https://josephcz.xyz" target="_blank">Joseph Chris</a></li>
				<li><a href="https://github.com/josephcz-xyz/storage" target="_blank">GitHub</a></li>
			</ul>
		</div>
	</footer>
</body>
</html>
