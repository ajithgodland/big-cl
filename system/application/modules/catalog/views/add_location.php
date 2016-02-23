

<div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Manage Area</h3>                    

                    

                </div><!-- End .heading-->
    				
                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                    <div class="row-fluid">

                      <div class="span6" style="width:70%; margin-left:15%;">

                            <div class="box">

                                <div class="title">

                                    <h4> 
                                        <span>Add Area</span>
                                    </h4>
                                    
                                </div>
                                <div class="content">
                                   
                                    <form class="form-horizontal" action="<?php echo base_url().'catalog/addlocation/' ; ?>" method="post" enctype="multipart/form-data" id="form-validate" />
                                    <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                  <div class="error_messages">
                                              
                                           
                                           
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <input type="hidden" name="type" value="area">
                     
                                        
                                        
                                         
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Country</label>
                                                    <div class="span8 controls countrylist">   
                                                        <select name="country" id="country"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Country" required>                                                             
                                                          <option value="" >--Select--</option>
																<?php
                                                                foreach($countries as $country)
                                                                {
                                                                    ?>
                                                                    <option value="<?php echo $country->id ; ?>" <?php if(isset($_POST['country'])) { if($_POST['country'] == $country->id) {  echo 'selected'; }  }  ?> ><?php echo ucwords($country->country) ; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                                
                                                          </select>
                                                    <span class="error">
													<?php echo form_error('country');?>
                                                    </span>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        
                                          <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Region</label>
                                                    <div class="span8 controls regionlist">   
                                                        <select name="region" id="region"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Region" required>                                                             
                                                               <option value="" >--Select--</option>
                                                               <?php 
                                                                
																if(isset($_POST['country'])) 
																{
																	$cid = $_POST['country'] ;
																
																$all_regions = $this->admin_model->get_location_lists2($cid);
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_regions as $rrow) {
                                                                    ?>
                                                                    <option value="<?php echo $rrow->id; ?>" <?php if(isset($_POST['region'])) { if($_POST['region'] == $rrow->id) {  echo 'selected'; } } ?>><?php echo ucwords($rrow->country); ?></option>
                                                                <?php
                                                                } 
																
																
																}
                                                               
                                                                ?>
																
                                                          </select>
                                                    <span class="error">
													<?php echo form_error('region');?>
                                                    </span>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select State</label>
                                                    <div class="span8 controls statelist">   
                                                        <select name="state" id="state"  class="nostyle selectbox2" style="width:100%;" placeholder="Select State" required>                                                             
                                                               <option value="" >--Select--</option>
                                                               <?php 
                                                                
																if(isset($_POST['region'])) 
																{
																	$cid = $_POST['region'] ;
																
																$all_states = $this->admin_model->get_location_lists2($cid);
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_states as $rrow) {
                                                                    ?>
                                                                    <option value="<?php echo $rrow->id; ?>" <?php if(isset($_POST['state'])) { if($_POST['state'] == $rrow->id) {  echo 'selected'; } } ?>><?php echo ucwords($rrow->country); ?></option>
                                                                <?php
                                                                } 
																
																
																}
                                                               
                                                                ?>
																
                                                          </select>
                                                    <span class="error">
													<?php echo form_error('state');?>
                                                    </span>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Zone</label>
                                                    <div class="span8 controls zonelist">   
                                                        <select name="zone" id="zone"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Zone" required>                                                             
                                                               <option value="" >--Select--</option>
                                                               <?php 
                                                                
																if(isset($_POST['state'])) 
																{
																	$cid = $_POST['state'] ;
																
																$all_zones = $this->admin_model->get_location_lists2($cid);
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_zones as $rrow) {
                                                                    ?>
                                                                    <option value="<?php echo $rrow->id; ?>" <?php if(isset($_POST['zone'])) { if($_POST['zone'] == $rrow->id) {  echo 'selected'; } } ?>><?php echo ucwords($rrow->country); ?></option>
                                                                <?php
                                                                } 
																
																
																}
                                                               
                                                                ?>
																
                                                          </select>
                                                    <span class="error">
													<?php echo form_error('zone');?>
                                                    </span>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        
                                                                               
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select District</label>
                                                    <div class="span8 controls districtlist">   
                                                        <select name="district" id="district"  class="nostyle selectbox2" style="width:100%;" placeholder="Select District" required>                                                             
                                                               <option value="" >--Select--</option>
                                                               <?php 
                                                                
																if(isset($_POST['zone'])) 
																{
																	$cid = $_POST['zone'] ;
																
																$all_district = $this->admin_model->get_locations($cid,'district');
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_district as $rrow) {
                                                                    ?>
                                                                    <option value="<?php echo $rrow->id; ?>" <?php if(isset($_POST['district'])) { if($_POST['district'] == $rrow->id) {  echo 'selected'; } } ?>><?php echo ucwords($rrow->location); ?></option>
                                                                <?php
                                                                } 
																
																
																}
                                                               
                                                                ?>
																
                                                          </select>
                                                    <span class="error">
													<?php echo form_error('district');?>
                                                    </span>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div> 
                                        
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Area</label>
                                                    <input class="span8" id="location" type="text" name="location"  value="<?php echo set_value('location') ; ?>" required />
                                                    <span class="error locationerror">
													<?php echo form_error('location');?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                         

                                        
                                        
                                       
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                   
                                                </div>
                                            </div>
                                        </div>
										
										<div class="form-actions">
                                           <button type="submit" class="btn btn-info">Submit</button>
                                           
                                        </div>
                                                                                

                                    </form>
                                 
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span6 --><!-- End .span6 --><!-- End .span6 -->
                       

                    </div><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid -->
               
    			
    				
              
                
            </div><!-- End contentwrapper -->
        </div>
        

        
        <?php if($this->session->flashdata('message'))
		 {
		 ?>
   	 	<script type="application/javascript"> 
			$(document).ready(function() {
				//Regular success
				
					$.pnotify({
						type: 'success',
						title: '<?php echo $this->session->flashdata('message') ;?>',
						text: '',
						icon: 'picon icon16 iconic-icon-check-alt white',
						opacity: 0.95,
						history: false,
						sticker: false
					});
				
			});
		</script>
        <?php
		}
		?>  
        




