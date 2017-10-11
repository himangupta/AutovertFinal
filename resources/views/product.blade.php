<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <link href="http://cdn.datatables.net/1.10.0/css/jquery.dataTables.css" rel="stylesheet" media="screen">
    <link href="//datatables.net/download/build/dataTables.tableTools.nightly.css?_=3292db9fa10fe43341ddaf4fa8c7d9cc.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

    <title>
        Add To Cart
    </title>
    <style>
        body{
            background: #faf9f9;
        }
        .text_input{
            width:100%;
        }
        .form-group{
            margin: 0px;
        }
        .field_label{
            display: inline-block;
            font-size: 11px;
            font-weight: 600;
            color: #9a9999;
            position: relative;
        }
        .field_label span{
            color: #484848;
            font-size: 12px;
        }
        .show_add_to_cart_progress{
            position: absolute;
            top: 7px;
            float: right;
            right: -2px;
            color: #686968;
        }
        .addtocart .show_add_to_cart_progress{
            position: absolute;
            top: 2px;
            right: -25px;
            color: #686968;
        }
        .addToCartPagination{
            list-style: none;
        }
        .addToCartPagination li{
            display: inline-block;
            height: 40px;
            width: 40px;
            text-align: center;
            border-radius: 5px;
            font-weight: 600;
            padding: 10px 5px;
            border: solid 1px rgba(202, 201, 201, 0.58);
            box-shadow: 0px 0px 5px -2px rgba(0, 0, 0, 0.54);
            cursor: pointer;
            margin: 0px 2px;
            color: #6b6a6a;
            -webkit-user-select: none;  /* Chrome all / Safari all */
            -moz-user-select: none;     /* Firefox all */
            -ms-user-select: none;      /* IE 10+ */
            user-select: none;
        }
        .addToCartPagination li:hover, .addToCartPagination_li_active{
            background: #0d93f1;
            color: #fff !important;
        }
        .current_cart{
            position: fixed;
            bottom: 50px;
            background: #0e5f1b;
            height: 40px;
            width: 40px;
            right: 30px;
            border-radius: 50px;
            padding: 3px 7px;
            color: #fff;
            font-size: 25px;
            cursor:pointer;
        }
        .current_cart:hover{
            box-shadow: 0px 0px 9px 1px #0d6f14;
        }
        .current_cart span{
            position: absolute;
            color: #fff;
            font-size: 9px;
            top: -5px;
            right: -1px;
            background: #cc0d0d;
            padding: 2px 3px;
            border-radius: 11px;
        }

        .wms-cart-subhead-title{
            font-size: 24px;
            margin-bottom: 4px;

        }
        .wms-cart-container{
            padding:5px;
        }
        .nav{
            margin-bottom: 10px;
        }
        .display_cart{
            position: absolute;
            right: 30px;
        }
        .display_cart i{
            cursor:pointer;
        }
        .cart_prod_box{
            width: 19%;
            margin: 1% 0.25%;
            display: inline-table;
            padding: 5px;
            background: #fff;
            border-radius: 5px;
            border: solid 1px rgba(0, 0, 0, 0.11);
            box-shadow: 0px 0px 6px -3px rgba(0, 0, 0, 0.45);
            text-align:center;
        }
        .cart_prod_box img{
            max-width: 200px !important;
            max-height: 200px !important;
            margin: auto;
            border-radius: 10px;
        }
        .addtocartDisabled{
            cursor: not-allowed;
        }

        .context-header{
            border-bottom: 1px solid #96a9bb;
            padding: 6px;
            margin-bottom: 17px;
            background: #dee9f3;
            border-radius: 5px 5px 0px 0px;
        }
        .menu{
            list-style: none;
            margin-top: 13px;
        }
    </style>
</head>
<body>
<ul class="nav nav-tabs">
    <li class="active"><a href="#">Products</a></li>
    <li><a href="/cart">Cart</a></li>
</ul>
<div class="content_wrapper">

    <div class = "body-text">
        <div class="display_cart"><i class="fa fa-th-large card_disp" style="color:#3e720f" aria-hidden="true"></i> &nbsp;&nbsp;<i class="fa fa-th-list table_disp" aria-hidden="true"></i></div>
        <hr>
        <div class="container table-responsive">
            <div class="card_display">
                @foreach($viewData['data'] as $value)
                    <div class="cart_prod_box">
                        <center>
                            @if($value->image_url==null || $value->image_url=='')
                                <img src='/images/no-image.png'>
                            @else
                                <img src='{{$value->image_url}}'>
                            @endif
                        </center>
                        <hr class="smallhr">
                        <div class="form-group">
                            <div class="field_label">
                                <span style="font-size: 14px;">{{$value->name}}
                                    <input type ="hidden" class="id" value = "{{$value->id}}" >
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="field_label">
                                <span>{{($value->description==null)?"--":$value->description}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="field_label">Brand :
                                <span class="qty_in_cart">{{$value->brand}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="field_label">Category :
                                <span class="qty_in_cart">{{$value->category}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="field_label">Mrp :
                                <span class="qty_in_cart">{{round($value->mrp,2)}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="field_label">Unit Price :
                                <span class="qty_in_cart">{{round($value->cost,2)}}
                                    <input type ="hidden" class="cost" value = "{{round($value->cost,2)}}" >
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="field_label">In Cart :
                                <span class="qty_in_cart">{{($value->incartquantity==null)?"0":$value->incartquantity}}</span>
                            </div>
                        </div>
                        <hr class="smallhr">
                        <div class="form-group">
                            <div class="field_label">Quantity
                                <input type="number" class="qty_in_cart QToAdd" min="0" max="{{$value->quantity}}" placeholder="0"> Available:{{$value->quantity}}
                            </div>
                        </div>
                        <div class="btn btn-sx btn-info addtocart" style="margin: 5px auto;position: relative;">&nbsp;Add To Cart
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <hr>
        <br/>
        <br/>
    </div>
</div>
</body>

<script>
    $(document).ready(function () {
        $('body').on('click', '.addtocart:not(.addtocartDisabled)', function () {
            var capture = $(this);
            id = capture.parent().find('.id').val();
            QuantityAdd = capture.parent().find('.QToAdd').val();
            cost=capture.parent().find('.cost').val();
            if(QuantityAdd!=''){
                $.ajax({
                    type: 'POST',
                    data: {
                        "id": id, "addQuantity": QuantityAdd,"cost":cost
                    },
                    url: "/cart/addToCart",
                    dataType: "JSON",
                    success: function (data) {
                        location.reload();
                    }
                });
            }else{
                alert("No quantity to add in cart");
            }

        });
    });

</script>

