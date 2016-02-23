<style type="text/css">
.container {
	width: 100%;
}
.draggable-list {
    background-color: #ddd;
    list-style: outside none none;
    margin: 0;
    min-height: 70px;
    padding: 10px 10px 10px 17px;
}
.draggable-item {
	cursor: move;
	display: block;
}
.box1 {
    padding-right: 20px;
    width: 417px;
}
.drag {
    float: left;
    width: 48%;
}
</style>
<div class="contentwrapper"><!--Content wrapper-->
    <div class="heading">
        <h3>Create Attributes</h3>                    
    </div><!-- End .heading-->
    <!-- Build page from here: Usual with <div class="row-fluid"></div> -->
    <div class="row-fluid">
        <div class="span6" style="width:91%">
            <form class="form-horizontal" id="add_attribute" action="" />
            <div class="box">
                <div class="title">
                    <h4> 
                        <span>Attribute Set</span>
                    </h4>
                </div>
                <div class="content">
                    <div id="message"></div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                <label class="form-label span4" for="normal">Attribute Set Name<cite>*</cite></label>
                                <input class="span8" id="attr_name" required="" type="text" name="attrset[attribute_set_name]" class="required-entry" />
                                </div>
                            </div>
                        </div>
                </div>
            </div><!-- End .box -->
            <div class="container">
            <div class="box drag">
                <div class="title">
                    <h4> 
                        <span>Assigned Attributes</span>
                    </h4>
                </div>
                <div class="content">
                    
                      <div class="draggable-list" id="assigned_attributes">
                        
                      </div>
                      
                    
                </div>
                </div>
                <div class="box drag" style="margin-left: 38px;">
                <div class="title">
                    <h4> 
                        <span>Unassigned Attributes</span>
                    </h4>
                </div>
                <div class="content">
                   <div class="draggable-list">
                      <?php foreach($attributes as $attr): ?>
                        <div class="draggable-item"> 
                            <span class="box1">
                                <span class="icomoon-icon-stack" aria-hidden="true"></span>
                                &nbsp;<?php echo $attr->attribute_code;?>
                                <input type="hidden" class="attr_val" value="<?php echo $attr->attribute_id;?>" name="attoption[attribute]"/>
                            </span>
                        </div>
                      <?php endforeach; ?>
                      </div>
                    
                </div>
                </div>
                </div>
            <button type="button" onclick="save_attributeset()">Save</button>
            <div id="result"></div>
            </form>
        </div><!-- End .span6 --><!-- End .span6 --><!-- End .span6 -->
    </div><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid -->
<!-- Page end here -->
</div>
<script type="text/javascript">
    function save_attributeset()
    {
        var attribute_name=$('#attr_name').val();
        var attributes=[];
        i = 0;
        $('#assigned_attributes').find('input:hidden')
            .each(function() {
                attributes[i++]=$(this).val();
            });
        if(attributes.length!=0) {
            $.ajax({
                type: 'POST',
                url: '<?=base_url() . 'attribut/save_attributeset'?>',
                data: {'attributes': attributes,'attribute_name':attribute_name},
                success: function (data) {

                }
            });
        }
    }
</script>