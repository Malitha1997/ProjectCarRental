<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Car Rental-Home</title>
    </head>

    <body>
        <form style="padding-left: 56px;margin-right: 68px;margin-top: 50px" method="POST" action="{{route('bookings.store')}}">
            {{csrf_field()}}
               <div class="row">
                <div class="col">
                    <label for="pickup_date">Pickup Date</label>
                </div>
                <div class="col">
                    <input type="date" class="form-control" name="pickup_date" >
                </div>
                <div class="col">
                    <label for="dropoff_date">Drop-off Date</label>
                </div>
                <div class="col">
                    <input type="date" class="form-control" name="dropoff_date" >
                </div>
               </div>

               <div class="row">
                <div class="col">
                    <label for="vehicle_name">Select Vehicle</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="vehicle_name" >
                </div>
                <div class="col">
                    <label for="total_amount">Total Rental</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="total_amount" >
                </div>
               </div>

               <div class="row">
                <div class="col">
                    <h3>Customer Details</h3>
                </div>
               </div>
               <div class="row">
                <div class="col">
                    <label for="customer_id">Name</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="customer_id" >
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
                <div class="col"><button class="btn btn-primary" id="btn_save" type="submit">Submit</button></div>
            </div>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $(document).on('click','#vehicle_name', function() {
            var route = "{{ route('livesearch') }}";
            $(this).autocomplete({
                source: function( request, response ) {
                    $.ajaxSetup({

                        headers: {

                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }

                    });
                   // Fetch data
                    $.ajax({
                        url:route,
                        type: 'post',
                        dataType: "json",
                        data: {
                            query: request.term
                        },
                        success: function( data ) {
                        response( data );

                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    var id = event.target.id
                    $('#'+id).val(ui.item.label); // display the selected text
                    $('#'+id+'id').val(ui.item.value); // save selected id to input
                    return false;
                }
            });
        });


    });


</script>
    </body>

</html>
