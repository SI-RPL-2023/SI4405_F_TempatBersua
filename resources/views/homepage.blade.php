@extends('template/navbar')
@section('content')
    <div class="semua">
        <div class="bg1">
            <div class="carou">
                <div class="swiper">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <img class="gambar" src="{{ asset('assets/carousel-2.jpg') }}">
                            <div class="text">KISAH MANIS</div>
                            <div class="caption">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo,
                                reprehenderit!</div>
                        </div>

                        <div class="swiper-slide">
                            <img class="gambar" src="{{ asset('assets/carousel-3.jpg') }}">
                            <div class="text">MARKA</div>
                            <div class="caption">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci, dolor?
                            </div>
                        </div>

                    </div>

                    <div class="swiper-pagination"></div>

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
        <div class="bg2">
            <img class="kopi1" src="{{ asset('assets/kopi1.png') }}">
            <img class="kopi2" src="{{ asset('assets/kopi2.png') }}">
            <img class="kopi3" src="{{ asset('assets/kopi3.png') }}">
            <img class="kopi4" src="{{ asset('assets/kopi4.png') }}">

            <div class="kopi">
                <p><b>Searching For Cafe? <b></p>
            </div>
            <div class="kosu">
                <p>What Would You Like To Try Right Now?
                    Now It's Iced Coffee Season.
                    Try Our Selection Of Iced Coffee.</p>
            </div>

            <a href="#"><button class="explore">
                    Explore</button></a>
        </div>


        <div class="bg3">
            <a href="#"><img class="cafe1" src="{{ asset('assets/cafe1.png') }}"></a>
            <a href="#"><img class="cafe2" src="{{ asset('assets/cafe2.png') }}"></a>
            <a href="#"><img class="cafe3" src="{{ asset('assets/cafe3.png') }}"></a>
            <a href="#"><img class="cafe4" src="{{ asset('assets/cafe4.png') }}"></a>

            <div class="cafe">
                <p><b>Save Plaves You Liked<b></p>
            </div>
            <div class="wishlist">
                <p>Choose The Place You Like Without Having To Look For It Again</p>
            </div>
            <a href="#"><button class="like">
                    Likes
                </button></a>
        </div>


    </div>


    @if (session('kuesioner'))
        <div class="modal fade" id="modalk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Welcome, {{ Auth::user()->username }} to
                            Tempat Bersua</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/kuesioner" method="post">
                        <div class="modal-body">
                            <p>Apa yang kamu sedang inginkan?</p>

                            @csrf
                            <p class="mt-3">Kopi</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rekomen_kopi" id="inlineRadio1"
                                    value="iya">
                                <label class="form-check-label" for="inlineRadio1">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rekomen_kopi" id="inlineRadio2"
                                    value="tidak">
                                <label class="form-check-label" for="inlineRadio2">Tidak</label>
                            </div>
                            <p class="mt-3">Makanan</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rekomen_makanan" id="inlineRadio1"
                                    value="asin">
                                <label class="form-check-label" for="inlineRadio1">Asin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rekomen_makanan" id="inlineRadio2"
                                    value="manis">
                                <label class="form-check-label" for="inlineRadio2">Manis</label>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            // Saat halaman dimuat ulang
            window.onload = function() {
                // Mencari elemen modal berdasarkan ID
                var modal = new bootstrap.Modal(document.getElementById('modalk'));

                // Menampilkan modal secara otomatis
                modal.show();
            }
        </script>
    @endif
@endsection
