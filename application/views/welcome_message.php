<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Vikasu - Tutorial API Wilayah</title>
</head>
<body>

<select id="provinsi"></select>
<select id="kabupaten"></select>
<select id="kecamatan"></select>
<select id="kelurahan"></select>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		provinsi();
		function provinsi() {
			$.ajax({
				url: '<?php echo base_url(); ?>Welcome/get_provinsi',
				type: 'GET',
                async: true,
                dataType: 'json',
				success: function(data) {
					html = '';
					html += '<option>Pilih Provinsi</option>';
					for(inc = 0; inc < data.length; inc++) {
						html += '<option value='+data[inc].id+'>'+data[inc].nama+'</option>';
					}
					$('#provinsi').html(html);
				}
			});
		}

		$('#provinsi').change(function() {
			var id_provinsi = $(this).val();
			$.ajax({
				url: '<?php echo base_url(); ?>Welcome/get_kabupaten',
				type: 'GET',
				data: { id_provinsi: id_provinsi },
                async: true,
                dataType: 'json',
				success: function(data) {
					html = '';
					html += '<option>Pilih Kabupaten</option>';
					for(inc = 0; inc < data.length; inc++) {
						html += '<option value='+data[inc].id+'>'+data[inc].nama+'</option>';
					}
					$('#kabupaten').html(html);
				}
			});
		});

		$('#kabupaten').change(function() {
			var id_kabupaten = $(this).val();
			$.ajax({
				url: '<?php echo base_url(); ?>Welcome/get_kecamatan',
				type: 'GET',
				data: { id_kabupaten: id_kabupaten },
                async: true,
                dataType: 'json',
				success: function(data) {
					html = '';
					html += '<option>Pilih Kabupaten</option>';
					for(inc = 0; inc < data.length; inc++) {
						html += '<option value='+data[inc].id+'>'+data[inc].nama+'</option>';
					}
					$('#kecamatan').html(html);
				}
			});
		});

		$('#kecamatan').change(function() {
			var id_kecamatan = $(this).val();
			$.ajax({
				url: '<?php echo base_url(); ?>Welcome/get_kelurahan',
				type: 'GET',
				data: { id_kecamatan: id_kecamatan },
                async: true,
                dataType: 'json',
				success: function(data) {
					html = '';
					html += '<option>Pilih Kelurahan</option>';
					for(inc = 0; inc < data.length; inc++) {
						html += '<option value='+data[inc].id+'>'+data[inc].nama+'</option>';
					}
					$('#kelurahan').html(html);
				}
			});
		});
	});
</script>
</body>
</html>
