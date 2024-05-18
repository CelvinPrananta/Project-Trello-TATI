@extends('layouts.master')
@section('content')

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Tampilan Background Kolom & Card -->
            <div class="w-full overflow-x-scroll overflow-y-scroll bg-grad-{{ $board->pattern }}" style="height: 93vh !important">

                <!-- Tampilan Kolom & Kartu -->
                <div class="tampilan-kolom gap-4 p-4">

                    <a href="#" data-toggle="modal" data-target="#addCol" class="flex-col flex-shrink-0 gap-2 px-4 py-2 transition shadow-lg cursor-pointer select-none h-4h w-72 rounded-xl bg-slate-100 hover:scale-105 hover:relative">
                        <p class="flex items-center justify-center gap-4 text-black"><i class="fa-solid fa-plus fa-lg"></i>Tambah Kolom...</p>
                    </a>

                    <!-- Tampilan Kolom -->
                    @foreach ( $dataColumnCard as $dataKolom )
                        <div class="w-full max-w-72 p-4 bg-whites border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700" onmouseenter="aksiKolomShow({{ $dataKolom->id }})" onmouseleave="aksiKolomHide({{ $dataKolom->id }})">

                            <!-- Tampilan Aksi Edit & Hapus -->
                            <a href="#" data-toggle="modal" data-target="#updateColumn{{ $dataKolom->id }}">
                                <div class="aksi-kolom" id="aksi-kolom{{ $dataKolom->id }}">
                                    <i class="fa-solid fa-pencil fa-sm"></i>
                                </div>
                            </a>
                            <a href="#" data-toggle="modal" data-target="#deleteColumn{{ $dataKolom->id }}">
                                <div class="aksi-kolom2" id="aksi-kolom2{{ $dataKolom->id }}">
                                    <i class="fa-solid fa-trash fa-sm"></i>
                                </div>
                            </a>
                            <!-- /Tampilan Aksi Edit & Hapus -->

                            <!-- Tampilan Nama Kolom -->
                            <h5 class="kolom-nama mb-3 font-semibold text-lgs dark:text-white">{{ $dataKolom->name }}</h5>
                            <!-- /Tampilan Nama Kolom -->

                            <ul class="my-4 space-y-3">

                                <!-- Tampilan Kartu -->
                                    @foreach ($dataKolom->cards as $dataKartu)
                                        <li class="kartu-trello" id="kartu-trello" onmouseenter="aksiKartuShow({{ $dataKartu->id }})" onmouseleave="aksiKartuHide({{ $dataKartu->id }})">
                                            
                                            <!-- Tampilan Aksi Edit -->
                                            {{-- <a href="#" data-toggle="modal" data-target="#editCard{{ $dataKartu->id }}">
                                                <div class="aksi-card" id="aksi-card{{ $dataKartu->id }}">
                                                    <i class="fa-solid fa-pencil fa-sm"></i>
                                                </div>
                                            </a> --}}
                                            @if($dataKartu->history->where('user_id', auth()->user()->id)->isNotEmpty())
                                                <a href="#" data-toggle="modal" data-target="#editCard{{ $dataKartu->id }}">
                                                    <div class="aksi-card" id="aksi-card{{ $dataKartu->id }}">
                                                        <i class="fa-solid fa-pencil fa-sm"></i>
                                                    </div>
                                                </a>
                                            @endif
                                            <!-- /Tampilan Aksi Edit -->

                                            <!-- Tampilan Kartu Pengguna -->
                                            <a href="#" data-toggle="modal" data-target="#isianKartu{{ $dataKartu->id }}">
                                                <div class="flex items-center p-3 text-base font-bold rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                                    <span class="flex ms-3">{{ $dataKartu->name }}</span>
                                                </div>
                                            </a>
                                            <!-- /Tampilan Kartu Pengguna -->
                                        </li>
                                    @endforeach
                                        <li class="card-trello hidden" id="cardTrello{{ $dataKolom->id }}">
                                            <div class="flex items-center p-3 text-base font-bold rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                                <form action="{{ route('addCard', ['board_id' => $board->id, 'team_id' => $board->team_id, 'column_id' => $dataKolom->id ]) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" class="form-control" name="board_id" value="{{ $board->id }}">
                                                    <input type="hidden" class="form-control" name="team_id" value="{{ $team->id }}">
                                                    <input type="hidden" class="form-control" name="column_id" value="{{ $dataKolom->id }}">
                                                    <input type="text" class="form-control" name="name" id="cardName" style="border-radius: 15px; background-color: #f5fffa;" placeholder="Masukkan judul ini.." required>
                                                    <button type="submit" class="btn btn-primary submit-btn hidden"></button>
                                                </form>
                                            </div>
                                        </li>
                                        <button onclick="openAdd('{{ $dataKolom->id }}')" class="btn btn-outline-info" style="border-radius: 30px">
                                            <i class="fa-solid fa-plus"></i> Tambah Kartu...
                                        </button>
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

        <!-- Perbaharui Papan Modal -->
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
        <!-- /Perbaharui Papan Modal -->
        
        <!-- Hapus Papan Modal -->
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
        <!-- /Hapus Papan Modal -->

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
                                <input type="text" class="form-control @error('column_name') is-invalid @enderror" id="buat-kolom" name="column_name" required>
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

        <!-- Perbaharui Kolom Modal -->
        @foreach ( $dataColumnCard as $perbaharuiKolom )
            <div id="updateColumn{{ $perbaharuiKolom->id }}" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Perbaharui Kolom</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('updateCol', ['board_id' => $board->id, 'team_id' => $board->team_id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="column_id" id="column_id" value="{{ $perbaharuiKolom->id  }}">
                                <div class="form-group">
                                    <label>Nama Kolom</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control @error('column_name') is-invalid @enderror" id="column_name" name="column_name" value="{{ $perbaharuiKolom->name  }}" required />
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
        @endforeach
        <!-- /Perbaharui Kolom Modal -->

        <!-- Hapus Kolom Modal -->
        @foreach ( $dataColumnCard as $hapusKolom )
            <div id="deleteColumn{{ $hapusKolom->id }}" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Hapus Kolom "{{ $hapusKolom->name }}"?</h3>
                                <p>Apakah Anda yakin ingin menghapus kolom ini?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <form action="{{ route('deleteCol', ['board_id' => $board->id, 'team_id' => $board->team_id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="column_id" id="column_id" value="{{ $hapusKolom->id  }}">
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
        @endforeach
        <!-- /Hapus Kolom Modal -->

        <!-- Isian Kartu Modal -->
        @foreach ( $dataColumnCard as $dataKolom )
            @foreach ($dataKolom->cards as $isianKartu)
            <div id="isianKartu{{ $isianKartu->id }}" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="justify-content: left;">
                            <div class="icon-card">
                                <i class="fa-solid fa-credit-card fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="nama-kartu">{{ $isianKartu->name  }}</h5>
                                @if($isianKartu->history->where('user_id', auth()->user()->id)->isNotEmpty())
                                    <form action="{{ route('hapusKartu', ['card_id' => $isianKartu->id]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $isianKartu->id  }}">
                                        <div class="hapus-kartu">
                                            <button type="submit" style="border: none; background: none; padding: 0;">
                                                <i class="fa-solid fa-trash fa-lg"></i>
                                            </button>
                                        </div>
                                    </form>
                                @endif
                                <p class="tag-list">dalam daftar <a class="tag-name">{{ $dataKolom->name  }}</a></p>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="icon-align">
                                    <i class="fa-solid fa-align-left fa-lg"></i>
                                </div>
                                <div class="keterangan-tag">
                                    <p class="deskripsi-keterangan">Keterangan </p>
                                    <div class="border border-1 border-dark w-40l p-2 rounded">
                                        <p>{{ $isianKartu->description }}</p>
                                    </div>
                                </div>

                                <div class="icon-checklist">
                                    <i class="fa-regular fa-square-check fa-lg"></i>
                                </div>
                                <div class="checklist-tag">
                                    <p class="checklist-keterangan">Checklist </p>
                                        <div class="icon-hapus">
                                            <i class="fa-solid fa-trash fa-lg"></i>
                                        </div>
                                    <p>{{ $isianKartu->description }}</p>
                                    <button onclick="openChecklist('{{ $isianKartu->id }}')" class="btn btn-outline-info icon-item">
                                        <i class="fa-solid fa-plus"></i> Tambahkan Item
                                    </button>
                                </div>

                                <div class="icon-activity">
                                    <i class="fa-solid fa-list-ul fa-lg"></i>
                                </div>
                                <div class="activity-tag">
                                    <p class="activity-keterangan">Activity </p>
                                        <div class="icon-lihat">
                                            <i class="fa-solid fa-eye fa-lg"></i>
                                        </div>
                                    <p>{{ $isianKartu->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endforeach
        <!-- /Isian Kartu Modal -->

        <!-- Perbaharui Kartu Modal Belum Solving -->
        @foreach ( $dataColumnCard as $dataKolom )
            @foreach ($dataKolom->cards as $perbaharuiKartu)
                <div id="editCard{{ $perbaharuiKartu->id }}" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Perbaharui Kartu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('perbaharuiKartu', ['card_id' => $perbaharuiKartu->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $perbaharuiKartu->id  }}">
                                    <div class="form-group">
                                        <label>Nama Kartu</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $perbaharuiKartu->name  }}" required />
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan Kartu</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $perbaharuiKartu->description  }}" />
                                        @error('description')
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
            @endforeach
        @endforeach
        <!-- /Perbaharui Kartu Modal -->

        <style>
            .fa-eye {
                color: black;
                cursor: pointer;
            }
            @foreach($result_tema as $sql_user => $aplikasi_tema)
                @if ($aplikasi_tema->tema_aplikasi == 'Gelap')
                    .fa-eye { color: white}
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