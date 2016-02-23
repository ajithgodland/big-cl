<div class="contentwrapper"><!--Content wrapper-->
    <div class="heading">
        <h3>Manage Zone</h3>


        <div class="resBtnSearch">
            <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
        </div>


        <div class="search">

            <input type="text" id="tipue_search_input" name="name" class="top-search" placeholder="Search here ..."
                   value="<?php if ($this->uri->segment(5) != '0') {
                       $vals = $this->uri->segment(5);
                       $typed = str_replace("-", " ", $vals);
                       $typed = str_replace("123", "&", $typed);
                       echo $typed;
                   } ?>"/>
            <input type="submit" id="tipue_search_button" class="search-btn" value=""/>


        </div>
        <!-- End search -->


    </div><!-- End .heading-->

    <div class="form-row row-fluid" style="width:100%; float:right ;">


        <div class="span12" style="width:40%; float:right; margin-top:15px;">
            <div class="row-fluid">
                <label class="form-label span4" for="checkboxes">Select Region</label>
                <div class="span8 controls regionlist">
                    <select name="region" id="region" class="nostyle selectbox2" style="width:100%;"
                            placeholder="Select Region" required>
                        <option value="All">--Select--</option>


                        <?php
                        if ($this->uri->segment(3) != '' & $this->uri->segment(3) != '0' & $this->uri->segment(3) != 'All') {
                            $cid = $this->uri->segment(3);
                            $all_regions = $this->admin_model->get_location_lists2($cid);
                            foreach ($all_regions as $rrow) {
                                ?>
                                <option
                                    value="<?php echo $rrow->id; ?>" <?php if ($this->uri->segment(6) == $rrow->id) {
                                    echo 'selected';
                                } ?> ><?php echo ucwords($rrow->country); ?></option>
                                <?php
                            }
                        }
                        ?>

                    </select>

                </div>
            </div>
        </div>

        <div class="span12" style="width:40%; float:right; margin-top:15px;">
            <div class="row-fluid">
                <label class="form-label span4" for="checkboxes">Select Country</label>
                <div class="span8 controls countrylist">
                    <select name="country" id="country" class="nostyle selectbox2" style="width:100%;"
                            placeholder="Select Country" required>

                        <option value="All">--Select--</option>
                        <?php
                        foreach ($countries as $country) {
                            ?>
                            <option
                                value="<?php echo $country->id; ?>" <?php if ($this->uri->segment(3) == $country->id) {
                                echo 'selected';
                            } ?> ><?php echo ucwords($country->country); ?></option>
                            <?php
                        }
                        ?>
                    </select>

                </div>
            </div>
        </div>


        <div class="span12" style="width:40%; float:right; margin-top:15px;">
            <div class="row-fluid">
                <label class="form-label span4" for="checkboxes">Select State</label>
                <div class="span8 controls statelist">
                    <select name="state" id="state" class="nostyle selectbox2" style="width:100%;"
                            placeholder="Select State" required>
                        <option value="All">--Select--</option>


                        <?php
                        if ($this->uri->segment(6) != '' & $this->uri->segment(6) != '0' & $this->uri->segment(6) != 'All') {
                            $cid = $this->uri->segment(6);
                            $all_states = $this->admin_model->get_location_lists2($cid);
                            foreach ($all_states as $rrow) {
                                ?>
                                <option
                                    value="<?php echo $rrow->id; ?>" <?php if ($this->uri->segment(7) == $rrow->id) {
                                    echo 'selected';
                                } ?> ><?php echo ucwords($rrow->country); ?></option>
                                <?php
                            }
                        }
                        ?>

                    </select>

                </div>
            </div>
        </div>


        <div class="form-row row-fluid" style="width:40%; float:right ;">
            <div class="span12">
                <div class="row-fluid">
                    <label class="form-label span4" for="checkboxes">Sort By Status</label>

                    <div class="span8 controls">
                        <select name="select" id="sort_status">
                            <option value="All">All Status</option>

                            <option value="a" <?php if ($this->uri->segment(4) == 'a') {
                                echo 'selected';
                            } ?>>Active
                            </option>
                            <option value="d" <?php if ($this->uri->segment(4) == 'd') {
                                echo 'selected';
                            } ?>>Not Active Yet
                            </option>

                        </select>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <a href="<?php echo base_url(); ?>catalog/viewzone" class="btn btn-inverse"><span
            class="icon16 icomoon-icon-loop white"></span> View All</a><br><br>


    <div class="row-fluid">
        <div class="span12">
            <div class="box gradient">
                <div class="title">
                    <h4>
                        <span>View Zone</span>
                    </h4>
                </div>
                <div class="content noPad clearfix">

                    <table cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered"
                           width="100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>ZONE</th>
                            <th>STATE</th>
                            <th>REGION</th>
                            <th>COUNTRY</th>
                            <th>STATUS</th>
                            <!-- <th>TOP SEARCH</th>-->
                            <!--  <th>DATE</th>-->
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = $page_position;
                        //print_r($categories);
                        foreach ($values as $row) {
                            $i++;
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo ucwords($row->country); ?></td>
                                <td><?php
                                    $state_details = $this->admin_model->GetByRow('tb_country', $row->parent_id, 'id');
                                    echo $state_details->country;
                                    ?></td>
                                <td><?php
                                    $region_details = $this->admin_model->GetByRow('tb_country', $row->regionid, 'id');
                                    echo $region_details->country;
                                    ?></td>
                                <td><?php
                                    $country_details = $this->admin_model->GetByRow('tb_country', $row->countryid, 'id');
                                    echo $country_details->country;
                                    ?></td>
                                <td ><?php
                                    if ($row->status != 'd') {
                                        echo 'Active';
                                    } else {
                                        echo 'Not Active Yet';
                                    }
                                    ?></td>


                                <td ><a
                                        href="<?php echo base_url(); ?>catalog/editzone/<?php echo $row->id . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8); ?>"
                                        title="Edit Zone" class="tip"><span
                                            class="icon12 icomoon-icon-pencil"></span></a></td>
                                <td ><a href="#" title="Remove Zone" class="tip"
                                                      onClick="linkRef('<?php echo base_url(); ?>catalog/deletezone/<?php echo $row->id . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8); ?>')"><span
                                            class="icon12 icomoon-icon-remove"></span></a></td>
                            </tr>

                            <?php
                        }
                        ?>


                        </tbody>

                    </table>
                </div>
            </div><!-- End .box -->
        </div><!-- End .span12 -->


        <div class="pagination_wrapper">
            <div class="pagination_wrapper-cover">
                <div id="pagination">  <?php echo $pagination; ?>  </div>
            </div>
        </div>

    </div><!-- End .row-fluid -->


