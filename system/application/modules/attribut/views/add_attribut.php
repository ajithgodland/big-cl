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
                        <span>Attribute Properties</span>
                    </h4>
                </div>
                <div class="content">
                    <div id="message"></div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                <label class="form-label span4" for="normal">Attribute Code<cite>*</cite></label>
                                <input class="span8" required="" onkeyup="valide_code()" autocomplete="OFF" id="attribute_code" type="text" name="attr[attribute_code]" class="required-entry" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="focusedInput">Input Type</label>
                                    <select name="attr[input_type]" id="option_val" onchange="options_li()">
                                        <option value="1">Text field</option>
                                        <option value="2">Text area</option>
                                        <option value="3">Date</option>
                                        <option value="4">Yes/no</option>
                                        <option value="5">Dropdown</option>
                                        <option value="6">Multiple select</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="focusedInput">Use In Layered Navigation</label>
                                    <select name="attr[layered_nav]">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
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
                                <input class="span8" required="" type="text" name="attr[label]" class="required-entry" />
                                </div>
                            </div>
                    </div>
                    <div class="form-row row-fluid" style="display: none;" id="opt">
                            <div class="span12">
                                <div class="row-fluid">
                                <label class="form-label span4" for="normal">Manage Options (values of your attribute)</label>
                                    <button class="btn btn-success" id="addScnt" type="button">(+) Add Option</button>
                                    <div id="p_scents" style="float: right; width: 665px;">
                                        
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="form-actions">
                            <button type="submit" value="sav" name="sav" class="btn btn-info">Save</button>
                            <button type="button" class="btn">Cancel</button>
                    </div>
                </div>
                </div>
            </form>
        </div><!-- End .span6 --><!-- End .span6 --><!-- End .span6 -->
    </div><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid -->
<!-- Page end here -->
</div>