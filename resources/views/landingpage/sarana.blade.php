@extends('landingpage.app')

@section('content')
    <div class="container-fluid py-5 bg-white" style="height: 100%">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="display-6 mb-3">Sarana Prasarana</h1>
                {{-- <select name="category" id="selectCategory" class="form-select w-25 h-50">
                    <option value="all" selected>Semua</option>
                    <option value="pengumuman">Pengumuman</option>
                    <option value="prestasi">Prestasi</option>
                    <option value="kegiatan">Kegiatan</option>
                    <option value="pensi">Pensi</option>
                </select> --}}
            </div>
            <div class="row">
                @foreach ($sarana as $sarana)
                    <div class="col-md-4 mb-3 gallerie" style="object-fit: cover;">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ asset('assets/panel/admin/images/sarana-prasarana/' . $sarana->image) }}"
                                    alt="" class="img-fluid w-100"
                                    style="{{ $sarana->status == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover">
                                <p class="h5 my-3">{{ $sarana->name }}</p>
                                <p>{{ $sarana->keterangan }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // $(document).ready(() => {
        //     // Filter cards based on the selected category
        //     function filterCards(category) {
        //         $('.gallerie').each(function() {
        //             let cardCategory = $(this).data('category');
        //             if (category === 'all' || category === cardCategory) {
        //                 $(this).show();
        //             } else {
        //                 $(this).hide();
        //             }
        //         });
        //     }

        //     // Initial filter based on default selected value
        //     let category = $('#selectCategory').val();
        //     filterCards(category);

        //     // Filter cards when the category changes
        //     $('#selectCategory').on('change', function() {
        //         category = $(this).val();
        //         filterCards(category);
        //     });
        // });
    </script>
@endsection