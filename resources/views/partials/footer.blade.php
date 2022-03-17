</body>
@include('sweetalert::alert')
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

<script>
    var i = 0;
    var x = 0;
    
    $("#add").click(function() {

        ++i;

        $("#dynamicTable").append(
            '<tr><td> <div class="w-full inline-flex border"><input type="text" name="addpendidikan[' + i +
            '][nama_sekolah]" class="w-11/12 focus:outline-none focus:text-gray-600 p-2" /></div></td><td> <div class="w-full inline-flex border"><input type="text" name="addpendidikan[' +
            i +
            '][jurusan]" class="w-11/12 focus:outline-none focus:text-gray-600 p-2" /></div></td><td> <div class="w-full inline-flex border"><input type="text" name="addpendidikan[' +
            i +
            '][tahun_masuk]" class="w-11/12 focus:outline-none focus:text-gray-600 p-2" /></div></td><td> <div class="w-full inline-flex border"> <input type="text" name="addpendidikan[' +
            i +
            '][tahun_lulus]" class="w-11/12 focus:outline-none focus:text-gray-600 p-2" /></div> </td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
        );
    });

    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });

    $(document).on('click', '.removependidikan', function() {
        $(this).parents('tr').remove();
    });



    $("#addPekerjaan").click(function() {

        ++x;

        $("#dynamicTablepekerjaan").append(
            '<tr><td> <div class="w-full inline-flex border"><input type="text" name="addpekerjaan[' + i +
            '][perusahaan]" class="w-11/12 focus:outline-none focus:text-gray-600 p-2" /></div></td><td> <div class="w-full inline-flex border"><input type="text" name="addpekerjaan[' +
            i +
            '][jabatan]" class="w-11/12 focus:outline-none focus:text-gray-600 p-2" /></div></td><td> <div class="w-full inline-flex border"><input type="text" name="addpekerjaan[' +
            i +
            '][tahun]" class="w-11/12 focus:outline-none focus:text-gray-600 p-2" /></div></td><td> <div class="w-full inline-flex border"> <input type="text" name="addpekerjaan[' +
            i +
            '][keterangan]" class="w-11/12 focus:outline-none focus:text-gray-600 p-2" /></div> </td><td><button type="button" class="btn btn-danger remove-kerja">Remove</button></td></tr>'
        );
    });

    $(document).on('click', '.remove-kerja', function() {
        $(this).parents('tr').remove();
    });

    $(document).on('click', '.removepekerjaan', function() {
        $(this).parents('tr').remove();
    });
</script>

</html>
