<?php include_once('../shared/_headerview.php') ?>
<?php include_once('../../../application/classes/TicketService.php') ;?>
<?php include_once('../../../application/classes/UserService.php') ;?>

<?php
$userservice  = new UserService();
$ticketservice = new TicketService();

$totalnumberstudents= $userservice->getTotalStudents();
$totalstaff = $userservice->getTotalStaff();
$hottickets= $ticketservice->getTotalHotTickets();
$alltickets= $ticketservice->getAll();
$staffproductivity= $ticketservice->getAvgTicketsDuration();

?>

    <!-- Page Content -->   
   <!-- print User name and Id -->
    <div class="jumbotron">    
        <h3 style="text-align: center;">   System reports </h3>
</div>
 
       
<body>
    <div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-4"> 
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Number Of Students</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $totalnumberstudents . " Students"?>
                    </div>
                </div>
            </div>
            <div class="col-md-4"> 
            <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Number Of Staff Members</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $totalstaff . " Staff members"?>
                    </div>
                </div>
            </div>
            <div class="col-md-4"> 
            <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Hot Tickets</h3>
                    </div>
                    <div class="panel-body">
                        <?php 
                        if ($totalnumberstudents>1)
                        {
                            echo $totalnumberstudents . " Hot tickets";
                        }
                        else
                        {
                            echo $totalnumberstudents . " Hot ticket";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"> 
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tickets</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                            //4
                            $accepted=0;
                            //5
                            $rejected=0;
                            //2
                            $pending=0;
                            //1
                            $new=0;
                            //3
                            $return=0;

                            foreach ($alltickets as $ticket)
                            {
                                switch($ticket[0])
                                {
                                    //new
                                    case 1: $new+=1; break;
                                    //pending
                                    case 2: $pending+=1; break;
                                    //return
                                    case 3: $return+=1; break;
                                    //pending
                                    case 4: $accepted+=1; break;
                                    //rejected
                                    case 5: $rejected+=1; break;
                                }
                            }

                            echo '<table class="table">';
                                echo '<tr>';
                                    echo '<th> New </th>';
                                    echo '<td>'.$new. '</td>';
                                echo '</tr>'; 
                                echo '<tr>';
                                    echo '<th> Pending </th>';
                                    echo '<td>'.$pending. '</td>';
                                echo '</tr>'; 
                                echo '<tr>';
                                    echo '<th> Return </th>';
                                    echo '<td>'.$return. '</td>';
                                echo '</tr>';  
                                echo '<tr>';
                                    echo '<th> Accepted </th>';
                                    echo '<td>'.$accepted. '</td>';
                                echo '</tr>';       
                                echo '<tr>';
                                    echo '<th> Rejected </th>';
                                    echo '<td>'.$rejected. '</td>';
                                echo '</tr>';                         
                            echo '</table>';
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4"> 
            <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Staff Productivity Index</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        echo '<table>';
                        echo '<tr class="warning"> <td class="column-spacing"> Member </td> <td class="column-spacing"> Index </td><td class="column-spacing"> Time </td></tr>';
                        foreach ($staffproductivity as $staffmember)
                        {
                            $timeinhours =(int) (($staffmember[0]/60)/60)/60;
                            echo '<tr> <td class="column-spacing">'. $staffmember[1] .'</td> <td class="column-spacing">'.((int)$timeinhours).'</td><td class="column-spacing"> '. (int)$staffmember[0]. '</td></tr>';
                        }
                        echo '</table>'
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4"> 
            <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">Panel title</h3>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-4"> 
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
        </div>
        <div class="col-md-4"> 
        <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
        </div>
        <div class="col-md-4"> 
        <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
        </div>
    </div>
    <div class="container">
</div>
</body>

        
       
    <!-- Footer -->
<?php include_once('../shared/_footerview.php') ?>