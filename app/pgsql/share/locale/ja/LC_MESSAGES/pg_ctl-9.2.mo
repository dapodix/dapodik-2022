??    ?      \  ?   ?      p  D   q  ?   ?  I   ?      @     a  &   s     ?     ?  -   ?            =   0     n     ?  ?   ?     8  a   X  K   ?       A   !  !   c  3   ?  ?   ?  H   ?  D   B  C   ?  E   ?  ?     ?   Q  >   ?  9   ?  B   
  E   M  ?   ?  0     F   I  >   ?  8   ?  I     %   R  2   x  O   ?  7   ?     3     :     C  M   U  -   ?  !   ?  >   ?  E   2  C   x  y   ?  9   6  D   p  C   ?  D   ?  >   >  A   }  ,   ?  2   ?  6     >   V  *   ?  /   ?  %   ?  1     0   H  #   y     ?  4   ?  2   ?  1   #  0   U  ,   ?  .   ?  3   ?  -     1   D  6   v  :   ?  1   ?  *     "   E  $   h  J   ?     ?     ?  3     0   ?     p     ?  !   ?  $   ?      ?  -   
  4   8  %   m  $   ?  "   ?  !   ?  F   ?  u   D   F   ?      !  7   !  )   M!  k   w!  `   ?!  %   D"  &   j"     ?"  d   ?"     ?"  &   #  0   D#  .   u#  )   ?#  )   ?#  "   ?#      $  (   <$     e$  !   ?$     ?$     ?$     ?$     ?$     ?$     %     %     -%     =%  "   U%     x%  ?  ?%  n   :'  b   ?'  d   (  1   q(     ?(  -   ?(  )   ?(  *   )  J   E)  9   ?)  '   ?)  E   ?)     8*      U*  ?   v*     +  a   #+  K   ?+     ?+  A   ?+  !   .,  J   P,  G   ?,  S   ?,  \   7-  \   ?-  Y   ?-  P   K.  A   ?.  ^   ?.  S   =/  Z   ?/  P   ?/  ?   =0  /   ?0  q   1  R   ?1  D   ?1  h   2  >   ?2  B   ?2  ?   3  H   ?3     ?3     ?3  &   ?3  g   %4  [   ?4  *   ?4  a   5  p   v5  r   ?5  ?   Z6  e   7  c   m7  i   ?7  i   ;8  r   ?8  l   9  G   ?9  U   ?9  V   #:  `   z:  J   ?:  ;   &;  C   b;  \   ?;  Q   <  D   U<  ?   ?<  K   ?<  F   &=  I   m=  O   ?=  B   >  I   J>  ]   ?>  R   ?>  K   E?  Q   ??  P   ??  U   4@  D   ?@  ?   ?@  0   A  S   @A  2   ?A  )   ?A  N   ?A  O   @B     ?B  )   ?B  *   ?B  ,    C  3   -C  ?   aC  A   ?C  '   ?C  6   D  '   BD  $   jD  t   ?D  ?   E  K   ?E  &   ?E  X   F  :   kF  ?   ?F  ?   SG  :   H  3   JH     ~H  ?   ?H  1   -I  8   _I  A   ?I  1   ?I  5   J  5   BJ  :   xJ  +   ?J  @   ?J  1    K  C   RK     ?K  %   ?K     ?K     ?K  .   L     HL     _L     L  .   ?L  6   ?L  0   M     m   g       L       I       s      "   ?   ?   C   7   ^      {          J   H   ?   `   t       v   )       ?   &      q   R   1   n   K           +      3   p           ?   r   x   |   ;   F   6   V      U       ~   <   4       E   '          D                        
              ?       (   =          z   f   A   c   k       ?      b           /   ?             Q   P   	          a   ,   u   !      5              h       *      >       M   \   S       e   @       B   ?   W   %   8      Z       w   .   $          G   l   T   #   N   _   j             -      [   ]      X       :       2       y   9   ?         Y   }      O           o                  0   i   d                    
%s: -w option cannot use a relative socket directory specification
 
%s: -w option is not supported when starting a pre-9.1 server
 
%s: this data directory appears to be running a pre-existing postmaster
 
Allowed signal names for kill:
 
Common options:
 
Options for register and unregister:
 
Options for start or restart:
 
Options for stop or restart:
 
Report bugs to <pgsql-bugs@postgresql.org>.
 
Shutdown modes are:
 
Start types are:
   %s init[db]               [-D DATADIR] [-s] [-o "OPTIONS"]
   %s kill    SIGNALNAME PID
   %s promote [-D DATADIR] [-s]
   %s register   [-N SERVICENAME] [-U USERNAME] [-P PASSWORD] [-D DATADIR]
                    [-S START-TYPE] [-w] [-t SECS] [-o "OPTIONS"]
   %s reload  [-D DATADIR] [-s]
   %s restart [-w] [-t SECS] [-D DATADIR] [-s] [-m SHUTDOWN-MODE]
                 [-o "OPTIONS"]
   %s start   [-w] [-t SECS] [-D DATADIR] [-s] [-l FILENAME] [-o "OPTIONS"]
   %s status  [-D DATADIR]
   %s stop    [-W] [-t SECS] [-D DATADIR] [-s] [-m SHUTDOWN-MODE]
   %s unregister [-N SERVICENAME]
   -?, --help             show this help, then exit
   -D, --pgdata=DATADIR   location of the database storage area
   -N SERVICENAME  service name with which to register PostgreSQL server
   -P PASSWORD     password of account to register PostgreSQL server
   -S START-TYPE   service start type to register PostgreSQL server
   -U USERNAME     user name of account to register PostgreSQL server
   -V, --version          output version information, then exit
   -W                     do not wait until operation completes
   -c, --core-files       allow postgres to produce core files
   -c, --core-files       not applicable on this platform
   -l, --log=FILENAME     write (or append) server log to FILENAME
   -m, --mode=MODE        MODE can be "smart", "fast", or "immediate"
   -o OPTIONS             command line options to pass to postgres
                         (PostgreSQL server executable) or initdb
   -p PATH-TO-POSTGRES    normally not necessary
   -s, --silent           only print errors, no informational messages
   -t, --timeout=SECS     seconds to wait when using -w option
   -w                     wait until operation completes
   auto       start service automatically during system startup (default)
   demand     start service on demand
   fast        quit directly, with proper shutdown
   immediate   quit without complete shutdown; will lead to recovery on restart
   smart       quit after all clients have disconnected
  done
  failed
  stopped waiting
 %s is a utility to initialize, start, stop, or control a PostgreSQL server.

 %s: -S option not supported on this platform
 %s: PID file "%s" does not exist
 %s: WARNING: cannot create restricted tokens on this platform
 %s: WARNING: could not locate all job object functions in system API
 %s: another server might be running; trying to start server anyway
 %s: cannot be run as root
Please log in (using, e.g., "su") as the (unprivileged) user that will
own the server process.
 %s: cannot promote server; server is not in standby mode
 %s: cannot promote server; single-user server is running (PID: %ld)
 %s: cannot reload server; single-user server is running (PID: %ld)
 %s: cannot restart server; single-user server is running (PID: %ld)
 %s: cannot set core file size limit; disallowed by hard limit
 %s: cannot stop server; single-user server is running (PID: %ld)
 %s: could not allocate SIDs: error code %lu
 %s: could not create promote signal file "%s": %s
 %s: could not create restricted token: error code %lu
 %s: could not determine the data directory using command "%s"
 %s: could not find own program executable
 %s: could not find postgres program executable
 %s: could not open PID file "%s": %s
 %s: could not open process token: error code %lu
 %s: could not open service "%s": error code %lu
 %s: could not open service manager
 %s: could not read file "%s"
 %s: could not register service "%s": error code %lu
 %s: could not remove promote signal file "%s": %s
 %s: could not send promote signal (PID: %ld): %s
 %s: could not send reload signal (PID: %ld): %s
 %s: could not send signal %d (PID: %ld): %s
 %s: could not send stop signal (PID: %ld): %s
 %s: could not start server
Examine the log output.
 %s: could not start server: exit code was %d
 %s: could not start service "%s": error code %lu
 %s: could not unregister service "%s": error code %lu
 %s: could not wait for server because of misconfiguration
 %s: could not write promote signal file "%s": %s
 %s: database system initialization failed
 %s: invalid data in PID file "%s"
 %s: missing arguments for kill mode
 %s: no database directory specified and environment variable PGDATA unset
 %s: no operation specified
 %s: no server running
 %s: old server process (PID: %ld) seems to be gone
 %s: option file "%s" must have exactly one line
 %s: out of memory
 %s: server does not shut down
 %s: server is running (PID: %ld)
 %s: service "%s" already registered
 %s: service "%s" not registered
 %s: single-user server is running (PID: %ld)
 %s: too many command-line arguments (first is "%s")
 %s: unrecognized operation mode "%s"
 %s: unrecognized shutdown mode "%s"
 %s: unrecognized signal name "%s"
 %s: unrecognized start type "%s"
 (The default is to wait for shutdown, but not for start or restart.)

 HINT: The "-m fast" option immediately disconnects sessions rather than
waiting for session-initiated disconnection.
 If the -D option is omitted, the environment variable PGDATA is used.
 Is server running?
 Please terminate the single-user server and try again.
 Server started and accepting connections
 The program "%s" is needed by %s but was not found in the
same directory as "%s".
Check your installation.
 The program "%s" was found by "%s"
but was not the same version as %s.
Check your installation.
 Timed out waiting for server startup
 Try "%s --help" for more information.
 Usage:
 WARNING: online backup mode is active
Shutdown will not complete until pg_stop_backup() is called.

 Waiting for server startup...
 child process exited with exit code %d child process exited with unrecognized status %d child process was terminated by exception 0x%X child process was terminated by signal %d child process was terminated by signal %s could not change directory to "%s" could not find a "%s" to execute could not identify current directory: %s could not read binary "%s" could not read symbolic link "%s" invalid binary "%s" server is still starting up
 server promoting
 server shutting down
 server signaled
 server started
 server starting
 server stopped
 starting server anyway
 waiting for server to shut down... waiting for server to start... Project-Id-Version: PostgreSQL 9.0 beta 3
Report-Msgid-Bugs-To: pgsql-bugs@postgresql.org
POT-Creation-Date: 2012-08-11 16:55+0900
PO-Revision-Date: 2012-08-11 17:01+0900
Last-Translator: HOTTA Michihide <hotta@net-newbie.com>
Language-Team: jpug-doc <jpug-doc@ml.postgresql.jp>
Language: ja
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=1; plural=0;
 
%s: -wオプションでは相対ソケットディレクトリ指定を使用することができません
 
%s: 9.1より前のサーバを起動する際に-wオプションはサポートされません
 
%s: このデータディレクトリでは既存のpostmasterが実行しているようです。
 
killモードで利用できるシグナル名:
 
一般的なオプション:
 
登録、登録解除用のオプション:
 
起動、再起動用のオプション
 
停止、再起動用のオプション:
 
不具合は<pgsql-bugs@postgresql.org>まで報告してください。
 
シャットダウンモードは以下の通りです:
 
起動種類は以下の通りです:
   %s init[db]               [-D DATADIR] [-s] [-o "オプション"]
   %s kill    SIGNALNAME PID
   %s promote  [-D DATADIR] [-s]
   %s register   [-N SERVICENAME] [-U USERNAME] [-P PASSWORD] [-D DATADIR]
                    [-S START-TYPE] [-w] [-t SECS] [-o "OPTIONS"]
   %s reload  [-D DATADIR] [-s]
   %s restart [-w] [-t SECS] [-D DATADIR] [-s] [-m SHUTDOWN-MODE]
                 [-o "OPTIONS"]
   %s start   [-w] [-t SECS] [-D DATADIR] [-s] [-l FILENAME] [-o "OPTIONS"]
   %s status  [-D DATADIR]
   %s stop    [-W] [-t SECS] [-D DATADIR] [-s] [-m SHUTDOWN-MODE]
   %s unregister [-N SERVICENAME]
   -?, --help                このヘルプを表示し、終了します
   -D, --pgdata DATADIR   データベース格納領域の場所です
   -N SERVICENAME  PostgreSQLサーバを登録するためのサービス名です
   -P PASSWORD     PostgreSQLサーバを登録するアカウントのパスワードです
   -S START-TYPE   PostgreSQLサーバを登録するためのサービス起動種類です
   -U USERNAME     PostgreSQLサーバを登録するアカウントのユーザ名です
   -V, --version             バージョン情報を表示し、終了します
   -W                     作業の完了まで待機しません
   -c, --core-files       postgresはコアファイルを生成することができます。
   -c, --core-files       このプラットフォームでは実行できません
   -l, --log FILENAME     サーバログをFILENAMEへ出力(あるいは追加)します
   -m SHUTDOWN-MODE   MODEは"smart"、"fast"、"immediate"のいずれかです
   -o オプション          postgres(PostgreSQLサーバ実行ファイル)または
                         initdb に渡すコマンドラインオプション
   -p PATH-TO-POSTGRES    通常は不要です
   -s, --silent           エラーメッセージのみを表示し、情報メッセージは表示しません
   -t, --timeout=SECS     -wオプションを使用する時に待機する秒数
   -w                     作業が完了するまで待機します
   auto       システムの起動時にサービスを自動的に開始します（デフォルト）
   demand     必要に応じてサービスを開始します
   fast        シャットダウン手続き後に停止します
   immediate   シャットダウン手続きを行わずに停止します。再起動時にリカバリ状態になる可能性があります
   smart       全クライアントの接続切断後に停止します
 完了
 失敗しました
  待機処理が停止されました
 %sはPostgreSQLサーバの初期化、起動、停止、制御を行うユーティリティです。
 %s: -Sオプションはこのプラットフォームでサポートされていません
 %s: PIDファイル"%s"がありません
 %s: 警告: このプラットフォームでは制限付きトークンを作成できません
 %s: 警告: システムAPI内にすべてのジョブオブジェクト関数を格納できませんでした
 %s: 他のサーバが動作中の可能性がありますが、とにかくpostmasterの起動を試みます。
 %s: rootでは実行できません
サーバプロセスの所有者となる(非特権)ユーザとして(例えば"su"を使用して)
ログインしてください。
 %s: サーバを昇進できません。サーバはスタンバイモードではありません。
 %s: サーバを昇進できません。シングルユーザサーバ(PID: %ld)が動作中です
 %s: サーバをリロードできません。シングルユーザサーバ(PID: %ld)が動作中です
 %s: サーバを再起動できません。シングルユーザサーバ(PID: %ld)が動作中です。
 %s: コアファイルのサイズ制限を設定できません:固定の制限により許されていません
 %s: サーバを停止できません。シングルユーザサーバ(PID: %ld)が動作しています。
 %s: SIDを割り当てられませんでした: エラーコード %lu
 %s: "%s"昇進通知ファイルを作成することができませんでした: %s
 %s: 制限付きトークンを作成できませんでした: エラーコード %lu
 %s: コマンド"%s"を使用するデータディレクトリを決定できませんでした
 %s: 本プログラムの実行ファイルの検索に失敗しました
 %s: postgres の実行ファイルが見つかりません
 %s: PIDファイル"%s"をオープンできませんでした: %s
 %s: プロセストークンをオープンできませんでした: エラーコード %lu
 %s: サービス"%s"のオープンに失敗しました: エラーコード %lu
 %s: サービスマネージャのオープンに失敗しました
 %s: ファイル"%s"を読み取ることに失敗しました
 %s: サービス"%s"の登録に失敗しました: エラーコード %lu
 %s: "%s"昇進通知ファイルを削除できませんでした: %s
 %s: 昇進シグナルを送信できませんでした。(PID: %ld): %s
 %s: リロードシグナルを送信できませんでした。(PID: %ld): %s
 %s: シグナル%dを送信できませんでした(PID: %ld): %s
 %s: 停止シグナルを送信できませんでした。(PID: %ld): %s
 %s: サーバを起動できませんでした。
ログ出力を確認してください。
 %s: サーバを起動できませんでした。終了コードは%dでした。
 %s: サービス"%s"の起動に失敗しました: エラーコード %lu
 %s: サービス"%s"の登録削除に失敗しました: エラーコード %lu
 %s: 誤設定のためサーバを待機することができませんでした
 %s: "%s"昇進通知ファイルを書き出すことができませんでした: %s
 %s: データベースシステムが初期化に失敗しました
 %s: PIDファイル"%s"内に無効なデータがあります
 %s: killモード用の引数がありません
 %s: データベースの指定も、PGDATA環境変数の設定もありません
 %s: 操作モードが指定されていません
 %s: サーバが動作していません
 %s: 古いサーバプロセス(PID: %ld)が動作していないようです
 %s: オプションファイル"%s"は1行のみでなければなりません
 %s: メモリ不足です
 %s: サーバは停止していません
 %s: サーバが動作中です(PID: %ld)
 %s: サービス\"%s\"は登録済みです
 %s: サービス"%s"は登録されていません
 %s: シングルユーザサーバが動作中です(PID: %ld)
 %s: コマンドライン引数が多すぎます(先頭は"%s")
 %s: 操作モード"%s"は不明です
 %s: シャットダウンモード"%s"は不明です
 %s: シグナル名"%s"は不明です
 %s: 起動種類"%s"は不明です
 (デフォルトでは、シャットダウン時は待機し、起動と再起動の時は待機し
ません。)

 ヒント: "-m fast"オプションは、セッション切断が始まるまで待機するのではなく
即座にセッションを切断します。
 -Dオプションの省略時、PGDATA環境変数が使用されます。
 サーバが動作していますか?
 シングルユーザサーバを終了させてから、再度実行してください
 サーバは起動し、接続を受け付けています
 %2$sには"%1$s"プログラムが必要ですが、"%3$s"と同じディレクトリ
にありませんでした。
インストール状況を確認してください。
 "%2$s"がプログラム"%1$s"を見つけましたが、これは%3$sと同じ
バージョンではありませんでした。
インストレーションを検査してください。
 サーバの起動待機がタイムアウトしました
 詳細は"%s --help"を実行してください。
 使用方法:
 警告: オンラインバックアップモードが実行中です。
pg_stop_backup()が呼び出されるまでシャットダウンは完了しません

 サーバの起動完了を待っています...
 子プロセスが終了コード%dで終了しました 子プロセスが未知のステータス%dで終了しました 子プロセスが例外0x%Xで終了しました 子プロセスがシグナル%dで終了しました 子プロセスがシグナル%sで終了しました ディレクトリを"%s"に変更できませんでした 実行する"%s"がありませんでした 現在のディレクトリを認識できませんでした: %s バイナリ"%s"を読み取れませんでした シンボリックリンク"%s"の読み取りに失敗しました バイナリ"%s"は無効です サーバは依然起動中です。
 サーバを昇進中です。
 サーバの停止中です
 サーバにシグナルを送信しました
 サーバ起動完了
 サーバは起動中です。
 サーバは停止しました
 とにかくサーバを起動しています
 サーバ停止処理の完了を待っています... サーバの起動完了を待っています... 