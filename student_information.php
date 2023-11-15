<?php
if (isset($_POST['show_info'])) {
    extract($_POST);
    include 'db_conn.php';
?>
    <html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>Student Information</title>
        <link rel="stylesheet" href="css/style-table.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    </head>
    <body>
        <?php
        $que = mysqli_query($con, " SELECT * FROM `tbl_student` WHERE `enrollmentno` = '$ermno' AND `semester`= $sem");
        while ($data = mysqli_fetch_array($que)) {
        ?>

            <form class="box" action="" method="post">
                <table cellpadding="10" class="table">
                    <tr>
                        <th colspan="3">
                            <h2>Student Information</h2>
                        </th>
                    </tr>
                    <tr>
                        <td rowspan="3" align="center"><img src="<?php echo $data[10] ?>" height="120" width="150" alt="Image is Not Found"></td>
                        <td colspan="2"><b>Enrollment No :-</b> <?php echo $data[1] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Name :-</b> <?php echo $data[2] ?></td>
                    </tr>
                    <tr>
                        <td><b>Birth Date :-</b> <?php echo $data[3] ?></td>
                        <td><b>Gender :-</b> <?php echo $data[4] ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Contact No :-</b> <?php echo $data[7] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Stream :-</b> <?php echo $data[8] ?></td>
                        <td colspan="2"><b>Sem :-</b> <?php echo $data[9] ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Address :-</b> <?php echo $data[5] ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>City :-</b> <?php echo $data[6] ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <?php 
                                echo "<a href='index.php' class='btn-group'><i class='fa fa-arrow-left'></i> Back</a>";
                                echo "<a href='student_information_print.php?enrollmentno=$data[1]&semester=$data[9]' class='btn-group'><i class='fa fa-print'></i> Print</a>";
                            ?>
                        </th>
                    </tr>
                </table>
            </form>
        <?php
        }
        ?>
    </body>
    </html>
<?php
}
?>