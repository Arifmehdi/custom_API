<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/datatable/datatables.min.css') }}">
    <title>Datatable || Laravel</title>
</head>
<body>

    <div class="container">
        <div class="row ">
        <h1 style="text-align:center">Datable Laboratory</h1>

            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 2 Data 1</td>
                        <td>Row 2 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 3 Data 1</td>
                        <td>Row 3 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 4 Data 1</td>
                        <td>Row 4 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 5 Data 1</td>
                        <td>Row 5 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 6 Data 1</td>
                        <td>Row 6 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 7 Data 1</td>
                        <td>Row 7 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 8 Data 1</td>
                        <td>Row 8 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 8 Data 1</td>
                        <td>Row 8 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 9 Data 1</td>
                        <td>Row 9 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 10 Data 1</td>
                        <td>Row 10 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 11 Data 1</td>
                        <td>Row 11 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 12 Data 1</td>
                        <td>Row 12 Data 2</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</body>
<script src="{{ asset('assets/datatable/datatables.min.js') }}"></script>

<!-- //========================it's for data ================================= -->
<script>
    var data = [
    [
        "Tiger Nixon",
        "System Architect",
        "Edinburgh",
        "5421",
        "2011/04/25",
        "$3,120"
    ],
    [
        "Garrett Winters",
        "Director",
        "Edinburgh",
        "8422",
        "2011/07/25",
        "$5,300"
    ]
]
</script>

<script>

    $(document).ready( function () {
        
        alert('id');
    $('#table_id').DataTable( {
        lengthChange: true,
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
    //     columns: [{
    //   title: "Name"
    // }, {
    //   title: "Position"
    // }, {
    //   title: "Office"
    // }, {
    //   title: "Extn."
    // }, {
    //   title: "Start date"
    // }, {
    //   title: "Salary"
    // }]


    } );

} );
</script>

<style>
        .dataTables_wrapper .dt-buttons {
  float:none;  
  text-align:center;
}
</style>
</html>