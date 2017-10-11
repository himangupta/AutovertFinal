<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <link href="http://cdn.datatables.net/1.10.0/css/jquery.dataTables.css" rel="stylesheet" media="screen">
    <link href="//datatables.net/download/build/dataTables.tableTools.nightly.css?_=3292db9fa10fe43341ddaf4fa8c7d9cc.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <title>Purchase Cart</title>
    <style>

        .clear{background: #fff; padding: 10px;}
        .table>tbody>tr:last-child{border:solid 1px #ddd;}
        table{border-left: solid 1px #ddd;border-right: solid 1px #ddd;font-size: 12px;}
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
        .wms-cart-remove{
            background-image: url("/images/close_red.png");
            width: 16px;
            height: 20px;
            background-size: 16px 20px;
            cursor: pointer;
        }
        .vendornamerow{
            margin-top: 10px;;
        }
        #wms-empty-cart{
            text-align:center;
            margin:10px;
        }
        #wms-empty-cart img{
            width: 130px;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>
<ul class="nav nav-tabs">
    <li><a href="/products">Products</a></li>
    <li class="active"><a href="#">Cart</a></li>
</ul>
<div class="content_wrapper content_wrapper_alt">
    <div class ="main-body">
        @if(empty($viewData['data']))
            <center>Cart Is Empty</center>
        @else
            <div class="vendornamerow checkbox-parent container table-responsive">
                <table class="table table-condensed">
                    <thead>
                    <tr><th></th><th>Name</th><th>Description</th><th>Quantity</th><th>Unit Price</th><th>Total</th><th></th></tr>
                    </thead>
                    <tbody>
                    @foreach($viewData['data'] as  $value)
                        <tr class ="rowrepeat" id="{{$value->id}}">
                            <td><img src='{{$value->image_url}}' width="150" height="150"></td>
                            <td class="sku"><input type="hidden" name="id" value="{{$value->id}}"/>{{$value->name}}</td>
                            <td class="skuname">{{($value->description==null)?"--":$value->description}} </td>
                            <td class="incart">{{$value->quantity}}</td>
                            <td class="unitprice">{{$value->per_item_cost}}</td>
                            <td class="total-individual">{{$value->total_cost}}</td>
                            <td><div class="wms-cart-remove" data-id="{{$value->id}}"></div></td>
                        </tr>
                    @endforeach
                    <tr><td></td><td></td><td></td><td></td><td>total</td><td>{{$viewData['total']}}</td><td></td><tr>
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</body>
<script>
    $(document).ready(function () {
        $(".selectall").change(function(){
            var properties = $(this).prop("checked");
            var checkboxes = $(this).parents('table').find(".removeparticular");
            checkboxes.prop("checked", properties);
        });
        var scope;

        $('.wms-cart-remove').click(function(){
            var cart_id= $(this).data('id');

            $('#loader').show();
            $.ajax({
                type: 'POST',
                data: {cart_id:cart_id},
                url: "/cart/remove",
                success: function (data) {
                    location.reload();
                }
            });
        });
    });
</script>
