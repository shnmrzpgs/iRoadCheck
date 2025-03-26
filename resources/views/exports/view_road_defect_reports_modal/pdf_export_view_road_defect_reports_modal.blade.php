<!DOCTYPE html>
<html>
<head>
    <title>Road Defect Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .report-container {
            padding: 5px;
        }

        .page-header {
            text-align: center;
            /*border-top: 3px solid #008000;*/
            /*border-bottom: 3px solid #008000;*/
            /*margin-bottom: 20px;*/
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: center;
            /*background-color: #008000;*/
            color: black;
            padding: 10px 0;
        }

        .header-logo {
            width: 90px;
            height: auto;
            justify-content: center;
            justify-items: center;
            margin-bottom: 5px;
        }

        .header-text {
            text-align: center;
        }

        .header-text h1 {
            font-size: 20px;
            margin: 0;
        }

        .header-text p {
            margin: 0;
            font-size: 14px;
        }

        .report-title {
            margin-top: 15px;
            font-weight: bold;
            font-size: 18px;
        }

        .report-dates {
            font-size: 14px;
            color: #666;
        }

        .info-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 15px;
        }

        .info-card {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            background-color: #fff;
        }

        .info-title {
            font-weight: bold;
            text-align: center;
            background-color: #008000;
            color: #fff;
            padding: 5px 0;
            /*border-radius: 6px;*/
        }

        .image-section img {
            width: 100%;
            border-radius: 5px;
            border: 2px solid #ddd;
        }

        .text {
            font-size: 13px;
            line-height: 1.6;
        }
    </style>
</head>
<body>

    <div class="report-container">
    <!-- Header Section -->
    <div class="page-header">
        <div class="header-content">
            <img src="{{ public_path('storage/images/tagum_city_logo.png') }}" alt="City of Tagum Logo" class="header-logo">
            <div class="header-text" style="margin-top: 2px">
                <p style="font-weight: normal; font-size: 12px">REPUBLIC OF THE PHILIPPINES</p>
                <p style="font-weight: normal; font-size: 12px">PROVINCE OF DAVAO DEL NORTE</p>
                <p style="font-weight: bolder; font-size: 16px">CITY OF TAGUM</p>
                <p style="font-weight: bolder; font-size: 13px">CEO - MAINTENANCE DIVISION</p>
            </div>
        </div>
        <div class="report-title">ROAD DEFECT REPORT OF REPORT ID:{{ $report->id ?? 'N/A' }}</div>
    </div>

    <div style="display: table; width: 100%; margin-left: 20px; margin-top: 50px">
        <!-- First Column -->
        <div style="display: table-cell; width: 30%; vertical-align: top;">
            <div style="line-height: 1; font-size: 14px;">
                <p>Report ID: <strong>{{ $report->id ?? 'N/A' }}</strong></p>
                <p>Type of Defect: <strong>{{ $report->defect ?? 'N/A' }}</strong></p>
                <p>Report Count: <strong>1</strong></p>
            </div>
        </div>

        <!-- Second Column -->
        <div style="display: table-cell; width: 70%; vertical-align: top;">
            <div style="line-height: 1; font-size: 14px;">
                <p>Status: <strong><span class="status">{{ $report->status }}</span></strong></p>
                <p>Severity: <strong>{{ $report->severity->label ?? 'N/A' }}</strong></p>
                <p>Location: <strong>{{ $report->location ?? 'N/A' }}</strong></p>
            </div>
        </div>
    </div>

    <!-- Report Details -->
        <div style="
            display: table;
            width: 100%;
            margin-bottom: 15px;
            border-spacing: 15px; /* Space between columns */
        ">
            <!-- First Column -->
            <div style="
                display: table-cell;
                width: 45%;
                vertical-align: top;
                border: 2px solid #4A5568;
                border-radius: 8px;
                padding: 10px;
                box-sizing: border-box;
            ">
                <div class="info-title">REPORTED <br/> Road Defect Information</div>
                <div class="image-section" style="text-align: center; margin-bottom: 2px">
                    <img src="{{ public_path('storage/' . $report->image) }}" alt="Reported Road Defect">
                </div>
                <p style="text-align: center; font-style: italic; font-size: 12px;">Reported Captured Road Photo</p>
                <div class="text">
                    <strong>First Reporter Full Name:</strong> Sheena Mariz Pagas <br/>
                    <strong>Date Reported:</strong> {{ $report->date }}<br/>
                    <strong>Time Reported:</strong> {{ $report->time ?? 'N/A' }}<br/>
                    <strong>Latitude:</strong> {{ $report->lat ?? 'N/A' }}<br/>
                    <strong>Longitude:</strong> {{ $report->lng ?? 'N/A' }}
                </div>
            </div>

            <!-- Second Column -->
            <div style="
                display: table-cell;
                width: 45%;
                vertical-align: top;
                border: 2px solid #4A5568;
                border-radius: 8px;
                padding: 10px;
                box-sizing: border-box;
            ">
                <div class="info-title">UPDATED <br/> Road Defect Information</div>
                <div class="image-section" style="text-align: center; margin-bottom: 2px">
                    <img src="{{ public_path('storage/' . $report->image) }}" alt="Updated Road Defect">
                </div>
                <p style="text-align: center; font-style: italic; font-size: 12px;">Updated Captured Road Photo</p>
                <div class="text">
                    <strong>Updated By Staff:</strong> Marian Joy G. Corpuz (Role)<br/>
                    <strong>Date Reported:</strong> {{ $report->date }}<br/>
                    <strong>Time Reported:</strong> {{ $report->time ?? 'N/A' }}<br/>
                    <strong>Latitude:</strong> {{ $report->lat ?? 'N/A' }}<br/>
                    <strong>Longitude:</strong> {{ $report->lng ?? 'N/A' }}
                </div>
            </div>
        </div>

    </div>

</body>
</html>
