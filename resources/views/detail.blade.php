@include('partials.header')

<!-- component -->
<section class="-mt-32 py-40 bg-gray-100  bg-opacity-50 h-screen w-full">
    <div class="mx-auto container max-w-2xl md:w-3/4 shadow-md">
        <form action="{{ url('/karyawan/store') }}" method="post">
            @csrf
            <div class="bg-gray-100 p-4 border-t-2 bg-opacity-5 border-indigo-400 rounded-t">
                <div class="max-w-sm mx-auto md:w-full md:mx-0">
                    <div class="inline-flex items-center space-x-4">

                        <h1 class="text-black-600 font-bold">Detail Data Karyawan</h1>

                    </div>
                </div>
            </div>
            <div class="bg-white space-y-6">

                <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
                    <h2 class="md:w-1/3 mx-auto max-w-sm font-bold">Data Personal</h2>
                    <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                        <div>
                            <label class="text-md text-gray-400">Nama * : </label>
                            <div class="w-full inline-flex border">
                                <div class="w-1/12 pt-2 bg-gray-100">
                                    <svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input value="{{ $karyawan->nama_karyawan }}" readonly name="nama_karyawan"
                                    type="text" class="w-11/12 focus:outline-none focus:text-gray-600 p-2" />
                            </div>
                        </div>
                        <div>
                            <label class="text-md text-gray-400">Alamat</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">

                                </div>
                                <textarea readonly name="alamat" type="text" class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="12341234"> {{ $karyawan->alamat }} </textarea>
                            </div>
                        </div>

                        <div>
                            <label class="text-sm text-gray-400">No.KTP * :</label>
                            <div class="w-full inline-flex border">
                                <div class="pt-2 w-1/12 bg-gray-100">
                                    <svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input value="{{ $karyawan->no_ktp }}" readonly type="text" name="no_ktp"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2" placeholder="12341234" />
                            </div>
                        </div>
                    </div>
                </div>

                <hr />

                <div class=" border-b border-gray-200 pb-4 mb-4">
                    <div class="w-64 font-bold h-6 mx-2 mt-3 text-red-800 mb-8">Pendidikan</div>
                    <table class="table border" id="dynamicTable">
                        <tr>
                            <th>Nama Sekolah/Universitas</th>
                            <th>Jurusan</th>
                            <th>Tahun Masuk</th>
                            <th>Tahun Lulus</th>


                        </tr>

                        @foreach ($pendidikan as $item)
                            <tr>
                                <td>
                                    <div class="w-full inline-flex border"><input type="text"
                                            value="{{ $item->nama_sekolah }}" readonly
                                            class="w-11/12 focus:outline-none focus:text-gray-600 p-2" /></div>
                                </td>
                                <td>
                                    <div class="w-full inline-flex border"><input type="text"
                                            value="{{ $item->jurusan }}" readonly
                                            class="w-11/12 focus:outline-none focus:text-gray-600 p-2" /></div>
                                </td>
                                <td>
                                    <div class="w-full inline-flex border"><input type="text"
                                            value="{{ $item->tahun_masuk }}" readonly
                                            class="w-11/12 focus:outline-none focus:text-gray-600 p-2" /></div>
                                </td>
                                <td>
                                    <div class="w-full inline-flex border"><input type="text"
                                            value="{{ $item->tahun_lulus }}" readonly
                                            class="w-11/12 focus:outline-none focus:text-gray-600 p-2" /></div>
                                </td>

                            </tr>
                        @endforeach

                    </table>


                </div>


                <div class=" border-b border-gray-200 pb-4 mb-4">
                    <div class="w-64 font-bold h-6 mx-2 mt-3 text-red-800 mb-8">Pekerjaan</div>
                    <table class="table border" id="dynamicTablepekerjaan">
                        <tr>
                            <th>Perusahaan</th>
                            <th>Jabatan</th>
                            <th>Tahun</th>
                            <th>Keterangan</th>


                        </tr>

                        @foreach ($pekerjaan as $item)
                            <tr>

                                <td>
                                    <div class="w-full inline-flex border"><input type="text"
                                            value="{{ $item->perusahaan }}" readonly
                                            class="w-11/12 focus:outline-none focus:text-gray-600 p-2" /></div>
                                </td>
                                <td>
                                    <div class="w-full inline-flex border"><input type="text"
                                            value="{{ $item->jabatan }}" required
                                            class="w-11/12 focus:outline-none focus:text-gray-600 p-2" /></div>
                                </td>
                                <td>
                                    <div class="w-full inline-flex border"><input type="text"
                                            value="{{ $item->tahun }}" required
                                            class="w-11/12 focus:outline-none focus:text-gray-600 p-2" /></div>
                                </td>
                                <td>
                                    <div class="w-full inline-flex border"><input type="text"
                                            value="{{ $item->keterangan }}"
                                            class="w-11/12 focus:outline-none focus:text-gray-600 p-2" /></div>
                                </td>

                            </tr>
                        @endforeach


                    </table>


                </div>

                <div class="w-full p-4 text-right text-gray-500">
                    <a href="/karyawan/data"
                        class="border-2 border-blue-500 font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6">
                        Kembali
                    </a>

                    <a href="/karyawan/edit/{{ $karyawan->kode_karyawan }}"
                        class="border-2 border-blue-500 font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white mr-6">
                        Edit Data
                    </a>
                </div>
            </div>
        </form>

    </div>
</section>

@include('partials.footer')
