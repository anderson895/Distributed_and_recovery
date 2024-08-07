

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distributed Transactions</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 


</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Distributed Transactions</h1>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="card p-4 mb-4">
                    <div class="card-body">
                        <form action="process.php" method="POST">
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="product" name="product" placeholder="Product" required>
                                    <label for="product">Product</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required>
                                    <label for="quantity">Quantity</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Responsive Table -->
                

            </div>
            
            
            <div class="card p-4">
                <div class="card-body">
                    <h2 class="card-title mb-4">Transaction Records</h2>
                    <button id="recover-btn" class="btn btn-secondary mb-4">Recover Transactions</button>
                    <div class="table-responsive">
                        <table id="transaction-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include 'fetch_data.php'; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </div>
    <!-- Bootstrap JS and dependencies -->
        <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css" rel="stylesheet">
    <!-- DataTables JS -->
    <script src="//cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
    <script src="assets/app.js"></script>
</body>
</html>
