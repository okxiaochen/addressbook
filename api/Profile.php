<?php

interface Profile 
{
	public function __construct($info = null);

	public function getName();

	public function getEmail();

	public function getMobilephone();

	public function getTelephone();

	public function getBirthday();

	public function getPhoto();

	public function getAddress();

	public function getCompany();

	public function getPostcode();

	public function getGroup();

	public function getRemarks();

	public function getInstantMessaging();

	public function getHomepage();

	public function getCreateTime();


}
