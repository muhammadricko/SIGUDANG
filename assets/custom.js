$ (document).on("click",".tombol", function(e){
	var id = $(this).data('id');
	var nim = $(this).data('nim');
	var nama = $(this).data('nama');
	var pass = $(this).data('pass');
	var kelas = $(this).data('kelas');

	$(".id").val(id);
	$(".nim").val(nim);
	$(".pass").val(pass);
	$(".kelas").val(kelas);

	if(kelas == 'A'){
		$("#klsa").attr('selected', true);
	} else if(kelas == 'B'){
		$("#klsb").attr('selected', true);
	} else if(kelas == 'C'){
		$("#klsc").attr('selected', true);
	}

	$(".edit").text('Edit From for "' + nama + '"');
	$(".delete").html('Apakah anda yakin akan menghapus data dengan nama <strong>"' + nama + '"</strong> ?');
	$("#pass").tooltip({
		'placement': 'top',
		'title': 'Kosongkan kolom password bila tidak ada perubahan',
		'trigger': 'focus'

	});

});