<?php
// This file is NOT a part of Moodle - http://moodle.org/
//
// This client for Moodle 2 is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//

/**
 * XML-RPC client for Moodle 2
 *
 * @authorr Jerome Mouneyrac
 */

/// SETUP - NEED TO BE CHANGED
$token = 'acabec9d20933913f14301785324f579';
$domainname = 'http://www.yourmoodle.com';
$functionname = 'core_user_create_users';

//////// moodle_user_create_users ////////

/// PARAMETERS - NEED TO BE CHANGED IF YOU CALL A DIFFERENT FUNCTION
$user1 = new stdClass();
$user1->username = 'testusername1';
$user1->password = 'testpassword1';
$user1->firstname = 'testfirstname1';
$user1->lastname = 'testlastname1';
$user1->email = 'testemail1@moodle.com';
$user1->auth = 'manual';
$user1->idnumber = 'testidnumber1';
$user1->lang = 'en';
$user1->theme = 'standard';
$user1->timezone = '-12.5';
$user1->mailformat = 0;
$user1->description = 'Hello World!';
$user1->city = 'testcity1';
$user1->country = 'au';
$preferencename1 = 'preference1';
$preferencename2 = 'preference2';
$user1->preferences = array(
    array('type' => $preferencename1, 'value' => 'preferencevalue1'),
    array('type' => $preferencename2, 'value' => 'preferencevalue2'));
$user2 = new stdClass();
$user2->username = 'testusername2';
$user2->password = 'testpassword2';
$user2->firstname = 'testfirstname2';
$user2->lastname = 'testlastname2';
$user2->email = 'testemail1@moodle.com';
$user2->timezone = 'Pacific/Port_Moresby';
$params = array($user1, $user2);

/// XML-RPC CALL
header('Content-Type: text/plain');
$serverurl = $domainname . '/webservice/xmlrpc/server.php'. '?wstoken=' . $token;
require_once('./curl.php');
$curl = new curl;
$post = xmlrpc_encode_request($functionname, array($params));
$resp = xmlrpc_decode($curl->post($serverurl, $post));
print_r($resp);
