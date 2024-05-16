@extends('layouts.master')
@section('content')

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Tampilan Background Kolom & Card -->
            <div id="board-background" class="w-full overflow-x-scroll overflow-y-scroll bg-grad-{{ $board->pattern }}" style="height: 93vh !important">

                <!-- Tampilan Kolom & Kartu -->
                <div class="tampilan-kolom gap-4 p-4" id="cardContainer">

                    <a href="#" data-toggle="modal" data-target="#addCol" class="flex-col flex-shrink-0 gap-2 px-4 py-2 transition shadow-lg cursor-pointer select-none h-4h w-72 rounded-xl bg-slate-100 hover:scale-105 hover:relative">
                        <p class="flex items-center justify-center gap-4 text-black"><i class="fa-solid fa-plus fa-lg"></i>Tambah Kolom...</p>
                    </a>

                    <!-- Tampilan Kolom -->
                    @foreach ( $dataColumnCard as $dataKolom )
                        <div class="w-full max-w-72 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700" id="kolom-trello">

                            <!-- Tampilan Aksi Edit & Hapus -->
                            <a href="#" data-toggle="modal" data-target="#diisi id modal">
                                <div class="aksi-kolom">
                                    <i class="fa-solid fa-pencil fa-sm"></i>
                                </div>
                            </a>
                            <a href="#" data-toggle="modal" data-target="#diisi id modal">
                                <div class="aksi-kolom2">
                                    <i class="fa-solid fa-trash fa-sm"></i>
                                </div>
                            </a>
                            <!-- /Tampilan Aksi Edit & Hapus -->

                            <!-- Tampilan Nama Kolom -->
                            <h5 class="kolom-nama mb-3 font-semibold text-lg dark:text-white">{{ $dataKolom->name }}</h5>
                            <!-- /Tampilan Nama Kolom -->

                            <ul class="my-4 space-y-3">

                                <!-- Tampilan Kartu -->
                                @if (count($dataKolom->cards) > 0)
                                    @foreach ($dataKolom->cards as $dataKartu)
                                        <li class="card-trello" id="card-trello">
                                            
                                            <!-- Tampilan Aksi Edit -->
                                            <a href="#" data-toggle="modal" data-target="#diisi id modal">
                                                <div class="aksi-card cursor-pointer" style="display: none">
                                                    <i class="fa-solid fa-pencil fa-sm"></i>
                                                </div>
                                            </a>
                                            <!-- Tampilan Aksi Edit -->
                                            <a href="#" data-toggle="modal" data-target="#diisi id modal">
                                                <div class="flex items-center p-3 text-base font-bold rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                                    <span class="flex ms-3">{{ $dataKartu->name }}</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="card-trello hidden" id="cardTrello{{ $dataKolom->id }}">
                                            <div class="flex items-center p-3 text-base font-bold rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                                {{-- <form action="{{ route('#') }}" method="POST"> --}}
                                                    <input type="text" class="form-control" name="#" style="border-radius: 15px; background-color: #f5fffa;" placeholder="Masukkan judul ini..">
                                                {{-- </form> --}}
                                            </div>
                                        </li>
                                        <button onclick="openAdd('{{ $dataKolom->id }}')" class="btn btn-outline-info" style="border-radius: 30px" id="addCardButton">
                                            <i class="fa-solid fa-plus"></i> Tambah Kartu...
                                        </button>
                                    @endforeach
                                @else
                                    <li class="card-trello hidden" id="cardTrello{{ $dataKolom->id }}">
                                        <div class="flex items-center p-3 text-base font-bold rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                            {{-- <form action="{{ route('#') }}" method="POST"> --}}
                                                <input type="text" class="form-control" name="#" style="border-radius: 15px; background-color: #f5fffa;" placeholder="Masukkan judul ini..">
                                            {{-- </form> --}}
                                        </div>
                                    </li>
                                    <button onclick="openAdd('{{ $dataKolom->id }}')" class="btn btn-outline-info" style="border-radius: 30px" id="addCardButton">
                                        <i class="fa-solid fa-plus"></i> Tambah Kartu...
                                    </button>
                                @endif
                                <!-- /Tampilan Kartu -->

                            </ul>
                        </div>
                    @endforeach
                    <!-- /Tampilan Kolom -->
                    
                </div>
                <!-- /Tampilan Kolom & Kartu -->

            </div>
            <!-- /Tampilan Background Kolom & Card -->

        </div>
        <!-- /Page Wrapper -->

        {!! Toastr::message() !!}

        <!-- Buat Kolom Modal -->
        <div id="addCol" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Buat Kolom</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('addCol', ['board_id' => $board->id, 'team_id' => $board->team_id]) }}" id="addColForm" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="board_id" value="{{ $board->id }}">
                            <input type="hidden" class="form-control" name="team_id" value="{{ $team->id }}">
                            <div class="form-group">
                                <label>Nama Kolom</label><span class="text-danger">*</span>
                                <input type="text" class="form-control @error('column_name') is-invalid @enderror" id="column_name" name="column_name" required>
                                @error('column_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Buat Kolom Modal -->

        <!-- Perbaharui Kartu Modal -->
        <div id="updateBoard" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Perbaharui Papan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updateBoard', ['board_id' => $board->id, 'team_id' => $board->team_id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="board_id" value="{{ $board->id }}">
                            <div class="form-group">
                                <label>Nama Papan</label><span class="text-danger">*</span>
                                <input type="text" class="form-control @error('board_name') is-invalid @enderror" id="board_name" name="board_name" value="{{ $board->name }}" required />
                                @error('board_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="flex flex-col w-full gap-2">
                                <label>Warna Papan</label>
                                <input type="hidden" id="pattern-field" name="board_pattern" value="{{ isset($patterns[0]) ? $patterns[0] : 'default_value' }}">
                                <div class="flex items-center justify-start w-full max-w-2xl gap-2 px-4 py-2 overflow-hidden overflow-x-scroll border-2 border-gray-200 h-36 rounded-xl">
                                    @isset($patterns)
                                        @foreach ($patterns as $pattern)
                                            <div onclick="selectPattern('{{ $pattern }}')" class="{{ $pattern == $patterns[0] ? 'order-first' : '' }} h-full flex-shrink-0 border-4 rounded-lg w-36 bg-grad-{{ $pattern }} hover:border-black" id="pattern-{{ $pattern }}">
                                                <div id="check-{{ $pattern }}" class="flex items-center justify-center w-full h-full {{ $pattern == $patterns[0] ? 'opacity-100' : 'opacity-0' }}">
                                                    <i class="fa-solid fa-circle-check"></i>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <small class="text-danger">*Silahkan pilih kembali (Warna Papan) apabila melakukan pembaharuan.</small>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Perbaharui Kartu Modal -->
        
        <!-- Hapus Kartu Modal -->
        <div id="deleteBoard" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Hapus Papan "{{ $board->name }}"?</h3>
                            <p>Apakah Anda yakin ingin menghapus papan ini?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <form action="{{ route('deleteBoard', ['board_id' => $board->id, 'team_id' => $board->team_id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="board_id" value="{{ $board->id }}">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary continue-btn submit-btn">Hapus</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Hapus Kartu Modal -->

    <style>
        .p-4 {
            padding: 1rem !important;
        }
        .text-lg {
            font-size: 1.125rem !important;
            line-height: 1.75rem !important;
        }
        .space-y-3 {
            margin-top: 0.75rem !important;
        }
        .p-3 {
            padding: 0.75rem !important;
        }
        .text-base {
            font-size: 1rem !important;
            line-height: 1.5rem !important;
        }
        .card-trello {
            background-color: #f5fffa;
            list-style-type: none;
            border-radius: 30px;
            margin-bottom: 10px;
        }
        .ms-3 {
            margin-inline-start: 1.5rem;
            margin-right: 1rem;
        }
        .aksi-kolom {
            position: relative;
            top: -3px;
            display: none;
            left: 220px;
            cursor: pointer;
        }
        .aksi-kolom2 {
            position: relative;
            top: -3px;
            display: none;
            left: 245px;
            cursor: pointer;
        }
        .aksi-card {
            position: relative;
            top: 22px;
            display: flex;
            left: 190px;
        }
        .tampilan-kolom {
            display: flex;
            flex-wrap: wrap;
        }
        .hidden {
            display: none;
        }
        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(241 245 249 / var(--tw-bg-opacity)) !important;
        }
        .kolom-nama {
            border-bottom: 3px solid #f5fffa;
        }
        @foreach($result_tema as $sql_mode => $mode_tema)
            @if ($mode_tema->tema_aplikasi == 'Gelap')
                .card-trello {background-color: {{ $mode_tema->warna_mode }} !important;}
                .bg-white{background-color: {{ $mode_tema->warna_sistem }} !important;}
            @endif
        @endforeach
    </style>

    @section('script')
        <script src="{{ asset('assets/js/memuat-pattern-board.js') }}"></script>
        <script src="{{ asset('assets/js/memuat-data-kolom-board.js') }}"></script>
        <script src="{{ asset('assets/js/memuat-mouse-board.js') }}"></script>
        <script src="{{ asset('assets/js/memuat-ulang.js') }}"></script>

        <script>
            history.pushState({}, "", '/admin/tim/papan/{{ $team->id }}/{{ $board->id }}');
        </script>
        
        <script>
            document.getElementById('pageTitle').innerHTML = 'Kartu Tim - Admin | Trello - PT TATI';
        </script>
    @endsection
@endsection