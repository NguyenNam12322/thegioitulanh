@extends('frontend.layouts.apps')

@section('content')

<?php
    if($data->Quantily==0||$data['Price']==0){
        $status ='Tạm hết hàng';
    
    }
    elseif($data->Quantily<=-1){
        $status ='Ngừng kinh doanh';
    }
    else{
        $status = 'Còn hàng';
    }

    ?>

<?php

$thuonghieu = [1 => 5, 3 => 35, 2 =>56, 4 =>76, 6=>115, 7=>129];

        $namecate = Cache::rememberForever('namecate'.$data_cate, function() use($data_cate){

            $namecate = App\Models\groupProduct::find($data_cate)??'';

            return $namecate;
        });    

        if(!empty($thuonghieu[$data_cate])){

            $thuonghieuCate = $thuonghieu[$data_cate];

            $ar_groups_info = Cache::rememberForever('ar_groups_info_'.$data->id, function() use($thuonghieuCate, $data_cate, $data){

                $namecate = Cache::get('namecate'.$data_cate);

                $dataThuonghieu = App\Models\groupProduct::where('parent_id', $thuonghieuCate)->get();

                $ar_groups_info = [];

                foreach ($dataThuonghieu as $value) {

                    if (strpos(strtolower($data->Name), strtolower(str_replace($namecate->name, '', $value->name)))>-1) {

                        array_push($ar_groups_info, ['name'=>  $value->name, 'link'=>$value->link]);
                    }
                    
                }
                return $ar_groups_info;
            });

        }
