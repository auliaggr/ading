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
                Forgot Password
            </div>
            <div class="card-body">
                <form id="form_login" action="<?php echo site_url('Sign/send'); ?>">
                    <div class="mb-3">
                        <label for="username" class="form-label">Email</label>
                        <input type="email" class="form-control" id="username" name="username" placeholder="Email" required>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-6 text-start">
                        <button type="submit" class="btn btn-primary btn_send" form="form_login">Send</button>
                        <button type="reset" class="btn btn-secondary" form="form_login">Reset</button>
                    </div>
                    <div class="col-6 text-end">
                        <a href="<?php echo site_url('Sign'); ?>" class="btn btn-light">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js/sign.js'); ?>"></script>
</body>
</html>