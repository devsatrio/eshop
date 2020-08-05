$(document).ready(function(){
  $('.tampildetail').on('click', function(){
     $('#tubuhnya').html('<td colspan="7" class="text-center"><p style="color:grey;">Loading...</p></td>');
    var kodenota = $(this).data('kodenota');
    var tanggal = $(this).data('tanggal');
    var pembuat = $(this).data('pembuat');
    var subtotal = $(this).data('subtotal');
    var potongan = $(this).data('potongan');
    var total = $(this).data('total');
    var dibayar = $(this).data('dibayar');
    var kembali = $(this).data('kembali');
    //------------------------------------------------
    $('#printkode').html(kodenota);
    $('#printtgl').html(tanggal);
    $('#printpembuat').html(pembuat);
    $('#cetaktotal').html('Rp. '+rupiah(subtotal));
    $('#cetakpotongan').html('Rp. '+rupiah(potongan));
    $('#cetaktotalakhir').html('Rp. '+rupiah(total));
    $('#cetakdibayar').html('Rp. '+rupiah(dibayar));
    $('#cetakkembalian').html('Rp. '+rupiah(kembali));
    $.ajax({
                type:'GET',
                dataType:'json',
                url: '../php/caridetailnota.php?kode='+kodenota,
                success:function(data){
                var rows ='';
                var no=0;
                    $.each(data,function(key, value){
                        no +=1;
                        rows = rows + '<tr>';
                        rows = rows + '<td class="text-center">' +no+'</td>';
                        rows = rows + '<td class="text-center">' +value.barang+'</td>';
                        rows = rows + '<td class="text-center"> Rp. '+rupiah(value.harga)+' Pcs</td>';
                        rows = rows + '<td class="text-center">' +value.jumlah+' Pcs</td>';
                        rows = rows + '<td class="text-right"> Rp. ' +rupiah(value.subtotal)+'</td>';
                        rows = rows + '</tr>';
                });
                     $('#tubuhnya').html(rows);
                }
            });
    $('#detailmodal').modal('toggle');
  });
  //=================================================================
    function rupiah(bilangan){
      var number_string = bilangan.toString(),
      sisa  = number_string.length % 3,
      rupiah  = number_string.substr(0, sisa),
      ribuan  = number_string.substr(sisa).match(/\d{3}/gi);
      
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

      return rupiah;
    }
});