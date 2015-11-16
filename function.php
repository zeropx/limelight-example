<?php 

// load file
$json_file = file_get_contents('data.json');
$json_data = json_decode($json_file);

$members = $json_data->proposal->members;

// Create output
$employees = array();

foreach ($members as $key => $member) {
	if (!isset($member->household_id)) {
		$employees[$memeber->id]['name'] = $member->first_name . ' ' . $member->last_name;
		$employees[$memeber->id]['age'] = $member->age;		
	}
}
// get dependents associated
foreach ($members as $key => $member) {

	if (isset($member->household_id) && $member->household_id) {
		$employees[$member->household_id]['dependents'][$memeber->id]['name'] = $member->first_name . ' ' . $member->last_name;
		$employees[$member->household_id]['dependents'][$memeber->id]['age'] = $member->age;
	} 		

}


print_r(count($members));