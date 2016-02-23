<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<form action="">
    <table border="1" cellpadding="10">
        <tr>
            <td>Post Title</td>
            <td><input type="text" name="post_title" id=""></td>
        </tr>
        <tr>
            <td>Categories</td>
            <td>
                <select name="category" id="" onchange="get_attributes(this.value)">
                    <option value="">---Select a Category---</option>
                    <?php
                        foreach($categories as $cat):
                    ?>
                    <option value="<?=$cat->category_id?>"><?=$cat->category_name?></option>
                    <?php
                    endforeach;
                    ?>
                </select></td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    function get_attributes(val)
    {
        $.ajax({
            type : 'POST',
            url  : '<?=base_url().'user/attributes'?>',
            data : 'category_id='+val,
            success : function(data)
            {

            }
        });
    }

</script>