$(document).ready(function(){
	carikode();
	$('#cari_barang').select2({
		placeholder:'cari berdasarkan nama barang',
		ajax: {
			url:'../php/caribarang.php',
			dataType:'json',
			delay:250,
			processResults: function (data){
				return {
					results : $.map(data, function (item){
						return {
							id: item.id,
							text: item.nama_barang
						}

					})
				}
			},
			cache: true
		}
	});
	//=================================================
	$('#cari_barang').on('select2:select',function(e){
		$('#panelnya').loading('toggle');
			var kode = $(this).val();
			$.ajax({
                type: 'GET',
                url: '../php/caridetailbarang.php?kode='+kode,
                dataType:'json',
                success:function (data){
				return {
					results : $.map(data, function (item){
						$("#namabarang").val(item.nama_barang);
						$("#hargabarang").val(item.harga);
					})}
				 
				},complete:function(){
                    	$('#panelnya').loading('stop');
                    }
            });
		});
	$('#bersihdetail').click(function(e){
		bersihform();
	});
	$('#selesaitransaksi').click(function(e){
		var foo='bar';
					    if(foo=='bar'){
					     var isgood = confirm('Transaksi Selesai ? ');
					     if(isgood == true){
		$.ajax({
                    url: '../php/selesaitransaksi.php',
                    type: 'POST',
                    data:{
                    	'kode': $('#kode').val(),
    					},
                    success: function () {
                    	
                    	 location.reload(true);
                    }
                });	
	}}});
	$('#simpancetak').click(function(e){
		
		if($('#potongan').val()=='' || $('#dibayarnya').val()==''){
			alert('Data Tidak Boleh Kosong');
		}else{
			$('#paneldatanya').loading('toggle');
			$.ajax({
                    url: '../php/simpantransaksi.php',
                    type: 'POST',
                    data:{
                    	'kode': $('#kode').val(),
                    	'subtotal' : $('#totalnya').val(),
                    	'potongan' : $('#potongan').val(),
                    	'total' : $('#totalakhirnya').val(),
                    	'dibayar' : $('#dibayarnya').val(),
                    	'kembali' : $('#kembaliannya').val(),
    					},
                    success: function () {
                    	alert('Transaksi Disimpan');
                    },complete:function(){
                    	$('#paneldatanya').loading('stop');
                    }
                });	
		}
	});
	$('#tambahdetail').click(function(e){
		if($('#kode').val()=='' || $('#jumlah').val()=='0' || $('#namabarang').val()=='' || $('#hargabarang').val()=='0' || $('#subtotal').val()=='0'){
			alert('Data Tidak Boleh Kosong');
		}else{
		$.ajax({
                    url: '../php/tambahdetailtransaksi.php',
                    type: 'POST',
                    data:{
                    	'kode': $('#kode').val(),
                    	'namabarang': $('#namabarang').val(),
						'harga': $('#hargabarang').val(),
    					'jumlah': $('#jumlah').val(),
    					'subtotal': $('#subtotal').val(),
    					},
                    success: function () {
                    	alert('Data Disimpan');
                    	getdata();
                    	bersihform();
                    },complete:function(){
                    	$('#panelnya').loading('stop');
                    }
                });	
		}
		
	});

	function hitungsubtotal(){
	var jumlah = $('#jumlah').val();
	var harga = $('#hargabarang').val();
	var subtotal = parseInt(jumlah) * parseInt(harga);
	$('#subtotal').val(subtotal);
}
window.hitungsubtotal=hitungsubtotal;

//====================================================
	function hapusdetail(id){
		var foo='bar';
	    if(foo=='bar'){
	     var isgood = confirm('hapus data ? ');
	     if(isgood == true){
	     	$('#paneldatanya').loading('toggle');
	           $.ajax({
	                    type:'GET',
	                    dataType:'json',
	                    url: '../php/hapusdetailtransaksi.php?kode='+id,
	                    success:function(){
	                        
	                        getdata();
	                    },error:function(){
	                       
	                        getdata();
	                    },complete:function(){
	                    	$('#paneldatanya').loading('stop');
	                    }
	                });
	     }   
	    }
	}
window.hapusdetail = hapusdetail;
//==============================================
	function hitungtotal(){
		var total = $('#totalnya').val();
		var potongan = $('#potongan').val();
		var totalakhir = parseInt(total) - parseInt(potongan);
		$('#totalakhirnya').val(totalakhir);
		$('#totalakhir').html('Rp. '+rupiah(totalakhir));
		$('#potongannya').html('Rp. '+rupiah(potongan));
	}
window.hitungtotal = hitungtotal;

//==========================================
function hitungkembalian(){
	var totalakhir = $('#totalakhirnya').val();
	var dibayar = $('#dibayarnya').val();
	if(parseInt(totalakhir) > parseInt(dibayar)){
		alert('Maaf, Pembayaran Kurang');
		$('#dibayarnya').val('');
		$('#kembalianya').val('');
		$('#dibayar').html('Rp. '+rupiah(0));
		$('#kembalian').html('Rp. '+rupiah(0));
	}else{
		if(parseInt(totalakhir) > parseInt(dibayar)){
			var kembalian = parseInt(totalakhir) - parseInt(dibayar);
		}else{
			var kembalian = parseInt(dibayar) - parseInt(totalakhir);
		}
		
		$('#kembaliannya').val(kembalian);
		$('#dibayar').html('Rp. '+rupiah(dibayar));
		$('#kembalian').html('Rp. '+rupiah(kembalian));
	}
}
window.hitungkembalian = hitungkembalian;
});

