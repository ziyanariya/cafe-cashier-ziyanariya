<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        /* Styling untuk tampilan */
        .contact-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        .map-container {
            margin-top: 20px;
        }
        #map {
            height: 300px;
            width: 100%;
        }
        form {
            margin-top: 20px;
            text-align: left;
        }
        label, input, textarea {
            display: block;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <h1>Contact Us</h1>
        <p>Alamat: Jalan Contoh No. 123, Kota Contoh, Negara</p>
        <img src="office.jpg" alt="Kantor Kami" width="400">
        
        <!-- Google Maps Container -->
        <div class="map-container">
            <div id="map"></div>
        </div>
        
        <!-- Formulir Kontak -->
        <form id="contact-form">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Pertanyaan:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            <button type="submit">Kirim</button>
        </form>
    </div>

    <!-- Google Maps API -->
    <script>
        function initMap() {
            var officeLocation = {lat: -7.123456, lng: 110.123456}; // Ganti dengan koordinat kantor Anda
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: officeLocation
            });
            var marker = new google.maps.Marker({
                position: officeLocation,
                map: map
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

    <!-- JavaScript untuk mengirim formulir -->
    <script>
        document.getElementById("contact-form").addEventListener("submit", function(event) {
            event.preventDefault(); // Menghentikan pengiriman formulir default
            // Ambil nilai dari formulir
            var formData = new FormData(this);
            // Kirim data ke backend atau lakukan operasi lainnya (seperti menyimpan ke database)
            // Contoh: Kirim data menggunakan fetch API
            fetch("process_contact_form.php", {
                method: "POST",
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    alert("Pesan Anda telah terkirim. Terima kasih!");
                    // Kosongkan formulir setelah berhasil terkirim
                    document.getElementById("contact-form").reset();
                } else {
                    throw new Error("Gagal mengirim pesan.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.");
            });
        });
    </script>
</body>
</html>