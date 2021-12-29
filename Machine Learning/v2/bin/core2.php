<?php
	class Relasi
	{
		function __construct($y, $model)
		{
			$this->y = $y;
			$this->model = $model;
			$this->n = sizeof($y);
		}
		
		function Get_Y1()
		{
			$hasil = array();
			for ($i = 0; $i < $this->n; $i++)
			{	
				array_push($hasil, (($this->model[1] * $this->y[$i]) + $this->model[0]));
			}
			return $hasil;
		}
		
		function Get_Y2($mean)
		{
			$hasil = array();
			for ($i = 0; $i < $this->n; $i++)
			{
				$sin = $this->y[$i] - $mean;
				array_push($hasil, ($sin * $sin));
			}
			return $hasil;
		}
	}
?>