?>        
<div class="container wrap">
    <div id="breadcrumb">
        <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="/">
                <span itemprop="name">Trang chủ</span>
                </a> <span class="bre-chia"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                <meta itemprop="position" content="1">
            </li>
            <!--  -->
            <!-- 2 -->

             @if(!empty($groupLink))
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="{{ route('details', $groupLink??'') }}">
                <span itemprop="name">{{ @$groupName }}</span>
                </a> <span class="bre-chia"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                <meta itemprop="position" content="2">
            </li>

             @endif
            <!-- 3 -->
             @if(!empty($thuonghieu[$data_cate])&& !empty($ar_groups_info))
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="{{ route('details',$ar_groups_info[0]['link']) }}">
                <span itemprop="name">{{ $ar_groups_info[0]['name'] }}</span>
                </a> <span class="bre-chia"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                <meta itemprop="position" content="3">
            </li>

             @endif
            <!-- 4 -->
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="{{ route('details', $data->Detail) }}">
                <span itemprop="name">{{ $data->Name }}</span>
                </a> <span class="bre-chia"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                <meta itemprop="position" content="4">
            </li>
        </ol>
    </div>
    <!--breadcrumb-->
    <div class="clear"></div>
    <div class="product-detail">
        <div class="prod-image fl">
            <div class="small">

                <?php 

                    $images_products = Cache::remember('image_product_'.$data->id, 100, function() use ($data) {

                        $images = App\Models\image::where('product_id', $data->id)->select('image')->get()??'';

                        return $images;
                    
                    });


                ?>

                @if(isset($images_products))
                       
                @foreach( $images_products as $key => $image)
                @if($key<5)
                <a data-fancybox="gallery" href="{{ asset($image->image) }}" data-image="{{ asset($image->image) }}" class="" title="{{ $data->Name }}" rel="zoom-id:Zoomer;" rev="{{ asset($image->image) }}">
                    <span><img src="{{ asset($image->image) }}" alt="{{ $data->Name }}?{{ $key }}"></span>
                </a>
                @endif
                
                @endforeach
                @endif
               
            </div>
            <div class="big">
                <a data-fancybox="gallery" title="{{ $data->Name }}" href="{{ route('details', $data->Link) }}" class="MagicZoom" id="Zoomer" data-fancybox-group="button" rel="selectors-effect-speed: 600;">
                    <img src="{{ asset($data->Image) }}" alt="{{ $data->Name }}"><span class="tip ico"></span>
                </a>
                <div class="option" id="mini-deal-price">
                    <i class="off">-33%</i>
                </div>
                <div class="clear"></div>
                <!-- <div class="network">
                    <div class="p_share">
                        <div class="fb-share-button fb_iframe_widget" style="float:left;padding-right:10px;" data-href="" data-layout="button_count" font="arial" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;container_width=10&amp;font=arial&amp;href=https%3A%2F%2Fdienmayabc.com%2Ftivi-sony-xr-65x90k.html&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey"><span style="vertical-align: bottom; width: 86px; height: 20px;"><iframe name="f3d87acfcce5d54" width="1000px" height="1000px" data-testid="fb:share_button Facebook Social Plugin" title="fb:share_button Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v4.0/plugins/share_button.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df19704e172d80d4%26domain%3Ddienmayabc.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fdienmayabc.com%252Ff8764abe6d48e%26relation%3Dparent.parent&amp;container_width=10&amp;font=arial&amp;href=https%3A%2F%2Fdienmayabc.com%2Ftivi-sony-xr-65x90k.html&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey" style="border: none; visibility: visible; width: 86px; height: 20px;" class=""></iframe></span></div>
                        <div class="facebook-like" style="float:left;padding-right:10px;">
                            <fb:like send="false" layout="button_count" width="80" show_faces="true" font="arial" class=" fb_iframe_widget" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;font=arial&amp;href=https%3A%2F%2Fdienmayabc.com%2Ftivi-sony-xr-65x90k.html&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;send=false&amp;show_faces=true&amp;width=80"><span style="vertical-align: bottom; width: 90px; height: 28px;"><iframe name="f2b9c4c7af8efc4" width="80px" height="1000px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v4.0/plugins/like.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df2b679c1f20d9%26domain%3Ddienmayabc.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fdienmayabc.com%252Ff8764abe6d48e%26relation%3Dparent.parent&amp;container_width=0&amp;font=arial&amp;href=https%3A%2F%2Fdienmayabc.com%2Ftivi-sony-xr-65x90k.html&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;send=false&amp;show_faces=true&amp;width=80" style="border: none; visibility: visible; width: 90px; height: 28px;" class=""></iframe></span></fb:like>
                        </div>
                        <div class="google_btnlike" style="float:left; margin-right: -30px;">
                            <div id="___plusone_0" style="position: absolute; width: 450px; left: -10000px;"><iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position:absolute;top:-10000px;width:450px;margin:0px;border-style:none" tabindex="0" vspace="0" width="100%" id="I0_1671091536853" name="I0_1671091536853" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;width=80&amp;origin=https%3A%2F%2Fdienmayabc.com&amp;url=https%3A%2F%2Fdienmayabc.com%2Ftivi-sony-xr-65x90k.html&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fabc-static%2F_%2Fjs%2Fk%3Dgapi.lb.vi.9dHu6cY24zM.O%2Fd%3D1%2Frs%3DAHpOoo-4uY-g_fx7vBG82xSTh2RyDMqbog%2Fm%3D__features__#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1671091536853&amp;_gfid=I0_1671091536853&amp;parent=https%3A%2F%2Fdienmayabc.com&amp;pfname=&amp;rpctoken=21412272" data-gapiattached="true"></iframe></div>
                            <div class="g-plusone" data-size="medium" data-width="80" data-gapiscan="true" data-onload="true" data-gapistub="true"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div> -->
            </div>
        </div>
        <!--end-->
        <div class="prod-info txt_555">
            <h1>{{ $data->Name }}</h1>
            <div class="vote" id="vote_avg">
                <div class="fl" style="padding:0 5px 0 0;">
                    Model: <span class="value txt_blue">{{ @$data->ProductSku }}</span> | 
                    Tình trạng: <span class="value txt_blue">{{ $status }}</span> | 
                </div>
                <a id="btn-vote" class="txt_555 fl" href="javascript:;" onclick="go_comm()"> Đánh giá: </a>
                <div class=" totalRate " id="js-total-rating" style="    display: inline-block;"><i class="icons icon-star star" nan'=""><span></span></i></div>
                (<span class="reviewCount">0</span>)
            </div>
            <script src="/template/default/script/jquery.rating.js"></script>
            <div class="prod-info-left fl">
                @if($data->manuPrice>0)
                <div class="space3px txt_555">Giá thị trường: <span class="txt_d">{{ str_replace(',' ,'.', number_format($data->manuPrice)) }}đ</span></div>
                @endif
                <div class="price">Giá: 
                    <span class="robot txt_green txt_b txt_20">{{ str_replace(',' ,'.', number_format($data->Price)) }} ₫</span>
                     @if($data->manuPrice>0)

                    Tiết kiệm: <span class="txt_000 txt_b">{{ (int)$data->Price - (int)$data->manuPrice  }} ₫ </span>
                    @endif
                </div>
                <div class="clear space3px"></div>
                <div class="clear space10px"></div>

                @if(!empty($data->promotion))
                <div class="promo line_h19">
                    <div class="txt_b">Khuyến mại</div>
                    {!! @$data->promotion !!}
                </div>
                @endif
                <div class="buy-group">
                    <div class="clear">Số lượng:</div>
                    <div class="clear space10px in">
                        <input type="number" id="s_quantity" value="1">
                        <a class="btn-buy txt_center cor5px" onclick="addToCart({{ $data->id }})" href="javascript:;">
                        <i class="fa fa-shopping-cart"></i> <span class="txt_15">Thêm Vào Giỏ Hàng</span>
                        </a>
                    </div>
                    Gọi đặt mua:  <span class="txt_b txt_red"><a href="tel:0967025111">0967 025 111</a></span> (7:30-22:00)<br>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span class="txt_b txt_red"> <a href="tel:02438615111">02438 615 111</a></span> (7:30-17:30)
                </div>
                <div class="clear"></div>
            </div>
            <!--//prod-info-left -->
            <div class="prod-info-right fr">
                <h4 class="format txt_13">
                    <p class="format txt_b">Cam kết đặc biệt:</p>
                </h4>
                <h5 class="format txt_13 txt_n">
                    <p><i class="fa fa-check"></i> Hàng chính hãng, mới 100%.</p>
                </h5>
                <h5 class="format txt_13 txt_n">
                    <p><i class="fa fa-check"></i> Đền gấp 10 lần nếu không phải hàng chính hãng.</p>
                </h5>
                <h5 class="format txt_13 txt_n">
                    <p><i class="fa fa-check"></i> Giao hàng miễn phí 20km tại Hà Nội</p>
                </h5>
                <h5 class="format txt_13 txt_n">
                    <p><i class="fa fa-check"></i> Bảo hành chính hãng</p>
                </h5>
               
                <div class="clear"></div>
            </div>
            <!--right-->
            <div class="clear"></div>
        </div>
        <!--end-->
        <div class="clear space10px"></div>
        <div class="col-left">
            <div class="tab_d">
                <h2 class="format txt_20 txt_n">Thông số kỹ thuật</h2>
                <div class="clear"></div>
            </div>
            {!!  $data->Specifications  !!} 


            <div class="tab_d">
                <h2 class="format txt_20 txt_n">Mô tả sản phẩm</h2>
                <div class="clear"></div>
            </div>
            <div id="tab1" class="tab_content line_h19">

                <?php
                    $details = $data->Detail;
                ?>

                {!! html_entity_decode($details) !!}
                
                <div class="clear"></div>
            </div>

            <div id="comments" class="tab_content">
                <div class="clear product_review">
                    <div class="clear a_content">
                        <div class="comment-box-title bold space10px txt_b txt_13">Chia sẻ nhận xét của bạn về Google Tivi Sony 4K 65 inch XR-65X90K Mới 2022</div>
                        <form class="form-post" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="user_post[item_type]" value="product">
                            <input type="hidden" name="user_post[item_id]" value="3740">
                            <input type="hidden" name="user_post[item_title]" value="Google Tivi Sony 4K 65 inch XR-65X90K Mới 2022">
                            <input type="hidden" name="user_post[rate]" value="0">
                            <input type="hidden" name="user_post[title]" value="Google Tivi Sony 4K 65 inch XR-65X90K Mới 2022">
                            <input type="hidden" name="user_post[user_email]" value="">
                            <input type="hidden" name="user_post[user_name]" value="">
                            <input type="hidden" name="user_post[user_avatar]" value="0">
                            <!--<h3>Gửi ý kiến đánh giá sản phẩm</h3>-->
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <div style="float:left;padding:2px 10px 0 0;">Đánh giá: </div>
                                            <div class="review-right" style="display: block; margin-bottom: 5px;height: 14px;">
                                                <span class="star-rating-control">
                                                    <div class="rating-cancel"><a title="Cancel Rating"></a></div>
                                                    <div role="text" aria-label="Worst" class="star-rating rater-0 star star-rating-applied star-rating-live star-rating-on"><a title="Worst">1</a></div>
                                                    <div role="text" aria-label="Bad" class="star-rating rater-0 star star-rating-applied star-rating-live star-rating-on"><a title="Bad">2</a></div>
                                                    <div role="text" aria-label="OK" class="star-rating rater-0 star star-rating-applied star-rating-live star-rating-on"><a title="OK">3</a></div>
                                                    <div role="text" aria-label="Good" class="star-rating rater-0 star star-rating-applied star-rating-live star-rating-on"><a title="Good">4</a></div>
                                                    <div role="text" aria-label="Best" class="star-rating rater-0 star star-rating-applied star-rating-live star-rating-on"><a title="Best">5</a></div>
                                                </span>
                                                <input class="star star-rating-applied" type="radio" name="user_post[rate]" value="1" title="Worst" style="display: none;">
                                                <input class="star star-rating-applied" type="radio" name="user_post[rate]" value="2" title="Bad" style="display: none;">
                                                <input class="star star-rating-applied" type="radio" name="user_post[rate]" value="3" title="OK" style="display: none;">
                                                <input class="star star-rating-applied" type="radio" name="user_post[rate]" value="4" title="Good" style="display: none;">
                                                <input class="star star-rating-applied" type="radio" name="user_post[rate]" value="5" title="Best" checked="" style="display: none;">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><textarea id="content0" style="border-color: #ccc;width: 99%;" placeholder="Nhập nội dung*" name="user_post[content]" rows="3"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <input type="text" id="name0" name="user_post[user_name]" value="" placeholder="Họ tên*" style="padding:3px;width:48%;">
                                            <input type="text" id="email0" name="user_post[user_email]" value="" placeholder="Email" class="fr" style="padding:3px;width:48%;position:relative;right:2px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><input type="hidden" name="product_review_subject" size="36"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="approved" value="0">
                            <input type="button" value="Gửi bình luận" onclick="postComment('0','')">
                            <!--Bạn cần <a class="txt_b" href="/dang-nhap?return_url=https://dienmayabc.com/tivi-sony-xr-65x90k.html">đăng nhập</a> để bình luận về sản phẩm này.-->                            
                        </form>
                        <div class="space10px"></div>
                        <div id="comment-list"></div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop" data-width="770" data-href="https://dienmayabc.com/tivi-sony-xr-65x90k.html" data-numposts="5" data-colorscheme="light" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;color_scheme=light&amp;container_width=770&amp;height=100&amp;href=https%3A%2F%2Fdienmayabc.com%2Ftivi-sony-xr-65x90k.html&amp;locale=vi_VN&amp;numposts=5&amp;sdk=joey&amp;version=v4.0&amp;width=770"><span style="vertical-align: bottom; width: 770px; height: 212px;"><iframe name="f23be465a785644" width="770px" height="100px" data-testid="fb:comments Facebook Social Plugin" title="fb:comments Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v4.0/plugins/comments.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df251e264bcbecb%26domain%3Ddienmayabc.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fdienmayabc.com%252Ff8764abe6d48e%26relation%3Dparent.parent&amp;color_scheme=light&amp;container_width=770&amp;height=100&amp;href=https%3A%2F%2Fdienmayabc.com%2Ftivi-sony-xr-65x90k.html&amp;locale=vi_VN&amp;numposts=5&amp;sdk=joey&amp;version=v4.0&amp;width=770" style="border: none; visibility: visible; width: 770px; height: 212px;" class=""></iframe></span></div>
                <div class="clear"></div>
            </div>
            <div class="viewportChecker space5px"></div>
        </div>
        <!--end-->
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div class="footer">
        <div class="wrap">
            <div class="infor">
                <p class="name txt_b">Mua Hàng Trực Tuyến </p>
                <div class="img">
                    <img src="/media/lib/789_favicon.png" alt="" width="80">
                </div>
                <div class="cont txt_555 line_h22">
                     chúng tôi tích lũy kinh nghiệm hơn 20 năm, ấp ủ mong muốn mang những sản phẩm điện máy có chất lượng tốt, thân thiện với môi trường, thân thiện với cuộc sống của người dân Việt.
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
                        <script src="https://apis.google.com/js/platform.js" gapi_processed="true"></script>
                        <div>
                            <a href="https://www.facebook.com/dienmayabc.vn/"><img src="/template/default/images/icfb.png"></a>
                        </div>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="space10px"></div>
            <div class="space5px"></div>
            <div class="txt_center line_h22">
                <p class="format txt_green txt_b">Công ty Cổ Phần Thương Mại Điện Tử An Phú</p>
                <p class="format">Kho Đóng Tàu, Số 35 Ngõ 683 Nguyễn Khoái, P. Thanh Trì, Q. Hoàng Mai, Hà Nội</p>
                <p class="format">Mã số doanh nghiệp: 0107833607</p>
                <p class="format">Nơi cấp Giấy chứng nhận đăng ký doanh nghiệp: Sở Kế hoạch và Đầu tư – Thành phố Hà Nội</p>
                <p><a href="http://online.gov.vn/CustomWebsiteDisplay.aspx?DocId=33624"><img src="/template/default/images/a3.jpg" alt=""></a></p>
            </div>
            <div class="space10px"></div>
            <div class="ft-tag wrap line_h19">
                <b>Tìm kiếm nhiều:</b> <a href="https://dienmayabc.com/">muahangtaikho</a>, <a href="https://dienmayabc.com/tivi-lg.html?filter=%2C55-inch%2C">tivi LG 55 inch</a>, <a href="https://dienmayabc.com/tivi-samsung.html?filter=%2C55-inch%2C">tivi Samsung 55 inch</a>, <a href="https://dienmayabc.com/tivi-sony.html?filter=%2C55-inch%2C">tivi Sony 55 inch</a>, <a href="https://dienmayabc.com/tivi-sony.html?filter=%2C65-inch%2C">tivi Sony 65 inch</a>, <a href="https://dienmayabc.com/tivi-samsung.html?filter=%2C65-inch%2C">tivi Samsung 65 inch</a>
            </div>
            <div class="clear"></div>
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
    <a href="javascript:void(0)" onclick="addToShoppingCart('pro','3740',document.getElementById('s_quantity').value,'23490000');" class="icon-order transition"><img src="/template/default/images/icon_dat-hang-ngay_pc.png?v=1.1.1" style="max-width:122px;" alt=""></a>
    <a href="tel:0967025111" class="icon-call transition"><img src="/template/default/images/icon_goi-ngay_pc.png?v=1.1.1" style="max-width:122px;" alt=""></a>  
</div>

<script type="text/javascript">
    function addToCart(id) {
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            type: 'POST',
            url: "{{ route('cart') }}",
            data: {
                product_id: id,
                gift_check:''
                   
            },
            beforeSend: function() {
               
                $('.loader').show();

            },
            success: function(result){
    
                window.location.href = "{{ route('cart-tgtl')  }}";
            }
        });
        
    }

</script>
@endsection