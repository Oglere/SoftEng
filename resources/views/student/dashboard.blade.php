<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5dc;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: white;
            border-bottom: 3px solid black;
            padding: 15px 30px;
        }

        .header .brand {
            color: #1e3a8a;
            font-weight: bold;
            font-size: 24px;
            letter-spacing: 2px;
        }

        .search-container { position: relative; width: 320px; }
        .search-input {
            border: 2px solid #1e3a8a; border-right: none;
            padding: 8px 15px; width: 100%; border-radius: 4px 0 0 4px;
        }
        .search-input:focus { outline: none; border-color: #1e3a8a; }
        .search-btn { background-color: #1e3a8a; border: 2px solid #1e3a8a; color: white; padding: 8px 15px; border-radius: 0 4px 4px 0; cursor: pointer; }
        .search-btn:hover { background-color: #1d4ed8; }

        .sidebar {
            background-color: white; width: 250px;
            min-height: calc(100vh - 70px);
            border-right: 3px solid black;
            padding: 30px 0; text-align: center;
        }

        .sidebar-user { font-size: 20px; font-weight: 600; color: #333; padding: 0 30px 30px; }
        .sidebar-nav { list-style: none; padding: 0; margin: 0; }
        .sidebar-nav li { margin: 2px 0; }
        .sidebar-nav a { display: flex; align-items: center; padding: 12px 30px; text-decoration: none; color: #333; font-weight: 500; }
        .sidebar-nav a.active { background-color: #e3f2fd; color: #1e3a8a; }
        .sidebar-nav a:hover:not(.disabled) { background-color: #f5f5f5; }
        .sidebar-nav a.disabled { color: #ccc; cursor: not-allowed; }
        .sidebar-nav i { margin-right: 12px; width: 20px; }

        .main-content { flex: 1; padding: 40px; }

        .welcome-title {
            font-size: 32px; font-weight: bold; color: #333;
            margin-bottom: 40px; text-align: center;
        }

        /* === FIX: use flex so the last two cards are centered === */
        .stats-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            max-width: 1000px;
            margin: 0 auto;
            justify-content: center; /* centers each row, so 2nd row is centered */
        }

        .stat-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 30px;
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            flex: 0 1 300px;   /* width per card; wraps after 3 across */
            max-width: 300px;
        }

        .stat-card.approved { border: 2px solid #22c55e; }

        .stat-icon { font-size: 40px; margin-right: 20px; width: 60px; text-align: center; }
        .stat-icon.submitted { color: #333; }
        .stat-icon.approved  { color: #22c55e; }
        .stat-icon.pending   { color: #1e3a8a; }
        .stat-icon.warning   { color: #f59e0b; }
        .stat-icon.rejected  { color: #ef4444; }

        .stat-content { flex: 1; }
        .stat-number { font-size: 48px; font-weight: bold; color: #333; line-height: 1; margin-bottom: 5px; }
        .stat-label { font-size: 16px; color: #333; font-weight: 500; line-height: 1.2; }

        .container-fluid { padding: 0; }
        .d-flex { display: flex; }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header d-flex justify-content-between align-items-center">
        <div class="brand">DARA</div>
        <div class="search-container d-flex">
            <input type="text" class="search-input" placeholder="">
            <button class="search-btn"><i class="fas fa-search"></i></button>
        </div>
    </header>

    <div class="d-flex">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-user">Neil</div>
            <ul class="sidebar-nav">
                <li><a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="#"><i class="fas fa-file-alt"></i> Submit Studies</a></li>
                <li><a href="#"><i class="fas fa-eye"></i> View Studies Status</a></li>
                <li><a href="#" class="disabled"><i class="fas fa-book"></i> Batch Studies</a></li>
                <li><a href="#" class="disabled"><i class="fas fa-file-alt"></i> All Account</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <h1 class="welcome-title">Welcome, Niel! You have</h1>

            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-icon submitted"><i class="fas fa-book"></i></div>
                    <div class="stat-content">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Submitted<br>Studies</div>
                    </div>
                </div>

                <div class="stat-card approved">
                    <div class="stat-icon approved"><i class="fas fa-check-circle"></i></div>
                    <div class="stat-content">
                        <div class="stat-number">0</div>
                        <div class="stat-label">Approved<br>Studies</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon pending"><i class="fas fa-clock"></i></div>
                    <div class="stat-content">
                        <div class="stat-number">2</div>
                        <div class="stat-label">Pending<br>Studies</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon warning"><i class="fas fa-exclamation-triangle"></i></div>
                    <div class="stat-content">
                        <div class="stat-number">0</div>
                        <div class="stat-label">Revisions<br>to do</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon rejected"><i class="fas fa-times"></i></div>
                    <div class="stat-content">
                        <div class="stat-number">1</div>
                        <div class="stat-label">Rejected<br>Studies</div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
