<?php
class Camera extends Database{
	
	protected $productId;
	protected $productName;
	protected $price;
	protected $brand;
	protected $valuePixel;
	protected $shutterSpeed;
	protected $resolution;
	
	public function add($productId,$productName,$price,$brand,$valuePixel,$shutterSpeed,$resolution)
	{
		$this->query('INSERT INTO photodb.camera(productId,productName,price,brand,valuePixel,shutterSpeed,resolution) VALUES (:productId,:productName,:price,:brand,:valuePixel,:shutterSpeed,:resolution)');	
		//binding them
		$this->bind(':productId',$productId);
		$this->bind(':productName',$productName);
		$this->bind(':price',$price);
		$this->bind(':brand',$brand);
		$this->bind(':valuePixel',$valuePixel);
		$this->bind(':shutterSpeed',$shutterSpeed);
		$this->bind(':resolution',$resolution);
		//execute 
		$this->execute();
		//insertID	
				
		header('Location:http://localhost/pixelooks/formAddCamera.php');
		
		return;	
		
	}
	public function erase($productId)
	{
		$this->query('DELETE FROM photodb.camera WHERE productId = :productId ');
		$this->bind(':productId',$productId);
		$this->execute();
		header('Location:http://localhost/pixelooks/formAddCamera.php');
		return;
	}
	public function edit($productId,$productName,$price,$brand,$valuePixel,$shutterSpeed,$resolution)
	{
		
		$this->query('UPDATE photodb.camera SET productId= :productId,productName = :productName,price = :price,brand = :brand,valuePixel = :valuePixel,shutterSpeed = :shutterSpeed,resolution = :resolution WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$this->bind(':productName', $productName);
		$this->bind(':price', $price);
		$this->bind(':brand', $brand);
		$this->bind(':valuePixel', $valuePixel);
		$this->bind(':shutterSpeed', $shutterSpeed);
		$this->bind(':resolution', $resolution);
		$this->execute();
		
		header('Location:http://localhost/pixelooks/formAddCamera.php');
		return;
	}
	public function getProductId($productId)
	{
		$this->query('SELECT * FROM photodb.camera WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$id=$row['productId'];
		return $id;
		
	}
	public function getPrice($productId)
	{
		$this->query('SELECT * FROM photodb.camera WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$price=$row['price'];
		return $price;
		
	}
	public function getProductName($productId)
	{
		$this->query('SELECT * FROM photodb.camera WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$name=$row['productName'];
		return $name;
		
	}
	public function getBrand($productId)
	{
		$this->query('SELECT * FROM photodb.camera WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$brand=$row['brand'];
		return $brand;
		
	}
	public function getValuePixel($productId)
	{
		$this->query('SELECT * FROM photodb.camera WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$pixel=$row['valuePixel'];
		return $pixel;
		
	}
	public function getShutterSpeed($productId)
	{
		$this->query('SELECT * FROM photodb.camera WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$shutter=$row['shutterSpeed'];
		return $shutter;
		
	}
	public function getResoultion($productId)
	{
		$this->query('SELECT * FROM photodb.camera WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$resolution=$row['resolution'];
		return $resolution;
		
	}
}