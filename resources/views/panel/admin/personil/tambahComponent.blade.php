<div class="accordion accordion-flush mb-4 border shadow-sm" style="border-radius: 1%" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Tambah Data Tenaga pendidik
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <form action="{{ route('tenaga-pendidik.store') }}" class="mx-3" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-md-6 col-sm-12">
                            <label for="nama" class="form-label my-auto pb-1">Nama
                                Lengkap</label>
                            <div class="d-flex gap-1">
                                <input required name="first_name" type="text"
                                    class="form-control col-md col-sm-3" placeholder="Nama Depan"
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                                <input name="last_name" type="text" class="form-control col-md col-sm-3"
                                    placeholder="Nama Belakang" aria-label="Recipient's username"
                                    aria-describedby="button-addon2">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="email" class="form-label my-auto pb-1">Email</label>
                            <div class="input-group col p-0">
                                <input type="text" class="form-control col-md col-sm-3" name="email"
                                    placeholder="Email" aria-label="Recipient's username"
                                    aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2">@gmail.com</span>
                                <input type="hidden" name="gmail" value="@gmail.com">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2 gy-2">
                        <div class="col-md-6 col-sm-12">
                            <label for="jabatan" class="form-label my-auto pb-1">Jabatan</label>
                            <select name="jabatan" class="form-select" id="jabatanPersonil">
                                <option disabled selected>Pilih Jabatan</option>
                                <option value="1" {{ $jabatan ? 'hidden' : '' }}>Kepala Sekolah</option>
                                <option value="2">Guru</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="phone" class="form-label my-auto pb-1">Nomor Telepon</label>
                            <input required name="phone" type="number" class="form-control col"
                                placeholder="Nomor Telepon" aria-label="Recipient's username"
                                aria-describedby="button-addon2">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="image" class="form-label my-auto pb-1">Foto</label>
                            <input required name="image" type="file" class="form-control col"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                        <div class="col-md-6 col-sm-12 ">
                            <label for="mapel" class="form-label my-auto pb-1">Mata Pelajaran</label>
                            <select name="mapel[]" class="form-select" id="mapel"
                                data-placeholder="Pilih Mata Pelajaran" multiple>
                                <option></option>
                                <option value="PAI">PAI</option>
                                <option value="PPKn">PPKn</option>
                                <option value="IPA">IPA</option>
                                <option value="IPS">IPS</option>
                                <option value="MATEMATIKA">MATEMATIKA</option>
                                <option value="BAHASA INDONESIA">BAHASA INDONESIA</option>
                                <option value="BAHASA INGGRIS">BAHASA INGGRIS</option>
                                <option value="PJOK">PJOK</option>
                                <option value="SENI BUDAYA">SENI BUDAYA</option>
                                <option value="INFORMATIKA">INFORMATIKA</option>
                                <option value="PRAKARYA">PRAKARYA</option>
                                <option value="BAHASA SUNDA">BAHASA SUNDA</option>
                                <option value="BAHASA CIREBON">BAHASA CIREBON</option>
                                <option value="BIMBINGAN KONSELING">BIMBINGAN KONSELING</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row" id="sambutanKepalasekolah">
                        <div class="col-md-12 col-sm-12">
                            <label for="image" class="form-label my-auto pb-1">Sambutan Kepala Sekolah</label>
                            <textarea class="form-control col" name="sambutan" cols="20" rows="5" id="editor">
                            </textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
