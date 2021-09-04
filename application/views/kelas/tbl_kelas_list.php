<!-- Begin Page Content -->
<div class="container-fluid">
<div class="d-flex mb-3 mb-3">
    <h1 class="mr-auto h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>
<?= $this->session->flashdata('message'); ?>
        <!--data table-->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> <?= $title ?> <span> <?php echo anchor(site_url('kelas/create'),'Create', 'class="badge badge-pill badge-primary"'); ?> </span> </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
            <tr>
                <th width="2" style="align-items: center;">No</th>
		<th>Kelas</th>
		<th>Action</th>
            </tr>
            <thead>
            
            <tfoot>
            <tr>
                <th width="2" style="align-items: center;">No</th>
		<th>Kelas</th>
		<th>Action</th>
            </tr>
            <tfoot>
            <?php
            foreach ($kelas_data as $kelas)
            {
                ?> <tbody>
                <tr>
                
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kelas->kelas ?></td><td style="text-align:center" width="200px"><span> <?= anchor(site_url('kelas/read/'.$kelas->id),'Read', 'class="badge badge-pill badge-primary"')?> </span><span> <?= anchor(site_url('kelas/update/'.$kelas->id),'Update', 'class="badge badge-pill badge-success"')?> </span><span> <?= anchor(site_url('kelas/delete/'.$kelas->id),'Delete', 'class="badge badge-pill badge-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"')?> </span></td>
		</tr>
<tbody>
                <?php
            }
            ?>
            
            </table>
        </div>
    </div>
</div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
        <!-- /.container-fluid -->
        
        </div>
        <!-- End of Main Content -->
          