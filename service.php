<?php
class Service extends Database{
	protected $productId;
	protected $productName;
	protected $days;
	protected $noOfImages;
	protected $editPhoto;
	protected $freeMakeUp;
	
	public function add($productId,$productName,$days,$noOfImages,$editPhoto,$freeMakeUp)
	{
		$this->query('INSERT INTO photodb.service(productId,productName,days,noOfImages,editPhoto,freeMakeUp) VALUES(:productId,:productName,:days,:noOfImages,:editPhoto,:freeMakeUp)');
		//binding.them
		$this->bind(':productId', $productId);
		$this->bind(':productName',$productName);
		$this->bind(':days',$days);
		$this->bind(':noOfImages',$noOfImages);
		$this->bind(':editPhoto',$editPhoto);
		$this->bind(':freeMakeUp',$freeMakeUp);
		//execute
		$this->execute();
		//insertID
		
		header('Location:hhtp://localhost/pixelooks/formAddService.php');
		
		return;
	}
	public function erase($productId)
	{
		$this->query('DELETE FROM photodb.service WHERE productId = :productId ');
		$this->bind(':productId',$productId);
		$this->execute();
		header('Location:http://localhost/pixelooks/formAddService.php');
		return;
	}
	public function edit($productId,$productName,$days,$noOfImages,$editPhoto,$freeMakeUp)
	{
		
		$this->query('UPDATE photodb.service SET productId= :productId,productName = :productName,days = :days,noOfImages = :noOfImages,editPhoto = :editPhoto,freeMakeUp = :freeMakeUp WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$this->bind(':productName', $productName);
		$this->bind(':days', $days);
		$this->bind(':noOfImages', $noOfImages);
		$this->bind(':editPhoto', $editPhoto);
		$this->bind(':freeMakeUp', $freeMakeUp);
		$this->execute();
		header('Location:http://localhost/pixelooks/formAddService.php');
		return;
	}
	public function getProductId($productId)
	{
		$this->query('SELECT * FROM photodb.service WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$id=$row['productId'];
		return $id;
		
	}
	public function getProductName($productId)
	{
		$this->query('SELECT * FROM photodb.service WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$name=$row['productName'];
		return $name;
		
	}
	public function getDays($productId)
	{
		$this->query('SELECT * FROM photodb.service WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$days=$row['days'];
		return $days;
		
	}
	public function getNoOfImages($productId)
	{
		$this->query('SELECT * FROM photodb.service WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$images=$row['noOfImages'];
		return $images;
		
	}
	public function getEditPhoto($productId)
	{
		$this->query('SELECT * FROM photodb.service WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$edit=$row['editPhoto'];
		return $edit;
		
	}
	public function getFreeMakeUp($productId)
	{
		$this->query('SELECT * FROM photodb.service WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$makeUp=$row['freeMakeUp'];
		return $makeUp;
		
	}


}