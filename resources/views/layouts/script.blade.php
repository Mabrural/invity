<script>
    // Add Guest Functionality
    document.getElementById('addGuestBtn').addEventListener('click', function() {
        const name = document.getElementById('guestName').value;
        const email = document.getElementById('guestEmail').value;
        const phone = document.getElementById('guestPhone').value;
        const group = document.getElementById('guestGroup').value;

        if (!name || !email || !phone || !group) {
            alert('Harap isi semua field!');
            return;
        }

        // Simulasi penambahan tamu
        alert(`Tamu ${name} berhasil ditambahkan! (simulasi)`);

        // Reset form
        document.getElementById('guestName').value = '';
        document.getElementById('guestEmail').value = '';
        document.getElementById('guestPhone').value = '';
        document.getElementById('guestGroup').value = '';
    });

    // Copy Link Functionality
    document.querySelectorAll('.btn-copy').forEach(button => {
        button.addEventListener('click', function() {
            const link = this.getAttribute('data-link');
            copyToClipboard(link);

            // Show toast notification
            const toast = document.getElementById('toast');
            toast.classList.add('show');

            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        });
    });

    // Copy to Clipboard Function
    function copyToClipboard(text) {
        const textarea = document.createElement('textarea');
        textarea.value = text;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
    }

    // Delete Guest Functionality
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function() {
            const guestName = this.closest('tr').querySelector('.guest-name div:last-child')
            .textContent;

            if (confirm(`Apakah Anda yakin ingin menghapus ${guestName} dari daftar tamu?`)) {
                // Simulasi penghapusan
                this.closest('tr').remove();
                alert(`${guestName} berhasil dihapus! (simulasi)`);
            }
        });
    });
</script>
