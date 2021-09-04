<?php

$string = "
<!-- Begin Page Content -->
<div class=\"container-fluid\">

    <!-- Page Heading -->
    <h1 class=\"h3 mb-4 text-gray-800\"><?php echo \$title ?> Detail</h1>
<div class=\"table-responsive\">
        <table class=\"table table-hover table-bordered\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td>" . label($row["column_name"]) . "</td><td><?php echo $" . $row["column_name"] . "; ?></td></tr>";
}
$string .= "\n\t</table>
<a href=\"<?php echo site_url('" . $c_url . "') ?>\" class=\"btn btn-secondary\">Cancel</a>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
  ";



$hasil_view_read = createFile($string, $target . "views/" . $c_url . "/" . $v_read_file);
