<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Car Rental-Home</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    </head>

    <body>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form style="padding-left: 56px;margin-right: 68px;margin-top: 50px" method="POST" action="{{route('bookings.store')}}" onmousemove="myFunction()">
            {{csrf_field()}}
               <div class="row">
                <div class="col">
                    <label for="pickup_date">Pickup Date</label>
                </div>
                <div class="col">
                    <input type="date" class="form-control" name="pickup_date" id="myDate">
                </div>
                <div class="col">
                    <label for="dropoff_date">Drop-off Date</label>
                </div>
                <div class="col">
                    <input type="date" class="form-control" name="dropoff_date" id="dDate">
                </div>
               </div>

               <div class="row">
                <div class="col">
                    <label for="vehicle_name">Select Vehicle</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="vehicle_name" id="vehicle_name" >
                    <input type="hidden" name="vehicle_id" id="vehicle_id">
                    <input type="hidden" name="rent_cost" id="rent_cost"  >
                </div>
                <div class="col">
                    <label for="total_amount">Total Rental</label>
                </div>
                <div class="col">
                    <div id="total_amount"></div>
                    <input type="hidden" class="form-control" name="total_amount" id="total">
                </div>
               </div>

               <div class="row">
                <div class="col">
                    <h3>Customer Details</h3>
                </div>
               </div>
               <div class="row">
                <div class="col">
                    <label for="customer_name">Name</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="customer_name" >
                </div>
               </div>
               <div class="row">
                <div class="col">
                    <label for="contact_number">Contact Number</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="contact_number" >
                </div>
               </div>
               <div class="row">
                <div class="col">
                    <label for="customer_email">Email Address</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="customer_email" >
                </div>
               </div>
               <div class="row">
                <div class="col">
                    <label for="postal_address">Postal Address</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="postal_address" >
                </div>
               </div>
               <div class="row">
                <div class="col"><button class="btn btn-primary" id="btn_save" type="submit" onclick="myFunction2()">Submit</button>
                    <script>
                        function myFunction2() {
                          alert("Are you sure to book this vehicle?");
                        }
                    </script>
                </div>
            </div>
            <script type="text/javascript">
                var path = "{{ route('autocomplete') }}";
                $( "#vehicle_name" ).autocomplete({
                    source: function( request, response ) {
                        start= document.getElementById("myDate").value;
                        drop= document.getElementById("dDate").value;
                      $.ajax({
                        url: path,
                        type: 'GET',
                        dataType: "json",
                        data: {
                            start:start,
                            drop:drop,
                           search: request.term
                        },
                        success: function( data ) {
                           response( data );
                        }
                      });
                    },

                    select: function (event, ui) {
                        console.log(ui.item);
                       $('#vehicle_name').val(ui.item.label);
                       $('#vehicle_id').val(ui.item.id);
                       $('#rent_cost').val(ui.item.rental_per_day);

                       return false;
                    },


                  });
                  function myFunction(e) {
                     myElement = document.getElementById("rent_cost").value;
                     start= document.getElementById("myDate").valueAsDate;
                    drop= document.getElementById("dDate").valueAsDate;
                    var sub = drop.getDate()-start.getDate();
                    document.getElementById("total_amount").innerHTML = myElement * sub;
                    document.getElementById("total").value = myElement * sub;
                  }
            </script>
        </form>
    </body>
</html>
