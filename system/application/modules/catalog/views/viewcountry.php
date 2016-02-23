<div class="contentwrapper"><!--Content wrapper-->
    <div class="heading">
        <h3>Manage Country</h3>


        <div class="resBtnSearch">
            <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
        </div>


        <div class="search">

            <input type="text" id="tipue_search_input" name="name" class="top-search" placeholder="Search here ..."
                   value="<?php if ($this->uri->segment(4) != '0') {
                       $vals = $this->uri->segment(4);
                       $typed = str_replace("-", " ", $vals);
                       $typed = str_replace("123", "&", $typed);
                       echo $typed;
                   } ?>"/>
            <input type="submit" id="tipue_search_button" class="search-btn" value=""/>


        </div>
        <!-- End search -->


    </div><!-- End .heading-->

    <div class="form-row row-fluid" style="width:100%; float:right ;">


        <div class="form-row row-fluid" style="width:40%; float:right ;">
            <div class="span12">
                <div class="row-fluid">
                    <label class="form-label span4" for="checkboxes">Sort By Status</label>

                    <div class="span8 controls">
                        <select name="select" id="sort_status">
                            <option value="All">All Status</option>

                            <option value="a" <?php if ($this->uri->segment(3) == 'a') {
                                echo 'selected';
                            } ?>>Active
                            </option>
                            <option value="d" <?php if ($this->uri->segment(3) == 'd') {
                                echo 'selected';
                            } ?>>Not Active Yet
                            </option>

                        </select>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <a href="<?php echo base_url(); ?>catalog/viewcountry" class="btn btn-inverse"><span
            class="icon16 icomoon-icon-loop white"></span> View All</a><br><br>


    <div class="row-fluid">
        <div class="span12">
            <div class="box gradient">
                <div class="title">
                    <h4>
                        <span>View Country</span>
                    </h4>
                </div>
                <div class="content noPad clearfix">

                    <table cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered"
                           width="100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>COUNTRY</th>
                            <th>STATUS</th>
                            <th>DATE</th>
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
                                <td class="center"><?php
                                    if ($row->status != 'd') {
                                        echo 'Active';
                                    } else {
                                        echo 'Not Active Yet';
                                    }
                                    ?></td>
                                <td ><?php echo date('d-M-Y h:i:s a', strtotime($row->date));; ?></td>

                                <td ><a
                                        href="<?php echo base_url(); ?>catalog/editcountry/<?php echo $row->id . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5); ?>"
                                        title="Edit Country" class="tip"><span
                                            class="icon12 icomoon-icon-pencil"></span></a></td>
                                <td ><a href="#" title="Remove Country" class="tip"
                                                      onClick="linkRef('<?php echo base_url(); ?>catalog/deletecountry/<?php echo $row->id . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5); ?>')"><span
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
if ($this->uri->segment(4) != '0') {
    $seg_4 = $this->uri->segment(4);
} else {
    $seg_4 = 0;
}
?>


<script type="text/javascript">

    $(document).ready(function () {
        $("#sort_status").change(function () {
            var id = $(this).val();


            window.location = '<?php echo base_url() . 'catalog/viewcountry/'; ?>' + id + '<?php echo '/' . $seg_4; ?>';


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


                window.location = '<?php echo base_url() . 'catalog/viewcountry/' . $seg_3 . '/'; ?>' + total_name;


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


                    window.location = '<?php echo base_url() . 'catalog/viewcountry/' . $seg_3 . '/'; ?>' + total_name;


                }

                else {

                    $("#tipue_search_input").focus();

                }

            }

        });


    });
</script>



