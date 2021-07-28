<!DOCTYPE HTML><html><head><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="resources/css/w3v4.css"><link rel="shortcut icon" href="resources/images/logo_dapodik_circle.png"><style>:root{--white:#e9e9e9;--gray:#333;--blue:#0367a6;--lightblue:#008997;--button-radius:0.7rem;--max-width:900px;--max-height:450px;font-size:16px;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Open Sans","Helvetica Neue",sans-serif}body{background-color:var(--white);background:url("resources/images/backgrounds/{{bg}}");background-attachment:fixed;background-position:center;background-repeat:no-repeat;background-size:cover}a{color:#008CBA;}a:hover{color:orange}.footer{position:fixed;left:0;bottom:0;width:100%;background-color:#000;color:#FFF;text-align:center;display:block}</style> <script type="text/javascript" src="login_assets/log/js/jquery.js"></script> <script type="text/javascript">$(document).ready(function(){window.history.pushState(null,"",window.location.href);window.onpopstate=function(){window.history.pushState(null,"",window.location.href);};});</script> </head><body><div class="w3-container"><div class="w3-bar-item" style="background:#FFF; margin-top:10px;opacity: 0.8;padding:10px"><div style="float:left;background:url(resources/images/logo_dapodik.png) no-repeat;background-size:contain;height:90px;width:90px;background-position: center center; margin-top: -10px"></div><div>&nbsp;Aplikasi<b> Dapodik</b><br><font size=2px>&nbsp;Satu Data Pendidikan Indonesia</font></div> &nbsp;<span class="w3-large" style="margin-bottom: 20px">Role Pengguna</span></div><br /><ul class="w3-ul w3-card-4" style="background:#FFF;opacity: 0.8"><li class="w3-bar"> Pilih salah satu role peran dibawah ini untuk masuk ke dalam aplikasi:</li> {% for role in listRolePenggunaArr %}<li class="w3-bar"> <a href="/login?data={{ role.data }}&params={{ params }}"> <img src="resources/images/pengguna/{{ role.image }}" class="w3-bar-item w3-circle w3-hide-small" style="width:110px"><div class="w3-bar-item"> <span class="w3-large"><b>{{ role.nama_sekolah }}</b></span><br> <span>Nama: {{ role.nama }}</span> <br> <span>Peran: {{ role.peran_id_str }}</span></div> </a></li> {% endfor %}<li class="w3-bar"> <a href="/" class="link">Kembali ke halaman Login</a></li></ul></div><div class="footer"><p><a href="https://www.kemdikbud.go.id/" target="_blank">Hak Cipta Kementerian Pendidikan, Kebudayaan, Riset dan Teknologi</a>. Republik Indonesia &copy; 2021.</p></div></body>