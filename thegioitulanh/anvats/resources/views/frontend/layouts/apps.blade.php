<!doctype html>
<html lang="vi-vn">
    <head>
        <meta name="google-site-verification" content="VZ6xUK4LvjzzKg4DnXDrU0eGXa37Bk4IGdXP8cUFcZ0" />
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mua hàng tại kho - Siêu thị điện máy ABC</title>
        <!--meta-->
        <meta name="title" content="Mua hàng tại kho - Siêu thị điện máy ABC"/>
        <meta name="keywords" content="mua hàng tại kho, mua hang tai kho, sieu thi dien may, siêu thị điện máy, điện máy abc, dien may abc, dienmayabc, sieu thi dien may abc, siêu thị điện máy abc"/>
        <meta name="description" content="Siêu Thị Điện Máy ABC Cam Kết Tất Cả Sản Phẩm Chính Hãng, Mới 100% Nguyên Đai Nguyên Kiện, Muahangtaikho - Mua Hàng Tại Kho"/>
        <meta content="document" name="resource-type" />
        <meta content="1800" http-equiv="refresh" />
        <meta name="robots" content="index,follow" />
        <meta name="revisit-after" content="1 days" />
        <meta http-equiv="content-language" content="vi-vn" />
        <link rel="alternate" type="application/rss+xml" title="RSS Feed for https://dienmayabc.com" href="/product.rss" />
        <meta property="fb:admins" content=""/>
        <meta property="fb:app_id" content="893882260753407" />
        <meta property="og:title" content="Mua hàng tại kho - Siêu thị điện máy ABC" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://dienmayabc.com/" />
        <!-- <meta property="og:image" content="https://dienmayabc.com/media/banner/logo_logo-abc.png"> -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Array
            (
                [name] => home
                [view] => home
                [view_id] => 0
            )
            1 -->
        <!--style-->
        <link rel="shortcut icon" href="{{ asset('template/default/images/favicon.ico')}}  ">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{ asset('template/default/script/style.css') }}" rel="stylesheet">

        
        <style type="text/css">
            #ui-id-1{
                z-index: 999 !important;
                background: #fff;
                width: 20%;
            }
        </style>
    </head>
    <body class="module-home view-home">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>

        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <div class="wrapper">
            <div class="header">
                <meta name="google-site-verification" content="VZ6xUK4LvjzzKg4DnXDrU0eGXa37Bk4IGdXP8cUFcZ0" />
                <div class="wrap">
                    <a class="logo" href="/">
                        <h1 class="format"><img alt="dienmayabc" src="/media/banner/cropped-logo.png"/></h1>
                    </a>
                    <div class="box-search search">
                        <form method="get" action="{{ route('search-product-frontend') }}" enctype="multipart/form-data" name="searchForm">
                            <input name="key" id="ip1" class="ip1" value="" placeholder="Tìm sản phẩm, danh mục hay thương hiệu mong muốn..." />
                            <input class="btn" value="Tìm kiếm" type="submit" />
                        </form>
                        <div class="search-results">
                            <div class="search-results-list"></div>
                            <a href="javascript:;" onclick="document.searchForm.submit();" class="vmore-result">Xem thêm kết quả</a>
                        </div>
                    </div>
                    <div class="hotline">
                        Gọi đặt mua:
                        <span>0967 025 111</span>
                    </div>
                    <!-- <div class="account">
                        <i class="fa fa-user"></i>
                        <span><a rel="nofollow" href="/dang-nhap">Đăng nhập</a></span>
                        <a rel="nofollow" href="/taikhoan">
                        Tài khoản và đơn hàng
                        </a>
                    </div> -->

                    <?php 
                        $cart = Gloudemans\Shoppingcart\Facades\Cart::content();
                                                    
                        $number_cart_home = count($cart);

                    ?>
        
                    <div class="cart">
                        <a href="{{ route('cart-tgtl') }}" rel="nofollow"><i class="fa fa-shopping-cart"></i> Giỏ hàng
                        <span id="count_shopping_cart_store">{{ $number_cart_home  }}</span>
                        </a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
          
            <div class="navigation">
                <div class="wrap menu-top">
                    <ul>
                        <?php 
                            $listmenu = App\Models\groupProduct::where('parent_id', 35)->get();
                        ?>
                        @if($listmenu->count()>0)
                        @foreach($listmenu as $val)
                        <li>
                            <a href="{{ route('details', $val->link) }}">
                                <h2>{{ $val->name }}</h2>
                            </a>

                            <?php 
                                $listmenu1 = App\Models\groupProduct::where('parent_id', $val->id)->get();
                            ?>

                            @if($listmenu1->count()>0)
                            @foreach($listmenu1 as $val1)
                            <ul class="child">
                                <li>
                                    <ul class="group">
                                        <li class="name">{{ $val1->name }}</li>
                                        
                                    </ul>
                                    <span id="att1"><i class="fa fa-spinner fa-spin"></i></span>
                                </li>
                            </ul>
                            @endforeach
                            @endif
                        </li>
                        @endforeach
                        @endif
                        
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <!--//navigation-->
            

        

            @yield('content')
        

            <div class="clear"></div>
            <div class="footer">
                <div class="wrap">
                    <div class="infor">
                        <p class="name txt_b">Mua Hàng Trực Tuyến </p>
                        <div class="img">
                            <img src="/media/lib/789_favicon.png" alt="" width="80" alt=""/>
                        </div>
                        <div class="cont txt_555 line_h22">
                           chúng tôi tích lũy kinh nghiệm hơn 20 năm, ấp ủ mong muốn mang những sản phẩm điện máy có chất lượng tốt, thân thiện với môi trường, thân thiện với cuộc sống của người dân Việt,  với mong muốn giúp người tiêu dùng Việt có được cuộc sống Tiện nghi – Thân thiện một cách đơn giản nhất.
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!--//infor-->
                <div class="ft-column">
                    <div class="wrap">
                        <ul class="ft-group">
                            <li class="name one">Về điện máy ABC</li>
                            <li><a href="/gioi-thieu">Giới thiệu công ty</a></li>
                            <li><a href="/tuyen-dung.html">Tuyển dụng</a></li>
                            <li><a href="/lien-he">Liên hệ góp ý</a></li>
                        </ul>
                        <ul class="ft-group">
                            <li class="name">Chính sách và quy định</li>
                            <li><a href="/chinh-sach-bao-mat">Chính sách bảo mật</a></li>
                            <li><a href="/chinh-sach-giao-hang">Chính sách vận chuyển</a></li>
                            <li><a href="chinh-sach-kiem-hang.html">Chính sách kiểm hàng</a></li>
                            <li><a href="/chinh-sach-doi-hang">Chính sách đổi hàng</a></li>
                            <li><a href="/chinh-sach-bao-hanh">Chính sách bảo hành</a></li>
                            <li><a href="/quy-dinh-thanh-toan">Quy định thanh toán</a></li>
                        </ul>
                        <ul class="ft-group">
                            <li class="name">Hướng dẫn sử dụng</li>
                            <li><a href="/huong-dan-mua-hang">Hướng dẫn mua hàng</a></li>
                            <li><a href="/huong-dan-thanh-toan">Hướng dẫn thanh toán</a></li>
                            <li><a href="/gia-va-cong-lap-dat-dieu-hoa">Vật tư và công lắp đặt điều hòa</a></li>
                        </ul>
                        <ul class="ft-group four">
                            <li class="name">Liên hệ</li>
                            <li class="phone ico txt_777">
                                <p class="format txt_red txt_18">0967 025 111</p>
                                (từ 7h30 đến 22h tất cả các ngày)
                            </li>
                            <li class="email ico">
                                abcdienmay@gmail.com
                                <br>
                                CSKH: <span class="txt_b txt_13">02438 615 111</span>
                            </li>
                        </ul>
                        <ul class="ft-group five">
                            <li class="name">Kết nối với chúng tôi</li>
                            <li>
                                <script src="https://apis.google.com/js/platform.js"></script>
                                <div>
                                    <a href="https://www.facebook.com/dienmayabc.vn/"><img src="/template/default/images/icfb.png"/></a>
                                </div>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div class="space10px"></div>
                    <div class="space5px"></div>
                    
                </div>
                <!--//ft-column-->
                <div class="ft-column" style="margin-top:10px">
                    <div class="wrap">
                        Copyright ©2017 https://dienmayabc.com. <a href="?show_version=mobile" rel="nofollow">Xem phiên bản Mobile</a>
                        <div class="clear space5px"></div>
                    </div>
                </div>
                <!--//ft-column-->
            </div>
            <a href="tel:0967025111" class="icon-call transition"><img src="/template/default/images/icon_goi-ngay_pc.png?v=1.1.1" style="max-width:122px;" alt=""></a>  
        </div>
        <div id="toTop" title="Lên đầu trang" class="transition"></div>

        @stack('js')

        
        <!--style-->
        <!--begin: system-->
        <!-- <script defer src="/javascript/dist/hurastore.js?v=2.2.21"></script>
        <!--//end: system-->
        <!--begin: plugin-->
       <!--  <script defer src="/includes/js/common.js?v=2.2.21"></script> -->
        <script defer src="/template/default/script/plugin.js?v=2.2.21"></script>
        <script defer src="/template/default/script/init.js?v=2.2.21"></script> -->
        <!--//end: plugin-->
        <!---global-->
        <script>
            function open_oauth(service){
            window.open("/login_oauth.php?service="+service+"&return_url=https://dienmayabc.com/", "Login OAuth", "width=600, height=500");
            }
        </script>
        <script>
            $(document).ready(function(){ 
            $("input.p_check").click(function(){
            if($("input.p_check").is(":checked")){
            $("#compare_area_home").fadeIn();
            }else{
            $("#compare_area_home").fadeOut();
            } 
            });
            });
        </script>
        <input type="hidden" id="product_compare_list" value="" />
        <div id="compare_area_home">
            <span>So sánh sản phẩm</span>
            <div class="compare_area">
                <a href="javascript:;" class="btn_compare bg button" onclick="compare_product('https://dienmayabc.com')" style="display:none;">So sánh</a>
            </div>
        </div>
        <!---//script homepage-->
        <script>
            $(document).ready(function(){
            $('.bxhome').bxSlider({
            auto: true,
            autoControls: false
            });
            });
        </script>  



        <script type="text/javascript">
            $(document).ready(function(){
                $(function() {
                $("#ip1").autocomplete({


                    minLength: 2,
                    
                    source: function(request, response) {
                        $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }


                        });
                        $.ajax({

                           
                            url: "{{  route('sugest-click')}}",
                            type: "POST",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                product:$('#ip1').val()
                            },
                            dataType: "json",
                            success: function (data) {

                                var items = data;

                                response(items);

                                $('#ui-id-1').html();

                                $('#ui-id-1').html(data);
                            
                            }
                        });
                    },
                    html:true,
                });
            });
            });    
        </script>
       
       
    </body>
</html>
<!-- Load time: 0.05 seconds  / 2 mb-->
<!-- Powered by HuraStore 7.4.4, Released: 12-Aug-2018 / Website: www.hurasoft.vn -->