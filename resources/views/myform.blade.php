<!DOCTYPE html>
<html>

<head>
    <title>Add Order</title>
    <link rel="stylesheet" href="http://www.codermen.com/css/bootstrap.min.css">
    <script src="http://www.codermen.com/js/jquery.js"></script>


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>
    <div class="container">
        @if (Route::has('login'))
        <div class="panel panel-default">
            @auth
            <div class="panel-heading">Add Order</div>
            <div class="panel-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}


                </div>
                @endif
                <form method="post" action="{{ route('orders.store') }}">
                    @csrf
                    <!-- <div class="form-group">
                <label for="title">Select Date:</label>
                <input type="text" name="date" id="datetime"  class="form-control total"  style="width:350px">
            </div> -->
                    <div class="form-group">
                        <select id="prod" name="category_id" class="form-control" style="width:350px">
                            <option value="">Select</option>
                            @foreach($products as $key => $product)
                            <option value="{{$key}}"> {{$product}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Select Price:</label>
                        <select name="prc" id="prc" class="form-control" style="width:350px">
                            <!-- <input type="text" name="state" id="state" class="form-control" readonly style="width:350px"> -->
                        </select>
                        <!-- <input type="text" name="state2" value=""> -->
                    </div>

                    <!-- <div class="form-group"> -->
                    <div class="form-group">
                        <label for="title">Quantity</label>
                        <input type="text" name="qty" id="qty" class="form-control qty" style="width:350px">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Total</label>
                        <input type="text" id="tot" name="total" class="form-control total" readonly
                            style="width:350px">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">User</label>
                        <input type="text" id="usr" name="user" value="{{ Auth::user()->name }}"
                            class="form-control total" readonly style="width:350px">

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save Order</button>
                    </div>
                </form>
            </div>
        </div>
        @endauth

    </div>
    @endif


    <script type="text/javascript">
    $('#prod').change(function() {
        var ProductID = $(this).val();
        if (ProductID) {
            $.ajax({
                type: "GET",
                url: "{{url('getPriceList')}}?product_id=" + ProductID,
                success: function(res) {
                    if (res) {
                        $("#prc").empty();
                        $("#prc").append('<option>Select</option>');
                        $.each(res, function(key, value) {
                            $("#prc").append('<option value="' + key + '">' + value +
                                '</option>');
                        });

                    } else {
                        $("#prc").empty();
                    }
                }
            });
        } else {
            $("#prc").empty();
        }
    });

    $('input[name="qty"]').keyup(function() {
        var a = document.getElementById("prc");
        var value = a[a.selectedIndex].text;
        var b = $(this).val();
        $('input[id="tot"]').val(value * b);

    });


    // Date and time Picker
    $(function() {
        $("#datetime").datepicker();
    });
    </script>
</body>

</html>