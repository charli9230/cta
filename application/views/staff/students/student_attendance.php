<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="container">

  <div class="row">

    <h1>STUDENT LIST</h1>

    <hr>

  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th width="10%">Fist Name</th>
            <th width="10%">Last Name</th>
            <th width="10%">Attendance</th>
            <th width="10%">Title</th>
            <th width="10%">Start Date</th>
            <th width="10%">Edit</th>
        </tr>
    </thead>
    
    <tbody>
   <?php if (isset($studAttend)) {?>        
<?php foreach($studAttend as  $the_stud_attend) {  ?>  
        <tr>
            <td><?php echo $the_stud_attend['firstName'] ;?></td>
            <td><?php echo $the_stud_attend['lasrName'] ;?></td>
            <td><?php echo $the_stud_attend['attendance'] ;?></td>
            <td><?php echo $the_stud_attend['title'] ;?></td>
            <td><?php echo $the_stud_attend['startDate'] ;?></td>
            <td>
            <a href="#">Edit <i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a href="#">Cancel <i class="fa fa-ban" aria-hidden="true"></i></a>
            <a href="#">Email <i class="fa fa-envelope-o" aria-hidden="true"></i></a>
            </td>
        </tr>
        <?php } ?>
        <?php } ?>
    </tbody>
</table>
</div>

</div>





