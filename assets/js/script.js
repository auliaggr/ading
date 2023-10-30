$(document).ready(function () {
    $('#add').click(function () {
        $('#modalDosen').modal('show');

        $('#id').val('');
        $('#nama').val('');
        $('#pria').prop('checked', true);
        $('#usia').val('');
        $('#kode_prodi').val('');
        $('#nama_prodi').val('');
    });
});