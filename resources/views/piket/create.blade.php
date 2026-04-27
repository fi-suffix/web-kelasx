<x-layout>
<div class="edit_and_create_container">
    <div class="universal_card">
        <div class="universal_header">
            <h3>Tambahkan Dokumentasi Piket</h3>
        </div>
        <form action="{{ route('piket.store') }}" method="POST" enctype="multipart/form-data">
            <div class="container-create-siswa">
                @csrf
                <div class="form_group form-image-upload">
                    <label for="photo">Masukkan Foto piket hari ini</label>
                    <div class="image-upload-wrapper">
                        <label for="image" class="image-label" id="imageDropZone">
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <div class="upload-text">
                                <h4>Unggah Foto Siswa</h4>
                                <p>Drag & drop foto di sini atau klik untuk memilih</p>
                                <div class="file-types">.jpg .jpeg .png .gif (Max: 5MB)</div>
                            </div>
                        </label>
                    <input type="file" name="photo" id="photo" required>
                    <div id="imageStatus" class="upload-status"></div>
                        <div id="imagePreview" class="image-preview" style="display: none;">
                            <div class="image-preview-container">
                                <img id="previewImg" src="" alt="Preview">
                            </div>
                            <div class="image-preview-info">
                                <span class="image-file-name" id="fileName">Nama file</span>
                                <button type="button" class="remove-image-btn" id="removeImageBtn" title="Hapus gambar">
                                    <i class="fas fa-times"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></i>
                                </button>
                            </div>
                        </div>
                </div>
                <button type="submit" class="btn_login">Submit</button>
            </div>
        </form>
    </div>
</div>
</x-layout>

<script>
    // Image Upload Handler
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const imageDropZone = document.getElementById('imageDropZone');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        const fileName = document.getElementById('fileName');
        const removeImageBtn = document.getElementById('removeImageBtn');
        const imageStatus = document.getElementById('imageStatus');
        const MAX_FILE_SIZE = 5 * 1024 * 1024; // 5MB

        // Handle file selection via input
        imageInput.addEventListener('change', handleFileSelect);

        // Handle drag and drop
        imageDropZone.addEventListener('dragover', handleDragOver);
        imageDropZone.addEventListener('dragleave', handleDragLeave);
        imageDropZone.addEventListener('drop', handleDrop);

        // Handle remove button
        removeImageBtn.addEventListener('click', removeImage);

        function handleDragOver(e) {
            e.preventDefault();
            e.stopPropagation();
            imageDropZone.classList.add('drag-over');
        }

        function handleDragLeave(e) {
            e.preventDefault();
            e.stopPropagation();
            imageDropZone.classList.remove('drag-over');
        }

        function handleDrop(e) {
            e.preventDefault();
            e.stopPropagation();
            imageDropZone.classList.remove('drag-over');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                imageInput.files = files;
                handleFileSelect({ target: { files: files } });
            }
        }

        function handleFileSelect(e) {
            const file = e.target.files[0];
            
            // Clear previous status
            imageStatus.classList.remove('show', 'success', 'error');
            
            if (!file) {
                return;
            }

            // Validate file type
            if (!file.type.startsWith('image/')) {
                showStatus('Harap pilih file gambar yang valid (JPG, PNG, GIF)', 'error');
                imageInput.value = '';
                return;
            }

            // Validate file size
            if (file.size > MAX_FILE_SIZE) {
                showStatus('Ukuran file terlalu besar. Maksimal 5MB.', 'error');
                imageInput.value = '';
                return;
            }

            // Read and display preview
            const reader = new FileReader();
            reader.onload = function(event) {
                previewImg.src = event.target.result;
                fileName.textContent = file.name;
                imagePreview.style.display = 'block';
                imageDropZone.style.display = 'none';
                showStatus('Gambar berhasil dipilih!', 'success');
            };
            reader.readAsDataURL(file);
        }

        function removeImage() {
            imageInput.value = '';
            imagePreview.style.display = 'none';
            imageDropZone.style.display = 'flex';
            imageStatus.classList.remove('show', 'success', 'error');
        }

        function showStatus(message, type) {
            imageStatus.textContent = message;
            imageStatus.classList.add('show', type);
            
            // Auto hide success message after 3 seconds
            if (type === 'success') {
                setTimeout(() => {
                    imageStatus.classList.remove('show');
                }, 3000);
            }
        }
    });
</script>
