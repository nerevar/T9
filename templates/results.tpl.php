<table class="table table-striped">
	<thead>
		<tr>
			<th>Words:</th>
		</tr>
	</thead>
	<tbody>
		<? if (count($words) > 0) { ?>
			<? foreach ($words as $word) { ?>
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