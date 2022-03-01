<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Attendance Test</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB UI KIT -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.css" />
    <!-- Custom styles -->
    <style></style>
</head>

<body>
    <!--Main Navigation-->
    <header class="mb-10">
        <!-- Navbar-->

        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-2 fixed-top">
            <div class="
            container-fluid
            justify-content-center justify-content-md-between
          ">
                <!-- Left elements -->
                <ul class="navbar-nav flex-row align-items-center">
                    <li class="nav-item me-3 me-lg-1">
                        <a class="nav-link d-flex" href="#" target="_blank">
                            <img src="https://easy-data.mdbgo.io/img/logo.png" height="31" alt="" loading="lazy" class="me-2" />
                            <span style="
                    font-size: 19px;
                    font-weight: 500;
                    color: hsl(0, 0%, 30%);
                  "><span class="text-theme">View Attendance</span></span>
                        </a>
                    </li>

                </ul>
                <!-- Left elements -->

                <!-- Right elements -->
                <!--- Search Box --->

                <ul class="navbar-nav flex-row d-none d-md-flex">
                    <li class="nav-item me-3 me-lg-1">
                        <div class="input-group">
                            <div class="form-outline">
                                <input type="search" id="myInput" onkeyup="myFunction()" class="form-control" />
                                <label class="form-label" for="form1">Search</label>
                            </div>
                            <button type="button" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- Navbar -->
    </header>

    <pre id="content" style="white-space: pre-wrap;"></pre>
    <!--Main Navigation-->

    <!--Main layout-->
    <main>

        <pre id="content" style="white-space: pre-wrap;"></pre>
        <div id="filters-container">
            <div class="container">
                <!-- Table -->
                <table class="table" id="myTable">
                    <thead id="table-head"></thead>
                    <tbody id="table-body"></tbody>
                </table>
                <!-- Table -->
            </div>
        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer></footer>
    <!--Footer-->
</body>

<!-- MDB ESSENTIAL -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.js"></script>
<!-- Google API -->
<script src="https://apis.google.com/js/api.js"></script>
<!-- easyData -->
<script type="text/javascript" src="index.js"></script>

<!-- easyData - Creating table -->
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<script>
    {
        {
            // Your API KEY
            const API_KEY = "<Your API key>";
            const filterBy = 'Category';

            const dataTable = null;

            function setupNavListener() {
                elementReady('#filters-nav').then((el) => {
                    $("#filters-nav .nav-link").on("click", function() {
                        $("#filters-nav").find(".active").removeClass("active");
                        $(this).addClass("active");
                    });
                });
            }

            function displayResult2(response) {
                let tableHead = "";
                let tableBody = "";

                response.result.values.forEach((row, index) => {
                    if (index === 0) {
                        tableHead += "<tr>";
                        row.forEach((val) => (tableHead += "<th>" + val + "</th>"));
                        tableHead += "</tr>";
                    } else {
                        tableBody += "<tr>";
                        row.forEach((val) => (tableBody += "<td>" + val + "</td>"));
                        tableBody += "</tr>";
                    }
                });

                document.getElementById("table-head").innerHTML = tableHead;
                document.getElementById("table-body").innerHTML = tableBody;
            }

            function loadData() {
                // Spreadsheet ID 
                const spreadsheetId = '<Your Sheet ID>';
                const range = "Sheet 1!A1:C7";
                getPublicValues({
                    spreadsheetId,
                    range
                }, displayResult2);
                fetch(apiUrl)
                    .then((response) => response.json())
                    .then(json => {
                        this.rows = json;
                        this.cols = Object.keys(this.rows[0])
                        this.filters = []
                        for (var row in this.rows) {
                            var value = this.rows[row][filterBy];
                            if (!this.filters.includes(value)) {
                                this.filters.push(value)
                            }
                        }
                        outputRows(this.rows);
                        outputFilters();
                    });
            }

            window.addEventListener("load", (e) => {
                initOAuthClient({
                    apiKey: API_KEY
                });
            });

            document.addEventListener("gapi-loaded", (e) => {
                loadData();
            });
        }
    }

    function filterRows(filterValue) {
        dataTable.search(filterValue).draw();
    }
</script>
<div>
    <?php

    ?>
</div>

</html>