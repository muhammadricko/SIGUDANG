<br /><h4><b>Tambah Data Stok Barang</b></h4>
<?php if (!empty($this->session->flashdata('message'))){ ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('message');?>
    </div>
<?php } ?>
<form name="calc" method="POST" action="<?php echo base_url('data/save'); ?>">
	<div class="form-group">
		<label for="nama">Nama Barang</label>
		<input required="" class="form-control" type="text" name="nm">
	</div>
	<div class="form-group">
	    <label for="stok">Jumlah Stok</label>
	    <input required="" class="form-control" type="number" name="stk" onfocus="startCalculate()" onblur="stopCalc()">
	</div>
	<div class="form-group">
	    <label for="harga">Harga Barang</label>
	    <input required="" class="form-control" type="number" name="hrg" onfocus="startCalculate()" onblur="stopCalc()">
	</div>
	<div class="form-group">
	    <label for="total">Total</label>
	    <input required="" class="form-control" readonly type="number" name="ttl" onfocus="startCalculate()" onblur="stopCalc()">
	</div>
	<div class="form-group">
	<input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
	</div>
</form>