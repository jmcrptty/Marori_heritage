<script>
    // Toggle Sidebar on Mobile
    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('show');
    }

    // Auto-save notification
    function showSaveNotification(message = 'Perubahan berhasil disimpan!') {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'alert alert-success position-fixed top-0 end-0 m-3';
        notification.style.zIndex = '9999';
        notification.innerHTML = `
            <i class="bi bi-check-circle me-2"></i>
            ${message}
        `;

        document.body.appendChild(notification);

        // Remove after 3 seconds
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }

    // Form validation
    document.addEventListener('DOMContentLoaded', function() {
        const forms = document.querySelectorAll('.needs-validation');

        forms.forEach(form => {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            });
        });
    });

    // Image preview
    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Character counter for textarea
    function updateCharCount(textarea, counterId) {
        const counter = document.getElementById(counterId);
        const maxLength = textarea.getAttribute('maxlength');
        const currentLength = textarea.value.length;

        counter.textContent = `${currentLength}${maxLength ? '/' + maxLength : ''} karakter`;
    }

    // Confirm delete
    function confirmDelete(itemName) {
        return confirm(`Apakah Anda yakin ingin menghapus "${itemName}"?`);
    }

    // Auto-save draft (debounced)
    let autoSaveTimeout;
    function autoSaveDraft() {
        clearTimeout(autoSaveTimeout);
        autoSaveTimeout = setTimeout(() => {
            console.log('Auto-saving draft...');
            // Add your auto-save logic here
        }, 2000);
    }
</script>
