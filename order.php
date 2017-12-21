<?php
class Order extends Database{
	
	public function insertCart($sessionId,$qty,$productId)
	{
		$this->query('SELECT*FROM photodb.cart where productId=:productId AND sessionId=:sessionId');
		$this->bind(':sessionId',$sessionId);
		$this->bind(':productId',$productId);
		$this->execute();
		$row=$this->single();
		if($row)
		{
			$this->query('UPDATE photodb.cart SET qty =:qty WHERE sessionId = :sessionId AND productId=:productId');
			$this->bind(':sessionId',$sessionId);
			$this->bind(':qty',$qty);
			$this->bind(':productId',$productId);
			$this->execute();
			
		}
		else
		{
			$this->query('INSERT INTO photodb.cart(sessionId,qty,productId) VALUES (:sessionId,:qty,:productId)');
			$this->bind(':sessionId',$sessionId);
			$this->bind(':qty',$qty);
			$this->bind(':productId',$productId);
			$this->execute();
		}
		
		
		return;
	}
	public function updateCart($sessionId,$qty)
	{
		$this->query('UPDATE photodb.cart SET qty =:qty WHERE sessionId = :sessionId');
		$this->bind('qty',$qty);
		$this->bind('sessionId',$sessionId);
		
		return;
	}
	public function deleteCart($productId)
	{
		$this->query('DELETE FROM photodb.cart WHERE productId =:productId');
		$this->bind(':productId',$productId);
		$this->execute();
		return;
	}
	public function insertOrder($orderId,$productId,$receiverId,$orderDate,$qty)
	{
		$this->query('INSERT INTO photodb.order (orderId,productId,receiverId,orderDate,qty) VALUES(:orderId,:productId,:receiverId,:orderDate,:qty)');
		$this->bind('orderId',$orderId);
		$this->bind('orderDate',$orderDate);
		$this->bind('productId',$productId);
		$this->bind('receiverId',$receiverId);
		$this->bind('qty',$qty);
		$this->execute();
		return;
	}
	public function deleteOrder($orderId)
	{
		$this->query('DELETE FROM photodb.order WHERE orderId = :orderId');
		$this->bind('orderId',$orderId);
		$this->execute();
		return;
	}
	
	
	
	
}