<!----> 


  
  <script type="text/javascript">	
	
	 $(document).ready(function(){	 
		
		
		$("#country").change(function()
		{
			
			$(".regionlist").find('select').empty();
			
			var country=$("#country").val();
				
			var dataString = 'location='+ country;
			$.ajax
			({
				type: "POST",
				url: "<?php echo base_url().'catalog/get_country_locations' ?>",
				data: dataString,
				cache: false,
				success: function(html)
				{
						
				$(".regionlist").find('select').empty().prepend(html);
				
				}
			});
			
		});	
		


		
		
});
</script>  


  <script type="text/javascript">	
	
	 $(document).ready(function(){	 
		
		
		$("#region").change(function()
		{
			
			$(".statelist").find('select').empty();
			
			var region=$("#region").val();
				
			var dataString = 'location='+ region;
			$.ajax
			({
				type: "POST",
				url: "<?php echo base_url().'catalog/get_country_locations' ?>",
				data: dataString,
				cache: false,
				success: function(html)
				{
						
				$(".statelist").find('select').empty().prepend(html);
				
				}
			});
			
		});	
		


		
		
});
</script>   


  <script type="text/javascript">	
	
	 $(document).ready(function(){	 
		
		
		$("#state").change(function()
		{
			
			$(".zonelist").find('select').empty();
			
			var state=$("#state").val();
				
			var dataString = 'location='+ state;
			$.ajax
			({
				type: "POST",
				url: "<?php echo base_url().'catalog/get_country_locations' ?>",
				data: dataString,
				cache: false,
				success: function(html)
				{
						
				$(".zonelist").find('select').empty().prepend(html);
				
				}
			});
			
		});	
		


		
		
});
</script>  



 <script type="text/javascript">	
	
	 $(document).ready(function(){	 
		
		
		$("#zone").change(function()
		{
			
			$(".districtlist").find('select').empty();
			
			var zone=$("#zone").val();
			
			var type = 'district';
				
			var dataString = 'location='+ zone + "&type=" + type;
			$.ajax
			({
				type: "POST",
				url: "<?php echo base_url().'catalog/get_locations' ?>",
				data: dataString,
				cache: false,
				success: function(html)
				{
						
				$(".districtlist").find('select').empty().prepend(html);
				
				}
			});
			
		});	
		


		
		
});
</script> 



<script type="text/javascript" src="<?php echo base_url().'static/'; ?>adminpanel/plugins/forms/validate/jquery.validate.min.js"></script>
<script type="application/javascript">


    $("#form-validate").validate({
    	ignore: null,
    	ignore: 'input[type="hidden"]',
    	rules: {
			
    		country: "required",
			region: "required",
			state: "required",
			zone: "required",
			district: "required",
			location: "required",
			
		},
		messages: {
			required: "Please enter a something",
			required1: {
				required: "This field is required",
				minlength: "This field must consist of at least 4 characters"
			},
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			confirm_password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			},
			email: "Please enter a valid email address",
			agree: "Please accept our policy"
		},
		submitHandler: function(form) 		
		{
		
		
		//start	
		
				
					
	//
	
	
	var country=$("#country").val();
	var region=$("#region").val();
	var state=$("#state").val();
	var zone=$("#zone").val();
	var district=$("#district").val();
	var location=$("#location").val();
	
	var dataString = 'country='+ country 
	+ "&region=" + region 
	+ "&state=" + state 
	+ "&zone=" + zone 
	+ "&district=" + district 
	+ "&location=" + location  ;
	
	
	$.ajax
	({
	type: "POST",
	url: "<?php echo base_url().'catalog/addlocation2' ; ?>",
	data: dataString,
	cache: false,
	success: function(html)
	{
	
	if(html=='yes')
	{
		$(".locationerror").html('This Area Already Added !..');
	}
	else
	{
		
		$(".locationerror").html('');
		
		$.pnotify({
						type: 'success',
						title: 'Area Added Successfully!..',
						text: '',
						icon: 'picon icon16 iconic-icon-check-alt white',
						opacity: 0.95,
						history: false,
						sticker: false
					});
					
					
		$("#location").val('');	
		
	}
		
		
		}
	});
	
	
	//
					
			
			
			
		//end	
			
		}
		
    });


</script>      