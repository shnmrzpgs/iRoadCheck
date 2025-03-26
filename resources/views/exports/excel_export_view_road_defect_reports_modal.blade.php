<table>
    <thead>
    <tr><th style="border-left: 1px solid #252525; border-right: 1px solid #252525;  background-color: #FFFFFF; height: 15px" colspan="6"></th></tr>
    <tr><th style="border-left: 1px solid #252525; border-right: 1px solid #252525;  background-color: #FFFFFF; height: 15px" colspan="6"></th></tr>
    <tr>
        <!-- Empty cell for column A -->
        <th style="border-left: 1px solid #252525; background-color: #FFFFFF;" colspan="1"></th>
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <!-- Content lefts in column B -->
        <th style="line-height:1; border-right: 1px solid #252525; background-color: #FFFFFF; color: #252525; font-size: 8px; font-family: 'Arial', sans-serif; text-align: left; font-weight: normal;" colspan="4">
            REPUBLIC OF THE PHILIPPINES
        </th>
    </tr>
    <tr>
        <!-- Empty cell for column A -->
        <th style="border-left: 1px solid #252525; background-color: #FFFFFF;" colspan="1"></th>
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <!-- Content lefts in column B -->
        <th style="line-height:1; border-right: 1px solid #252525; background-color: #FFFFFF; color: #252525; font-size: 8px; font-family: 'Arial', sans-serif; text-align: left; font-weight: normal;" colspan="4">
            PROVINCE OF DAVAO DEL NORTE
        </th>
    </tr>
    <tr>
        <!-- Empty cell for column A -->
        <th style="border-left: 1px solid #252525; background-color: #FFFFFF;" colspan="1"></th>
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <!-- Content lefts in column B -->
        <th style="border-right: 1px solid #252525; background-color: #FFFFFF ; color: #16A34A; font-size: 16px; font-family: 'Arial', sans-serif; text-align: left; font-weight: bolder; " colspan="4">
            CITY OF TAGUM
        </th>
    </tr>
    <tr>
        <!-- Empty cell for column A -->
        <th style="border-left: 1px solid #252525; background-color: #16A34A;" colspan="1"></th>
        <th style="border: none; background-color: #FFFFFF;" colspan="1"></th>
        <!-- Content lefts in column B -->
        <th style="border-right: 1px solid #252525; background-color: #16A34A ; color: #FFFFFF; font-size: 11px; font-family: 'Arial', sans-serif; text-align: left; font-weight: bolder; " colspan="4">
            CEO - MAINTENANCE DIVISION
        </th>
    </tr>
    <tr><th style="border-right: 1px solid #252525; background-color: #FFFFFF; height: 15px" colspan="6"></th></tr>
    <tr><th style="border-left: 1px solid #252525; border-right: 1px solid #252525; background-color: #FFFFFF; height: 15px" colspan="6"></th></tr>
    <tr>
        <!-- Center the content -->
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; background-color: #FFFFFF; color: #252525; font-size: 14px; font-family: 'Arial', sans-serif; text-align: center; font-weight: bold;" colspan="6">
            ROAD DEFECT REPORT OF REPORT ID: {{ $report->id ?? 'N/A' }}
        </th>
    </tr>
    <tr><th style="border-left: 1px solid #252525; border-right: 1px solid #252525; background-color: #FFFFFF;" colspan="6"></th></tr>
    <tr>
        <th style="border-left: 1px solid #252525; background-color: #FFFFFF; color: #000000; width: 20px;"></th>
        <th style="border: none; background-color: #FFFFFF; color: #000000; width: 150px;"></th>
        <th style="border: none; background-color: #FFFFFF; color: #000000; width: 150px; font-family: 'Arial', sans-serif; font-size: 11px; text-align: left; font-weight:bold ">Report ID:</th>
        <th style="border: none; background-color: #FFFFFF; color: #000000; width: 190px; font-family: 'Arial', sans-serif; font-size: 11px; text-align: left; font-weight: bold;"> {{ $report->id ?? 'N/A' }}</th>
        <th style="border: none; background-color: #FFFFFF; color: #000000; width: 120px; font-family: 'Arial', sans-serif; font-size: 11px; text-align: left; font-weight:bold ">Status:</th>
        <th style="border-right: 1px solid #252525; background-color: #FFFFFF; color: #000000; width: 410px; font-family: 'Arial', sans-serif; font-size: 11px; text-align: left; font-weight:bold ">{{ $report->status ?? 'N/A' }}</th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; background-color: #FFFFFF; color: #000000; width: 20px; font-size: 10px;"></th>
        <th style="border: none; background-color: #FFFFFF; color: #000000; width: 150px; font-size: 10px;"></th>
        <th style="border: none; background-color: #FFFFFF; color: #000000; width: 150px; font-family: 'Arial', sans-serif; font-size: 11px; text-align: left; font-weight:bold ">Type of Defect:</th>
        <th style=" border: none; background-color: #FFFFFF; color: #000000; width: 190px; font-family: 'Arial', sans-serif; font-size: 11px; text-align: left; font-weight: bold;"> {{ $report->defect ?? 'N/A' }}</th>
        <th style="border: none; background-color: #FFFFFF; color: #000000; width: 120px; font-family: 'Arial', sans-serif; font-size: 11px; text-align: left; font-weight:bold ">Severity:</th>
        <th style="border-right: 1px solid #252525; background-color: #FFFFFF; color: #000000; width: 410px; font-family: 'Arial', sans-serif; font-size: 11px; text-align: left; font-weight:bold ">{{ $report->severity->label ?? 'N/A' }}</th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; background-color: #FFFFFF; color: #000000; width: 20px;"></th>
        <th style="border: none; background-color: #FFFFFF; color: #000000; width: 150px;"></th>
        <th style="border: none; background-color: #FFFFFF; color: #000000; width: 150px; font-family: 'Arial', sans-serif; font-size: 11px; text-align: left; font-weight:bold ">Report Count:</th>
        <th style="border: none; background-color: #FFFFFF; color: #000000; width: 190px; font-family: 'Arial', sans-serif; font-size: 11px; text-align: left; font-weight: bold;">100</th>
        <th style="border: none; background-color: #FFFFFF; color: #000000; width: 120px; font-family: 'Arial', sans-serif; font-size: 11px; text-align: left; font-weight:bold ">Location:</th>
        <th style="border-right: 1px solid #252525; background-color: #FFFFFF; color: #000000; width: 410px; font-family: 'Arial', sans-serif; font-size: 11px; text-align: left; font-weight:bold ">{{ $report->location ?? 'N/A' }}</th>
    </tr>
    <tr><th style="border-left: 1px solid #252525; border-right: 1px solid #252525; background-color: #FFFFFF;" colspan="6"></th></tr>
    </thead>
    <tbody>
    <tr>
        <th style="border: 1px solid #252525; background-color: #FFFFFF; color: #16A34A; font-family: 'Arial', sans-serif; font-size: 12px; text-align: center; font-weight:bold;" colspan="4"> Reported Road Defect Information</th>
        <th style="border: 1px solid #252525; background-color: #FFFFFF; color: #16A34A; font-family: 'Arial', sans-serif; font-size: 12px; text-align: center; font-weight:bold;" colspan="2"> Updated Road Defect Information</th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; background-color: #FFFFFF;" colspan="4"></th>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; background-color: #FFFFFF;" colspan="2"></th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; background-color: #FFFFFF; height: 310px" colspan="4"></th>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; height: 310px" colspan="2"></th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; background-color: #FFFFFF; font-style: italic; text-align: center" colspan="4">Reported Captured Road Photo</th>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; background-color: #FFFFFF;font-style: italic; text-align: center" colspan="2">Updated Captured Road Photo</th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; background-color: #FFFFFF;" colspan="4"></th>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; background-color: #FFFFFF;" colspan="2"></th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;" colspan="2">First Reporter Full Name:</th>
        <th style="border-right: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;" colspan="2">Sheena Mariz Pagas</th>
        <th style="border-left: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;">Updated By Staff:</th>
        <th style="border-right: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;">Marian Joy Corpuz</th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;" colspan="2">Date Reported:</th>
        <th style="border-right: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;" colspan="2">{{ $report->date }}</th>
        <th style="border-left: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;">Date Updated:</th>
        <th style="border-right: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;">{{ $report->updated_date ?? 'N/A' }}</th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;" colspan="2">Time Reported:</th>
        <th style="border-right: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;" colspan="2">{{ $report->time ?? 'N/A' }}</th>
        <th style="border-left: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;">Time Updated:</th>
        <th style="border-right: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;">{{ $report->updated_time ?? 'N/A' }}</th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; background-color: #FFFFFF;" colspan="4"></th>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; background-color: #FFFFFF;" colspan="2"></th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;" colspan="2">COORDINATES</th>
        <th style="border-right: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;" colspan="2"></th>
        <th style="border-left: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;">COORDINATES</th>
        <th style="border-right: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;"></th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;" colspan="2">Latitude:</th>
        <th style="border-right: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;" colspan="2">{{ $report->lat ?? 'N/A' }}</th>
        <th style="border-left: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;">Latitude:</th>
        <th style="border-right: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;">{{ $report->updated_lat ?? 'N/A' }}</th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;" colspan="2">Longitude:</th>
        <th style="border-right: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;" colspan="2">{{ $report->lng ?? 'N/A' }}</th>
        <th style="border-left: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;">Longitude:</th>
        <th style="border-right: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;">{{ $report->updated_lng ?? 'N/A' }}</th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; background-color: #FFFFFF;" colspan="4"></th>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; background-color: #FFFFFF;" colspan="2"></th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;" colspan="4"></th>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; font-style: italic; background-color: #FFFFFF;" colspan="2">REMARKS</th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;" colspan="4"></th>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; font-family: Arial, sans-serif; font-size: 10px; text-align: left; font-weight: bold; background-color: #FFFFFF;" colspan="2">This is sample remarks.</th>
    </tr>
    <tr>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; border-bottom: 1px solid #252525; background-color: #FFFFFF;" colspan="4"></th>
        <th style="border-left: 1px solid #252525; border-right: 1px solid #252525; border-bottom: 1px solid #252525; background-color: #FFFFFF;" colspan="2"></th>
    </tr>
    </tbody>
</table>
