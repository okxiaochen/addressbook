<?php
/*	include("Profile.php");
	$arry = array("name"=>"chenxiao");
	$profile = new Profile($arry);
	echo $profile->getHomepage();
	echo $profile->getName();
	echo $profile->getEmail();
	echo $profile->getTimestamp();*/
	require_once("abc.php");
	include("Group.php");
	Group::add("hello");
	print_r(Group::get());

?>
