<?php

$string = "
<!-- Begin Page Content -->
<div class=\"container-fluid\">

    <!-- Page Heading -->
    <h1 class=\"h3 mb-4 text-gray-800\"><?php echo \$button ?></h1>

        
        <form action=\"<?php echo \$action; ?>\" method=\"post\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text') {
        $string .= "\n\t    <div class=\"form-group\">
            <label for=\"" . $row["column_name"] . "\">" . label($row["column_name"]) . " <?php echo form_error('" . $row["column_name"] . "') ?></label>
            <textarea class=\"form-control\" rows=\"3\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\"><?php echo $" . $row["column_name"] . "; ?></textarea>
        </div>";
    } else {
        $string .= "\n\t    <div class=\"form-group\">
            <label for=\"" . $row["data_type"] . "\">" . label($row["column_name"]) . " <?php echo form_error('" . $row["column_name"] . "') ?></label>
            <input type=\"text\" class=\"form-control\" name=\"" . $row["column_name"] . "\" id=\"" . $row["column_name"] . "\" placeholder=\"" . label($row["column_name"]) . "\" value=\"<?php echo $" . $row["column_name"] . "; ?>\" />
        </div>";
    }
}
$string .= "\n\t    <input type=\"hidden\" name=\"" . $pk . "\" value=\"<?php echo $" . $pk . "; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-primary\"><?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('" . $c_url . "') ?>\" class=\"btn btn-secondary\">Cancel</a>";
$string .= "\n\t</form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
   ";

$hasil_view_form = createFile($string, $target . "views/" . $c_url . "/" . $v_form_file);
