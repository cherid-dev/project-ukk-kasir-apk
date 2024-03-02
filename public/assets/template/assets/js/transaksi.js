$(document).ready(function(){
    // $("#totalHarga, #bayar, #kembali").keyup(function(){
    //     var total = $("#totalHarga").val();
    //     var bayar = $("#bayar").val();
    //     var kembali = parseInt(bayar) - parseInt(total);
    //     $("#kembali").val(kembali);
    // });

    $("#hargaSatuan, #jumlahBeli, #subtotalBeli").keyup(function(){
        var hargaSatuan = $("#hargaSatuan").val();
        var jumlahBeli = $("#jumlahBeli").val();
        var subtotalBeli = parseInt(hargaSatuan) * parseInt(jumlahBeli);
        $("#subtotalBeli").val(subtotalBeli);
    });
});