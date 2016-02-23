<div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Manage Daily Visit</h3>                    

                    

                </div><!-- End .heading-->
    				
                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                    <div class="row-fluid">

                      <div class="span6" style="width:70%; margin-left:15%;">

                            <div class="box">

                                <div class="title">

                                    <h4> 
                                        <span>Add Daily Visit</span>
                                        <span style="float:right; margin-right:20px;">Date : <?php echo date('d-M-Y') ; ?></span>
                                    </h4>
                                    
                                </div>
                                <div class="content">
                                   
                                    <form class="form-horizontal" action="<?php echo base_url().'catalog/adddailyvisit/'.$this->uri->segment(3) ; ?>" method="post" enctype="multipart/form-data" />
                                    
                                       <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                  <div class="error_messages">
                                              
                                           
                                           
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    
                                                                     
                                         <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Salesman</label>
                                                    <div class="span8 controls statelist">   
                                                        <select name="userid" id="userid"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Salesman" required>                                                             
                                                               <option value="" >--Select--</option>
                                                               
                                                               
                                                                <?php
                                                                foreach ($salesmanlist as $srow) {
                                                                    ?>
                                                                    <option value="<?php echo $srow->id; ?>" <?php if(isset($_POST['userid'])) { if($_POST['userid'] == $srow->id) {  echo 'selected'; } } ?>><?php echo ucwords($srow->s_firstname).' '.ucwords($srow->s_lastname) ; ?></option>
                                                                <?php
                                                                } 
                                                               
                                                                ?>
																
                                                          </select>
                                                    <span class="error">
													<?php echo form_error('srow');?>
                                                    </span>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div>
                         
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Country</label>
                                                    <div class="span8 controls countrylist">   
                                                        <select name="country" id="country"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Country" required>                                                             
                                                           <option value="<?php echo $countries->id ; ?>" ><?php echo ucwords($countries->country) ; ?></option>
                                                           
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
                                                    <label class="form-label span4" for="checkboxes">Select State</label>
                                                    <div class="span8 controls statelist">   
                                                        <select name="state" id="state"  class="nostyle selectbox2" style="width:100%;" placeholder="Select State" required>                                                             
                                                               <option value="" >--Select--</option>
                                                               <?php 
                                                                
																if(isset($_POST['country'])) 
																{
																	$cid = $_POST['country'] ;
																	
																}
																else
																{
																	$cid = 105;
                                                              
																}
																
																$all_states = $this->admin_model->get_state($cid);
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_states as $state) {
                                                                    ?>
                                                                    <option value="<?php echo $state->id; ?>" <?php if(isset($_POST['state'])) { if($_POST['state'] == $state->id) {  echo 'selected'; } } ?>><?php echo ucwords($state->country); ?></option>
                                                                <?php
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
                                                    <label class="form-label span4" for="checkboxes">Select District</label>
                                                    <div class="span8 controls districtlist">   
                                                        <select name="district" id="district"  class="nostyle selectbox2" style="width:100%;" placeholder="Select District" required>                                                             
                                                               <option value="" >--Select--</option>
                                                               <?php 
                                                                
																if(isset($_POST['state'])) 
																{
																
																$sid = $_POST['state'] ;
																
																$all_districts = $this->admin_model->get_districts($sid);
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_districts as $dis) {
                                                                    ?>
                                                                    <option value="<?php echo $dis->id; ?>" <?php if(isset($_POST['district'])) { if($_POST['district'] == $dis->id) {  echo 'selected'; } } ?>><?php echo ucwords($dis->location); ?></option>
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
                                                    <label class="form-label span4" for="checkboxes">Select Location</label>
                                                    <div class="span8 controls locationlist">   
                                                        <select name="location" id="location"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Location" required>                                                             
                                                               <option value="" >--Select--</option>
                                                               <?php 
                                                                
																if(isset($_POST['district'])) 
																{
																
																$sid = $_POST['district'] ;
																
																$all_locations = $this->admin_model->get_locations($sid);
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_locations as $loc) {
                                                                    ?>
                                                                    <option value="<?php echo $loc->id; ?>" <?php if(isset($_POST['location'])) { if($_POST['location'] == $loc->id) {  echo 'selected'; } } ?>><?php echo ucwords($loc->location); ?></option>
                                                                <?php
                                                                } 
                                                               
															   
																}
                                                                ?>
																
                                                          </select>
                                                    <span class="error">
													<?php echo form_error('location');?>
                                                    </span>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        
                                       
                                        
                                        
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="textarea">Address</label>
                                                    <textarea class="span8 elastic" id="textarea1" rows="3"  name="address" required><?php echo set_value('address') ; ?></textarea>
                                                     <span class="error">
													<?php echo form_error('address');?>
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
        


  
  <script type="text/javascript">	
	
	 $(document).ready(function(){	 
		
		
		$("#country").change(function()
		{
			
			$(".statelist").find('select').empty();
			
			$(".districtlist").find('select').empty();
			
			var country=$("#country").val();
				
			var dataString = 'country='+ country;
			$.ajax
			({
				type: "POST",
				url: "<?php echo base_url().'catalog/get_state' ?>",
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
						
			$(".districtlist").find('select').empty();
			
			var state=$("#state").val();
				
			var dataString = 'state='+ state;
			$.ajax
			({
				type: "POST",
				url: "<?php echo base_url().'catalog/get_districts' ?>",
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


 <script type="text/javascript">	
	
	 $(document).ready(function(){	 
		
		
		$("#district").change(function()
		{
						
			$(".locationlist").find('select').empty();
			
			var district=$("#district").val();
				
			var dataString = 'district='+ district;
			$.ajax
			({
				type: "POST",
				url: "<?php echo base_url().'catalog/get_locations' ?>",
				data: dataString,
				cache: false,
				success: function(html)
				{
					
						
				$(".locationlist").find('select').empty().prepend(html);
				
				
				}
			});
			
		});	
		


		
		
});
</script>     