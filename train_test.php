<?php 
/*TRAIN EXERCISE
WRITE A SAMPLE OF OBJECT ORIENTED PHP CODE THAT CAN ACCOMPLISH THE FOLLOWING IN A MANNER AS CONCISE YET FLEXIBLE AS POSSIBLE. BE SURE TO DEMONSTRATE MASTERY OF INHERITANCE PRINCIPLES (IT'S NOT ENOUGH TO SIMPLY WRITE SOME CODE THAT "WORKS")
A TRAIN IS MADE UP OF A SERIES OF TRAIN CARS.
WRITE TWO CLASSES; "TRAIN" AND "TRAINCAR".
MUST BE ABLE TO:
SET THE WEIGHT OF A TRAINCAR.
GET THE WEIGHT OF A TRAINCAR.
ADD TRAINCARS TO THE TRAIN, EITHER AT THE FRONT OR BACK, WITH A
LIMIT OF 30 CARS.
REMOVE A TRAINCAR FROM EITHER END, REPORTING A PROBLEM IF THERE
ARE NONE LEFT TO REMOVE.
ASK THE TRAIN HOW MANY CARS ARE CURRENTLY IN THE TRAIN.
GET THE TOTAL WEIGHT OF THE TRAIN.
AFTER WRITING THE CLASSES SHOW AN EXAMPLE OF HOW TO USE THEM.
PART II: SHOW THE BEST WAY TO HAVE DIFFERENT TYPES OF TRAINCARS (I.E. CARGO,
PASSENGER, ENGINE, ETC). 

MAKE SURE YOUR SOLUTION PROVIDES US WITH MAXIMUM FLEXIBILITY FOR ADDING FUTURE OPTIONS TO THE INDIVIDUAL TRAINCAR TYPES
*****/

class train{
	public $cars = array();
	
	public function __construct(){
		$this->cars = array();
	}
	
	public function addCar($weight,$front = false){
		if($this->getCarCount() >= 30){
			echo "Train is full no more cars will fit";
			return false;
		}
		$car = new traincar();
		$car->setWeight($weight);
		if($front){
			  array_unshift($this->cars,$car);
		}else{
			  array_push($this->cars,$car);
		}
	}
	
	public function removeCar($front = false){
		if($this->getCarCount() == 0){
			echo "There are no more cars to remove from the train.";
			return false;
		}
		if($front){
			array_shift($this->cars);
		}else{
			array_pop($this->cars);
		}
	}
	
	
	public function totalWeight(){
		$weight = 0;
		foreach($this->cars as $c){
			$weight+= $c->weight;
		}
		return $weight;
	}
	
	public function getCarCount(){
		return count($this->cars);
	}
	
}

class traincar{
	public $weight;
	
	public function __construct($weight){
		$this->weight = $weight;
	}
	
	
	public function setWeight($weight){
		$this->weight = $weight;
	}
	
	public function getWeight(){
		if(intval($weight)){
			return $this->weight;
		}else{
			echo "A car must weigh more than one pound.";
		}
	}
	
}


class specificCar extends traincar{
	public $type;
	function __construct($type,$weight){
		parent::__construct($weight);
		$this->type = $type;
		$this->creator();
	}
	
	public function creator(){
		switch($this->type){
		
		}
	}
	
}


//TEST OF CLASSES TRAIN AND TRAINCAR//
$train = new Train();
for($i = 0; $i < 20; $i++){
	$train->addCar(260,true);
}
echo $train->getCarCount(). " cars are currently on the train<br />";
echo "The weight of the first car is ".number_format($train->cars[0]->weight)." lbs <br />";
echo "The weight of the second car is ".number_format($train->cars[1]->weight)." lbs<br />";
echo "The total weight of the train is ".number_format($train->totalWeight())." lbs<br />";
$train->removeCar();
echo "<br />";
$spec = new specificCar('engine',500);
array_push($train->cars,$spec);
echo $train->getCarCount(). " cars are currently on the train<br />";
$train->cars[0]->setWeight(2000);
echo "The total weight of the train is ".number_format($train->totalWeight())." lbs<br />";
echo "Removing the first car which weighs ".number_format($train->cars[0]->weight)."<br />";
$train->removeCar(true);
echo "Removing the last car which weighs ".number_format($train->cars[$train->getCarCount()-1]->weight)."<br />";
$train->removeCar(false);
echo $train->getCarCount(). " cars are currently on the train<br />";
echo "The total weight of the train is ".number_format($train->totalWeight())." lbs<br />";
//var_dump($train);

echo "<br />";
?>
