
<?php 

/*
if(empty($_SESSION['EmployeeListNO'])){
    echo '<script>window.location.href="logout.php"</script>';
 

}*/
include  "Controller/EvaluatorPanelController.php";

$_SESSION['activepanel'] = "EvaluatorPanel";
include('templates/header.php'); 
include('templates/header2.php'); 


$activeform1 = "EvaluatorPanel";


$sql11 = "
Select * FROM accessformlist 

INNER JOIN deptformlist
ON accessformlist.FormID = deptformlist.FormID


WHERE accessformlist.EmployeeIDNo ='$userid' AND deptformlist.DeptCode = '$Department' AND accessformlist.Status <> 'Removed' AND deptformlist.FormName = '$activeform1'";


            $result11 = $con->query($sql11);
            if ($result11->num_rows > 0) {
             
            }else{
         
              echo '<script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href="Dashboard.php" );
            }</script>'; 

    
            }


?>



<style>
  .newline-container {
    white-space: pre-line; /* Preserves line breaks and collapses extra spaces */

  }
</style>


       <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        
      
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        



<div class="">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 style="float: left;" class="m-0 font-weight-bold text-primary">Employee Performance Evaluation </h3>
                

            </div>












            <div class="card-body">

              

              <div class="row">

                 <div class="col-sm-3">
                      <div class="form-group">
                          <label> Employee's Name </label>
                          <input type="text" name="" class="form-control"  id='searchByName' />
                      </div>
                  </div>

           




              </div>




                    <!-- Table -->
                <div class="table-responsive">
                     <table class="table table-bordered" id="empTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                          <th scope="col">EvaluationNo</th>
                            <th scope="col">IDNO</th>
                            <th scope="col">Name</th>
                            <th scope="col">Department</th>
                            <th scope="col">Section</th>
                            <th scope="col">JobTitle</th>
                            <th scope="col">Project</th>
                            <th scope="col">Evaluation</th>
                            <th scope="col">Evaluation Type</th>
                            <th scope="col">Status</th>
                         
                            <th scope="col">Action</th>
                 
                            
           
                        </tr>
                        </thead>
                        
                    </table>
                </div>


