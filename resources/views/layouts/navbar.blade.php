<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="navbar-header">
    <a class="navbar-brand" href="/"> Depo Yönetim Sistemi</a>
</div>

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only"> Depo Yönetim Sistemi</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>

<ul class="nav navbar-nav navbar-left navbar-top-links">
    <li><a href="#"><i class="fa fa-home fa-fw"></i> Ana Sayfa</a></li>
</ul>

<ul class="nav navbar-right navbar-top-links">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <b class="caret"></b>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li class="divider"></li>
            <li>

            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Çıkış') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>
        </ul>
    </li>
</ul>
<!-- /.navbar-top-links -->


<div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
<!--                             <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                            </li>
 -->

                            <li>
                                <a href="/"><i class="fa fa-dashboard fa-fw"></i> Ana Sayfa</a>
                            </li>
                            
                            <li>
                                <a href="#"><i class="fa fas fa-cart-plus fa-fw"></i> Stok Girişler<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('yeni_stok_giris') }}">Yeni Stok Giriş Oluştur</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('girilen_stoklar_list') }}">Girilen Stoklar</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#"><i class="fa fas fa-cart-arrow-down fa-fw"></i> Stok Çıkışlar<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('yeni_stok_cikis') }}">Yeni Stok Çıkış</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('cikilan_stoklar_list') }}">Çıklan Stoklar</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-file fa-fw"></i> Ürünler<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('yeni_urun') }}">Ürün Ekle</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('urunler_list') }}">Ürünleri Yönet</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-align-justify fa-fw"></i> Raporlar<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <!--
                                    <li>
                                        <a href="{{ route('rapor_urun_takip') }}">Urun Takip</a>
                                    </li>
                                -->
                                    <li>
                                        <a href="{{ route('rapor_urun_stok_durum') }}">Urun Stok Durum</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-archive fa-fw"></i> Depolar<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('yeni_depo') }}">Yeni Depo Oluştur</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('depolar_list') }}">Depoları Yönet</a>
                                    </li>
                                </ul>
                            </li>




                            <li>
                                <a href="#"><i class="fa fa-bars fa-fw"></i> Birim Türleri<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('yeni_birim') }}">Birim Ekle</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('birimler_list') }}">Birimleri Yönet</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-angle-double-right fa-fw"></i> Kategoriler<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('yeni_kategori') }}">Yeni Kategori Oluştur</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('kategoriler_list') }}">Kategorileri Yönet</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <!--
                            <li>
                                <a href="#"><i class="fa fa-wrench fa-fw"></i> Yönetim<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="panels-wells.html">Birim Ekle</a>
                                    </li>
                                    <li>
                                        <a href="buttons.html">Personel Ekle</a>
                                    </li>
                                    <li>
                                        <a href="notifications.html">Eğitim Ekle</a>
                                    </li>

                                </ul>

                            </li>

                            <li>
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> Yazılım Hakkında<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="blank.html">Yardım Talep Et</a>
                                    </li>
                                    <li>
                                        <a href="login.html">Güncelleme Talep Et</a>
                                    </li>
                                </ul>
                                
                            </li>-->
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>