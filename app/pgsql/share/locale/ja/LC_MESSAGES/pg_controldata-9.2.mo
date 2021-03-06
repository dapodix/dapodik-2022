??    E      D  a   l      ?  X   ?  
   J     U  +   n  7   ?  C   ?  -     !   D      f     ?  ,   ?  ,   ?  )   ?  )     )   E  )   o  )   ?  )   ?  )   ?  )   	  )   A	  )   k	  )   ?	  )   ?	  )   ?	  )   
  ,   =
  )   j
  )   ?
  )   ?
  ,   ?
  ,     )   B  )   l  )   ?  )   ?  )   ?  )     )   >  )   h  )   ?  ,   ?  ,   ?  ,     )   C  &   m     ?  )   ?  ?   ?    ?     ?     ?     ?     ?     ?     ?     ?            )     )   2  	   \     f     |     ?     ?     ?     ?  ?  ?  o   m     ?     ?  J   	  P   T  T   ?  O   ?  =   J  >   ?     ?  6   ?  6     M   G  @   ?  @   ?  /     /   G  /   w  .   ?  C   ?  B     B   ]  ?   ?  9   ?  0     0   K  D   |  6   ?  6   ?  @   /  C   p  E   ?  C   ?  5   >  5   t  5   ?  4   ?  5     5   K  <   ?  F   ?  B     E   H  I   ?  A   ?  0        K  =   Z    ?  ?  ?     #   	   0      :      M      l   	   ?      ?      ?      ?   9   ?   <   ?      !  0   3!     d!     }!  !   ?!  "   ?!     ?!        4      *          %   7   
   C      ?   <                    ;   (   .   6       D   5   &             9      2   )                        8   ,       "   A      0       B   =       @          /      1   	                                       +                    E   3                 $              >   #          -                  '       :   !    
If no data directory (DATADIR) is specified, the environment variable PGDATA
is used.

 
Options:
   %s [OPTION] [DATADIR]
   -?, --help     show this help, then exit
   -V, --version  output version information, then exit
 %s displays control information of a PostgreSQL database cluster.

 %s: could not open file "%s" for reading: %s
 %s: could not read file "%s": %s
 %s: no data directory specified
 64-bit integers Backup end location:                  %X/%X
 Backup start location:                %X/%X
 Blocks per segment of large relation: %u
 Bytes per WAL segment:                %u
 Catalog version number:               %u
 Current max_connections setting:      %d
 Current max_locks_per_xact setting:   %d
 Current max_prepared_xacts setting:   %d
 Current wal_level setting:            %s
 Database block size:                  %u
 Database cluster state:               %s
 Database system identifier:           %s
 Date/time type storage:               %s
 End-of-backup record required:        %s
 Float4 argument passing:              %s
 Float8 argument passing:              %s
 Latest checkpoint location:           %X/%X
 Latest checkpoint's NextMultiOffset:  %u
 Latest checkpoint's NextMultiXactId:  %u
 Latest checkpoint's NextOID:          %u
 Latest checkpoint's NextXID:          %u/%u
 Latest checkpoint's REDO location:    %X/%X
 Latest checkpoint's TimeLineID:       %u
 Latest checkpoint's full_page_writes: %s
 Latest checkpoint's oldestActiveXID:  %u
 Latest checkpoint's oldestXID's DB:   %u
 Latest checkpoint's oldestXID:        %u
 Maximum columns in an index:          %u
 Maximum data alignment:               %u
 Maximum length of identifiers:        %u
 Maximum size of a TOAST chunk:        %u
 Minimum recovery ending location:     %X/%X
 Prior checkpoint location:            %X/%X
 Report bugs to <pgsql-bugs@postgresql.org>.
 Time of latest checkpoint:            %s
 Try "%s --help" for more information.
 Usage:
 WAL block size:                       %u
 WARNING: Calculated CRC checksum does not match value stored in file.
Either the file is corrupt, or it has a different layout than this program
is expecting.  The results below are untrustworthy.

 WARNING: possible byte ordering mismatch
