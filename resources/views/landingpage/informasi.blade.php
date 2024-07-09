@extends('landingpage.app')

@section('content')
    <div class="container-fluid bg-white py-5" id="berita" style="height: 100%">
        <div class="container">
            <div class="d-flex justify-content-between wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="display-6 mb-3">Informasi</h1>
                <select name="category" id="selectCategory" class="form-select w-25 h-25">
                    <option value="all">Semua Kategori</option>
                    <option value="prestasi">Prestasi</option>
                    <option value="pengumuman">Pengumuman</option>
                </select>
            </div>
            <div class="row g-2">
                @foreach ($beritas as $berita)
                    <div class="col-lg-4 col-md-6 wow fadeInUp overflow-hidden berita-card" style="border-radius: 1%;"
                        data-wow-delay="0.1s" data-category="{{ $berita['category'] }}">
                        <div class="service-item border">
                            <div class="mb-4">
                                <img src="{{ asset('assets/panel/admin/images/berita/' . $berita['image']) }}"
                                    alt="Image of {{ $berita['title'] }}" class="image-fluid shadow-sm"
                                    style="width: 100%; height: 250px; object-fit: cover">
                            </div>
                            <hr class="p-0 my-1">
                            <div class="d-flex justify-content-between my-1">
                                <span class="text-capitalize">
                                    {{ \Carbon\Carbon::parse($berita['tgl_posting'])->isoFormat('dddd, D MMMM YYYY', 'Do MMMM YYYY') }}
                                </span>
                                <span class="text-capitalize">
                                    {{ $berita['category'] }}
                                </span>
                                <input type="hidden" class="category" value="{{ $berita['category'] }}">
                            </div>
                            <hr class="p-0 my-1">
                            <span class="h3">{{ $berita['title'] }}</span><br>
                            {{-- <span class="mb-4">{!! Str::limit($berita['content'], 50, '...') !!}</span> --}}
                            <a class="btn btn-light mt-3" href="{{ route('home.show', $berita['id']) }}">Selengkapnya<i
                                    class="bi bi-chevron-double-right ms-1"></i></a>
                        </div>
                    </div>
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
                $('.berita-card').each(function() {
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
