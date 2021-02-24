<!DOCTYPE html>
<html>
    <head>
        <!-- Bootstrap Section -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <!-- Title Tab Style -->
        <title>PPL 2</title>
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/icon/seo.ico">

        <!-- Meta Section -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Style CSS Only -->
        <style type="text/css">
            body{
                background-color: #fafafa;
                height: 100%;
                /* overflow: hidden; */
            }
            .content::-webkit-scrollbar{
                display: none;
            }
            .h1-style{
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: bold;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }
            .thead-style{
                background-color: #7ca2de;
            }
            .btn-grey{
                background-color: #838583;
                border-color: #838583;
            }
            .btn-green{
                background-color: #22bf76;
                border-color: #22bf76;
            }
            .footer-custom{
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #dbdbdb;
            }
            .content{
                width: 100%;
                height: 100%;
                padding : 20px 0 20px 0;
            }
            .td-space{
                width: 80px;
                margin-right: 4px;
                margin-bottom: 5px;
            }
            .table-zebra tr:nth-child(even){
                background-color: #9ebae6;
            }
            /* .img-hover-zoom img {
                transition: transform .5s ease;
            }
            .img-hover-zoom:hover img {
                transform: scale(1.2);
            } */
            .card{
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
            .btn-theme{
                background-color: #dbdbdb;
            }
            .box-v2{
                height: fit-content;
                margin-bottom: 15vh;
                background-color: #ffffff;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                padding: 10px;
            }
            .box-cart{
                width: 100%;
                height: fit-content;
                padding: 5vh auto 5vh auto;
                background-color: #ffffff;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                padding: 20px 15px 20px 15px;
            }
            .box-item-cart{
                width: 100%;
                height: fit-content;
                margin: 0 auto 3vh auto;
                background-color: #ffffff;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                padding: 20px 15px 20px 15px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #dbdbdb">
            <div class="d-flex">
                <img style="width: 50px; height: 50px; margin-right: 10px" src="<?php echo base_url(); ?>assets/images/icon/seo.png">
                <a class="navbar-brand" href="#" style="font-weight: bold">Tokopidea</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="container">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url() ?>">Belanja <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('index.php/display_cart') ?>">
                                <div class="d-flex">
                                    <img src="<?= base_url(); ?>assets/images/icon/cart.png" alt="icon_cart" style="width: 18px; height: 18px">
                                    <p style="margin: -2px 0 0 5px">
                                        <?php if(is_null($this->session->userdata('data_cart'))){
                                            echo '0 item';
                                        } else {
                                            echo count($this->session->userdata('data_cart')['list']). ' item';
                                        }
                                        ?>
                                    </p>
                                </div>
                                
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <?php 
                if(isset($data)){
                    $this->load->view($destination_pages, $data);
                } else {
                    $this->load->view($destination_pages);
                }
            ?>
        </div>
        <div class="w-100" style="background-color: #dbdbdb; height: 10vh">
            <div class="container">
                <h3 class="text-center pt-4">FOOTER</h3>
            </div>
        </div>
    </body>
</html>
