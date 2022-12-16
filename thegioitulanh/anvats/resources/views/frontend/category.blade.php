@extends('frontend.layouts.apps')
@section('content')


<div class="container wrap">
    <!--default-->
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
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="/tu-lanh.html">
                <span itemprop="name">Tủ lạnh</span>
                </a> <span class="bre-chia"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                <meta itemprop="position" content="2">
            </li>
        </ol>
    </div>
    <!--breadcrumb-->
    <div class="clear"></div>
    <div class="bn-list" style="display:flex; justify-content: center;">
        <div class="itm fl"><a href="/ad.php?id=139" target="_blank" rel="nofollow"><img border="0" src="/media/banner/26_Nov5799aacfe6adde232a8433c44e9a6279.jpg" width="595" height="215" alt=""></a></div>
        <div class="itm fl"><a href="/ad.php?id=136" target="_blank" rel="nofollow"><img border="0" src="https://dienmayabc.com/media/lib/may-giatcopy.jpg" width="595" height="215" alt="1 doi 1 30 ngay"></a></div>
    </div>
    <div class="clear space5px"></div>
    <div class="pd-left">
        <h1 class="format txt_14">Tủ lạnh</h1>
        <div class="product-list">
            @if(isset($data))
            @foreach($data as $value)

            <?php
                if($value->Quantily==0){
                    $status ='Tạm hết hàng';
                
                }
                elseif($value->Quantily<=-1){
                    $status ='Ngừng kinh doanh';
                }
                else{
                    $status = 'Còn hàng';
                }

            ?>
            <div class="product">
                <div class="img">
                    <a href="{{ route('details', $value->Link ) }}" title="{{ $value->Name }}"><img alt="{{ $value->Name }}" src="{{ asset($value->Image) }}"></a>
                </div>
                <h3>
                    <p class="name"><a href="{{ route('details', $value->Link ) }}">{{ $value->Name }}</a></p>
                </h3>
                <p class="price">{{ str_replace(',' ,'.', number_format($value->Price)) }}<u>đ</u> 
                    <span class="percent">-29%</span>
                </p>
                
                <p class="star"><i class="vstar"><i class="star-0"></i></i> (0 nhận xét)</p>
                <p class="stock"><i class="fa fa-shopping-cart"></i> {{ $status }}
                    <i class="check"><input type="checkbox" name="/media/product/75_1430_tu_lanh_samsung_rt19m300bgs_sv_1_300x300.png" class="p_check" id="compare_box_1430" onclick="add_compare_product(1430);"></i>
               
                </p>
            </div>
            @endforeach
            @endif
            
            <div class="clear"></div>
        </div>
        <div class="top_area_list_page">
            <div class="paging">
                <a href="/tu-lanh.html?page=1">1</a>
                <a href="/tu-lanh.html?page=2">2</a>
                <a href="/tu-lanh.html?page=3">3</a>
                <a href="/tu-lanh.html?page=4">4</a>
                <a href="/tu-lanh.html?page=5">5</a>
                <a href="/tu-lanh.html?page=6">6</a>
                <a href="/tu-lanh.html?page=7">7</a>
            </div>
            <!--paging-->
            <div class="clear"></div>
        </div>
        <div class="clear space10px"></div>
        <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop" data-width="970" data-href="https://dienmayabc.com/tu-lanh.html" data-numposts="10" data-colorscheme="light" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;color_scheme=light&amp;container_width=970&amp;height=100&amp;href=https%3A%2F%2Fdienmayabc.com%2Ftu-lanh.html&amp;locale=vi_VN&amp;numposts=10&amp;sdk=joey&amp;version=v4.0&amp;width=970"><span style="vertical-align: bottom; width: 970px; height: 212px;"><iframe name="f4c8493068014" width="970px" height="100px" data-testid="fb:comments Facebook Social Plugin" title="fb:comments Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v4.0/plugins/comments.php?app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df150747ecfafea%26domain%3Ddienmayabc.com%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fdienmayabc.com%252Ff25bad8e84fdcfc%26relation%3Dparent.parent&amp;color_scheme=light&amp;container_width=970&amp;height=100&amp;href=https%3A%2F%2Fdienmayabc.com%2Ftu-lanh.html&amp;locale=vi_VN&amp;numposts=10&amp;sdk=joey&amp;version=v4.0&amp;width=970" style="border: none; visibility: visible; width: 970px; height: 212px;" class=""></iframe></span></div>
        <div class="clear"></div>
    </div>
    <!--//pd-left-->
    <div class="pd-right att-list">
        <div class="att-title">Tủ lạnh</div>
        <ul class="ul">
            <li>
                <input onclick="location.href='/tu-lanh-hitachi.html'" type="checkbox"> 
                <h2 class="format txt_13 txt_n"><a href="/tu-lanh-hitachi.html">Tủ lạnh Hitachi</a></h2>
            </li>
            <li>
                <input onclick="location.href='/tu-lanh-lg.html'" type="checkbox"> 
                <h2 class="format txt_13 txt_n"><a href="/tu-lanh-lg.html">Tủ lạnh LG</a></h2>
            </li>
            <li>
                <input onclick="location.href='/tu-lanh-panasonic.html'" type="checkbox"> 
                <h2 class="format txt_13 txt_n"><a href="/tu-lanh-panasonic.html">Tủ lạnh Panasonic</a></h2>
            </li>
            <li>
                <input onclick="location.href='/tu-lanh-mitsubishi.html'" type="checkbox"> 
                <h2 class="format txt_13 txt_n"><a href="/tu-lanh-mitsubishi.html">Tủ lạnh Mitsubishi</a></h2>
            </li>
            <li>
                <input onclick="location.href='/tu-lanh-samsung.html'" type="checkbox"> 
                <h2 class="format txt_13 txt_n"><a href="/tu-lanh-samsung.html">Tủ lạnh Samsung</a></h2>
            </li>
            <li>
                <input onclick="location.href='/tu-lanh-sharp.html'" type="checkbox"> 
                <h2 class="format txt_13 txt_n"><a href="/tu-lanh-sharp.html">Tủ lạnh Sharp</a></h2>
            </li>
            <li>
                <input onclick="location.href='/tu-lanh-electrolux.html'" type="checkbox"> 
                <h2 class="format txt_13 txt_n"><a href="/tu-lanh-electrolux.html">Tủ lạnh Electrolux</a></h2>
            </li>
            <li>
                <input onclick="location.href='/tu-lanh-funiki.html'" type="checkbox"> 
                <h2 class="format txt_13 txt_n"><a href="/tu-lanh-funiki.html">Tủ lạnh Funiki</a></h2>
            </li>
        </ul>
        <div class="att-title">Thương hiệu</div>
        <ul class="ul">
            <li>
                <a href="https://dienmayabc.com/tu-lanh.html?brand=2"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?brand=2'" type="checkbox"> Electrolux</a>
            </li>
            <li>
                <a href="https://dienmayabc.com/tu-lanh.html?brand=15"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?brand=15'" type="checkbox"> Funiki</a>
            </li>
            <li>
                <a href="https://dienmayabc.com/tu-lanh.html?brand=9"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?brand=9'" type="checkbox"> Hitachi</a>
            </li>
            <li>
                <a href="https://dienmayabc.com/tu-lanh.html?brand=4"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?brand=4'" type="checkbox"> LG</a>
            </li>
            <li>
                <a href="https://dienmayabc.com/tu-lanh.html?brand=6"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?brand=6'" type="checkbox"> Mitsubishi</a>
            </li>
            <li>
                <a href="https://dienmayabc.com/tu-lanh.html?brand=8"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?brand=8'" type="checkbox"> Panasonic</a>
            </li>
            <li>
                <a href="https://dienmayabc.com/tu-lanh.html?brand=5"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?brand=5'" type="checkbox"> Samsung</a>
            </li>
            <li>
                <a href="https://dienmayabc.com/tu-lanh.html?brand=13"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?brand=13'" type="checkbox"> Sharp</a>
            </li>
        </ul>
        <div class="att-title">
            <h4 class="format txt_13">Xuất xứ</h4>
        </div>
        <ul class="ul">
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Cthai-lan%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Cthai-lan%2C'" type="checkbox"> Thái Lan</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Cviet-nam%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Cviet-nam%2C'" type="checkbox"> Việt Nam</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Ctrung-quoc%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Ctrung-quoc%2C'" type="checkbox"> Trung Quốc</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Cindonesia%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Cindonesia%2C'" type="checkbox"> Indonesia</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Cnhat-ban%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Cnhat-ban%2C'" type="checkbox"> Nhật Bản</a>
                </h5>
            </li>
        </ul>
        <div class="att-title">
            <h4 class="format txt_13">Giá bán</h4>
        </div>
        <ul class="ul">
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Cduoi-5-trieu%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Cduoi-5-trieu%2C'" type="checkbox"> Dưới 5 triệu</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Ctu-5-7-trieu%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Ctu-5-7-trieu%2C'" type="checkbox"> Từ 5 - 7 triệu</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Ctu-7-10-trieu-1%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Ctu-7-10-trieu-1%2C'" type="checkbox"> Từ 7 - 10 triệu</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Ctren-10-trieu-1%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Ctren-10-trieu-1%2C'" type="checkbox"> Trên 10 triệu</a>
                </h5>
            </li>
        </ul>
        <div class="att-title">
            <h4 class="format txt_13">Kiểu tủ</h4>
        </div>
        <ul class="ul">
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Ctu-lon-side-by-side%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Ctu-lon-side-by-side%2C'" type="checkbox"> Tủ lớn - Side by side</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Cngan-da-tren%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Cngan-da-tren%2C'" type="checkbox"> Ngăn đá trên</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Cngan-da-duoi%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Cngan-da-duoi%2C'" type="checkbox"> Ngăn đá dưới</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Cmini%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Cmini%2C'" type="checkbox"> Mini</a>
                </h5>
            </li>
        </ul>
        <div class="att-title">
            <h4 class="format txt_13">Số cửa</h4>
        </div>
        <ul class="ul">
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2C1-cua%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2C1-cua%2C'" type="checkbox"> 1 cửa</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2C2-cua%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2C2-cua%2C'" type="checkbox"> 2 cửa</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2C3-cua%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2C3-cua%2C'" type="checkbox"> 3 cửa</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2C4-cua%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2C4-cua%2C'" type="checkbox"> 4 cửa</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2C6-cua%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2C6-cua%2C'" type="checkbox"> 6 cửa</a>
                </h5>
            </li>
        </ul>
        <div class="att-title">
            <h4 class="format txt_13">Tính năng</h4>
        </div>
        <ul class="ul">
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Cngan-dong-mem%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Cngan-dong-mem%2C'" type="checkbox"> Ngăn đông mềm</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Clay-nuoc-ngoai%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Clay-nuoc-ngoai%2C'" type="checkbox"> Lấy nước ngoài</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Clay-da-ngoai%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Clay-da-ngoai%2C'" type="checkbox"> Lấy đá ngoài</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Clam-da-tu-dong%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Clam-da-tu-dong%2C'" type="checkbox"> Làm đá tự động</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Ccong-nghe-inverter%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Ccong-nghe-inverter%2C'" type="checkbox"> Công nghệ Inverter</a>
                </h5>
            </li>
            <li>
                <h5 class="format txt_13 txt_n">
                    <a href="https://dienmayabc.com/tu-lanh.html?filter=%2Ckhang-khuan-khu-mui%2C"><input onclick="location.href='https://dienmayabc.com/tu-lanh.html?filter=%2Ckhang-khuan-khu-mui%2C'" type="checkbox"> Kháng khuẩn, khử mùi</a>
                </h5>
            </li>
        </ul>
    </div>
    <!--//pd-right-->
    <div class="clear"></div>
    <div class="clear"></div>
</div>
@endsection