<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Message</title>
    <style>
        /* Reset styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f7f7f7;
            padding: 20px;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .email-header {
            background: linear-gradient(135deg, #6a89cc, #4a69bd);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        
        .email-header h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .email-body {
            padding: 30px;
        }
        
        .message-details {
            background-color: #f8f9fa;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .detail-row {
            display: flex;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eaeaea;
        }
        
        .detail-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        
        .detail-label {
            font-weight: 600;
            width: 150px;
            color: #4a69bd;
        }
        
        .detail-value {
            flex: 1;
        }
        
        .message-content {
            background-color: #f1f8ff;
            border-left: 4px solid #4a69bd;
            padding: 15px;
            margin-top: 20px;
            border-radius: 0 4px 4px 0;
        }
        
        .email-footer {
            background-color: #f1f2f6;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        
        .logo {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        @media (max-width: 600px) {
            .detail-row {
                flex-direction: column;
            }
            
            .detail-label {
                width: 100%;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <div class="logo">4Ever Memorials</div>
            <h1>New Contact Us Message</h1>
            <p>You have received a new message from your website</p>
        </div>
        
        <div class="email-body">
            <div class="message-details">
                <div class="detail-row">
                    <div class="detail-label">Date:</div>
                    <div class="detail-value">{{ date('d F, Y (l)') }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">From Name:</div>
                    <div class="detail-value">{{ $contact_us['name'] }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Email:</div>
                    <div class="detail-value">{{ $contact_us['email'] }}</div>
                </div>
                @if(isset($contact_us['memorial_name']) && !empty($contact_us['memorial_name']))
                <div class="detail-row">
                    <div class="detail-label">Memorial Name:</div>
                    <div class="detail-value">{{ $contact_us['memorial_name'] }}</div>
                </div>
                @endif
                
                <div class="detail-row">
                    <div class="detail-label">Subject:</div>
                    <div class="detail-value">{{ $contact_us['title'] }}</div>
                </div>
            </div>
            
            <div class="message-content">
                <h3 style="margin-bottom: 10px; color: #4a69bd;">Message:</h3>
                <p>{{ $contact_us['message'] }}</p>
            </div>
        </div>
        
        <div class="email-footer">
            <p>This email was sent from your website contact form.</p>
            <p>&copy; {{ date('Y') }} 4Ever Memorials. All rights reserved.</p>
        </div>
    </div>
</body>
</html>