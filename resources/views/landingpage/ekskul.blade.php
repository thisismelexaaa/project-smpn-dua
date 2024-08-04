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
                    <div class="col-md-4 mb-3 ekskuls" style="object-fit: cover;" data-slug="{{ $ekskul->slug }}"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div class="card" style="cursor: pointer">
                            <div class="card-body">
                                <img src="{{ asset('assets/panel/admin/images/ekskul/' . $ekskul->image) }}" alt=""
                                    class="img-fluid w-100"
                                    style="{{ $ekskul->status == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover">
                                <p class="h5 my-3">{{ $ekskul->title }}</p>
                                <span class="">{{ $ekskul->description }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $ekskul->title }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('assets/panel/admin/images/ekskul/' . $ekskul->image) }}"
                                        alt="" class="img-fluid w-100"
                                        style="{{ $ekskul->status == 0 ? 'filter: grayscale(100%);' : '' }} width: 250px; height: 250px; object-fit: cover">
                                    <p class="pt-4">{{ $ekskul->description }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
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
