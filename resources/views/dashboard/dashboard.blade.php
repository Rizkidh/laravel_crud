<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Bucin - Cinta Cheesy</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <style>
        :root {
            --primary: #ff5c8d;
            --primary-dark: #ff3d78;
            --glass: rgba(255, 255, 255, 0.75);
            --shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', 'Arial', sans-serif;
            background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.4), rgba(255, 92, 141, 0.3)), url('{{ asset("images/background.png") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #2d1b2d;
            text-align: center;
            margin: 0;
            min-height: 100vh;
            padding: 0;
            backdrop-filter: blur(2px);
        }

        header {
            padding: 30px 20px 10px;
        }

        h1 {
            margin: 0 0 10px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        h2 {
            margin: 0 0 12px;
            font-weight: 600;
        }

        p {
            margin: 0;
            line-height: 1.6;
        }

        main {
            padding: 20px;
            max-width: 1100px;
            margin: 0 auto 120px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 20px;
        }

        .card {
            background: var(--glass);
            border-radius: 18px;
            padding: 24px;
            box-shadow: var(--shadow);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.35);
            text-align: left;
        }

        .card h2 {
            color: var(--primary);
        }

        .card p.lead {
            font-size: 15px;
            margin-bottom: 16px;
        }

        #quote-display {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.12);
            margin-top: 12px;
            position: relative;
        }

        #quote-display::before {
            content: "“";
            position: absolute;
            left: 12px;
            top: -16px;
            font-size: 64px;
            color: rgba(255, 92, 141, 0.25);
        }

        #quote-text {
            font-size: 18px;
            font-weight: 600;
            color: #401c3b;
            margin: 0;
        }

        .btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 12px 18px;
            border-radius: 12px;
            cursor: pointer;
            margin-top: 14px;
            font-weight: 600;
            letter-spacing: 0.2px;
            transition: transform 0.15s ease, box-shadow 0.15s ease, background 0.2s ease;
            box-shadow: 0 12px 25px rgba(255, 92, 141, 0.35);
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn.secondary {
            background: white;
            color: var(--primary);
            border: 1px solid rgba(255, 92, 141, 0.4);
        }

        .btn.secondary:hover {
            background: rgba(255, 92, 141, 0.08);
        }

        #heart-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            min-height: 120px;
        }

        .heart {
            font-size: 44px;
            color: #ff3d78;
            animation: float 2.4s ease-in-out infinite;
            filter: drop-shadow(0 6px 10px rgba(255, 92, 141, 0.4));
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .cta-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.7);
            padding: 10px 16px;
            border-radius: 14px;
            box-shadow: var(--shadow);
            color: #ad2c6f;
            font-weight: 600;
        }

        footer {
            background: linear-gradient(90deg, var(--primary), #ffa1c0);
            color: white;
            padding: 12px;
            position: fixed;
            bottom: 0;
            width: 100%;
            left: 0;
        }

        /* Modal */
        .modal-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
            display: grid;
            place-items: center;
            padding: 20px;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.2s ease, visibility 0.2s ease;
            z-index: 10;
        }

        .modal-backdrop.active {
            visibility: visible;
            opacity: 1;
        }

        .modal {
            background: white;
            border-radius: 16px;
            padding: 22px 20px;
            max-width: 420px;
            width: 100%;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.18);
            text-align: center;
            position: relative;
        }

        .modal h3 {
            margin: 0 0 8px;
            color: var(--primary);
        }

        .modal p {
            margin: 0 0 14px;
            color: #3b2241;
        }

        .modal .close-btn {
            position: absolute;
            right: 12px;
            top: 12px;
            background: transparent;
            border: none;
            font-size: 20px;
            color: #a23d76;
            cursor: pointer;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 92, 141, 0.12);
            color: #a23d76;
            padding: 8px 12px;
            border-radius: 999px;
            font-weight: 600;
            font-size: 13px;
        }
    </style>
    <header>
        <h1>🌹 Selamat Datang di Dunia Bucin 🌹</h1>
        <p>Tempat untuk para pecinta cinta yang super cheesy!</p>
        <div class="cta-badge" aria-label="Ajakan manis">
            <span>✨ Tebar kata manis, buat harinya berwarna.</span>
        </div>
    </header>

    <main>
        <section id="quotes" class="card">
            <h2>Quotes Bucin Hari Ini</h2>
            <p class="lead">Klik untuk dapatkan kutipan acak, lalu munculkan pop-up kata manis.</p>
            <div id="quote-display">
                <p id="quote-text">"Aku mencintaimu seperti bintang mencintai malam."</p>
            </div>
            <button class="btn" id="new-quote">Quote Baru</button>
            <button class="btn secondary" id="open-popup">Pop-up Kata Manis</button>
        </section>

        <section id="hearts" class="card">
            <h2>Hati-Hati Bucin</h2>
            <p class="lead">Tambahkan hati yang menari untuk mempermanis suasana.</p>
            <div id="heart-container" aria-live="polite">
                <!-- Hati akan dihasilkan oleh JS -->
            </div>
            <button class="btn" id="add-heart">Tambah Hati</button>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Web Bucin. Dibuat dengan cinta cheesy.</p>
    </footer>

    <script src="script.js"></script>
