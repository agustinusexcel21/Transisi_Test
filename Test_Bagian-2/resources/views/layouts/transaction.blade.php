<!DOCTYPE html>
<!--[if IE 9]> <html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atma-Auto @yield("title")</title>
    <link rel="icon" href="{{ asset('image/logo.png') }}"/>
    <link rel="stylesheet" href="{{asset('polished/polished.min.css')}}">
    <link rel="stylesheet" href="{{asset('polished/iconic/css/open-iconicbootstrap.min.css')}}">

    <style>
        .grid-highlight {
            padding-top: 1rem;
            padding-bottom: 1rem;
            background-color: #5c6ac4;
            border: 1px solid #202e78;
            color: #fff;
        }

        hr {
            margin: 6rem 0;
        }

        hr+.display-3,hr+.display-2+.display-3 {
            margin-bottom: 2rem;
        }
    </style>

    <script type="text/javascript">
        document.documentElement.className =
        document.documentElement.className.replace('no-js', 'js') +
        (document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1") ? ' svg' : ' no-svg');
    </script>
</head>

<body>
    <nav class="navbar navbar-expand p-0">

    <a class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0" href="{{route('home.index')}}"> SIATO </a>

    <button class="btn btn-link d-block d-md-none" data-toggle="collapse" data-target="#sidebar-nav" role="button" >
        <span class="oi oi-menu"></span>
    </button>

    <input class="border-dark bg-primary-darkest form-control d-none dmd-block w-50 ml-3 mr-2" type="text" placeholder="Search" arialabel="Search">
    
    <div class="dropdown d-none d-md-block">
        @if(\Auth::user())
        <button class="btn btn-link btn-link-primary dropdown-toggle" id="navbar-dropdown" data-toggle="dropdown">
            {{Auth::user()->name}}
        </button>
        @endif
        <div class="dropdown-menu dropdown-menu-right" id="navbardropdown">
            <!-- <a href="#" class="dropdown-item">Profile</a> -->
            <a href="{{ route('changePassword') }}" class="dropdown-item">Ganti Password</a>
            <div class="dropdown-divider"></div>
            <li>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="dropdown-item" style="cursor:pointer">SignOut</button>
                </form>
            </li>
        </div>
    </div>
    </nav>

    <div class="container-fluid h-100 p-0">
        <div style="min-height: 100%" class="flex-row d-flex align-itemsstretch m-0">
            <div class="polished-sidebar bg-light col-12 col-md-3 col-lg-2 p-0collapse d-md-inline" id="sidebar-nav">
                <ul class="polished-sidebar-menu ml-0 pt-4 p-0 d-md-block">
                    <input class="border-dark form-control d-block d-md-none mb4" type="text" placeholder="Search" aria-label="Search" />
                    <li><a href="{{route('home.index')}}"><span class="oi oi-home"></span> Home</a></li>
                    <li><a href="{{route('users.index')}}"><span class="oi oi-book"></span>Kelola Pegawai</a></li>
                    <li><a href="{{route('customers.index')}}"><span class="oi oi-book"></span>Kelola Customer</a></li>
                    <li><a href="{{route('spareparts.index')}}"><span class="oi oi-book"></span>Kelola Sparepart</a></li>
                    <li><a href="{{route('suppliers.index')}}"><span class="oi oi-book"></span>Kelola Supplier - Sales</a></li>
                    <li><a href="{{route('services.index')}}"><span class="oi oi-book"></span>Kelola Service</a></li>
                    <li><a href="{{route('penjualan_transactions.index')}}"><span class="oi oi-book"></span>Transaksi</a></li>
                    <div class="d-block d-md-none">
                        <div class="dropdown-divider"></div>
                            <!-- <li><a href="#"> Profile</a></li> -->
                            <li>
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button class="dropdown-item"style="cursor:pointer">Sign Out</button>
                                </form>
                            </li>
                    </div>
                </ul>
                <div class="pl-3 d-none d-md-block position-fixed" style="bottom: 0px">
                    <!-- <span class="oi oi-cog"></span> Setting -->
                </div>
            </div>
            <div class="col-lg-10 col-md-9 p-4">
                <div class="row ">
                    <div class="col-md-12 pl-3 pt-2">
                        <div class="pl-3">
                            <h3>@yield("pageTitle")</h3>
                            <br>
                        </div>
                    </div>
                </div>
                    @yield("content")
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"crossorigin="anonymous"></script>

<script type="text/javascript" src="jquery-latest.js"></script>

<script type="text/javascript">

jQuery(document).ready(function($){

    $('.my-form .add-box').click(function(){
        var n = $('.text-box').length;
        if( 9 < n ) {
            alert('Stop it!');
            return false;
        }

        var box_html = $('<p class="text-box"><label for="box' + n + '"><span class="box-number">' + n + '</span></label><select type="text" name="id_sparepart[]" required="required" placeholder="Masukkan Kode Sparepart" value="" id="box1" class="form-control"><option value="">Pilih Sparepart</option>@foreach($spareparts as $spareparts)<option value="{{$spareparts->id}}">{{$spareparts->nama_sparepart}}</option>@endforeach</select><input type="number" required="required" name="satuan[]" placeholder="Jumlah Sparepart" value="" id="box' + n + '" class="form-control"/><br><a href="#" class="remove-box"><img src="{{ asset('image/negative.png') }}" style="height:30px; width:28px;"></a></p>');
        box_html.hide();
        $('.my-form p.text-box:last').after(box_html);
        box_html.fadeIn('slow');
        return false;
});

$('.my-form').on('click', '.remove-box', function(){
    // $(this).parent().css( 'background-color', '#FFFFFF' );
    $(this).parent().fadeOut("slow", function() {
        $(this).remove();
        $('.box-number').each(function(index){
            $(this).text( index + 1 );
        });
    });
    return false;
});
});
</script>

</body>
</html>