<table class="table table-striped table-left">
	<thead>
		<tr>
			<th>English Words:</th>
		</tr>
	</thead>
	<tbody>
		<? if (!empty($words['en']) > 0) { ?>
			<? foreach ($words['en'] as $word) { ?>
				<tr>
					<td><?= $word; ?></td>
				</tr>
			<? } ?>
		<? } else {?>
			<tr>
				<td>-</td>
			</tr>
		<? } ?>
	</tbody>
</table>

<table class="table table-striped table-right">
	<thead>
		<tr>
			<th>Russian Words:</th>
		</tr>
	</thead>
	<tbody>
		<? if (!empty($words['ru']) > 0) { ?>
			<? foreach ($words['ru'] as $word) { ?>
				<tr>
					<td><?= $word; ?></td>
				</tr>
			<? } ?>
		<? } else {?>
			<tr>
				<td>-</td>
			</tr>
		<? } ?>
	</tbody>
</table>

<div class="clear"></div>