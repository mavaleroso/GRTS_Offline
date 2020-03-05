<div class="card card-1 shadow mb-5 animated fadeIn">
	<div class="card-header">
        <div class="card-title m-0 p-0 h6"><i class="fas fa-list mr-2"></i>Grievance list</div>
	</div>
	<div class="card-body">
        <div class="export-options row p-2 mb-2">
            <div class="col-lg-3 d-flex p-2">
                <label for="from-month" class="export-label mr-auto">From: </label>
                <select id="from-month" class="export-field ml-auto">
                    <option value="0"selected></option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <div class="col-lg-3 d-flex p-2">
                <label for="to-month" class="export-label mr-auto">To: </label>
                <select id="to-month" class="export-field ml-auto">
                    <option value="0" selected></option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <div class="col-lg-3 d-flex p-2">
                <label for="year" class="export-label mr-auto">Year: </label>
                <select id="year" class="export-field ml-auto">
                    <option value="0" selected></option>
                    <?php 
                        foreach ($year as $key => $value) {
                            echo '<option value="'.$value->years.'">'.$value->years.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="col-lg-3 d-flex p-2">
                <button id="btn-filter" class="d-block m-auto btn btn-primary"><i class="fas fa-filter mr-2"></i>Filter</button>
                <button id="btn-export" class="d-block m-auto btn btn-success"><i class="fas fa-file-csv mr-2"></i>Export</button>
            </div>
        </div>
        <hr>
    	<table id="tbl-grievance" class="display nowrap table table-striped table-borderless animated fadeIn w-100">
            <thead>
                <tr class="tbl-row">
                    <th>ID</th>
                    <th>Beneficiary ID</th>
                    <th>Membership</th>
                    <th>Tracking #</th>
                    <th>Fullname</th>
                    <th>Sex</th>
                    <th>Household ID</th>
                    <th>Household Set</th>
                    <th>Purok</th>
                    <th>Barangay</th>
                    <th>City/Muncipality</th>
                    <th>Province</th>
                    <th>Region</th>
                    <th>Contact #</th>
                    <th>Category</th>
                    <th>Category ID</th>
                    <th>Sub-category</th>
                    <th>Sub Category ID</th> 
                    <th>Description</th>
                    <th>Resolution</th>
                    <th>Filed Location</th>
                    <th>Assist By</th>
                    <th>Date Encode</th>
                    <th>Date Intake</th>
                    <th>Subject Complaint</th>
                    <th>RCA</th>
                    <th>RCA ID</th>       
                    <th>GBV Sex</th>
                    <th>GBV Age</th>
                    <th>Report Mode</th>
                    <th>P1</th>
                    <th>P2</th>
                    <th>P3</th>
                    <th>P4</th>
                    <th>P5</th>
                    <th>P6</th>
                    <th>P1 ID</th>       
                    <th>P2 ID</th>       
                    <th>P3 ID</th>       
                    <th>P4 ID</th>       
                    <th>P5 ID</th>       
                    <th>P6 ID</th>  
                    <th>IP Affiliation</th> 
                       
                </tr>
            </thead>
            <tbody></tbody>
          </table>
	</div>
</div>
<script src="<?php echo base_url()?>/assets/js/grievance.js"></script>