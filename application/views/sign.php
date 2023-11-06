<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chat App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <?php if (! empty($this->session->flashdata('status_signup'))) { ?>
                    <div class="mb-3">
                        <div class="alert alert-<?php echo $this->session->flashdata('status_signup') ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                            <strong><?php echo $this->session->flashdata('status_signup') ? 'Berhasil' : 'Gagal'; ?></strong> Signup Data.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php } ?>
                <form id="form_login" action="<?php echo site_url('Sign/in'); ?>">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-6 text-start">
                        <button type="submit" class="btn btn-primary btn_signin" form="form_login" data-url="<?php echo site_url('Sign/in'); ?>">Sign In</button>
                        <button type="reset" class="btn btn-secondary" form="form_login">Reset</button>
                    </div>
                    <div class="col-6 text-end">
                        <button type="submit" class="btn btn-success btn_signup" form="form_login" data-url="<?php echo site_url('Sign/up'); ?>">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js/sign.js'); ?>"></script>
</body>
</html>