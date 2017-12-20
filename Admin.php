<?php

class AdminModel extends Database
{
	protected $adminId;
	protected $adminName;
	protected $username;
	protected $password;
	
	
	public function register($adminName,$username,$password)
	{
		
		//add a record
		$this->query('INSERT INTO photodb.admin(adminName,username,password) VALUES (:adminName,:username,:password)');	
		//binding them
		$this->bind(':adminName',$adminName);
		$this->bind(':username',$username);
		$this->bind(':password',$password);
		//execute 
		$this->execute();
		//insertID	
		if($this->lastInsertId())
		{
			header('Location:http://localhost/pixelooks/loginAdmin.php');
		}
		
		return;	
		
	}
	public function login($username,$password)
	{
		//give query for find a record
		$this->query('SELECT * FROM photodb.admin WHERE username = :username AND password = :password');	
		$this->bind(':username',$username);
		$this->bind(':password',$password);
		//fetch data
		$row = $this->single();
		if($row)
		{//if log in success
			$_SESSION['is_logged_in']= true;
			$_SESSION['user_data'] = array(
				"adminId" => $row['adminId'],//to show them in the page after success login
				"adminName" => $row['adminName'],
				"username" => $row['username']
			);
			header('Location:http://localhost/pixelooks/formAddCamera.php');
		}
		else
		{
			header('Location:http://localhost/pixelooks/loginAdmin.php');
		}
		return;
	}
	public function logout()
	{
		unset($_SESSION['is_loggged_in']);
		unset($_SESSION['user_data']);
		session_destroy();//end of session_cache_expire
		header('Location:http://localhost/pixelooks/loginAdmin.php');
	}
}