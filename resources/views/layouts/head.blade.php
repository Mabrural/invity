<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Invity</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            color: #333;
            background-color: #f8f9fa;
            line-height: 1.6;
        }
        
        /* Header & Navigation */
        header {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            padding: 15px 0;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 22px;
            font-weight: 700;
            color: #4a5568;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        
        .logo i {
            margin-right: 8px;
            color: #667eea;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .user-info {
            text-align: right;
        }
        
        .user-name {
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }
        
        .user-email {
            font-size: 12px;
            color: #718096;
        }
        
        .btn-logout {
            background: #f56565;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 14px;
        }
        
        .btn-logout:hover {
            background: #e53e3e;
        }
        
        /* Main Layout */
        .dashboard-container {
            display: flex;
            margin-top: 70px;
            min-height: calc(100vh - 70px);
        }
        
        /* Sidebar */
        .sidebar {
            width: 220px;
            background: #fff;
            padding: 25px 0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            height: calc(100vh - 70px);
            position: fixed;
            overflow-y: auto;
        }
        
        .sidebar-menu {
            list-style: none;
        }
        
        .sidebar-menu li {
            margin-bottom: 5px;
        }
        
        .sidebar-menu a {
            display: block;
            padding: 12px 20px;
            color: #4a5568;
            text-decoration: none;
            transition: all 0.2s;
            font-weight: 500;
            font-size: 14px;
            border-left: 3px solid transparent;
        }
        
        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: #f7fafc;
            color: #667eea;
            border-left: 3px solid #667eea;
        }
        
        .sidebar-menu i {
            width: 20px;
            margin-right: 10px;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 220px;
            padding: 25px;
        }
        
        .page-title {
            margin-bottom: 25px;
        }
        
        .page-title h1 {
            font-size: 24px;
            color: #2d3748;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        /* Stats Cards */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 25px;
        }
        
        .stat-card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.04);
            display: flex;
            align-items: center;
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            background: #ebf4ff;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            color: #667eea;
            margin-right: 15px;
        }
        
        .stat-info h3 {
            font-size: 20px;
            margin-bottom: 5px;
            color: #2d3748;
        }
        
        .stat-info p {
            color: #718096;
            font-size: 13px;
        }
        
        /* Forms */
        .card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.04);
            margin-bottom: 25px;
        }
        
        .card-title {
            font-size: 18px;
            margin-bottom: 15px;
            color: #2d3748;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 16px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #4a5568;
            font-size: 14px;
        }
        
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.2s;
        }
        
        .form-group input:focus, .form-group select:focus {
            border-color: #667eea;
            outline: none;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .btn-primary {
            background: #667eea;
            color: white;
            border: none;
            padding: 10px 18px;
            font-size: 14px;
            font-weight: 500;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .btn-primary:hover {
            background: #5a67d8;
        }
        
        /* Table */
        .table-container {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
        }
        
        table th {
            font-weight: 600;
            color: #4a5568;
            background-color: #f7fafc;
        }
        
        table tr:hover {
            background-color: #f7fafc;
        }
        
        .guest-name {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .guest-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #ebf4ff;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #667eea;
            font-weight: 500;
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-pending {
            background-color: #fefcbf;
            color: #744210;
        }
        
        .status-confirmed {
            background-color: #c6f6d5;
            color: #22543d;
        }
        
        .status-declined {
            background-color: #fed7d7;
            color: #742a2a;
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        
        .btn-icon {
            background: transparent;
            border: 1px solid #e2e8f0;
            padding: 6px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 13px;
            color: #4a5568;
        }
        
        .btn-icon:hover {
            background: #f7fafc;
        }
        
        .btn-copy:hover {
            color: #667eea;
            border-color: #667eea;
        }
        
        .btn-delete:hover {
            color: #f56565;
            border-color: #f56565;
        }
        
        /* Toast Notification */
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #2d3748;
            color: #fff;
            padding: 12px 20px;
            border-radius: 6px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            z-index: 3000;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s;
        }
        
        .toast.show {
            opacity: 1;
            transform: translateY(0);
        }
        
        .toast i {
            margin-right: 10px;
            color: #68d391;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                width: 200px;
            }
            
            .main-content {
                margin-left: 200px;
            }
        }
        
        @media (max-width: 768px) {
            .dashboard-container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                position: relative;
                height: auto;
                margin-bottom: 0;
                padding: 15px 0;
            }
            
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
            
            .sidebar-menu {
                display: flex;
                overflow-x: auto;
                padding: 0 15px;
            }
            
            .sidebar-menu li {
                margin-bottom: 0;
                margin-right: 5px;
            }
            
            .sidebar-menu a {
                padding: 10px 15px;
                border-radius: 6px;
                white-space: nowrap;
                border-left: none;
            }
            
            .sidebar-menu a.active {
                border-left: none;
                background-color: #ebf4ff;
            }
            
            .user-info {
                display: none;
            }
        }
        
        @media (max-width: 576px) {
            .stats-cards {
                grid-template-columns: 1fr;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>