<style type="text/css">
.jHtmlArea {
    float: right;
    width: 68% !important;
}
</style>
<div class="contentwrapper"><!--Content wrapper-->
    <div class="heading">
        <h3>Create a Category</h3>                    
    </div><!-- End .heading-->
    <!-- Build page from here: Usual with <div class="row-fluid"></div> -->
    <div class="row-fluid">
        <div class="span6" style="width:91%">
            <div class="box">
                <div class="title">
                    <h4> 
                        <span>Create</span>
                    </h4>
                </div>
                <div class="content">
                    <div id="message"></div>
                    <form class="form-horizontal" id="add_category" action="" />
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                <label class="form-label span4" for="normal">Name<cite>*</cite></label>
                                <input class="span8" required="" type="text" name="cate[category_name]" class="required-entry" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="focusedInput">Url KEY</label>
                                    <input class="span8 focused" id="url" value="" name="cate[url_key]"  autocomplete="OFF" type="text"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="focusedInput">Description</label>
                                    <textarea id="txtDefaultHtmlArea" class="elastic uniform valid" style="overflow: hidden; float: right; height: 259px; display: block; width: 99%;" name="cate[description]" aria-invalid="false"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="checkboxes">Select Parent Category</label>
                                        <div class="span8 controls">   
                                            <select name="cate[parent_category]">
                                            <option value="0" >--Select--</option>
                                            <?php foreach($categorylist as $cat){?>
                                            <option value="<?php echo $cat['category_id']; ?>" <?php echo set_select('cat', $cat['category_id']); ?>><?php echo $cat['category_name']; ?></option>
                                            <?php }?>
                                            </select>
                                            <span class="error">
												<?php echo form_error('parentname');?>
                                            </span>
                                        </div> 
                                </div>
                            </div> 
                        </div>
                        <input type="hidden" name="seo[section]" value="category" />
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="focusedInput">Page Title <i class="optional-text">(Optional)</i></label>
                                    <input class="span8 focused" name="seo[title]"  autocomplete="OFF" type="text"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="focusedInput">Meta Keywords <i class="optional-text">(Optional)</i></label>
                                    <input class="span8 focused" id="tags" name="seo[meta_keyword]" type="text"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="focusedInput">Meta Description<i class="optional-text">(Optional)</i></label>
                                    <input class="span8 focused" name="seo[meta_description]"  autocomplete="OFF" type="text"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" value="sav" name="sav" class="btn btn-info">Save</button>
                            <button type="button" class="btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div><!-- End .box -->
        </div><!-- End .span6 --><!-- End .span6 --><!-- End .span6 -->
    </div><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid -->
<!-- Page end here -->
</div>