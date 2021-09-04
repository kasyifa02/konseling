<?php

$string = "<!-- Begin Page Content -->
<div class=\"container-fluid\">
<div class=\"d-flex mb-3 mb-3\">
    <h1 class=\"mr-auto h3 mb-0 text-gray-800\"><?= \$title ?></h1>";



if ($export_excel == '1') {

    $string .= "\n\t\t<?php echo anchor(site_url('" . $c_url . "/excel'), '<i class=\"fas fa-download fa-sm text-white-50\"></i> Excel', 'class=\"ml-1 btn btn-sm btn-primary shadow-sm\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('" . $c_url . "/word'), '<i class=\"fas fa-download fa-sm text-white-50\"></i> Word', 'class=\"ml-1 btn btn-sm btn-primary shadow-sm\"'); ?> ";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('" . $c_url . "/pdf'), '<i class=\"fas fa-download fa-sm text-white-50\"></i> Pdf', 'class=\"ml-1 btn btn-sm btn-primary shadow-sm\"'); ?> ";
}
$string .= "
</div>
<?= \$this->session->flashdata('message'); ?>
        <!--data table-->
        <div class=\"card shadow mb-4\">
        <div class=\"card-header py-3\">
            <h6 class=\"m-0 font-weight-bold text-primary\"> <?= \$title ?> <span> <?php echo anchor(site_url('" . $c_url . "/create'),'Create', 'class=\"badge badge-pill badge-primary\"'); ?> </span> </h6>
        </div>
        <div class=\"card-body\">
            <div class=\"table-responsive\">
                <table class=\"table table-bordered\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\">
                <thead>
            <tr>
                <th width=\"2\" style=\"align-items: center;\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t<th>Action</th>
            </tr>
            <thead>
            
            <tfoot>
            <tr>
                <th width=\"2\" style=\"align-items: center;\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t<th>Action</th>
            </tr>
            <tfoot>
            ";
$string .= "<?php
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?> <tbody>
                <tr>
                ";

$string .= "\n\t\t\t<td width=\"80px\"><?php echo ++\$start ?></td>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t<td><?php echo $" . $c_url . "->" . $row['column_name'] . " ?></td>";
}


$string .= "<td style=\"text-align:center\" width=\"200px\">"
    . "<span> <?= anchor(site_url('" . $c_url . "/read/'.$" . $c_url . "->" . $pk . "),'Read', 'class=\"badge badge-pill badge-primary\"')?> </span>"
    . "<span> <?= anchor(site_url('" . $c_url . "/update/'.$" . $c_url . "->" . $pk . "),'Update', 'class=\"badge badge-pill badge-success\"')?> </span>"
    . "<span> <?= anchor(site_url('" . $c_url . "/delete/'.$" . $c_url . "->" . $pk . "),'Delete', 'class=\"badge badge-pill badge-danger\" onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"')?> </span>"
    . "</td>";

$string .=  "\n\t\t</tr>
<tbody>
                <?php
            }
            ?>
            
            </table>
        </div>
    </div>
</div>
        <div class=\"row\">
            <div class=\"col-md-6\">
                <a href=\"#\" class=\"btn btn-primary\">Total Record : <?php echo \$total_rows ?></a>";

$string .= "\n\t    </div>
            <div class=\"col-md-6 text-right\">
                <?php echo \$pagination ?>
            </div>
        </div>
        </div>
        <!-- /.container-fluid -->
        
        </div>
        <!-- End of Main Content -->
          ";


$hasil_view_list = createFile($string, $target . "views/" . $c_url . "/" . $v_list_file);