<div id="createmodal" class="modal fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <form method="post">
                <div class="modal-content">
                    <div class="modal-header pd-x-20">
                        <h6 class="modal-title"> New Employee </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body pd-20">

                    <div class="row">
                        <div class="col-sm-4">

                            <div class="form-group">
                                <label> Employee ID </label>
                                <input type="text"  name="EmployeeIDNo" class="form-control" placeholder="Employee ID" required />
                            </div>
                        </div>
                     </div>
                        
                    <div class="row">

                        <div class="col-sm-4">

                            <div class="form-group">
                                <label> Company </label>
                                  <select name="Company" class="form-control" required>
          
                                     <option value=""> Select Company</option>
                                      <option selected value="APSI">APSI</option>

                                      <option value="LJ">LJ</option>


                                    
                                     
                                    </select> 
                            </div>
                        </div>


                          <div class="col-sm-6">

                                <div class="form-group">
                                    <label> Department </label>
                                        <select name="Department" class="form-control"  required />
                                          <option value="">Select Department</option>
                                           <?php 
                                            $sql7 = "Select * FROM departmentlist";
                                            $result7 = $con->query($sql7);
                                            if ($result7->num_rows > 0) {
                                                while($row7 = $result7->fetch_assoc()) {
                                                   
                                                    $Department = $row7['Department'];
                                                    $DepartmentCode = $row7['DepartmentCode'];

                                                    ?>
                                                     <option value="<?php echo $DepartmentCode ?>"><?php echo $Department ?></option>

                                                                <?php  } } ?>

                                        </select>
                                </div>
                            </div>
                          </div>


                    <div class="row">
                        <div class="col-sm-4">

                            <div class="form-group">
                                <label> Surname </label>
                                <input type="text"  name="Surname" class="form-control" placeholder="Surname" required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label> First Name </label>
                                <input type="text" name="Firstname" class="form-control" placeholder="First Name" required/>
                            </div>
                        </div>

                         <div class="col-sm-2">
                            <div class="form-group">
                                <label> Middle Name </label>
                                <input type="text" name="Middle" class="form-control" placeholder="Middle" required/>
                            </div>
                        </div>


                         <div class="col-sm-2">
                            <div class="form-group">
                                <label> Suffix </label>
                                <input type="text" name="Suffix" class="form-control" placeholder="Suffix" />
                            </div>
                        </div>




                    </div>


                    <div class="row">

                        <div class="col-sm-7">

                                <div class="form-group">
                                    <label> Job Title </label>
                                        <select name="JobTitle" class="form-control"  required />
                                          <option value="">Select Job Title</option>
                                           <?php 
                                            $sql7 = "Select * FROM jobtitlelist";
                                            $result7 = $con->query($sql7);
                                            if ($result7->num_rows > 0) {
                                                while($row7 = $result7->fetch_assoc()) {
                                                   
                                                    $JobTitle = $row7['JobTitle'];

                                                    ?>
                                                     <option value="<?php echo $JobTitle ?>"><?php echo $JobTitle ?></option>


                                
                                                                <?php

                                                              }
                                                            }

                                                     ?>

                                        </select>
                                </div>
                            </div>

                         



                           


                    </div>


                     <div class="row">
                                 <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> Account Description</label>
                                        <textarea name="Description" class="form-control form-control-sm" rows="3"  required></textarea>
                                    </div>
                                </div>
                           </div>







                    





                </div>


                    <div class="modal-footer">

                 <button type="submit" name="btn-create1"  class="btn btn-success" onclick="return confirm('Are you sure?')"><span class="fa fa-save mr-2" ></span> Add </button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban mr-2"></i> Cancel </button>
                </div>
            </div>
        </form>
        </div>
</div>




                             
                        </div>


                    </div>

  </div>




 <div id="ChangePasswordModal" class="modal fade" data-backdrop="static" data-keyboard="false">
                                
                                <div class="modal-dialog modal-sm" role="document">
                                    <form method="POST" >
                                        <div class="modal-content">
                                            <div class="modal-header pd-x-20">
                                                <h6 class="modal-title"> Change Username Password </h6>
                                                <button type="button" class="close close2" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body pd-20">


                                                <?php
                                                    $sql999 = "SELECT  * FROM accounts WHERE no = '$userid' ";
                                                    $result999 = $con->query($sql999);
                                                         if ($result999->num_rows > 0) {
                                                             while($row999 = $result999->fetch_assoc()) {  ?>

                                                
                                                <input type="hidden" name="id" value="<?php echo $row999['no'];?>">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <input type="text" name="UserName" value="<?php echo $row999['UserName'];?>" placeholder="Enter Username " class="form-control" readonly>
                                                        </div>
                                                    </div>

                                                     <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <input type="Pass" name="Password"  placeholder="Enter New Password " class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <?php } } ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="btn-changeuserpass" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-key mr-2"></i> Yes </button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban mr-2"></i> No </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
    </div>


