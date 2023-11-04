<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventory Management System</title>
    @include('backend.layouts.styles')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('backend.layouts.header')
    <div class="container-fluid page-body-wrapper">
        <div class="loading" style="display:none;">
            <div class="loader"></div>
        </div>
        @include('backend.layouts.sidebar')
        <div class="main-panel user-create-main-panel">
            <div class="content-wrapper">
                <div id="alert-show">
                    @include('backend.layouts.messages')
                </div>
                <h4 class="user-create-title">Create New Shopping</h4>
                <hr class="Dash-Line">
                <div class="CreateTaskBox card-body">
                   <h5 class="mb-4 mt-2">Enter Shopping Information</h5>
                   <hr>
                    <form method="POST" action="{{route('shoppings.store')}}" id="shoppingForm">
                        @csrf
                        <div class="form-row py-4">
                            {{-- start 1st col --}}
                            <div class="col-md-6 px-5">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="amount" >Amount <span class="mandatory">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="amount" name="amount" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
    
                                        <span class="invalid-feedback amount-error" role="alert">
                                            <strong></strong>
                                        </span>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="buyer">Buyer <span class="mandatory">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="buyer" name="buyer" autocomplete="nope">
                                    
                                        <span class="invalid-feedback buyer-error" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="recepit_id">Receipt Id <span class="mandatory">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="receipt_id" name="receipt_id">
                                        
                                        <span class="invalid-feedback receipt_id-error" role="alert">
                                            <strong></strong>
                                        </span>
                                       
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="item">Items <span class="mandatory">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control col-md-12 select2" name="items[]" id="items" multiple>
                                            @foreach($items as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                       
                                        <span class="invalid-feedback items-error" role="alert">
                                            <strong></strong>
                                        </span>
                                       
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="email">Buyer Email <span class="mandatory">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" id="buyer_email" name="buyer_email">
                                        
                                        <span class="invalid-feedback buyer_email-error" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                       
                            </div>
                            {{-- end 1st col --}}
                            {{-- start 2nd col --}}
                            <div class="col-md-6 px-5">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="note">Note <span class="mandatory">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                                        <span class="invalid-feedback note-error" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="city">City <span class="mandatory">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="city" name="city">
                                        <span class="invalid-feedback city-error" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="phone_number">Phone Number <span class="mandatory">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="phone" name="phone">
                                    
                                        <span class="invalid-feedback phone-error" role="alert">
                                            <strong></strong>
                                        </span>
                            
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="entry_by">Entry By <span class="mandatory">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="entry_by" name="entry_by" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                    
                                        <span class="invalid-feedback entry_by-error" role="alert">
                                            <strong></strong>
                                        </span>
                            
                                    </div>
                                </div>
                            </div>
                            {{-- end 2nd col --}}
                            <div class="col-md-12">
                                <div class="text-center">
                                    <a href="{{route('shoppings.index')}}" class=" btn custom-outline-btn">Cancel</a>
                                    <button class="btn custom-btn save-btn">Create</button>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
            {{--            footer--}}
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
        <!-- container-scroller -->
        @include('backend.layouts.scripts')
        <script>
            $(document).ready(function(){
                $("#phone").keyup(function(){
                    if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'');
                    let total_length = this.value.length;
        
                    if(total_length=='11'){
                    $("#phone").val("88"+$("#phone").val());
                    }
                    else if(total_length=='10'){
                    $("#phone").val("880"+$("#phone").val());
                    }
                    else{
                    $("#phone").val();
                    }
                });

                $("#receipt_id").keyup(function(){
                    var reg_pattern = /^[a-zA-Z\s]*$/;

                    if(!reg_pattern.test($('#receipt_id').val())){ 
                        $("#receipt_id").addClass('is-invalid');
                        $('.receipt_id-error').html('<strong>Only letters and spaces are allowed</strong');
                        $('.receipt_id-error').show();
                    }
                });

                $("#city").keyup(function(){
                    var reg_pattern = /^[a-zA-Z\s]*$/;

                    if(!reg_pattern.test($('#city').val())){ 
                        $("#city").addClass('is-invalid');
                        $('.city-error').html('<strong>Only letters and spaces are allowed</strong');
                        $('.city-error').show();
                    }
                });

                $("#shoppingForm").submit(function (e) {
                    e.preventDefault();
                    var formData = $('#shoppingForm').serializeArray();
                    var note = $("#note").val();
                    var flag = '';
                    if($("#amount").val() == ''){
                        $("#amount").addClass('is-invalid');
                        $('.amount-error').html('<strong>Amount field is required</strong');
                        $('.amount-error').show();
                        flag='amount-error';
                    }
                    if($("#buyer").val() == ''){
                        $("#buyer").addClass('is-invalid');
                        $('.buyer-error').html('<strong>Buyer field is required</strong');
                        $('.buyer-error').show();
                        flag='buyer-error';
                    }
                    if($("#receipt_id").val() == ''){
                        $("#receipt_id").addClass('is-invalid');
                        $('.receipt_id-error').html('<strong>Receipt id field is required</strong');
                        $('.receipt_id-error').show();
                        flag='receipt_id-error';
                    }
                    if($("#receipt_id").val() != ''){
                        var reg_pattern = /^[a-zA-Z\s]*$/;

                        if(!reg_pattern.test($('#receipt_id').val())){ 
                            $("#receipt_id").addClass('is-invalid');
                            $('.receipt_id-error').html('<strong>Only letters and spaces are allowed</strong');
                            $('.receipt_id-error').show();
                            flag='receipt_id-pattern-error';
                        }
                    }
                    if($("#buyer_email").val() == ''){
                        $("#buyer_email").addClass('is-invalid');
                        $('.buyer_email-error').html('<strong>Buyer email field is required</strong');
                        $('.buyer_email-error').show();
                        flag='buyer_email-error';
                    }
                    if($("#phone").val() == ''){
                        $("#phone").addClass('is-invalid');
                        $('.phone-error').html('<strong>Phone field is required</strong');
                        $('.phone-error').show();
                        flag='phone-error';
                    }
                    if($("#city").val() == ''){
                        $("#city").addClass('is-invalid');
                        $('.city-error').html('<strong>City field is required</strong');
                        $('.city-error').show();
                        flag='city-error';
                    }
                    if($("#city").val() != ''){
                        var reg_pattern = /^[a-zA-Z\s]*$/;

                        if(!reg_pattern.test($('#city').val())){ 
                            $("#city").addClass('is-invalid');
                            $('.city-error').html('<strong>Only letters and spaces are allowed</strong');
                            $('.city-error').show();
                            flag='city-pattern-error';
                        }
                    }
                    if($("#entry_by").val() == ''){
                        $("#entry_by").addClass('is-invalid');
                        $('.entry_by-error').html('<strong>Receipt id field is required</strong');
                        $('.entry_by-error').show();
                        flag='receipt_id-error';
                    }
                    if(note == ''){
                        $("#note").addClass('is-invalid');
                        $('.note-error').html('<strong>Note field is required</strong');
                        $('.note-error').show();
                        flag='note-error';
                    }
                    if(note.split(/\s+/).length > 30){
                        $("#note").addClass('is-invalid');
                        $('.note-error').html('<strong>Word can not be more than 30</strong');
                        $('.note-error').show();
                        flag='note-error';
                    }

                    if($("#items").val().length == 0){
                        $("#items").addClass('is-invalid');
                        $('.items-error').html('<strong>Please select a item</strong');
                        $('.items-error').show();
                        flag='item-error';
                    }
                    
                    if(flag == '') {
                        $('.loading').show();
                        

                        $.ajax({
                            url: $("#shoppingForm").attr('action'),
                            method: $("#shoppingForm").attr('method'),
                            data: formData,
                            success: function (data) {
                                console.log(data);
                                $('.loading').hide();
                                if (data.success == true) {
                                    window.location = '/inventory_software/shoppings';
                                }else{
                                    window.location = '/inventory_software/shoppings/create';
                                }
                            },
                            error: function (xhr, status, errorThrown) {
                                $('.loading').hide();
                                var response = JSON.parse(xhr.responseText);
                                console.log(response.errors);
                                //Here the status code can be retrieved like;
                                // xhr.status;

                                //The message added to Response object in Controller can be retrieved as following.
                            }
                        });
                    }
                    
                });

            });
            $('.select2').select2();
        </script>

</body>

</html>