</body>

<script>
    const quotes = [
        "Aku mencintaimu seperti bintang mencintai malam.",
        "Kamu adalah alasan aku tersenyum setiap hari.",
        "Cinta itu seperti WiFi, aku tidak bisa hidup tanpamu.",
        "Aku bucin karena kamu, sayang.",
        "Jika cinta adalah penyakit, aku ingin sakit selamanya.",
        "Hatiku seperti playlist, lagunya cuma tentang kamu.",
        "Kalau rindu itu hujan, aku sudah banjir karenamu.",
        "Kamu kopi pagiku: pahit, hangat, bikin nagih."
    ];

    const quoteText = document.getElementById('quote-text');
    const newQuoteBtn = document.getElementById('new-quote');
    const heartContainer = document.getElementById('heart-container');
    const addHeartBtn = document.getElementById('add-heart');
    const openPopupBtn = document.getElementById('open-popup');

    // Modal elements
    const backdrop = document.createElement('div');
    backdrop.className = 'modal-backdrop';
    backdrop.innerHTML = `
        <div class="modal" role="dialog" aria-modal="true">
            <button class="close-btn" aria-label="Tutup pop-up">&times;</button>
            <h3>Kata Manis</h3>
            <p id="modal-quote">"Aku mencintaimu seperti bintang mencintai malam."</p>
            <div class="pill">💕 Mode Bucin Aktif</div>
        </div>
    `;
    document.body.appendChild(backdrop);

    const modalQuote = backdrop.querySelector('#modal-quote');
    const closeBtn = backdrop.querySelector('.close-btn');

    const randomQuote = () => quotes[Math.floor(Math.random() * quotes.length)];

    const showQuote = () => {
        const selected = randomQuote();
        quoteText.textContent = `"${selected}"`;
        return selected;
    };

    newQuoteBtn.addEventListener('click', showQuote);

    addHeartBtn.addEventListener('click', () => {
        const heart = document.createElement('div');
        heart.textContent = '❤️';
        heart.classList.add('heart');
        heartContainer.appendChild(heart);

        // Hapus hati setelah 5 detik untuk tidak memenuhi layar
        setTimeout(() => {
            heart.remove();
        }, 5000);
    });

    const openModal = () => {
        const selected = showQuote();
        modalQuote.textContent = `"${selected}"`;
        backdrop.classList.add('active');
    };

    const closeModal = () => backdrop.classList.remove('active');

    openPopupBtn.addEventListener('click', openModal);
    closeBtn.addEventListener('click', closeModal);
    backdrop.addEventListener('click', (e) => {
        if (e.target === backdrop) closeModal();
    });
</script>

</html>
