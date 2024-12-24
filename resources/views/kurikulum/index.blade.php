@extends('artikel/template/app')

@section('content')

    <h2 class="my-4 text-center">@yield('title')</h2>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.all.min.js"></script>
    <div class="container mt-5">
        <h2 class="text-center">Register Online</h2>
        <!-- Form for registering users -->
        <form id="registerForm">
            @csrf
            <div class="mb-3">
                <label for="no_un" class="form-label">No. UN/US SD/MI/Sederajat</label>
                <input type="text" class="form-control" id="no_un" name="no_un" required>
                @error('no_un')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="fullname" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required>
                @error('fullname')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                @error('jenis_kelamin')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota" required>
                @error('kota')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ttl" class="form-label">Tempat, Tanggal Lahir</label>
                <input type="text" class="form-control" id="ttl" name="ttl" required>
                @error('ttl')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
                @error('email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp" required>
                @error('no_hp')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <input type="text" class="form-control" id="agama" name="agama" required>
                @error('agama')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" required>
                @error('asal_sekolah')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_orangtua" class="form-label">Nama Orang Tua</label>
                <input type="text" class="form-control" id="nama_orangtua" name="nama_orangtua" required>
                @error('nama_orangtua')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>

                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                @error('alamat')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
    </div>

    <!-- Optionally, include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Handle form submission using AJAX
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Prepare form data
            let formData = new FormData(this);

            // Send data via AJAX POST
            fetch('{{ route('register.online') }}', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Display success modal with SweetAlert2
                    Swal.fire({
                        icon: 'success',
                        title: 'Registration Successful',
                        text: data.message,
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Open a new tab with the registration data for printing
                            let printWindow = window.open('', '_blank');
                            printWindow.document.write('<html><head><title>Registration Details</title></head><body>');
                            printWindow.document.write('<h2>Registration Details</h2>');
                            printWindow.document.write('<p><strong>Code:</strong> ' + data.data.code_pendaftaran + '</p>');
                            printWindow.document.write('<p><strong>No. UN/US SD/MI/Sederajat:</strong> ' + data.data.no_un + '</p>');
                            printWindow.document.write('<p><strong>Full Name:</strong> ' + data.data.fullname + '</p>');
                            printWindow.document.write('<p><strong>Jenis Kelamin:</strong> ' + data.data.jenis_kelamin + '</p>');
                            printWindow.document.write('<p><strong>Kota:</strong> ' + data.data.kota + '</p>');
                            printWindow.document.write('<p><strong>Tempat, Tanggal Lahir:</strong> ' + data.data.ttl + '</p>');
                            printWindow.document.write('<p><strong>Agama:</strong> ' + data.data.agama + '</p>');
                            printWindow.document.write('<p><strong>Email:</strong> ' + data.data.email + '</p>');
                            printWindow.document.write('<p><strong>Phone Number:</strong> ' + data.data.no_hp + '</p>');
                            printWindow.document.write('<p><strong>Address:</strong> ' + data.data.alamat + '</p>');
                            printWindow.document.write('</body></html>');
                            printWindow.document.close(); // Close the document for rendering

                            // Automatically trigger print dialog in the new window
                            printWindow.print();
                        }
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            });
        });
    </script>
@endsection
