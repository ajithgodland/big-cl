

<div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Manage State</h3>                    

                    

                </div><!-- End .heading-->
    				
                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                    <div class="row-fluid">

                      <div class="span6" style="width:70%; margin-left:15%;">

                            <div class="box">

                                <div class="title">

                                    <h4> 
                                        <span>Edit State</span>
                                    </h4>
                                    
                                </div>
                                <div class="content">
                                   
                                    <form class="form-horizontal" action="<?php echo base_url().'catalog/editstate/'.$value->id.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5). '/' . $this->uri->segment(6). '/' . $this->uri->segment(7). '/' . $this->uri->segment(8) ; ?>" method="post" enctype="multipart/form-data" />
                                    <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                  <div class="error_messages">
                                              
                                           
                                           
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <input type="hidden" name="type" value="state">
                     
                                        
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
                                                            <option value="<?php echo $country->id ; ?>" <?php if(isset($_POST['country'])) { if($_POST['country'] == $country->id) {  echo 'selected'; } } else {  if($value->countryid == $country->id) {  echo 'selected'; }   }  ?> ><?php echo ucwords($country->country) ; ?></option>
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
                                                        <select name="region" id="region"  class="nostyle selectbox2" style="width:100%;" placeholder="Select State" required>                                                             
                                                               <option value="" >--Select--</option>
                                                               <?php 
                                                                
																if(isset($_POST['country'])) 
																{
																	$cid = $_POST['country'] ;
																}
																else
																{
																	$cid = $value->countryid ;
																}
																
																$all_regions = $this->admin_model->get_location_lists2($cid);
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_regions as $rrow) {
                                                                    ?>
                                                                    <option value="<?php echo $rrow->id; ?>" <?php if(isset($_POST['region'])) { if($_POST['region'] == $rrow->id) {  echo 'selected'; } } else {  if($value->parent_id == $rrow->id) {  echo 'selected'; }   } ?>><?php echo ucwords($rrow->country); ?></option>
                                                                <?php
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
                                                    <label class="form-label span4" for="normal">State</label>
                                                    <input class="span8" id="location" type="text" name="location"  value="<?php echo ucwords($value->country) ; ?>" required />
                                                    <span class="error">
													<?php echo form_error('location');?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">

                                                    <label class="form-label span4" for="checkboxes">Status</label>
                                                    
                                                    <div class="span8 controls">
                                                        
                                                        <div class="left marginT5">
                                                            <input type="radio" name="status" id="optionsRadios1" value="a" <?php
			if($value->status=='a')
			{
			echo 'checked'; }?> />
                                                            Active
                                                        </div>
                                                        <div class="left marginT5">
                                                            <input type="radio" name="status" id="optionsRadios2" value="d" <?php
			if($value->status=='d')
			{
			echo 'checked'; }?>  />
                                                           Not Active Yet
                                                        </div>
                                                                                                                

                                                    </div>
                                                    
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