</div><!-- End contentwrapper -->

<?php if ($this->session->flashdata('message')) {
    ?>
    <script type="application/javascript">
        $(document).ready(function () {
            //Regular success

            $.pnotify({
                type: 'success',
                title: '<?php echo $this->session->flashdata('message');?>',
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
    function linkRef(yurl) {
        var linkref = yurl;
        if (confirm("do you really want to Delete ?")) {
            window.location.href = linkref;
        }
    }
</script>


<?php
if ($this->uri->segment(3) != '' & $this->uri->segment(3) != '0' & $this->uri->segment(3) != 'All') {
    $seg_3 = $this->uri->segment(3);
} else {
    $seg_3 = 0;
}
if ($this->uri->segment(4) != '' & $this->uri->segment(4) != '0' & $this->uri->segment(4) != 'All') {
    $seg_4 = $this->uri->segment(4);
} else {
    $seg_4 = 0;
}
if ($this->uri->segment(5) != '0') {
    $seg5 = $this->uri->segment(5);
} else {
    $seg5 = 0;
}
if ($this->uri->segment(6) != '' & $this->uri->segment(6) != '0' & $this->uri->segment(6) != 'All') {
    $seg6 = $this->uri->segment(6);
} else {
    $seg6 = 0;
}
if ($this->uri->segment(7) != '' & $this->uri->segment(7) != '0' & $this->uri->segment(7) != 'All') {
    $seg7 = $this->uri->segment(7);
} else {
    $seg7 = 0;
}
?>


<script type="text/javascript">

    $(document).ready(function () {
        $("#country").change(function () {
            var id = $(this).val();

            window.location = '<?php echo base_url() . 'catalog/viewzone/' ?>' + id + '<?php echo '/' . $seg_4 . '/' . $seg5 . '/' . $seg6 . '/' . $seg7; ?>';


        });


    });
</script>


<script type="text/javascript">

    $(document).ready(function () {
        $("#sort_status").change(function () {
            var id = $(this).val();


            window.location = '<?php echo base_url() . 'catalog/viewzone/' . $seg_3 . '/'; ?>' + id + '<?php echo '/' . $seg5 . '/' . $seg6 . '/' . $seg7; ?>';


        });


    });
</script>


<script type="application/javascript">

    $(document).ready(function () {


        $("#tipue_search_button").click(function () {


            if ($("#tipue_search_input").val() != '') {

                var name = $("#tipue_search_input").val();


                var name1 = name.replace("'", "");

                var name2 = name1.replace('"', '');

                var name3 = name2.replace('/', '');

                var name4 = name3.replace('&', '123');

                var splted = name4.split(" ");


                var splite_count = splted.length;


                var search_value = '';


                for (var i = 0; i < splite_count; i++) {

                    search_value += splted[i] + '-';

                }


                var total_name = search_value.substring(0, search_value.length - 1);


                window.location = '<?php echo base_url() . 'catalog/viewzone/' . $seg_3 . '/' . $seg_4 . '/'; ?>' + total_name + '<?php echo '/' . $seg6 . '/' . $seg7; ?>';


            }

            else {

                $("#tipue_search_input").focus();

            }


        });


    });
</script>


<script type="application/javascript">

    $(document).ready(function () {


        $("#tipue_search_input").keyup(function (e) {

            if (e.which == 13) {


                if ($("#tipue_search_input").val() != '') {

                    var name = $("#tipue_search_input").val();


                    var name1 = name.replace("'", "");

                    var name2 = name1.replace('"', '');

                    var name3 = name2.replace('/', '');

                    var name4 = name3.replace('&', '123');

                    var splted = name4.split(" ");


                    var splite_count = splted.length;


                    var search_value = '';


                    for (var i = 0; i < splite_count; i++) {

                        search_value += splted[i] + '-';

                    }


                    var total_name = search_value.substring(0, search_value.length - 1);


                    window.location = '<?php echo base_url() . 'catalog/viewzone/' . $seg_3 . '/' . $seg_4 . '/'; ?>' + total_name + '<?php echo '/' . $seg6 . '/' . $seg7; ?>';


                }

                else {

                    $("#tipue_search_input").focus();

                }

            }

        });


    });
</script>


<script type="text/javascript">

    $(document).ready(function () {
        $("#region").change(function () {
            var id = $(this).val();

            window.location = '<?php echo base_url() . 'catalog/viewzone/' . $seg_3 . '/' . $seg_4 . '/' . $seg5 . '/'; ?>' + id + '<?php echo '/' . $seg7; ?>';


        });


    });
</script>


<script type="text/javascript">

    $(document).ready(function () {
        $("#state").change(function () {
            var id = $(this).val();

            window.location = '<?php echo base_url() . 'catalog/viewzone/' . $seg_3 . '/' . $seg_4 . '/' . $seg5 . '/' . $seg6 . '/'; ?>' + id;


        });


    });
</script>


