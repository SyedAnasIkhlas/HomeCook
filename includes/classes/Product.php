<?php 
	class Product
	{
		private $con, $productData;

		public function __construct($con, $cook_id)
		{
			$this->con = $con;

			$query = $this->con->prepare("SELECT * FROM `cook` WHERE id = :cook_id");
			$query->bindParam(":cook_id",$cook_id);
			$query->execute();

			$this->productData = $query->fetch(PDO::FETCH_ASSOC);
		}

		public function getProductId() 
		{
	        return $this->productData["id"];
	    }

	    public function getCountryId() 
		{
	       return  $this->productData["country"];
	    }

	    public function getCountryCode() 
		{
	       $country_id =  $this->productData["country"];
	       $query=$this->con->prepare("SELECT * FROM `countries` WHERE id = :id");
	       $query->bindParam(":id", $country_id);
	       $query->execute();

	       $row_country = $query->fetch(PDO::FETCH_ASSOC);

	       $country = $row_country['code'];

	       return $country;
	    }

	    public function getChefName()
	    {
	    	return  $this->productData["chef"];
	    }

	     public function getChefId()
	    {
	       $chef_name = $this->productData["chef"];
	       $query=$this->con->prepare("SELECT * FROM `chef` WHERE chef_name = :cn");
	       $query->bindParam(":cn", $chef_name);
	       $query->execute();

	       $row_chef_id = $query->fetch(PDO::FETCH_ASSOC);
	       $chef_id = $row_chef_id['id'];

	       return $chef_id;

	    }

	    public function getImage()
	    {
	    	$images_ref = $this->productData["images_ref"];
	       $query=$this->con->prepare("SELECT * FROM `dishes` WHERE images_ref = :ir");
	       $query->bindParam(":ir", $images_ref);
	       $query->execute();

	       $row_image = $query->fetch(PDO::FETCH_ASSOC);
	       $image = $row_image['filepath'];

	       return $image;
	    }

	    

	    //display chef id over here from chef name
	    //display country code from country id
	    //and get image url
	}


 ?>