<?php

require_once __DIR__ . '/vendor/autoload.php';

use Liveframe\Liveframe;

$liveframe = new Liveframe('6a0204c1-ad58-4297-91a6-613831698203', '14|FSkvjjd1pac9Cx8eA9ENLgRhgrSnSoECs9434QrZ');

$some = $liveframe->assessments->list();
// $some = $liveframe->assessments->get('e80c0876-b41d-410e-bf4b-e9912e2a3645');
// $some = $liveframe->assessments->delete('8c2da6e0-4b4b-4e29-b742-aa8f31c3c18b');
// $some = $liveframe->assessments->create('yo yo', ['streams' => ['webcam']]);
// $some = $liveframe->assessments->update('d8634d08-ca13-411f-bf80-1a68e5d521e5', [
//     'name' => 'henry fordzz',
//     'options' => [
//         'streams' => ['webcam', 'screenshare']
//     ],
//     'active' => false
// ]);

// $some = $liveframe->sessions->list('d8634d08-ca13-411f-bf80-1a68e5d521e5');
// $some = $liveframe->sessions->get('achoman01@hotmail.com', 'd8634d08-ca13-411f-bf80-1a68e5d521e5');
// $some = $liveframe->sessions->delete('achoman01@hotmail.com', 'd8634d08-ca13-411f-bf80-1a68e5d521e5');

echo $some;
// echo json_decode($some);
