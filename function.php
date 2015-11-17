<?php 

// load file
$json_file = file_get_contents('data.json');
$json_data = json_decode($json_file);

$members = $json_data->proposal->members;

// Create output
$employees = array();

foreach ($members as $key => $member) {
	if ( ! isset($member->household_id) ) {
		$employees[$member->id]['name'] = _uc($member->first_name) . ' ' . _uc($member->last_name);
		$employees[$member->id]['age'] = $member->age;		
		$employees[$member->id]['coverage'] = isset($member->coverage_codes->{13}) ? $member->coverage_codes->{13} : "";
	}
}

// // get dependents associated
foreach ($members as $key => $member) {
	if (isset($member->household_id) && $member->household_id) {
		$employees[$member->household_id]['dependents'][$member->id]['name'] = $member->first_name . ' ' . $member->last_name;
		$employees[$member->household_id]['dependents'][$member->id]['age'] = $member->age;
		$employees[$member->household_id]['dependents'][$member->id]['coverage'] = isset($member->coverage_codes->{13}) ? $member->coverage_codes->{13} : "";
	} 		
}

function _uc($str) {
	return strtolower(ucfirst($str));
}
// print_r(count($members));