The byte ordering used to store the pg_control file might not match the one
used by this program.  In that case the results below would be incorrect, and
the PostgreSQL installation would be incompatible with this data directory.
 by reference by value floating-point numbers in archive recovery in crash recovery in production no off on pg_control last modified:             %s
 pg_control version number:            %u
 shut down shut down in recovery shutting down starting up unrecognized status code unrecognized wal_level yes Project-Id-Version: PostgreSQL 9.0 beta 3
Report-Msgid-Bugs-To: pgsql-bugs@postgresql.org
POT-Creation-Date: 2012-08-11 16:41+0900
PO-Revision-Date: 2012-08-11 16:48+0900
Last-Translator: HOTTA Michihide <hotta@net-newbie.com>
Language-Team: jpug-doc <jpug-doc@ml.postgresql.jp>
Language: ja
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=1; plural=0;
 
データディレクトリ(DATADIR)が指定されない場合、PGDATA環境変数が使用されます。

 
オプション:
   %s [OPTION] [DATADIR]
   -?, --help                このヘルプを表示し、終了します
   -V, --version             バージョン情報を表示し、終了します
 %s はPostgreSQLデータベースクラスタの制御情報を表示します。

 %s: 読み取り用の"%s"ファイルのオープンに失敗しました: %s
 %s: "%s"ファイルの読み取りに失敗しました: %s
 %s: データディレクトリが指定されていません
 64ビット整数 バックアップ終了位置:                 %X/%X
 バックアップ開始位置:                 %X/%X
 ラージリレーションのセグメント当たりのブロック数: %u
 WALセグメント当たりのバイト数:                  %u
 カタログバージョン番号:                           %u
 max_connections の現在設定：          %d
 max_locks_per_xact の現在設定：       %d
 max_prepared_xacts の現在設定：       %d
 wal_level の現在設定                  %s
 データベースのブロックサイズ:                     %u
 データベースクラスタの状態:                       %s
 データベースシステム識別子:                       %s
 日付/時刻型の格納方式:                            %s
 必要なバックアップ最終レコード:        %s
 Float4 引数の渡し方：                 %s
 Float8  引数の渡し方：                %s
 最終チェックポイント位置:                         %X/%X
 最終チェックポイントのNextMultiOffset:  %u
 最終チェックポイントのNextMultiXactId:  %u
 最終チェックポイントのNextOID:                    %u
 最終チェックポイントのNextXID:                    %u/%u
 最終チェックポイントのREDO位置:                   %X/%X
 最終チェックポイントの時系列ID:                   %u
 最終チェックポイントのfull_page_writes %s
 最終チェックポイントのoldestActiveXID: %u
 最終チェックポイントのoldestXIDのDB:  %u
 最終チェックポイントのoldestXID:      %u
 インデックス内の最大列数:             %u
 最大データアラインメント              %u
 識別子の最大長:                                   %u
 TOASTチャンクの最大サイズ:                               %u
 最小リカバリ終了位置:                             %X/%X
 前回のチェックポイント位置:                       %X/%X
 不具合は<pgsql-bugs@postgresql.org>まで報告してください。
 最終チェックポイント時刻:                         %s
 詳細は"%s --help"を実行してください
 使用方法:
 WALブロックのサイズ:                              %u
 警告: CRCチェックサムの計算結果がファイル内の値と一致しません。
ファイルの破損、あるいは、本プログラムが想定するレイアウトと異なる
可能性があります。以下の結果は信用できません。

 警告:バイトオーダが異なる可能性があります。
pg_controlファイルを格納するために使用するバイトオーダが本プログラムで使用
されるものと異なります。この場合以下の結果は不正確になります。また、PostgreSQL
インストレーションはこのデータディレクトリと互換性がなくなります。
 参照渡し 値渡し 浮動小数点数 アーカイブリカバリ中 クラッシュリカバリ中 運用中 no オフ オン pg_control最終更新:                               %s
 pg_controlバージョン番号:                         %u
 シャットダウン リカバリしながらシャットダウン中 シャットダウン中 起動 未知のステータスコード wal_level を認識できません yes 