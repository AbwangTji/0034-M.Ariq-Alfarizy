<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penjualan</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Animate.css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        :root {
            --primary-color: #4CAF50; /* Hijau segar, melambangkan keberhasilan dan kepercayaan */
            --secondary-color: #f0f4f8; /* Abu-abu muda, membuat tampilan bersih dan modern */
            --accent-color: #FF9800; /* Oranye cerah, memberikan kesan ramah dan mengundang */
            --text-light: #ecf0f1; /* Putih, kontras untuk teks di latar belakang gelap */
            --text-dark: #333333; /* Abu-abu gelap, cocok untuk teks di latar belakang terang */
            --hover-color: #388E3C; /* Hijau yang sedikit lebih gelap untuk efek hover */

        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 70px; /* Adjust based on your navbar height */
        }

        /* Navbar Styling */
        .navbar {
            background-color: var(--primary-color);
            padding: 0.5rem 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: background-color 0.3s ease;
        }

        .navbar-brand {
            font-weight: 600;
            color: var(--text-light) !important;
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: var(--accent-color) !important;
        }

        .nav-link {
            color: var(--text-light) !important;
            margin: 0 10px;
            transition: color 0.3s ease, transform 0.3s ease, background-color 0.3s ease;
            border-radius: 5px;
            padding: 0.5rem 1rem;
        }

        .nav-link:hover {
            color: var(--text-light) !important;
            background-color: var(--hover-color);
            transform: translateY(-2px);
        }

        .navbar-nav {
            align-items: center;
        }

        .nav-item {
            padding: 0 0.5rem;
        }

        /* Common styles for all pages */
        .container {
            max-width: 1200px;
            margin-top: 2rem;
        }

        .main-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .main-card:hover {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175);
        }

        .card-header {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: var(--text-light);
            border: none;
            padding: 1.5rem;
        }

        .form-control, .btn {
            border-radius: 10px;
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .breadcrumb {
            background-color: white;
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            margin-bottom: 1.5rem;
        }

        .breadcrumb-item a {
            color: var(--accent-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: var(--primary-color);
        }
        .home-container {
    padding: 2rem;
    background: linear-gradient(135deg, #f6f9fc 0%, #e9f2f9 100%);
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
}

.welcome-section {
    text-align: center;
    margin-bottom: 3rem;
    animation: fadeInDown 1s ease;
}

.welcome-title {
    font-size: 2.5rem;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.welcome-subtitle {
    font-size: 1.2rem;
    color: var(--text-secondary);
}

.dashboard-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 3rem;
}

.stat-card {
    background: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.stat-icon {
    font-size: 2.5rem;
    color: var(--accent-color);
    margin-bottom: 1rem;
}

.stat-number {
    font-size: 1.8rem;
    font-weight: bold;
    color: var(--primary-color);
}

.dashboard-charts {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.chart-container {
    background: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.chart-container h3 {
    margin-bottom: 1rem;
    color: var(--primary-color);
}

.recent-activities {
    background: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 3rem;
}

.activity-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.activity-item {
    display: flex;
    align-items: center;
    padding: 1rem;
    border-bottom: 1px solid #f0f0f0;
}

.activity-icon {
    font-size: 1.5rem;
    color: var(--accent-color);
    margin-right: 1rem;
}

.activity-details {
    flex-grow: 1;
}

.activity-time {
    font-size: 0.8rem;
    color: var(--text-secondary);
    margin-left: 1rem;
}

        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .navbar-nav {
                flex-direction: column;
                align-items: flex-start;
            }
            .nav-item {
                padding: 0.5rem 0;
            }
        }
        
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?controller=home&action=index">
                <i class="fas fa-store me-2"></i>
                Sistem Manajemen Produk
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse w-100 justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
    <a class="nav-link" href="index.php?controller=home&action=index">
        <i class="fas fa-home me-1"></i> Beranda
    </a>
</li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=produk&action=index">
                            <i class="fas fa-box me-1"></i> Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=pelanggan&action=index">
                            <i class="fas fa-users me-1"></i> Pelanggan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=transaksi&action=index">
                            <i class="fas fa-shopping-cart me-1"></i> Transaksi
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        <?php if(isset($content)) { echo $content; } ?>
    </main>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Add active class to current nav item
        $(document).ready(function() {
            var current = location.pathname;
            $('.navbar-nav .nav-link').each(function() {
                var $this = $(this);
                if ($this.attr('href').indexOf(current) !== -1) {
                    $this.addClass('active');
                }
            });
        });
    </script>
</body>
</html>