<?php
class Photo extends Database{
	protected $productId;
	protected $productName;
	protected $price;
	protected $photoTheme;
	protected $fileName;
	
	public function add($productId,$productName,$price,$photoTheme,$photoFile)
	{
		$this->query('INSERT INTO photodb.photo(productId,productName,price,photoTheme,photoFile) VALUES(:productId,:productName,:price,:photoTheme,:photoFile)');
		//binding.them
		$this->bind(':productId',$productId);
		$this->bind(':productName',$productName);
		$this->bind(':price',$price);
		$this->bind(':photoTheme',$photoTheme);
		$this->bind(':photoFile',$photoFile);
		//execute
		$this->execute();
		//insertID
		
		header('Location:hhtp://localhost/pixelooks/formAddPhoto.php');
		
		return;
	}
		public function erase($productId)
	{
		$this->query('DELETE FROM photodb.photo WHERE productId = :productId ');
		$this->bind(':productId',$productId);
		$this->execute();
		header('Location:http://localhost/pixelooks/formAddPhoto.php');
		return;
	}
	public function edit($productId,$productName,$price,$photoTheme,$fileName)
	{
		
		$this->query('UPDATE photodb.photo SET productId= :productId,productName = :productName,price = :price,photoTheme = :photoTheme,fileName = :fileName WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$this->bind(':productName', $productName);
		$this->bind(':price', $price);
		$this->bind(':photoTheme', $photoTheme);
		$this->bind(':fileName', $fileName);
		
		$this->execute();
		
		header('Location:http://localhost/pixelooks/formAddPhoto.php');
		return;
	}
	public function getProductId($productId)
	{
		$this->query('SELECT * FROM photodb.photo WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$id=$row['productId'];
		return $id;
		
	}
	public function getPrice($productId)
	{
		$this->query('SELECT * FROM photodb.photo WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$price=$row['price'];
		return $price;
		
	}
	public function getProductName($productId)
	{
		$this->query('SELECT * FROM photodb.photo WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$name=$row['productName'];
		return $name;
		
	}
	public function getPhotoTheme($productId)
	{
		$this->query('SELECT * FROM photodb.photo WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$photoTheme=$row['photoTheme'];
		return $photoTheme;
		
	}
	public function getPhotoFile($productId)
	{
		$this->query('SELECT * FROM photodb.photo WHERE productId = :productId ');
		$this->bind(':productId', $productId);
		$row = $this->single();
		$photoFile=$row['fileName'];
		return $photoFile;
		
	}

}
