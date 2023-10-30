<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chat App</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container mt-5 mb-5">
        <div class="card">
            <h5 class="card-header">
                <span id="username"><?php echo $this->session->userdata('username'); ?></span> | <a href="<?php echo site_url('Sign/out'); ?>">Sign Out</a>
            </h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="list-group" id="list-users">
                            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                            The current link item
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                            <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                            <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                            <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        </div>
                    </div>
                    <div class="col-8">
                        <div id="list-chats">
                            <!-- <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Siapa</h5>
                                    This is some text within a card body.
                                    <div class="text-end text-muted">14:03</div>
                                </div>
                            </div>
                            <div class="card text-bg-success mt-3">
                                <div class="card-body">
                                    <h5 class="card-title">Siapa</h5>
                                    This is some text within a card body.
                                    <div class="text-end text-white">14:03</div>
                                </div>
                            </div> -->
                        </div>
                        <div class="mt-3 text-end">
                            <form id="form-send" class="d-none">
                                <textarea class="form-control" id="chat" placeholder="Ketik Pesan" required></textarea>
                                <button type="submit" class="btn btn-success mt-3">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- Script -->
    <script src="<?php echo base_url('assets/js/chat.js'); ?>"></script>
  </body>
</html>