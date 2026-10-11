<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem Pelaporan' ?></title>
    <style>
        * { box-sizing: border-box; font-family: Arial, sans-serif; }
        body { margin: 0; display: flex; background: #f4f7f6; min-height: 100vh; }
        .sidebar { width: 250px; background: #343a40; color: white; padding-top: 20px; }
        .sidebar h3 { text-align: center; margin-bottom: 20px; }
        .sidebar ul { list-style: none; padding: 0; margin: 0; }
        .sidebar a { color: white; text-decoration: none; display: block; padding: 15px 20px; border-bottom: 1px solid #4f5962; }
        .sidebar a:hover { background: #495057; }
        .main-content { flex: 1; padding: 30px; overflow-y: auto; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .stats-grid { display: flex; gap: 20px; margin-bottom: 20px; }
        .stat-card { flex: 1; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); border-top: 4px solid #007bff; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 12px; text-align: left; }
        th { background: #007bff; color: white; }
        .btn { background: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; border: none; cursor: pointer; display: inline-block; margin-top: 10px;}
        .btn-danger { background: #dc3545; }
        .btn-primary { background: #007bff; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-control { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; }
    </style>
</head>
<body>