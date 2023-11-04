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
        @include('backend.layouts.sidebar')
        <div class="main-panel users-list-main-panel">
            <div class="content-wrapper" >
                <div id="alert-show">
                    @include('backend.layouts.messages')
                </div>
                <h3 class="users-list-title">Inventory Management</h3>
                <hr class="Dash-Line">
                <div class="row DataTableBox">
                    <div class="row users-list-table-subHeader">
                        <div class="col-sm-5 subHeader-col-1">
                            <div class="form-inline">
                                <span><b>All Shopping List</b></span>
                                <input type="hidden" name="shopping-order" id="shopping_order" value="order">
                                <input type="hidden" name="shopping-coloumn" id="shopping_coloumn">
                            </div>
                        </div>
                        <div class="col-sm-7 subHeader-col-2">
                            <a class="btn-hover" href="{{route('shoppings.create')}}"><button class="user-list-New-User">New Shopping</button></a>
                        </div>
                    </div>
                    <div>
                      <hr>
                    </div>

                    <div class="shopping-table-section">
                        @include('backend.shoppings.fetch_shopping')
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
            {{--            footer--}}
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
    </div>
</div>
        <!-- page-body-wrapper ends -->
        <!-- container-scroller -->

        @include('backend.layouts.scripts')
        <script>
            $(document).ready(function() {
                search();
                pagination();
                sortingColoumn();
            });
            function sortingColoumn(){
                $('.fas').click(function(){
                    $("#shopping_order").val($(this).attr('order'));
                    $("#shopping_coloumn").val($(this).attr('coloumn'));
                    formSubmit();
                });
            }

            function formSubmit(){
                var coloumn = $("#shopping_coloumn").val();
                var order = $("#shopping_order").val();
                $.ajax({
                    url:'/inventory_software/shopping/search',
                    method:'GET',
                    data:{order:order, coloumn:coloumn},
                    success:function(data){
                        $(".shopping-table-section").html(data.view);
                        if($("#shopping_order").val() == 'asc'){
                            var coloumnUser = $("#shopping_coloumn").val();
                            $('[coloumn= '+coloumnUser+']').attr('order','desc');
                        }
                        pagination();
                        sortingColoumn();
                    }
                }) 
            }
            function search(){
                $("#search_key").keyup(function(){
                    formSubmit();
                });
            }
            function pagination(){
                $('.page-link').click(function(event){
                    event.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    if (page) {
                        $.ajax({
                            url: '/inventory_software/shopping/search?page=' + page,
                            method:'GET',
                            success:function(data){
                                $('.shopping-table-section').html(data.view);
                                pagination();
                                sortingColoumn();
                            }
                        })
                    }
                });
            }
        </script>

</body>

</html>
