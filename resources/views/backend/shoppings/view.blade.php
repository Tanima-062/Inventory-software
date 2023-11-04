<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Task Management Platform</title>
    @include('backend.layouts.styles')
    <style>
        #input_container {
            position:relative;
            padding:0 0 0 5px;
            margin-left: 5px;
        }
        #input {
            height:20px;
            margin:0;
            padding-right: 30px;
            border:none;
            width: 100%;
        }
        #input_img {
            position:absolute;
            bottom:2px;
            right:5px;
            width:24px;
            height:24px;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('backend.layouts.header')
    <div class="container-fluid page-body-wrapper">
        @include('backend.layouts.sidebar')
        <div class="main-panel user-profile-panel">
            <div class="content-wrapper">
                <div id="alert-show">
                    @include('backend.layouts.messages')
                </div>
                <div class="profileBox card-body">
                    <div class="row">
                        <div class="col-7">
                         <h5 class="mb-2 mt-2 user-profile-title">Shopping View</h5>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="row user-info-row">
                        <div class="col-md-12 text-center mb-5">
                            
                                <img class="profile-picture" src="{!! URL::to('public/backend/assets/img/products.jpg') !!}" alt="profile" height="150px;" width="150px"/>
                            
                        </div>
                        <div class="col-md-6 user-info-col-2 vl">
                            <div class="row profile-info">
                                <div class="col-md-4"><b>Amount:</b></div>
                                <div class="col-md-8">{{empty($shopping->amount) ? '' : $shopping->amount}}</div>
                            </div>
                            <div class="row profile-info">
                                <div class="col-md-4"><b>Buyer:</b></div>
                                <div class="col-md-8">{{empty($shopping->buyer) ? '' : $shopping->buyer}}</div>
                            </div>
                            <div class="row profile-info">
                                <div class="col-md-4"><b>Receipt Id:</b></div>
                                <div class="col-md-8">{{empty($shopping->receipt_id) ? '' : $shopping->receipt_id}}</div>
                            </div>
                            <div class="row profile-info">
                                <div class="col-md-4"><b>Buyer Email:</b></div>
                                <div class="col-md-8">{{empty($shopping->buyer_email) ? '' : $shopping->buyer_email}}</div>
                            </div>
                            <div class="row profile-info">
                                <div class="col-md-4"><b>Buyer IP:</b></div>
                                <div class="col-md-8">{{empty($shopping->buyer_ip) ? '' : $shopping->buyer_ip}}</div>
                            </div>
                            <div class="row profile-info">
                                <div class="col-md-4"><b>Note:</b></div>
                                <div class="col-md-8">{{empty($shopping->note) ? '' : $shopping->note}}</div>
                            </div>
                        </div>
                        <div class="col-md-6 user-info-col-3">
                            <div>
                                <div class="row profile-info">
                                    <div class="col-md-4"><b>City:</b></div>
                                    <div class="col-md-8">{{empty($shopping->city) ? '' : $shopping->city}}</div>
                                </div>
                                <div class="row profile-info">
                                    <div class="col-md-4"><b>Phone No.:</b></div>
                                    <div class="col-md-8">{{empty($shopping->phone) ? '' : $shopping->phone}}</div>
                                </div>
                                <div class="row profile-info">
                                    <div class="col-md-4"><b>Items:</b></div>
                                    <div class="col-md-8">
                                    @php $item = \App\Shopping::itemNameConcate($shopping->shoppingItems); @endphp
                                        {{ $item }}
                                    </div>
                                </div>
                                <div class="row profile-info">
                                    <div class="col-md-4"><b>Entry At:</b></div>
                                    <div class="col-md-8">{{empty($shopping->entry_at) ? '' : date('d M, Y',strToTime($shopping->entry_at))}}</div>
                                </div>
                                <div class="row profile-info">
                                    <div class="col-md-4"><b>Entry By:</b></div>
                                    <div class="col-md-8">{{empty($shopping->entry_by) ? '' : $shopping->entry_by}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row profile-info">
                            <div class="col-md-4"><b>Hash Key:</b></div>
                            <div class="col-md-8">{{empty($shopping->hash_key) ? '' : $shopping->hash_key}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-body-wrapper ends -->
        <!-- container-scroller -->
@include('backend.layouts.scripts')

</body>

</html>
