<?php include "function.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Fun data stuff</title>
	<link rel="stylesheet" href="stylesheets/screen.css">
</head>
<body>
<table>
	<thead>
		<tr>
			<th>Employees</th>
			<th>Age</th>
			<th>Coverage</th>
			<th>Plan Selection</th>
			<th>EE Rate</th>
			<th>DEP Rate</th>
			<th>Total Rate</th>
		</tr>
	</thead>
	<tbody>
	<?php if (isset($employees) && count($employees)): ?>

		<?php foreach ($employees as $key => $employee): ?>
			<tr>
				<td><?php print $employee['name'] ?></td>
				<td><?php print $employee['age'] ?></td>
				<td><?php 
					print $employee['coverage'];
					if (isset($employee['dependents']) && count($employee['dependents'])) {
						print ":" . count($employee['dependents']);
					}
					?></td>
				
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<?php if (isset($employee['dependents']) && count($employee['dependents'])): ?>
				<?php foreach ($employee['dependents'] as $k => $dependent): ?>
				<tr class="dependent">
					<td><?php print $dependent['name'] ?></td>
					<td><?php print $dependent['age'] ?></td>
					<td><?php print $employee['coverage'] ?></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>	
				<?php endforeach ?>
			<?php endif ?>
		<?php endforeach ?>
	<?php endif ?>
	</tbody>
</table>	
</body>
</html>