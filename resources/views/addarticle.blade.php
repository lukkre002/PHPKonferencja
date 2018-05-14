@include('includes.header')

@if(session('response'))
    <div class="col-md-8 alert alert-success">
        {{session('response')}}
    </div>
@endif

@if(session('responseError'))
    <div class="col-md-8 alert alert-danger">
        {{session('responseError')}}
    </div>
@endif
<script type="text/javascript" src="http://services.iperfect.net/js/IP_generalLib.js"></script>
<div class="articleBox">
<div class="tablee">
<div class="form-group">
    <div class="bootstrap-iso">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <form method="post">
                        <div class="form-group ">
                            <label class="control-label " for="date">
                                Wybierz datę:
                            </label>
                            <div class="input-group">
                                <input class="form-control" id="date" name="date" placeholder="DD/MM/YYYY" type="text"/>
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar">
                                    </i>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <select class="custom-select">
        <option selected="">Wybierz konferencję</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
    <label for="exampleInputFile">Wybierz plik do dodania:</label>
    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" align="center">
    <div class="g-recaptcha" data-sitekey="6Lcqk1MUAAAAAFCGUcyCcVYNH9WKejP5ikvl4zLJ"/>

    <div class="vspace1em"></div>
    <div align="center">
    <button type="button" class="btn btn-primary">Dodaj</button>
    <button type="button" class="btn btn-danger" >Anuluj</button>
    </div>
    <div class="vspace1em"></div>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>
    </div>
</div>
</div>
</div>



<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

@include('includes.captcha')
@include('includes.footer')