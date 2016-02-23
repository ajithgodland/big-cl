<div class="contentwrapper"><!--Content wrapper-->
    <div class="heading">
        <h3>Edit Attributes</h3>                    
    </div><!-- End .heading-->
    <!-- Build page from here: Usual with <div class="row-fluid"></div> -->
    <div class="row-fluid">
        <div class="span6" style="width:91%">
            <form class="form-horizontal" id="edit_attribute" action="" />
            <div class="box">
                <div class="title">
                    <h4> 
                        <span>Attribute Properties</span>
                    </h4>
                </div>
                <div class="content">
                    <div id="message"></div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                <label class="form-label span4" for="normal">Attribute Code<cite>*</cite></label>
                                <input class="span8" disabled="" onkeyup="valide_code()" autocomplete="OFF" id="attribute_code" type="text" value="<?php echo $attrubute->attribute_code?>" name="attr[attribute_code]" class="required-entry" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="focusedInput">Input Type</label>
                                    <?php
                                    if($attrubute->input_type==1)
                                    {
                                        $type = 'Text field';
                                    }
                                    if($attrubute->input_type==2)
                                    {
                                        $type = 'Text area';
                                    }
                                    if($attrubute->input_type==3)
                                    {
                                        $type = 'Date';
                                    }
                                    if($attrubute->input_type==4)
                                    {
                                        $type = 'Yes/no';
                                    }
                                    if($attrubute->input_type==5)
                                    {
                                        $type = 'Dropdown';
                                    }
                                    if($attrubute->input_type==6)
                                    {
                                        $type = 'Multiple select';
                                    }
                                    ?>
                                    <input type="hidden" id="option_val" value="<?php echo $attrubute->input_type;?>" />
                                    <input class="span8" disabled="" type="text" value="<?php echo $type?>" name="attr[input_type]" class="required-entry" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="focusedInput">Use In Layered Navigation</label>
                                    <select name="attr[layered_nav]">
                                        <option <?php if($attrubute->layered_nav==0){?>selected=""<?php } ?> value="0">No</option>
                                        <option <?php if($attrubute->layered_nav==1){?>selected=""<?php } ?> value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
            </div><!-- End .box -->
            <div class="box">
                <div class="title">
                    <h4> 
                        <span>Manage Label / Options</span>
                    </h4>
                </div>
                <div class="content">
                    <div id="message"></div>
                    <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                <label class="form-label span4" for="normal">Label<cite>*</cite></label>
                                <input class="span8" value="<?php echo $attrubute->label;?>" required="" type="text" name="attr[label]" class="required-entry" />
                                </div>
                            </div>
                    </div>
                    <input type="hidden" value="<?php echo $attrubute->attribute_id;?>" name="attribute_id" />
                    <div class="form-row row-fluid" style="display: none;" id="opt">
                            <div class="span12">
                                <div class="row-fluid">
                                <label class="form-label span4" for="normal">Manage Options (values of your attribute)</label>
                                    <button class="btn btn-success" id="addScnt" type="button">(+) Add Option</button>
                                    <div id="p_scents" style="float: right; width: 665px;">
                                        <?php foreach($options as $opt):?>
                                        <div id="rem">
                                            <input type="hidden" value="<?php echo $opt->option_id;?>" name="option[option_id][]" />
                                            <input class="span9" id="lable3" placeholder="Value" style="float: left; width: 32%;" value="<?php echo $opt->option_value;?>" name="option[option_value][]" type="text" />
                                            <input class="span9" id="value3" placeholder="Position" style="float: left; position: relative; left: 9px; width: 32%;" value="<?php echo $opt->option_position;?>" name="option[option_position][]" type="text" />
                                            <button type="button" id="remScnt" class="btn btn-warning" style="float: left; margin-left: 19px;">Remove</button>
                                            <div style="clear: both; height: 11px;"></div>
                                        </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="form-actions">
                            <button type="submit" value="sav" name="sav" class="btn btn-info">Save</button>
                            <button type="submit" class="btn">Save and Continue Edit</button>
                    </div>
                </div>
                </div>
            </form>
        </div><!-- End .span6 --><!-- End .span6 --><!-- End .span6 -->
    </div><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid -->
<!-- Page end here -->
</div>