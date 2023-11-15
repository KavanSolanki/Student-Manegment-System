<?php
    include 'db_conn.php';    
    $enrollmentno = $_GET['enrollmentno'];
    $semester = $_GET['semester'];
    $que = mysqli_query($con, " SELECT * FROM `tbl_student` WHERE `enrollmentno` = '$enrollmentno' AND `semester`= $semester");
    while ($data = mysqli_fetch_array($que))
    {        
        require("fpdf/fpdf.php");
        $pdf=new fpdf();
        $pdf->addpage();
        $pdf->setfont("Times","",20);
        $pdf->Cell(190,20,'Student Information', 1,0, 'C'); 
        $pdf->ln();
        $pdf->setfont("Times","",14);
        $pdf->Cell(50,36,'', 1,0, 'C');
        $pdf->image($data[10],12,32,46,32);
        $x = $pdf->GetX();
        $pdf->Cell(35,12,'Enrollment No :-', "LTB",0);
        $pdf->Cell(105,12,$data[1], "RTB",0);
        $pdf->ln();
        $pdf->SetX($x);
        $pdf->Cell(20,12,'Name :-', "LTB",0);
        $pdf->Cell(120,12,$data[2], "RTB",0);
        $pdf->ln();
        $pdf->SetX($x);
        $pdf->Cell(27,12,'Birth Date :- ', "LTB",0);
        $pdf->Cell(50,12,$data[3], "RTB",0);
        $pdf->Cell(20,12,'Gender :- ', "LTB",0);
        $pdf->Cell(43,12,$data[4], "RTB",0);
        $pdf->ln();
        $pdf->Cell(28,12,'Contact No :- ', "LTB",0, 'L'); 
        $pdf->Cell(162,12,$data[7], "RTB",0);
        $pdf->ln();
        $pdf->Cell(20,12,' Stream:- ', "LTB",0);
        $pdf->Cell(92,12,$data[8],"RTB",0);
        $pdf->Cell(25,12,'Semester :- ', "LTB",0, 'L'); 
        $pdf->Cell(53,12,$data[9], "RTB",0);
        $pdf->ln();
        $pdf->Cell(22,12,'Address :- ', "LTB",0, 'L'); 
        $pdf->Cell(168,12,$data[5], "RTB",0);
        $pdf->ln();
        $pdf->Cell(16,12,'City :- ', "LTB",0, 'L'); 
        $pdf->Cell(174,12,$data[6], "RTB",0);
        $pdf->ln();
        $pdf->output($data[2].'.pdf',"I");
    }
?>