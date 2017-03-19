<?php

class Profile {
	private $name=null;
	private $mobile_phone=null;
	private $tele_phone=null;
	private $birthday=null;
	private $email=null;
	private $photo=null;
	private $address=null;
	private $company=null;
	private $postcode=null;
	private $group=null;
	private $remarks=null;
	private $instant_messaging=null;
	private $homepage=null;
	private $timestamp=null;


	public function __construct($info = null){

		if($info){
			foreach($info as $key=>$value){
				$this->$key = $value;
			}
		} else {
			$this->name = "hello";
		}

		$this->setTimestamp();
	}


	private function setTimestamp(){
		$this->timestamp = date("Y.m.d");
  	}

	public function getName(){
		return $this->name;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getMobilephone(){
		return $this->mobile_phone;
	}

	public function getTelephone(){
		return $this->tele_phone;
	}

	public function getBirthday(){
		return $this->birthday;
	}

	public function getPhoto(){
		return $this->photo;
	}

	public function getAddress(){
		return $this->address;
	}

	public function getCompany(){
		return $this->company;
	}

	public function getPostcode(){
		return $this->postcode;
	}

	public function getGroup(){
		return $this->group;
	}

	public function getRemarks(){
		return $this->remarks;
	}

	public function getInstantMessaging(){
		return $this->instant_messaging;
	}

	public function getHomepage(){
		return $this->homepage;
	}

	public function getTimestamp(){
		return $this->timestamp;
	}


}



?>
