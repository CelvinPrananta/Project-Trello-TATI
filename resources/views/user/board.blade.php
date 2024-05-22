@extends('layouts.master')
@section('content')

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Tampilan Background Kolom & Card -->
            <div class="overflow-x-scroll overflow-y-auto bg-grad-{{ $board->pattern }}" style="height: 93vh !important">

                <!-- Tampilan Kolom & Kartu -->
                <div class="tampilan-kolom gap-4 p-4">

                    <a href="#" data-toggle="modal" data-target="#addCol" class="flex-col flex-shrink-0 gap-2 px-4 py-2 transition shadow-lg cursor-pointer select-none h-4h w-72 rounded-xl bg-slate-100 hover:scale-105 hover:relative">
                        <p class="flex items-center justify-center gap-4 text-black"><i class="fa-solid fa-plus fa-lg"></i>Tambah Kolom...</p>
                    </a>

                    <!-- Tampilan Kolom -->
                    @foreach ( $dataColumnCard as $dataKolom )
                        <div class="max-w-73 p-4 bg-whites border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700" onmouseenter="aksiKolomShow({{ $dataKolom->id }})" onmouseleave="aksiKolomHide({{ $dataKolom->id }})">

                            <!-- Tampilan Aksi Edit & Hapus -->
                            <a href="#" data-toggle="modal" data-target="#updateColumn{{ $dataKolom->id }}">
                                <div class="aksi-kolom2" id="aksi-kolom{{ $dataKolom->id }}">
                                    <i class="fa-solid fa-pencil fa-sm"></i>
                                </div>
                            </a>
                            {{-- <a href="#" data-toggle="modal" data-target="#deleteColumn{{ $dataKolom->id }}">
                                <div class="aksi-kolom2" id="aksi-kolom2{{ $dataKolom->id }}">
                                    <i class="fa-solid fa-trash fa-sm"></i>
                                </div>
                            </a> --}}
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
                                                <form action="{{ route('addCard2', ['board_id' => $board->id, 'team_id' => $board->team_id, 'column_id' => $dataKolom->id ]) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" class="form-control" name="board_id" value="{{ $board->id }}">
                                                    <input type="hidden" class="form-control" name="team_id" value="{{ $team->id }}">
                                                    <input type="hidden" class="form-control" name="column_id" value="{{ $dataKolom->id }}">
                                                    <input type="text" class="form-control" name="name" id="cardName" style="border-radius: 15px; background-color: #f5fffa;" placeholder="Masukkan judul ini.." required>
                                                    <button type="submit" class="btn btn-outline-info btn-add">Tambah Kartu</button>
                                                </form>
                                            </div>
                                        </li>
                                        <button onclick="openAdd('{{ $dataKolom->id }}')" class="btn btn-outline-info" style="border-radius: 30px" id="btn-add{{ $dataKolom->id }}">
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
                        {{-- @isset($dataKartu)
                            <form action="{{ route('addCol', ['board_id' => $board->id, 'team_id' => $board->team_id, 'card_id' => $dataKartu->id]) }}" id="addColForm" method="POST">
                        @endif --}}
                        <form action="{{ route('addCol2', ['board_id' => $board->id, 'team_id' => $board->team_id]) }}" id="addColForm" method="POST">
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
                            <form action="{{ route('updateCol2', ['board_id' => $board->id, 'team_id' => $board->team_id]) }}" method="POST">
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

        <!-- Isian Kartu Modal -->
        @foreach ( $dataColumnCard as $dataKolom )
            @foreach ($dataKolom->cards as $isianKartu)
                <div id="isianKartu{{ $isianKartu->id }}" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="justify-content: left;">
                                <div class="icon-card">
                                    <i class="fa-solid fa-credit-card fa-lg"></i>
                                </div>
                                <div>
                                    <h5 class="nama-kartu">{{ $isianKartu->name  }}</h5>
                                    @if($isianKartu->history->where('user_id', auth()->user()->id)->isNotEmpty())
                                        <form action="{{ route('hapusKartu2', ['card_id' => $isianKartu->id]) }}" method="POST">
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

                            @if($isianKartu->history->where('user_id', auth()->user()->id)->isNotEmpty())
                                <!-- Tambah & Edit Keterangan -->
                                <div class="menu-keterangan">
                                    <div class="icon-align">
                                        <i class="fa-solid fa-align-left fa-lg"></i>
                                    </div>
                                    <div class="keterangan-tag">
                                        <p class="deskripsi-keterangan">Keterangan</p>
                                        <form id="myForm{{ $isianKartu->id }}" method="POST">
                                            @csrf
                                            <input type="hidden" id="card_id" name="card_id" value="{{ $isianKartu->id }}">
                                            <input type="text" class="border border-1 border-dark w-40l p-2 rounded-xl" id="keterangan{{ $isianKartu->id }}" name="keterangan" placeholder="Masukkan Keterangan" value="{{ $isianKartu->description }}"><br>
                                            <div class="aksi-update-keterangan gap-2">
                                                <button type="submit" class="btn btn-outline-info icon-keterangan hidden" id="saveButton{{ $isianKartu->id }}">Simpan</button>
                                                <button type="button" class="btn btn-outline-danger icon-keterangan hidden" id="cancelButton{{ $isianKartu->id }}">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                    @include('user.script')
                                </div>
                                <!-- /Tambah & Edit Keterangan -->

                                <!-- Tambah Judul Checklist -->
                                <form id="myFormTitle{{ $isianKartu->id }}" method="POST">
                                    @csrf
                                    <div class="menu-tambah-checklist flex flex-col flex-wrap">
                                        <div class="header-checklist flex gap-5">
                                            <div class="icon-tambah-checklist hidden" id="iconCheck-{{ $isianKartu->id }}">
                                                <i class="fa-regular fa-square-check fa-xl"></i>
                                            </div>
                                            <input type="hidden" id="card_id" name="card_id" value="{{ $isianKartu->id }}">
                                            <input type="text" class="border border-1 border-dark w-40l p-2 rounded-xl hidden" id="titleChecklist{{ $isianKartu->id }}" name="titleChecklist" placeholder="Masukkan Judul" required>
                                        </div>
                                        <div class="aksi-tambah-checklist gap-2">
                                            <button type="submit" class="btn btn-outline-info icon-keterangan hidden" id="saveButtonTitle{{ $isianKartu->id }}">Simpan</button>
                                            <button type="button" class="btn btn-outline-danger icon-keterangan hidden" id="cancelButtonTitle{{ $isianKartu->id }}">Batal</button><br>
                                        </div>
                                    </div>
                                </form>
                                <div class="tambah-checklist">
                                    <button type="button" class="btn btn-outline-info icon-item" id="addTitle-{{ $isianKartu->id }}"><i class="fa-regular fa-square-check fa-lg"></i> Tambah Checklist</button>
                                </div>
                                <!-- /Tambah Judul Checklist -->
                            @else
                                <!-- Tampilan Keterangan Apabila Bukan Punyanya -->
                                <div class="menu-keterangan">
                                    <div class="icon-align">
                                        <i class="fa-solid fa-align-left fa-lg"></i>
                                    </div>
                                    <div class="keterangan-tag">
                                        <p class="deskripsi-keterangan">Keterangan</p>
                                        <p class="border border-1 border-dark w-403 p-2 rounded-xl">{{ $isianKartu->description }}<br>
                                    </div>
                                </div>
                                <!-- /Tampilan Keterangan Apabila Bukan Punyanya -->
                            @endif
                                
                            @if($isianKartu->history->where('user_id', auth()->user()->id)->isNotEmpty())
                                @foreach ($isianKartu->titleChecklists as $titleChecklists)
                                <div class="menu-checklist border border-1 border-dark p-2 rounded-xl">
                                    <!-- Perbaharui & Hapus Judul Checklist -->
                                    <div class="header-checklist flex justify-content">
                                        <i class="fa-regular fa-square-check fa-xl"></i>
                                        <form id="myFormTitleUpdate{{ $titleChecklists->id }}" method="POST" class="update-title">
                                            @csrf
                                                <input type="hidden" id="title_id" name="title_id" value="{{ $titleChecklists->id }}">
                                                <input type="text" class="isian-title border border-1 border-dark w-402 p-2 rounded-xl" id="titleChecklistUpdate{{ $titleChecklists->id }}" name="titleChecklistUpdate" placeholder="Masukkan Judul" value="{{$titleChecklists->name}}">
                                                <div class="aksi-update-title gap-2">
                                                    <button type="submit" class="btn btn-outline-info icon-keterangan hidden" id="saveButtonTitleUpdate{{ $titleChecklists->id }}">Simpan</button>
                                                    <button type="button" class="btn btn-outline-danger icon-keterangan hidden" id="cancelButtonTitleUpdate{{ $titleChecklists->id }}">Batal</button>
                                                </div>
                                        </form>
                                        <form id="myFormTitleDelete{{ $titleChecklists->id }}" method="POST">
                                            @csrf
                                            <input type="hidden" id="id" name="id" value="{{ $titleChecklists->id }}">
                                            <input type="hidden" id="card_id" name="card_id" value="{{ $isianKartu->id }}">
                                            <div class="icon-hapus-title" id="hapus-title{{ $titleChecklists->id }}">
                                                <button type="submit" style="border: none; background: none; padding: 0;">
                                                    <i class="fa-solid fa-trash fa-lg"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /Perbaharui & Hapus Judul Checklist -->

                                    <!-- Progress Bar Checklist -->
                                    <div class="progress" data-checklist-id="{{ $titleChecklists->id }}">
                                        <div class="progress-bar progress-bar-{{ $titleChecklists->id }}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                            0%
                                        </div>
                                    </div>
                                    <!-- Progress Bar Checklist -->
                                   
                                    <!-- Perbaharui & Hapus Checklist -->
                                    @include('user.script2')
                                    @foreach ($titleChecklists->checklists as $checklists)
                                    <div class="input-checklist">
                                        <!-- Tampilan Checklist -->
                                        <form id="myFormChecklistUpdate{{ $checklists->id }}" method="POST" class="form-checklist flex gap-5">
                                            @csrf
                                            <input class="dynamicCheckbox" type="checkbox" id="{{$checklists->id}}" name="{{$checklists->id}}" {{$checklists->is_active == '1' ? 'checked' : ''}}>
                                            <label class="dynamicCheckboxLabel border border-1 border-dark w-407 p-2 rounded-xl  {{$checklists->is_active == '1' ? 'strike-through' : ''}}" id="labelCheckbox-{{$checklists->id}}" for="labelCheckbox-{{$checklists->id}}">{{$checklists->name}}</label>

                                            <input type="hidden" id="checklist_id" name="checklist_id" value="{{ $checklists->id }}">
                                            <input type="text" class="dynamicCheckboxValue border border-1 border-dark w-407 p-2 rounded-xl hidden" id="checkbox-{{$checklists->id}}" name="checkbox-{{$checklists->id}}" value="{{$checklists->name}}" placeholder="Masukkan checklist">
                                        </form>
                                        <!-- Icon Hapus Checklist -->
                                        @if($isianKartu->history->where('user_id', auth()->user()->id)->isNotEmpty())
                                            <form id="myFormChecklistDelete{{ $checklists->id }}" method="POST">
                                                @csrf
                                                <input type="hidden" id="id" name="id" value="{{ $checklists->id }}">
                                                <input type="hidden" id="card_id" name="card_id" value="{{ $isianKartu->id }}">
                                                <div class="icon-hapus-checklist" id="hapus-checklist{{ $checklists->id }}">
                                                    <button type="submit" style="border: none; background: none; padding: 0;">
                                                        <i class="fa-solid fa-trash fa-lg"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        @endif
                                        <!-- /Icon Hapus Checklist -->
                                    </div>
                                    <!-- /Tampilan Checklist -->

                                    <!-- Aksi Update Checklist -->
                                    <div class="aksi-update-checklist gap-2">
                                        <button type="submit" class="saves btn btn-outline-info hidden" id="saveButtonChecklistUpdate-{{ $checklists->id }}">Simpan</button>
                                        <button type="button" class="cancels btn btn-outline-danger hidden" id="cancelButtonChecklistUpdate-{{ $checklists->id }}">Batal</button>
                                    </div>
                                    <!-- /Aksi Update Checklist -->

                                    @include('user.script4')
                                    @include('user.script3')
                                    @endforeach
                                    <!-- /Perbaharui & Hapus Checklist -->

                                    <!-- Tambah baru checklist -->
                                    <div id="checkbox-container-{{ $titleChecklists->id }}"></div>
                                    <form id="myFormChecklist{{ $titleChecklists->id }}" method="POST">
                                        @csrf
                                            <input type="hidden" id="title_id" name="title_id" value="{{ $titleChecklists->id }}">
                                            <div class="header-tambah-checklist flex gap-4">
                                                <i class="fa-xl"></i>
                                                <input type="text" class="tambah-baru-checklist border border-1 border-dark w-407 p-2 rounded-xl hidden" id="checklist{{ $titleChecklists->id }}" name="checklist" placeholder="Masukkan Checklist" required>
                                            </div>
                                            <div class="aksi-update-checklist gap-2">
                                                <button type="submit" class="btn btn-outline-info icon-keterangan hidden" id="saveButtonChecklist{{ $titleChecklists->id }}">Simpan</button>
                                                <button type="button" class="btn btn-outline-danger icon-keterangan hidden" id="cancelButtonChecklist{{ $titleChecklists->id }}">Batal</button>
                                            </div>
                                    </form>
                                    <button type="button" class="btn btn-outline-info" id="AddChecklist{{ $titleChecklists->id }}">Tambah Item</button>
                                    <!-- Tambah baru checklist -->
                                    </div>
                                @endforeach
                            @else
                                @foreach ($isianKartu->titleChecklists as $titleChecklists)
                                    <div class="menu-checklist border border-1 border-dark p-2 rounded-xl">
                                        <!-- Perbaharui & Hapus Judul Checklist -->
                                        <div class="header-checklist flex gap-4">
                                            <i class="fa-regular fa-square-check fa-xl"></i>
                                            <p class="isian-title border border-1 border-dark w-408 p-2 rounded-xl">{{$titleChecklists->name}}</p>
                                        </div>
                                        <!-- /Perbaharui & Hapus Judul Checklist -->

                                        <!-- Progress Bar Checklist -->
                                        <div class="progress2" data-checklist-id="{{ $titleChecklists->id }}">
                                            <div class="progress-bar progress-bar-{{ $titleChecklists->id }}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                                0%
                                            </div>
                                        </div>
                                        @include('user.script5')
                                        <!-- Progress Bar Checklist -->
                                    
                                        <!-- Perbaharui & Hapus Checklist -->
                                        @foreach ($titleChecklists->checklists as $checklists)
                                            <div class="input-checklist gap-4">
                                                <!-- Tampilan Checklist -->
                                                <i class="fa-regular fa-square-check fa-xl"></i>
                                                <label class="dynamicCheckboxLabel border border-1 border-dark w-408 p-2 rounded-xl">{{$checklists->name}}</label>
                                            </div>
                                            <!-- /Tampilan Checklist -->
                                        @endforeach
                                        <!-- /Perbaharui & Hapus Checklist -->
                                    </div>
                                @endforeach
                            @endif

                                <div class="menu-activity flex flex-col flex-wrap">
                                    <div class="header-activity">
                                        <i class="fa-solid fa-list-ul fa-lg"></i>
                                        <p class="activity-keterangan">Activity </p>
                                        <div onclick="showActivity()" class="icon-lihat">
                                            <i class="fa-solid fa-eye fa-lg" id="showActivityIcon"></i>
                                        </div>
                                    </div>
                                    <div class="input-komentar flex gap-3">
                                        <img class="avatar-activity" src="{{ URL::to('/assets/images/' . Auth::user()->avatar) }}" loading="lazy">
                                        <form action="{{ route('komentarKartu2', ['card_id' => $dataKartu->id]) }}" method="POST">
                                            <textarea onclick="saveComment()" class="form-control border border-1 border-dark rounded-xl" rows="1" cols="79" id="komentar" name="komentar" placeholder="Tulis komentar..."></textarea>
                                            <button type="submit" class="btn btn-outline-info icon-comment hidden" id="simpanButton">Kirim</button>
                                        </form>
                                    </div>
                                    <div class="activity-tag flex flex-col hiddens" id="showActivity">
                                        @foreach($isianHistory as $history)
                                            <div class="isian-tag">
                                                @if ($history->type === 'event')
                                                    <div class="isian-history flex gap-1">
                                                        <img class="avatar-activity" src="{{ URL::to('/assets/images/' . $history->avatar) }}" loading="lazy">
                                                        <div class="title-activity flex gap-1">
                                                            @if (strpos($history->content, 'Membuat Kolom') !== false)
                                                                <p>{{ $history->name }},</p>
                                                                <p>telah membuat</p>
                                                                <p>kolom</p>
                                                                <p>ini</p>
                                                            @elseif (strpos($history->content, 'Membuat Kartu') !== false)
                                                                <p>{{ $history->name }},</p>
                                                                <p>menambahkan</p>
                                                                <p>Senin</p>
                                                                <p>ke kartu ini</p>
                                                            @elseif (strpos($history->content, 'Menghapus Kartu') !== false)
                                                                <p>{{ $history->name }},</p>
                                                                <p>menghapus</p>
                                                                <p>Senin</p>
                                                                <p>ke kartu ini</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="waktu-history">
                                                        <p><i class="fa-solid fa-clock" style="color: #808080;" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($history->created_at)->translatedFormat('j F \p\u\k\u\l h:i A') }}</p>
                                                    </div>
                                                @endif
                                                @if ($history->type === 'comment')
                                                    <div class="isian-history flex gap-1">
                                                        <img class="avatar-activity" src="{{ URL::to('/assets/images/' . $history->avatar) }}" loading="lazy">
                                                        <div class="title-activity flex gap-1">
                                                            <p>{{ $history->name }} <br><span>{{ $history->content }}</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="waktu-history">
                                                        <p><i class="fa-solid fa-clock" style="color: #808080;" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($history->created_at)->translatedFormat('j F \p\u\k\u\l h:i A') }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
        <!-- /Isian Kartu Modal -->

        <!-- Perbaharui Kartu Modal -->
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
                                <form action="{{ route('perbaharuiKartu2', ['card_id' => $perbaharuiKartu->id]) }}" method="POST">
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
            input[type="checkbox"] {    
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                width: 20px;
                height: 20px;
                border: 2px solid black;
                border-radius: 4px;
                cursor: pointer;
            }
            input[type="checkbox"]:checked {
                background-color: #539dec;
                border-color: #539dec;
            }
            input[type="checkbox"]:checked::after {
                content: '✔';
                display: block;
                color: white;
                font-size: 16px;
                font-weight: 700;
                text-align: center;
                line-height: 20px;
            }
            .strike-through {
                text-decoration: line-through;
                font-weight: 600;
                color: #dc3545;
            }
            .progress {
                display:-ms-flexbox;
                display:flex;
                height:1rem;
                overflow:hidden;
                line-height:0;
                font-size:.75rem;
                background-color:#e9ecef;
                border-radius:1rem;
                margin-bottom:10px;
                margin-top:-4px;
                width:84.8%;
                margin-left:5.5%
            }
            .progress2 {
                display:-ms-flexbox;
                display:flex;
                height:1rem;
                overflow:hidden;
                line-height:0;
                font-size:.75rem;
                background-color:#e9ecef;
                border-radius:1rem;
                margin-bottom:10px;
                margin-top:-4px;
                width:90%;
                margin-left:5.5%
            }
            
            @foreach($result_tema as $sql_mode => $mode_tema)
                @if ($mode_tema->tema_aplikasi == 'Gelap')
                    .fa-eye { color: white}
                    .fa-trash { color: white}
                    p {color: {{ $mode_tema->warna_mode }} !important}
                    .custom-modal .tag-list {color: {{ $mode_tema->warna_sistem_tulisan }} !important}
                    .deskripsi-keterangan {color: {{ $mode_tema->warna_sistem_tulisan }} !important}
                    .checklist-keterangan {color: {{ $mode_tema->warna_sistem_tulisan }} !important}
                    .activity-keterangan {color: {{ $mode_tema->warna_sistem_tulisan }} !important}
                    .border-dark {border-color: {{ $mode_tema->warna_sistem_tulisan }} !important;}
                    .isian-keterangan {color: {{ $mode_tema->warna_sistem_tulisan }} !important}
                    .isian-checklist {color: {{ $mode_tema->warna_sistem_tulisan }} !important}
                    input[type=text] {color: white;   background-color: {{ $mode_tema->warna_mode }} !important}
                    .dynamicCheckboxLabel {background-color: {{ $mode_tema->warna_mode }} !important}
                    input[type="checkbox"] {background-color: {{ $mode_tema->warna_mode }} !important; border: 2px solid white !important}
                    input[type="checkbox"]:checked {border-color: {{ $mode_tema->warna_sistem_tulisan }} !important}
                @endif
            @endforeach
        </style>

    @section('script')
        <script src="{{ asset('assets/js/memuat-data-kolom-board.js') }}"></script>
        <script src="{{ asset('assets/js/memuat-onclick-board.js') }}"></script>
        <script src="{{ asset('assets/js/memuat-ulang.js') }}"></script>

        <script>
            history.pushState({}, "", '/user/tim/papan/{{ $team->id }}/{{ $board->id }}');
        </script>
        
        <script>
            document.getElementById('pageTitle').innerHTML = 'Kartu Tim - User | Trello - PT TATI';
        </script>
    @endsection
@endsection