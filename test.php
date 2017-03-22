<?php
	/*include("Profile.php");
	$arry = array("name"=>"chenxiao");
	$profile = new Profile($arry);
	echo $profile->getHomepage();
	echo $profile->getName();
	echo $profile->getEmail();
	echo $profile->getTimestamp();*/
	// require_once("Profile.php");
	include("api/Group.php");
	Group::add("hello");
	print_r(Group::get());

?>
