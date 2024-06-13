<div class="header">
    <div class="left-side">
        <a href="/">
            <h5>
                OYUNLARIM.COM
            </h5>
        </a>
    </div>
    @if(\Illuminate\Support\Facades\Auth::check() != true)
        <a href="/register">
            <div class="register btn btn-sm"><h3>Register</h3></div>
        </a>
        <a href="{{route('login')}}">
            <div class="login btn btn-sm"><h3>Login</h3></div>
        </a>
    @else
        <div class="user-pp">
            <img src="/storage/{{\Illuminate\Support\Facades\Auth::user()->profile_photo_path}}" id="openImage" onclick="toggleNav()" alt="Açılır Pencereyi Aç">
        </div>
    @endif
</div>
@if(\Illuminate\Support\Facades\Auth::check())
    <div id="mySidebar" class="sidebar" style="flex-direction: column">
        <div style="display: flex;height: 100px">
            <div class="user-pp-side">
                <img src="/storage/{{\Illuminate\Support\Facades\Auth::user()->profile_photo_path}}">
            </div>
        </div>
        <div class="inside">
            <a href="javascript:void(0)" class="closebtn" onclick="toggleNav()">&times;</a>
            <h5>{{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
            <h6>{{\Illuminate\Support\Facades\Auth::user()->email}}</h6>
            <h4><i class="fa-solid fa-gem" style="margin-right: 15px;margin-top: 4px;color: darkblue"></i>{{\Illuminate\Support\Facades\Auth::user()->diamond}}
                <a href="">
                    <button class="btn btn-sm btn-secondary">
                        Cashout
                    </button>
                </a>
            </h4>
            <a href="{{route('profile')}}"><i class="fa-solid fa-user" style="margin-right: 10px"></i>Profile</a>
            <a href="{{route('game_upload')}}"><i class="fa-solid fa-upload" style="margin-right: 10px"></i>Upload Game</a>
            <a href="{{route("logout")}}"><i class="fa-solid fa-right-from-bracket" style="margin-right: 10px"></i>Logout</a>
        </div>
    </div>
@endif

<script>
    /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
    function toggleNav() {
        var sidebar = document.getElementById("mySidebar");
        if (sidebar.style.width === "400px") {
            sidebar.style.width = "0";
            document.getElementById("main").style.marginRight = "0";
            document.getElementById("overlay").style.display = "none"; // Overlay'i gizle

        } else {
            sidebar.style.width = "400px";
            document.getElementById("main").style.marginRight = "400px";
            document.getElementById("overlay").style.display = "block"; // Overlay'i görünür hale getir

        }
    }
</script>
<script src="https://kit.fontawesome.com/54878a8355.js" crossorigin="anonymous"></script>
