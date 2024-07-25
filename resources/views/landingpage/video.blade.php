@extends('landingpage.app')

@section('content')
    <div class="container-fluid py-5 bg-white style="height: 100%">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="display-6 mb-3">Gallery Video</h1>
                <select name="category" id="selectCategory" class="form-select w-25 h-50">
                    <option value="all" selected>Semua</option>
                    <option value="pengumuman">Pengumuman</option>
                    <option value="prestasi">Prestasi</option>
                    <option value="kegiatan">Kegiatan</option>
                    <option value="pensi">Pensi</option>
                </select>
            </div>
            <div class="row">
                @foreach ($galleries as $gallery)
                    @if ($gallery->image == null)
                        <div class="col-md-4 mb-3 gallerie" style="object-fit: cover;" data-category="{{ $gallery['category'] }}">
                            <div class="card">
                                <div class="card-body">
                                    <video src="{{ asset('assets/panel/admin/video/galleries/' . $gallery['video']) }}"
                                        class="img-fluid w-100"
                                        style="{{ $gallery->status == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover"
                                        controls>
                                    </video>
                                    <p class="h5 my-3">{{ $gallery->title }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(() => {
            // Filter cards based on the selected category
            function filterCards(category) {
                $('.gallerie').each(function() {
                    let cardCategory = $(this).data('category');
                    if (category === 'all' || category === cardCategory) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            // Initial filter based on default selected value
            let category = $('#selectCategory').val();
            filterCards(category);

            // Filter cards when the category changes
            $('#selectCategory').on('change', function() {
                category = $(this).val();
                filterCards(category);
            });
        });
    </script>
@endsection
