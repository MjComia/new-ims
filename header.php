<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inventory Management System</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="stylesheet" href="lib/datatables/dataTables.css" />
  
<style>
  body {
    background-color: #f8f9fa;
    font-family: 'Poppins', sans-serif;
  }

  /* NAVIGATION BAR */
  .navbar {
    background-color: #0B0B45 !important; 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .navbar-brand {
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 1.5rem;
    color: #ffffff !important; /* White text */
    
  }

  .nav-link {
    font-family: 'Poppins', sans-serif;
    font-weight: 500;
    transition: color 0.3s ease;
    color: #ffffff !important;
  }

  .nav-link:hover {
    color: #f1f1f1 !important;
    text-decoration: underline;
  }

  .navbar-toggler {
    border-color: #ffffff;
  }

  .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255,255,255,1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
  }
  
  /* TABLE*/
  #myTable {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Poppins', sans-serif;
  }

  #myTable thead {
    background-color: #0B0B45;
    color: white;
  }

  #myTable tbody tr:hover {
    background-color: #f1f1f1;
  }

  #myTable th,
  #myTable td {
    padding: 12px 15px;
    border: 1px solid #dee2e6;
    text-align: center;
  }

  #myTable td button {
    background-color: #0B0B45;
    color: white;
    border: none;
    padding: 5px 10px;
    margin: 0 5px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  #myTable td button:hover {
    background-color: #1d1db3;
  }

  .dataTables_wrapper .dataTables_filter input {
    border-radius: 5px;
    padding: 5px;
    border: 1px solid #ccc;
  }
</style>

</head>
<body>

  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">
        <!-- <img src="logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top me-2"> -->
        Inventory Management System
      </a>
    </div>
  </nav>
  <div class="modal-dialog modal-dialog-centered">
 hi
</div>

  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
hello
</div>

