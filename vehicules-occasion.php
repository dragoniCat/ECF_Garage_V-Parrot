<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage V. Parrot</title>

    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous"
    >
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous">
    </script>

    <link 
        href="css/jquery-ui.min.css" 
        rel="stylesheet">
    <script
		src="https://code.jquery.com/jquery-3.7.1.min.js"
		integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
		crossorigin="anonymous">
    </script>
    <script 
        src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" 
        integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" 
        crossorigin="anonymous">
    </script>

    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php include('components/header/header.php'); ?>

    <div id="logo">
        <img src="assets/images/logo-garage.svg" alt="Garage V. Parrot logo" class="responsive-logo">
    </div>

    <div class="main">
        <h class="heading">Véhicules disponibles</h>

        <div class="row gx-5">
            <div class="col-md">
                <label for="kmrange" class="secondary-heading fw-bold">Kilométrage</label>

                <div id="km_range" 
                class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                    <div class="ui-slider-range ui-corner-all"
                        style="left: 0%; width: 100%;">
                    </div>
                    <span class="ui-slider-handle ui-corner-all ui-state-default" tabindex="0"
                        style="left: 0%; border-color: #7E7E7E;">
                    </span>
                    <span class="ui-slider-handle ui-corner-all ui-state-default" tabindex="0"
                        style="left: 100%; border-color: #7E7E7E;">
                    </span>
                </div>
                <input type="hidden" id="hidden_minimum_km" value="0" />
                <input type="hidden" id="hidden_maximum_km" value="200000" />
                <p id="km_show">100000 km - 200000 km</p>
            </div>

            <div class="col-md">
                <label for="pricerange" class="secondary-heading fw-bold">Prix</label>

                <div id="prix_range" 
                class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                    <div class="ui-slider-range ui-corner-all"
                        style="left: 0%; width: 100%;">
                    </div>
                    <span class="ui-slider-handle ui-corner-all ui-state-default" tabindex="0"
                        style="left: 0%; border-color: #7E7E7E;">
                    </span>
                    <span class="ui-slider-handle ui-corner-all ui-state-default" tabindex="0"
                        style="left: 100%; border-color: #7E7E7E;">
                    </span>
                </div>
                <input type="hidden" id="hidden_minimum_prix" value="0" />
                <input type="hidden" id="hidden_maximum_prix" value="10000" />
                <p id="prix_show">4000 € - 10000 €</p>
            </div>

            <div class="col-md">
                <label for="yearsrange" class="secondary-heading fw-bold">Années</label>

                <div id="age_range" 
                class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                    <div class="ui-slider-range ui-corner-all"
                        style="left: 0%; width: 100%; border-color: #7E7E7E;">
                    </div>
                    <span class="ui-slider-handle ui-corner-all ui-state-default" tabindex="0"
                        style="left: 0%; border-color: #7E7E7E;">
                    </span>
                    <span class="ui-slider-handle ui-corner-all ui-state-default" tabindex="0"
                        style="left: 100%; border-color: #7E7E7E;">
                    </span>
                </div>
                <input type="hidden" id="hidden_minimum_age" value="0" />
                <input type="hidden" id="hidden_maximum_age" value="10000" />
                <p id="age_show">2000 - 2020</p>
            </div>
        </div>

        <div style="margin: 5%;">
            <!-- <div class="row row-cols-1 row-cols-md-3 g-4"> -->

                <div class="row row-cols-1 row-cols-md-3 g-4 filter_data"></div>

            <script>
                $(document).ready(function(){

                filter_data();

                function filter_data() {
                    $('.filter_data').html('<div class="spinner-border text-danger" role="status"><span class="visually-hidden">Loading...</span>');
                    var action = 'fetch_data';
                    var minimum_km = $('#hidden_minimum_km').val();
                    var maximum_km = $('#hidden_maximum_km').val();

                    var minimum_prix = $('#hidden_minimum_prix').val();
                    var maximum_prix = $('#hidden_maximum_prix').val();

                    var minimum_age = $('#hidden_minimum_age').val();
                    var maximum_age = $('#hidden_maximum_age').val();
                    $.ajax({
                        url:"includes/vehicules_controller.php",
                        method:"POST",
                        data:{action:action, minimum_km:minimum_km, maximum_km:maximum_km, 
                            minimum_prix:minimum_prix, maximum_prix:maximum_prix, 
                            minimum_age:minimum_age, maximum_age:maximum_age,},
                        success:function(data) {
                            $('.filter_data').html(data);
                        }
                    });
                }

                function get_filter(class_name) {
                    var filter = [];
                    $('.'+class_name+':checked').each(function(){
                        filter.push($(this).val());
                    });
                    return filter;
                }

                $('.common_selector').click(function(){
                    filter_data();
                });

                $('#km_range').slider({
                    range:true,
                    min:100000,
                    max:200000,
                    values:[100000, 200000],
                    step:500,
                    stop:function(event, ui) {
                        $('#km_show').html(ui.values[0] + ' - ' + ui.values[1]);
                        $('#hidden_minimum_km').val(ui.values[0]);
                        $('#hidden_maximum_km').val(ui.values[1]);
                        filter_data();
                    }
                });

                $('#prix_range').slider({
                    range:true,
                    min:4000,
                    max:10000,
                    values:[4000, 10000],
                    step:100,
                    stop:function(event, ui) {
                        $('#prix_show').html(ui.values[0] + ' - ' + ui.values[1]);
                        $('#hidden_minimum_prix').val(ui.values[0]);
                        $('#hidden_maximum_prix').val(ui.values[1]);
                        filter_data();
                    }
                });

                $('#age_range').slider({
                    range:true,
                    min:2000,
                    max:2020,
                    values:[2000, 2020],
                    step:1,
                    stop:function(event, ui) {
                        $('#age_show').html(ui.values[0] + ' - ' + ui.values[1]);
                        $('#hidden_minimum_age').val(ui.values[0]);
                        $('#hidden_maximum_age').val(ui.values[1]);
                        filter_data();
                    }
                });

                });
            </script>

            <!-- </div> -->
        </div>
    
    </div>

    <?php include('components/footer/footer.php'); ?>
</body>
</html>