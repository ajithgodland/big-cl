<style type="text/css">
.jHtmlArea {
    float: right;
    width: 68% !important;
}
</style>
<div class="contentwrapper"><!--Content wrapper-->
    <div class="heading">
        <h3>Edit Category</h3>                    
    </div><!-- End .heading-->
    <!-- Build page from here: Usual with <div class="row-fluid"></div> -->
    <div class="row-fluid">
        <div class="span6" style="width:91%">
            <div class="box">
                <div class="title">
                    <h4> 
                        <span>Edit</span>
                    </h4>
                </div>
                <div class="content">
                    <div id="message"></div>
                    <form class="form-horizontal" id="edit_category" action="" />
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                <label class="form-label span4" for="normal">Name<cite>*</cite></label>
                                <input class="span8" value="<?php echo $category->category_name;?>" required="" type="text" name="cate[category_name]" class="required-entry" />
                                <input type="hidden" value="<?php echo $category->category_id;?>" name="category_id" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="focusedInput">Url KEY</label>
                                    <input class="span8 focused" id="url" value="<?php echo $category->url_key;?>" name="cate[url_key]"  autocomplete="OFF" type="text"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="focusedInput">Description</label>
                                    <textarea id="txtDefaultHtmlArea" class="elastic uniform valid" style="overflow: hidden; float: right; height: 259px; display: block; width: 99%;" name="cate[description]" aria-invalid="false"><?php echo $category->description;?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="checkboxes">Select Parent Category</label>
                                        <div class="span8 controls">   
                                            <select name="cate[parent_category]">
                                            <?php if($category->parent_category == 0){ ?>
                                            <option selected="" value="0">--Select--</option>
                                            <?php }else{?>
                                            <option selected="" value="<?php echo $category->parent_category;?>"><?php echo $this->app->get_category_name($category->parent_category);?></option>
                                            <?php }?>
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
                                    <input class="span8 focused" name="seo[title]" value="<?php echo $seo->title?>"  autocomplete="OFF" type="text"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="focusedInput">Meta Keywords <i class="optional-text">(Optional)</i></label>
                                    <input class="span8 focused" id="tags" name="seo[meta_keyword]" value="<?php echo $seo->meta_keyword?>" name="seo[title]" type="text"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="focusedInput">Meta Description<i class="optional-text">(Optional)</i></label>
                                    <input class="span8 focused" name="seo[meta_description]" value="<?php echo $seo->meta_description?>"  autocomplete="OFF" type="text"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" value="sav" name="sav" class="btn btn-info">Save changes</button>
                            <button type="button" value="go" name="go" class="btn">Save and Go To Listing</button>
                        </div>
                    </form>
                </div>
            </div><!-- End .box -->
        </div><!-- End .span6 --><!-- End .span6 --><!-- End .span6 -->
    </div><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid -->
<!-- Page end here -->
</div>