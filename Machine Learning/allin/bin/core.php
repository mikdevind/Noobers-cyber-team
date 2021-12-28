<?php

class Phase1 {
	function __construct($x, $y)
	{
		$this->hasil = array();
		$this->x = $x;
		$this->y = $y;
		$this->n = sizeof($x);
	}
	
	function mean($data)
	{
		sort($data);
		return array_sum($data) / $this->n;
	}

	function RL1()
	{
		$hasil = array();
		for ($i=0; $i<$this->n; $i++)
		{
			array_push($this->hasil, ($this->x[$i] * $this->x[$i]));
		}
		return $this->hasil;
	}
	
	function RL2()
	{
		for ($i=0; $i<$this->n; $i++)
		{
			array_push($this->hasil, ($this->y[$i] * $this->y[$i]));
		}
		return $this->hasil;
	}
	
	function RL3()
	{
		for ($i=0; $i<$this->n; $i++)
		{
			array_push($this->hasil, ($this->x[$i] * $this->y[$i]));
		}
		return $this->hasil;
	}
}
	
class Phase2 {

	function __construct($x, $y, $x2, $y2, $xy, $to)
	{
		$this->x = $x;
		$this->y = $y;
		$this->x2= $x2;
		$this->y2= $y2;
		$this->xy= $xy;
		$this->n = sizeof($xy);
		$this->to = $to;
		$this->hasil = array();
	}
	
	function predict()
	{
		$sin = new Core($this->x, $this->y, $this->x2, $this->y2, $this->xy, $this->to);
		$model1 = $sin->Regresi_Linear_C();
		$model2 = $sin->Regresi_Linear_R();
		
		return $model1 + $model2 * $this->to;
	}

	function RLC()
	{
		$sin = (array_sum($this->y) * array_sum($this->x2) - array_sum($this->x) * array_sum($this->xy));
		$hasil = $this->n * array_sum($this->x2) - (array_sum($this->x) * array_sum($this->x));
		return round($sin / $hasil,2);
	}
	
	function RLR()
	{
		$n = sizeof($this->y);
		$sin = $this->n * array_sum($this->xy) - array_sum($this->x) * array_sum($this->y);
		$cos = $this->n * array_sum($this->x2) - (array_sum($this->x) * array_sum($this->x));
		$this->hasil = round($sin / $cos, 2);
		return $this->hasil;
	}
	
	function persen($data, $to, $menu)
	{
		sort($data);
		$n = sizeof($data);
		if ($menu == 1)
		{
			$x1 = $to * ($n +1) / 100;
			$x2 = explode(".",$x1);
			$ram = $data[($x2[0]-1)] + ($x1 - $x2[0]) * ($data[($x2[0])] - $data[($x2[0]-1)]);
			return $ram;
		}
		else if ($menu == 2)
		{
			$x1 = $to / 100 * $n;
			return $x1;
		}
	}
	
	function statistika($data, $menu)
	{
		if ($menu == "median" || $menu == "modus")
		{
			sort($data);
		}
		$n = sizeof($data);
		if ($menu == "mean")
		{
			return array_sum($data) / $n;	
		}
		else if ($menu == "modus")
		{
			$ram = array_count_values($data);
			return array_search(max($ram), $ram);
		}
		else if ($menu == "median")
		{
			if ($n % 2 != 0)
			{
				return (double)$data[$n / 2];
			}
			else
			{
				$x1 = $data[($n / 2) -1];
				$x2 = $data[$n /2 ];
				return (double)($x1 + $x2) / 2;
			}
		}
		else if ($menu == "std")
		{
			$ram = statistika($data, "mean");
			$x1 = array();
			$x2 = array();
			for ($i=0; $i < $n; $i++)
			{
				array_push($x1, round(($data[$i] - $ram),2));
				array_push($x2, round($x1[$i]*$x1[$i],3));
			}
			$hasil = sqrt(array_sum($x2) / $n);
			return $hasil;
		}
		else if ($menu == "var")
		{
			$ram = statistika($data, "mean");
			$x1 = array();
			$x2 = array();
			for ($i=0; $i<$n; $i++)
			{
				array_push($x1, ($data[$i] - $ram));
				array_push($x2, ($x1[$i]*$x1[$i]));
			}
			$hasil = array_sum($x2) / $n;
			return $hasil;
		}
	}
}

class Core {
	function __construct($x, $y, $to)
	{
		$this->x = $x;
		$this->y = $y;
		$this->to = $to;
	}
		
	function Regresi_Linear_1()
	{
		$sin = new Phase1($this->x, $this->y);
		return $sin->RL1();
	}
	
	function Regresi_Linear_2()
	{
		$sin = new Phase1($this->x, $this->y);
		return $sin->RL2();
	}
	
	function Regresi_Linear_3()
	{
		$sin = new Phase1($this->x, $this->y);
		return $sin->RL3();
	}
	
	
	function Regresi_Linear_C()
	{
		$sin = new Phase1($this->x, $this->y);
		$x2 = $sin->RL1();
		$cos = new Phase1($this->x, $this->y);
		$y2 = $cos->RL2();
		$tang = new Phase1($this->x, $this->y);
		$xy = $tang->RL3();
		
		$o2 = new Phase2($this->x, $this->y, $x2, $y2, $xy, $this->to);
		return $o2->RLC();
		
	}
	
	function Regresi_Linear_R()
	{
		$sin = new Phase1($this->x, $this->y);
		$x2 = $sin->RL1();
		$cos = new Phase1($this->x, $this->y);
		$y2 = $cos->RL2();
		$tang = new Phase1($this->x, $this->y);
		$xy = $tang->RL3();
		
		$o2 = new Phase2($this->x, $this->y, $x2, $y2, $xy, $this->to);
		return $o2->RLR();
	}
	
	function Prediksi()
	{
		$sin = new Phase1($this->x, $this->y);
		$x2 = $sin->RL1();
		$cos = new Phase1($this->x, $this->y);
		$y2 = $cos->RL2();
		$tang = new Phase1($this->x, $this->y);
		$xy = $tang->RL3();
		
		$o2 = new Phase2($this->x, $this->y, $x2, $y2, $xy, $this->to);
		return $o2->predict();
	}
}
?>