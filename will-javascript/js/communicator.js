var Communicator = {
            getCarsData: function(dataURL) {
                $.ajax({
                    url: dataURL,
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        carsArray = data.cars; //store data in GLOBAL array for persistency
                        //place in an option at top of carsSelect
                        $('#carsSelect').append('<option value="default">Please select a car</option>');
                        var numCars = data.cars.length;
                        for (var i = 0; i < numCars; i++) {
                            var option = '<option value="' + data.cars[i].id + '">' + data.cars[i].caption + '</option>';
                            $('#carsSelect').append(option);
                        }
                    },
                    error: function(http, message, status) {}
                });
            }
        };