function carikode(){
	$('#panelnya').loading('toggle');
	$.ajax({
		url:'../php/carikode.php',
		dataType:'json',
		success:function(data){
			$('#kode').val(data);
			getdata();
			},complete:function(){
                $('#panelnya').loading('stop');
            }
		});
}

function bersihform(){
	$('#jumlah').val('');
		$('#namabarang').val('');
		$('#hargabarang').val('0')
		$('#subtotal').val('0');
		$('#cari_barang').val(null).trigger('change');
}
//==================================================
	function getdata(){
		$('#paneldatanya').loading('toggle');
		var noresi = $('#kode').val();
		$.ajax({
            type:'GET',
            dataType:'json',
            url: '../php/caridetailtransaksi.php?kode='+noresi,
            success:function(data){
                managerow(data);
            },error:function(){
            },complete:function(){
                $('#paneldatanya').loading('stop');
            }
        });
	}
	//=================================================
	function managerow(data){
		var rows ='';
		var total = 0;
		var no=0;
			$.each(data,function(key, value){
				no +=1;
                rows = rows + '<tr class="gradeX">';
                rows = rows + '<td class="text-center"><button type="button" class="btn btn-warning btn-sm" onclick="hapusdetail('+value.id+')"><i class="fa fa-trash"></i></button></td>';
                rows = rows + '<td class="text-center">'+no+'</td>';
                rows = rows + '<td class="text-center">' +value.barang+'</td>';
                rows = rows + '<td class="text-center">' +value.jumlah+'</td>';
                rows = rows + '<td class="text-right"> Rp. ' +rupiah(value.harga)+'</td>';
                rows = rows + '<td class="text-right"> Rp. ' +rupiah(value.subtotal)+'</td>';
                rows = rows + '</tr>';
               total += parseInt(value.subtotal);
            });
            $('#totalnya').val(total);
            $('#total').html('Rp.' +rupiah(total));
            $("#tubuh").html(rows);
        hitungtotal();
	}
	//==================================================
		function rupiah(bilangan){
			var	number_string = bilangan.toString(),
			sisa 	= number_string.length % 3,
			rupiah 	= number_string.substr(0, sisa),
			ribuan 	= number_string.substr(sisa).match(/\d{3}/gi);
			
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
			return rupiah;
		}


	