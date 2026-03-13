<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitemap Generator</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: white;
            padding: 2.5rem;
            border-radius: 1.5rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            max-width: 450px;
            width: 100%;
            text-align: center;
            transition: transform 0.2s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        h1 {
            color: #1a202c;
            font-size: 1.875rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        p {
            color: #4a5568;
            margin-bottom: 2rem;
            line-height: 1.5;
        }
        .status {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 2rem;
        }
        .status-exists {
            background-color: #def7ec;
            color: #03543f;
        }
        .status-missing {
            background-color: #fde8e8;
            color: #9b1c1c;
        }
        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 0.75rem;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            width: 100%;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .btn:hover {
            opacity: 0.9;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }
        .btn:active {
            transform: translateY(0);
        }
        .alert {
            margin-top: 1.5rem;
            padding: 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
        }
        .alert-success {
            background-color: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Sitemap Management</h1>
        
        @if($exists)
            <div class="status status-exists">
                <svg style="width: 1.25rem; height: 1.25rem; margin-right: 0.5rem;" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                sitemap.xml exists
            </div>
        @else
            <div class="status status-missing">
                <svg style="width: 1.25rem; height: 1.25rem; margin-right: 0.5rem;" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                </svg>
                sitemap.xml is missing
            </div>
        @endif

        <p>
            Automatically generate and update your sitemap to improve SEO. 
            The system already monitors content changes, but you can manually trigger a full crawl here.
        </p>

        <form action="{{ route('sitemap.generate') }}" method="POST">
            @csrf
            <button type="submit" class="btn">
                {{ $exists ? 'Regenerate Sitemap' : 'Generate Sitemap' }}
            </button>
        </form>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</body>
</html>
