<br /><h4><b>Total <?php foreach ($ttlbrg as $key => $value) { echo $this->fungsi->rupiah($value->ttl); } ?></b> <small>dari <?php echo $jmlbrg; ?> Barang</small></h4>
<?php if (!empty($this->session->flashdata('message'))){ ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('message');?>
    </div>
<?php } else if(!empty($src)) { ?>
    <div class="alert alert-success">
        Menampilkan Hasil <b><?php echo ucwords($src); ?></b>
    </div>
<?php } ?>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>BARANG</th>
                <th>STOK</th>
                <th>HARGA</th>
                <th>TOTAL</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <?php if(!empty($result)){ ?>
        <tbody>
        <?php $no=1; foreach($result as $dt) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $dt->nm; ?></td>
                <td><?php echo $dt->stk; ?></td>
                <td><?php echo $this->fungsi->rupiah($dt->hrg);?></td>
                <td><?php echo $this->fungsi->rupiah($dt->ttl);?></td>
                <td>
                    <a href="<?=base_url('data/edit/'.$dt->id);?>"><span class="glyphicon glyphicon-edit" title="Edit"></span></a> &nbsp; 
                    <a href="<?=base_url('data/delete/'.$dt->id);?>"><span class="glyphicon glyphicon-remove" title="Hapus"></span></a></b>
                </td>
            </tr>
        <?php } ?>
        </tbody>
        <?php } else { ?>
        <tbody>
            <tr>
                <td colspan="6">Tidak ditemukan</td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
<?php echo $halaman; ?>
</div>