<table class="table table-striped table-left">
	<thead>
		<tr>
			<th>Русские слова:</th>
		</tr>
	</thead>
	<tbody>
		<?php if (!empty($words['ru']) > 0) { ?>
			<?
			// find array with maximal words count for each digit sequence
			$max_size = 0;
			foreach ($words['ru'] as $word_array) {
				if (count($word_array) > $max_size) {
					$max_size = count($word_array);
				}
			} ?>

			<?php if ($max_size > 0) { ?>
				<?php for ($i = 0; $i < $max_size; $i++) { ?>
					<tr>
						<td>
							<?php foreach ($words['ru'] as $search => $word_array) { ?>
								<?php if (isset($word_array[$i])) { ?>
									<?= $word_array[$i] ?>
								<?php } else { ?>
									<?php for ($t = 0; $t < strlen($search); $t++) {
										print '-';
								} ?>
								<?php } ?>
							<?php } ?>
						</td>
					</tr>
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td>-</td>
				</tr>
			<?php } ?>

		<?php } else {?>
			<tr>
				<td>-</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<table class="table table-striped table-right">
	<thead>
		<tr>
			<th>Английские слова:</th>
		</tr>
	</thead>
	<tbody>
		<?php if (!empty($words['en']) > 0) { ?>
			<?
			// find array with maximal words count for each digit sequence
			$max_size = 0;
			foreach ($words['en'] as $word_array) {
				if (count($word_array) > $max_size) {
					$max_size = count($word_array);
				}
			} ?>

			<?php if ($max_size > 0) { ?>
				<?php for ($i = 0; $i < $max_size; $i++) { ?>
					<tr>
						<td>
							<?php foreach ($words['en'] as $search => $word_array) { ?>
								<?php if (isset($word_array[$i])) { ?>
									<?= $word_array[$i] ?>
								<?php } else { ?>
									<?php for ($t = 0; $t < strlen($search); $t++) {
										print '-';
								} ?>
								<?php } ?>
							<?php } ?>
						</td>
					</tr>
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td>-</td>
				</tr>
			<?php } ?>

		<?php } else {?>
			<tr>
				<td>-</td>
			</tr>
		<?php } ?>
	</tbody>
</table>



<div class="clear"></div>