<div id="EditAccountModal" class="modal fade" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm" role="document">
                <form method="post">
                    <div class="modal-content">
                        <div class="modal-header pd-x-10">
                            <h6 class="modal-title"> Edit Account Details</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="modal-body pd-20">

                                 <?php
                                    $sql999 = "SELECT  * FROM accounts WHERE no = '$userid' ";
                                    $result999 = $con->query($sql999);
                                         if ($result999->num_rows > 0) {
                                             while($row999 = $result999->fetch_assoc()) {  ?>

                                 <div class="row">

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> Account No </label>
                                            <input type="text" name="no" class="form-control" value = "<?php echo $row999['no'];?>" readonly/>
                                        </div>
                                    </div>
                                     <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> Surname </label>
                                            <input type="text" name="Surname" class="form-control"  placeholder="Enter Surname" Value = "<?php echo $row999['Surname'];?>" required/>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> Firstname </label>
                                            <input type="text" name="Firstname" class="form-control"  placeholder="Enter FirstName"  value = "<?php echo $row999['Firstname'];?>" required/>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> Middle Initial </label>
                                            <input type="text" name="middle" class="form-control" placeholder="Enter Middle Initial"  value = "<?php echo $row999['middle'];?>" required/>
                                        </div>
                                    </div>

                                 
                                      <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> Status </label>
                                            <input type="text" name="No" class="form-control" value = "<?php echo $row999['Status'];?>" readonly/>
                                        </div>
                                    </div>


                                      <div class="col-sm-12">
                                        <div class="form-group">
                                            <label> Date Added </label>
                                            <input type="text" name="No" class="form-control" value = "<?php echo $row999['DateAdded'];?>" readonly/>
                                        </div>
                                    </div>
                                </div>

                                <?php } } ?>

                                                    
                            </div>

                        <div class="modal-footer">
                        
                
                     <button type="submit" name="btn-userupdate" class="btn btn-warning" onclick="return confirm('Are you sure?')"><span class="fa fa-save mr-2" ></span> Update </button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban mr-2"></i> Close </button>


                        </div>


                    </div>
                </form>
            </div>
    </div>  




    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post">
                    
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"> Are you sure you want to leave?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="btn-logout" class="btn btn-primary" value="Logout">   
                </div>
                </form>
            </div>
        </div>
    </div>




<!-- modal for session -->
<div id="session_modal" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header pd-x-20">
                <h6 class="modal-title"> SESSION has expired, you will be directed to login automatically, in <span id="count">0 seconds</span>... </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body pd-20">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <center>
                                
                            <h4> Do you still want to continue? </h4>
                            </center>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" id="btn_session_yes" class="btn btn-warning"><i class="fa fa-check mr-2"></i> Yes </button>
                <form action="" class="logout" method="post">
                    <button  type="submit" name="btn_logout" class="btn btn-secondary" ><i class="fa fa-times mr-2"></i> No </button>
                </form>
            </div>
        </div>
    </div>
</div>





   <?php include('templates/footer1.php'); ?> 





  <script>
        $(document).ready(function(){
            var dataTable = $('#empTable').DataTable({
                 "order": [[ 0, "asc" ]],
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'searching': false,// Remove default Search Control
                'ajax': {
                    'url':'ajaxEvaluatorPanel.php',
                    'data': function(data){
                        // Read values

                        var depart = $('#searchByDepartment').val();
                        var name = $('#searchByName').val();
                        var Status = $('#searchByStatus').val();
                        var OnlineAccount = $('#searchByOnlineAccount').val();

                        // Append to data
                   
                        data.searchByDepartment = depart;
                        data.searchByName = name;
                        data.searchByStatus = Status;
                        data.searchByOnlineAccount = OnlineAccount;



                    
                    }
                },
                'columns': [
                { data: 'HREvaluationNo' },
                 { data: 'EmployeeIDNo' },
                    { data: 'Name' },
                     { data: 'Department' },
                     { data: 'Section' },
                    { data: 'JobTitle' },
                    { data: 'Project' },
                    { data: 'Evaluation' },
                     { data: 'EvaluationType' },
                      { data: 'Status' },
    
                      { data: 'action' },
    
                ]
            });


         

             $('#searchByName').keyup(function(){
                dataTable.draw();
            });

            $('#searchByDepartment').change(function(){
                dataTable.draw();
            });

            $('#searchByStatus').change(function(){
                dataTable.draw();
            });

            $('#searchByOnlineAccount').change(function(){
                dataTable.draw();
            });

       
        });
        </script>

