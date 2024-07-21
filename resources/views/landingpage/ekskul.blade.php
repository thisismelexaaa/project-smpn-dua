@extends('landingpage.app')

@section('content')
    <div class="container-fluid py-5 bg-white" style="height: 100%">
        <div class="container">
            <h1 class="display-6 mb-3 d-flex justify-content-between">
                Ekstrakurikuler
                <select name="slug" id="selectCategory" class="form-select w-25 h-50">
                    <option value="all" selected>Semua</option>
                    <option value="Pramuka">Pramuka</option>
                    <option value="Paskibra">Paskibra</option>
                    <option value="PMR">PMR</option>
                    <option value="Karate">Karate</option>
                    <option value="Pencak Silat">Pencak Silat</option>
                    <option value="SepakBola">Sepak Bola</option>
                    <option value="Futsal">Futsal</option>
                    <option value="Bulutangkis">Bulutangkis</option>
                    <option value="Catur">Catur</option>
                </select>
            </h1>
            <div class="row">
                @foreach ($ekskuls as $ekskul)
                    <div class="col-md-4 mb-3 ekskuls" style="object-fit: cover;" data-slug="{{ $ekskul->slug }}">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ asset('assets/panel/admin/images/ekskul/' . $ekskul->image) }}" alt=""
                                    class="img-fluid w-100"
                                    style="{{ $ekskul->status == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover">
                                <p class="h5 my-3">{{ $ekskul->title }}</p>
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
        $(document).ready(() => {
            const $cards = $('.ekskuls');
            const $selectCategory = $('#selectCategory');

            const filterCards = (category) => {
                $cards.each(function() {
                    const cardCategory = $(this).data('slug');
                    if (category === 'all' || category === cardCategory) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            };

            // Initial filter based on default selected value
            let category = $selectCategory.val();
            filterCards(category);

            // Filter cards when the category changes
            $selectCategory.on('change', function() {
                category = $(this).val();
                filterCards(category);
            });
        });
    </script>
@endsection
