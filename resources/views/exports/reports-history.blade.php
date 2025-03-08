<table>
    <thead>
        <tr>
            <td colspan="4" height="20"></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center; margin-top: 40px; font-size: 11px; font-weight: bold;">
                Republic of the Philippines
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center; font-size: 11px; font-weight: bold;">
                Province of Davao del Norte
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center; font-size: 11px; font-weight: bold;">
                CITY OF TAGUM
            </td>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center; font-size: 9px; font-weight: bold;">
                OFFICE OF THE CITY ENGINEERING
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center; font-size: 9px; font-weight: regular;">
                2/F Annex Building, City Government, J.V. Ayala Ave., Barangay Apokon, Tagum City
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center; font-size: 9px; font-weight: regular;">
                Telephone No. (9) 216 - 9367 Local 141
            </td>

            <!-- Spacing -->
        <tr style="border-bottom: 4px solid #000;">
            <td colspan="4" height="10"></td>
        </tr>
        <tr style="border-bottom: 4px solid #000;">
            <td colspan="4" height="20"></td>
        </tr>

        <tr>
            <td colspan="4" style="text-align: center; font-size: 14px; font-weight: bold;">
                <strong>iRoadCheck Staffs</strong>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center; font-size: 12px;">
                @if(!empty($subtitle))
                @foreach($subtitle as $line)
                {{ $line }}<br>
                @endforeach
                @endif
                As of {{ now()->format('F d, Y') }}
            </td>
        </tr>
        <!-- Spacing -->
        <tr>
            <td colspan="4" height="20"></td>
        </tr>
        <tr>
            <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">No</th>
            <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Defect Types</th>
            <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Location</th>
            <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Date</th>
            <th style="border: 1px solid #FFFFFF; background-color: #000000; color: #FFFFFF; font-family: 'Arial', sans-serif; font-size: 10px; text-align: center; font-weight:bold ">Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($reports as $report)
        <tr>
            <td style="border: 1px solid #101010; text-align: center;">{{ $report->id }}</td>
            <td style="border: 1px solid #101010; text-align: center;">{{ $report->defect}}</td>
            <td style="border: 1px solid #101010; text-align: center;">{{ $report->street }}, {{ $report->purok }}, {{ $report->barangay }}</td>
            <td style="border: 1px solid #101010; text-align: center;">{{ $report->date ? \Carbon\Carbon::parse($report->date)->format('F j, Y') : '' }}
            </td>
            <td style="border: 1px solid #101010; text-align: center;">
                {{ ucfirst($report->status) }}
            </td>

        </tr>
        @empty
        <tr>
            <td colspan="6" class="px-4 py-2 text-center text-gray-500">
                No reports found.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>