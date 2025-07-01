@php
    $uniq = 'soal' . $nomor;

@endphp

<div class="bg-white rounded shadow-sm p-3 mb-4">
    <h5 class="fw-semibold">Soal No. {{ $nomor }}</h5>
    <p>Urutkan deret bilangan pada gambar berikut menggunakan <strong>Insertion Sort</strong>.</p>
    <div class="text-center mb-3">
        <img src="{{ asset($gambarSoal) }}" alt="Soal Bubble Sort" class="img-fluid rounded border shadow-sm"
            style="max-width: 400px;">
    </div>

    <div class="alert alert-info">
        <i class="bi bi-info-circle"></i> <b>Petunjuk:</b> Di bawah ini ada kolom kosong yang harus kamu isi dengan hasil
        pengurutan dari iterasi.
        <b>Contohnya:</b> Kalau hasil dari iterasi ke-1 adalah [2, 4, 6, 8], maka kamu tinggal seret dan letakkan
        angka-angka tersebut ke tempat yang sudah disediakan.
    </div>

    <table class="table table-bordered table-hover align-middle text-center bg-white shadow">
        <thead>
            <tr>
                <th>Iterasi</th>
                <th>Pencocokan Iterasi</th>
                <th>Deret bilangan (Drag me!)</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= 3; $i++)
                <tr>
                    <td>Iterasi {{ $i }}</td>
                    <td>
                        <div class="drop-zone" id="drop-{{ $i }}-{{ $uniq }}"
                            ondrop="drop_{{ $uniq }}(event)" ondragover="allowDrop_{{ $uniq }}(event)">
                            Tarik gambar ke sini
                        </div>
                        <div class="feedback text-success fw-bold mt-2"
                            id="feedback-{{ $i }}-{{ $uniq }}"></div>
                    </td>
                    @if ($i === 1)
                        <td rowspan="3" id="image-pool-{{ $uniq }}">
                            @foreach ($gambarIterasi as $id => $src)
                                <img src="{{ asset($src) }}" draggable="true"
                                    ondragstart="drag_{{ $uniq }}(event)"
                                    id="{{ $id }}-{{ $uniq }}" class="sort-image draggable">
                            @endforeach
                        </td>
                    @endif
                </tr>
            @endfor
        </tbody>
    </table>

    <div class="text-center mt-4">
        <button onclick="cekJawaban_{{ $uniq }}()" class="btn btn-primary btn-lg me-2">Cek Jawaban</button>
        <button onclick="resetLatihan_{{ $uniq }}()" class="btn btn-secondary btn-lg">🔁 Reset</button>
    </div>

    <!-- MODAL FEEDBACK -->
    {{-- <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p id="modalMessage">...</p>
                    <button  class="btn btn-success" onclick="tampilkanSoal({{ $nomor+1 }})">Soal Selanjutnya ➡️</button>
                </div>
                <div class="modal-footer justify-content-center">

                </div>
            </div>
        </div>
    </div> --}}

    <!-- SCRIPT -->
    <script>
        const jawabanBenar_{{ $uniq }} = @json($jawabanBenar);

        function allowDrop_{{ $uniq }}(ev) {
            ev.preventDefault();
        }

        function drag_{{ $uniq }}(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop_{{ $uniq }}(ev) {
            ev.preventDefault();
            const data = ev.dataTransfer.getData("text");
            const dropZone = ev.target;

            if (!dropZone.querySelector('img')) {
                const draggedImg = document.getElementById(data);
                dropZone.appendChild(draggedImg);
                draggedImg.classList.add('dropped'); // Menambahkan kelas 'dropped'
            }
        }



        function cekJawaban_{{ $uniq }}() {
            let semuaBenar = true;

            for (let i = 1; i <= 3; i++) {
                const dropZone = document.getElementById(`drop-${i}-{{ $uniq }}`);
                const feedback = document.getElementById(`feedback-${i}-{{ $uniq }}`);
                const droppedImg = dropZone.querySelector('img');
                console.log(droppedImg.id, jawabanBenar_{{ $uniq }}[i] + `-{{ $uniq }}`)
                if (droppedImg) {
                    if (droppedImg.id === jawabanBenar_{{ $uniq }}[i] + `-{{ $uniq }}`) {
                        feedback.innerText = "✅ Benar!";
                        feedback.classList.remove('text-danger', 'text-warning');
                        feedback.classList.add('text-success');
                    } else {
                        semuaBenar = false;
                        feedback.innerText = "❌ Salah!";
                        feedback.classList.remove('text-success', 'text-warning');
                        feedback.classList.add('text-danger');
                    }
                } else {
                    semuaBenar = false;
                    feedback.innerText = "❗ Belum diisi!";
                    feedback.classList.remove('text-success', 'text-danger');
                    feedback.classList.add('text-warning');
                }
            }

            showModalFeedback_{{ $uniq }}(semuaBenar);
        }

        function showModalFeedback_{{ $uniq }}(statusBenar) {
            const modalTitle = document.getElementById('modalTitle');
            const modalMsg = document.getElementById('modalMessage');
            const modalButtons = document.getElementById('modalButtons');

            // modalTitle.innerText = "Jawaban disimpans";
            // modalMsg.innerText = "Lanjut ke soal selanjutnya!";


            setJawabanBenar('{{ $nomor }}', statusBenar)

            // if (statusBenar) {
            // } else {
            //     modalTitle.innerText = "😢 Jawaban Anda Salah!";
            //     modalMsg.innerText = "Coba cek lagi dan ulangi ya!";
            //     modalButtons.innerHTML =
            //         `<button class="btn btn-danger" onclick="resetLatihan()" data-bs-dismiss="modal">Ulangi 🔁</button>`;
            // }
        }

        function resetLatihan_{{ $uniq }}() {
            const pool = document.getElementById('image-pool-{{ $uniq }}');
            const imageOrder = @json(array_keys($gambarIterasi));

            // Kembalikan gambar ke urutan awal hanya jika gambar belum di-drop
            imageOrder.forEach(id => {
                const img = document.getElementById(id +
                    '-{{ $uniq }}'); // Image by its ID with unique suffix
                if (img && !img.classList.contains('dropped')) { // Cek jika gambar belum di-drop
                    if (!pool.contains(img)) {
                        pool.appendChild(img); // Gambar yang belum di-drop tetap berada di pool
                    }
                }
            });

            // Periksa dan kembalikan gambar yang ada di drop zone ke pool
            for (let i = 1; i <= 3; i++) {
                const dropZone = document.getElementById(`drop-${i}-{{ $uniq }}`);
                const droppedImg = dropZone.querySelector('img'); // Gambar yang sudah ada di drop zone

                if (droppedImg) {
                    // Jika gambar ditemukan di drop zone, hapus kelas 'dropped' dan kembalikan ke pool
                    droppedImg.classList.remove('dropped');
                    if (!pool.contains(droppedImg)) {
                        pool.appendChild(droppedImg); // Kembalikan gambar ke pool
                    }
                }
            }

            // Reset drop zones dan feedback
            for (let i = 1; i <= 3; i++) {
                const dropZone = document.getElementById(`drop-${i}-{{ $uniq }}`);
                dropZone.innerHTML = "Tarik gambar ke sini"; // Reset drop zone placeholder text

                const feedback = document.getElementById(`feedback-${i}-{{ $uniq }}`);
                feedback.innerText = ''; // Clear feedback text
                feedback.classList.remove('text-success', 'text-danger', 'text-warning'); // Reset feedback styles
            }

            deleteJawaban('{{ $nomor }}'); // Hapus jawaban yang sudah disimpan
        }
    </script>
</div>
