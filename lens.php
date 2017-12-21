<?php
class Lens extends Database{
	protected $productId;
	protected $productName;
	protected $price;
	protected $brand;
	protected $focalLength;
	protected $angelOfView;
	protected $formatCompability;
	
	public function add($productId,$productName,$price,$brand,$focalLength,$angleOfView,$formatCompability)
	{
		$this->query('INSERT INTO photodb.lens(productId,productName,price,brand,focalLength,angleOfView,formatCompability) VALUES(:productId,:productName,:price,:brand,:focalLength,:angleOfView,:formatCompability)');
		//binding.them
		$this->bind(':productId',$productId);
		$this->bind(':productName',$productName);
		$this->bind(':price',$price);
		$this->bind(':brand',$brand);
		$this->bind(':focalLength',$focalLength);
		$this->bind(':angleOfView',$angleOfView);
		$this->bind(':formatCompability',$formatCompability);
		//execute
		$this->execute();
		//insertID
		
		header('Location:hhtp://localhost/pixelooks/formAddLens.php');
		
		return;
	}
	public function erase($productId)
	{
		$this->query('DELETE FROM photodb.lens WHERE productId = :productId ');
		$this->bind(':productId',$productId);
		$this->execute();
		header('Location:http://localhost/pixelooks/formAddLens.php');
		return;
	}
	public function edit($productId,$productName,$price,$brand,$focalLength,$angleOfView,$formatCompability)
	{
		
		$this->query('UPDATE photodb.lens SET productId= :productId,productName = :productName,price = :price,brand = :brand,focalLength = :focalLength,angleOfView = :angleOfView,formatCompability = :formatCompability WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$this->bind(':productName', $productName);
		$this->bind(':price', $price);
		$this->bind(':brand', $brand);
		$this->bind(':focalLength', $focalLength);
		$this->bind(':angleOfView', $angleOfView);
		$this->bind(':formatCompability', $formatCompability);
		$this->execute();
		
		header('Location:http://localhost/pixelooks/formAddLens.php');
		return;
	}
	public function getProductId($productId)
	{
		$this->query('SELECT * FROM photodb.lens WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$id=$row['productId'];
		return $id;
		
	}
	public function getPrice($productId)
	{
		$this->query('SELECT * FROM photodb.lens WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$price=$row['price'];
		return $price;
		
	}
	public function getProductName($productId)
	{
		$this->query('SELECT * FROM photodb.lens WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$name=$row['productName'];
		return $name;
		
	}
	public function getBrand($productId)
	{
		$this->query('SELECT * FROM photodb.lens WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$brand=$row['brand'];
		return $brand;
		
	}
	public function getFocalLength($productId)
	{
		$this->query('SELECT * FROM photodb.lens WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$focalLength=$row['focalLength'];
		return $focalLength;
		
	}
	public function getAngleOfView($productId)
	{
		$this->query('SELECT * FROM photodb.lens WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$angleOfView=$row['angleOfView'];
		return $angleOfView;
		
	}
	public function getFormatCompability($productId)
	{
		$this->query('SELECT * FROM photodb.lens WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$formatCompability=$row['formatCompability'];
		return $formatCompability;
		
	}

}