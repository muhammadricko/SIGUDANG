<br /><h4><b>Ubah Data Stok Barang</b></h4>
<?php if (!empty($this->session->flashdata('message'))){ ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('message');?>
    </div>
<?php } ?>
<form name="calc" method="POST" action="<?php echo base_url('data/update'); ?>" onSubmit="return validasi()">
    <input hidden="" readonly="" required="" type="text" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
        <label for="nama">Nama Barang</label>
        <input required="" class="form-control" type="text" name="nm" value="<?php echo $nama; ?>">
    </div>
    <div class="form-group">
        <label for="stok">Jumlah Stok</label>
        <input required="" class="form-control" type="number" name="stk" value="<?php echo $stok; ?>" onfocus="startCalculate()" onblur="stopCalc()">
    </div>
    <div class="form-group">
        <label for="harga">Harga Barang</label>
        <input required="" class="form-control" type="number" name="hrg" value="<?php echo $harga; ?>" onfocus="startCalculate()" onblur="stopCalc()">
    </div>
    <div class="form-group">
        <label for="total">Total</label>
        <input readonly="" required="" class="form-control" type="number" name="ttl" value="<?php echo $total; ?>" onfocus="startCalculate()" onblur="stopCalc()">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
    </div>
</form>