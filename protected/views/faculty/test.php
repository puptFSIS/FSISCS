<?php
	function blankFields() {
		if(strlen($Ename)==0) {
			$this->SetXY(37.25,242.25);
			$this->Cell(52,9,'',1,0,'L', False); // NAME OF SCHOOL
			$this->Cell(24,9,'',1,0,'C', False); // DEGREE COURSE
			$this->Cell(15,9,'',1,0,'C', False); // YEAR GRADUATED
			$this->Cell(22,9,'',1,0,'C', False); // UNITS EARNED
			$this->Cell(17,9,'',1,0,'C', False); // INC DATE FROM
			$this->Cell(16,9,'',1,0,'C', False); // INC DATE TO
			$this->Cell(25,9,'',1,0,'C', False); // ACADEMIC AWARDS
		}
		
		if(strlen($Sname)==0) {
			$this->SetXY(37.25,251.25);
			$this->Cell(52,9,'',1,0,'L', False); // NAME OF SCHOOL
			$this->Cell(24,9,'',1,0,'C', False); // DEGREE COURSE
			$this->Cell(15,9,'',1,0,'C', False); // YEAR GRADUATED
			$this->Cell(22,9,'',1,0,'C', False); // UNITS EARNED
			$this->Cell(17,9,'',1,0,'C', False); // INC DATE FROM
			$this->Cell(16,9,'',1,0,'C', False); // INC DATE TO
			$this->Cell(25,9,'',1,0,'C', False); // ACADEMIC AWARDS
		}
	}
?>