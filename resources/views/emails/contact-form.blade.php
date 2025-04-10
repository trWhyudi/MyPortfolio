<!DOCTYPE html>
<html>
<head>
    <title>Pesan Baru Dari Formulir Kontak</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            line-height: 1.6; 
            color: #333; 
        }
        .container { 
            max-width: 600px; 
            margin: 0 auto; 
            padding: 20px; 
            border: 1px solid #ddd; 
            border-radius: 5px; 
        }
        .header { 
            background-color: #2785e2; 
            padding: 15px; 
            text-align: center; 
            border-bottom: 1px solid #ddd; 
        }
        .header h2 { 
            color: #fff; 
        }
        .content { 
            padding: 20px 0;
        }
        .footer { 
            margin-top: 20px; 
            padding-top: 15px; 
            border-top: 1px solid #ddd; 
            font-size: 12px; 
            color: #666; 
        }
        .detail { 
            margin-bottom: 10px; 
        }
        .detail strong { 
            display: inline-block;
            width: 80px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Pesan Baru Dari Formulir Kontak</h2>
        </div>
        
        <div class="content">
            <div class="detail"><strong>Name:</strong> {{ $details['name'] }}</div>
            <div class="detail"><strong>Email:</strong> {{ $details['email'] }}</div>
            <div class="detail"><strong>Subject:</strong> {{ $details['subject'] }}</div>
            <div class="detail"><strong>Message:</strong></div>
            <div style="white-space: pre-line; padding: 10px; background: #f8f9fa; border-radius: 5px;">{{ $details['message'] }}</div>
        </div>
        
        <div class="footer">
            <p>Pesan ini dikirimkan melalui formulir kontak di situs {{ config('app.name') }}.</p>
            <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>