<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIMKADA</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            height:100vh;
            background-image:url('/images/Kantor.webp');
            background-size:cover;
            background-position:center;
            display:flex;
            justify-content:center;
            align-items:center;
            overflow:hidden;
        }

        .overlay{
            position:absolute;
            width:100%;
            height:100%;
            background:rgba(0,0,0,0.45);
        }

        .login-box{
            position:relative;
            width:380px;
            padding:40px;
            background:rgba(255,255,255,0.15);
            backdrop-filter:blur(10px);
            border-radius:20px;
            text-align:center;
            color:white;
            z-index:1;
            box-shadow:0 0 20px rgba(0,0,0,0.3);
        }

        .login-box h1{
            margin-bottom:10px;
            font-size:38px;
            letter-spacing:2px;
        }

        .login-box p{
            margin-bottom:25px;
            font-size:15px;
            line-height:22px;
        }

        .input-box{
            width:100%;
            margin-bottom:20px;
            position:relative;
        }

        .input-box input{
            width:100%;
            padding:14px;
            border:none;
            border-radius:10px;
            outline:none;
            font-size:15px;
        }

        .toggle-password{
            position:absolute;
            right:15px;
            top:50%;
            transform:translateY(-50%);
            cursor:pointer;
        }

        .toggle-password svg{
            pointer-events:none;
        }

        .btn-login{
            width:100%;
            padding:14px;
            border:none;
            border-radius:10px;
            background:#ff5e00;
            color:white;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
            font-weight:bold;
        }

        .btn-login:hover{
            background:#e65100;
        }

        .footer{
            margin-top:20px;
            font-size:12px;
            color:#f1f1f1;
        }

        .error{
            color:#ffb3b3;
            margin-bottom:15px;
            font-size:14px;
        }

    </style>

</head>
<body>

<div class="overlay"></div>

<div class="login-box">

    <h1>SIMKADA</h1>

    <p>
        Sistem Informasi Manajemen Data Perizinan <br>
        Sektor Perikanan
    </p>

    {{-- pesan error --}}
    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login.proses') }}" method="POST">

        @csrf

        <div class="input-box">
            <input type="text" name="username" id="username" placeholder="Username">
        </div>

        <div class="input-box">

            <input type="password" name="password" id="password" placeholder="Password">

            <span class="toggle-password" onclick="togglePassword()">

                <!-- Eye Open -->
                <svg id="eyeOpen" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2">
                    <path d="M1 12C4 6 20 6 23 12C20 18 4 18 1 12Z"/>
                    <circle cx="12" cy="12" r="3"/>
                </svg>

                <!-- Eye Closed -->
                <svg id="eyeClosed" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2" style="display:none;">
                    <path d="M2 12C5 16 19 16 22 12"/>
                    <line x1="4" y1="16" x2="4" y2="20"/>
                    <line x1="10" y1="18" x2="10" y2="22"/>
                    <line x1="16" y1="18" x2="16" y2="22"/>
                    <line x1="20" y1="16" x2="20" y2="20"/>
                </svg>

            </span>

        </div>

        <button type="submit" class="btn-login">
            LOGIN
        </button>

    </form>

</div>

<script>

function togglePassword(){

    var password = document.getElementById("password");
    var eyeOpen = document.getElementById("eyeOpen");
    var eyeClosed = document.getElementById("eyeClosed");

    if(password.type === "password"){
        password.type = "text";
        eyeOpen.style.display = "none";
        eyeClosed.style.display = "block";
    }else{
        password.type = "password";
        eyeOpen.style.display = "block";
        eyeClosed.style.display = "none";
    }

}

</script>

</body>
</html>