<?php

// function printTimetable($day, $classes) {
//     echo ucfirst($day) . " Classes:<br>";
//     foreach ($classes as $class) {
//         echo "{$class['subject']} : {$class['start_time']} - {$class['end_time']}<br>";
//     }
//     echo "\n";
// }

$se_timetable = [
    'monday' => [
        ['subject' => 'Software Design and Architecture', 'start_time' => '13:00 Hrs.', 'end_time' => '13:55 Hrs.'],
        ['subject' => 'Software Design and Architecture', 'start_time' => '14:00 Hrs.', 'end_time' => '14:55 Hrs.'],
        ['subject' => 'Data Structures and Algorithms - Lab', 'start_time' => '15:00 Hrs.', 'end_time' => '15:55 Hrs.'],
        ['subject' => 'Data Structures and Algorithms - Lab', 'start_time' => '16:00 Hrs.', 'end_time' => '16:55 Hrs.'],
        ['subject' => 'Data Structures and Algorithms - Lab', 'start_time' => '17:00 Hrs.', 'end_time' => '17:55 Hrs.'],
    ],
    'tuesday' => [
        ['subject' => 'Technical and Business Writing', 'start_time' => '12:00 Hrs.', 'end_time' => '12:55 Hrs.'],
        ['subject' => 'Probability and Statistics', 'start_time' => '13:00 Hrs.', 'end_time' => '13:55 Hrs.'],
        ['subject' => 'Software Design and Architecture - Lab', 'start_time' => '15:00 Hrs.', 'end_time' => '15:55 Hrs.'],
        ['subject' => 'Software Design and Architecture - Lab', 'start_time' => '16:00 Hrs.', 'end_time' => '16:55 Hrs.'],
        ['subject' => 'Software Design and Architecture - Lab', 'start_time' => '17:00 Hrs.', 'end_time' => '17:55 Hrs.'],
    ],
    'wednesday' => [
        ['subject' => 'Technical and Business Writing', 'start_time' => '10:00 Hrs.', 'end_time' => '10:55 Hrs.'],
        ['subject' => 'Technical and Business Writing', 'start_time' => '11:00 Hrs.', 'end_time' => '11:55 Hrs.'],
        ['subject' => 'Web Engineering', 'start_time' => '13:00 Hrs.', 'end_time' => '13:55 Hrs.'],
        ['subject' => 'Data Structures and Algorithms', 'start_time' => '15:00 Hrs.', 'end_time' => '15:55 Hrs.'],
        ['subject' => 'Data Structures and Algorithms', 'start_time' => '16:00 Hrs.', 'end_time' => '16:55 Hrs.'],
    ],
    'friday' => [
        ['subject' => 'Software Design and Architecture', 'start_time' => '13:00 Hrs.', 'end_time' => '13:55 Hrs.'],
        ['subject' => 'Web Engineering', 'start_time' => '14:00 Hrs.', 'end_time' => '14:55 Hrs.'],
        ['subject' => 'Web Engineering', 'start_time' => '15:00 Hrs.', 'end_time' => '15:55 Hrs.'],
        ['subject' => 'Probability and Statistics', 'start_time' => '16:00 Hrs.', 'end_time' => '16:55 Hrs.'],
        ['subject' => 'Probability and Statistics', 'start_time' => '17:00 Hrs.', 'end_time' => '17:55 Hrs.'],
    ],
    
];

// Get the current day dynamically
$today = strtolower(date('l'));

// // Print the timetable for SE
// if (isset($se_timetable[$today])) {
//     printTimetable($today, $se_timetable[$today]);

//     // Print the timetable for CS (assuming CS has the same timetable as SE)
//     printTimetable($today, $se_timetable[$today]);

//     // Print the timetable for IT (assuming IT has the same timetable as SE)
//     printTimetable($today, $se_timetable[$today]);
// } else {
//     echo "No classes today.\n";
// }
?>

