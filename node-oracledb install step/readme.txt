

npm run build / npm install occur oracledb error solution:

PS Y:\Nestjs\Push\push-unilife> npm i --save @nestjs/typeorm typeorm oracledb
npm ERR! code 87
npm ERR! path Y:\Nestjs\Push\push-unilife\node_modules\oracledb
npm ERR! command failed
npm ERR! command C:\Windows\system32\cmd.exe /d /s /c node package/install.js
npm ERR! oracledb ERR! NJS-067: a pre-built node-oracledb binary was not found for win32 ia32
npm ERR! oracledb ERR! Try compiling node-oracledb source code using https://oracle.github.io/node-oracledb/INSTALL.html#github

npm ERR! A complete log of this run can be found in:
npm ERR!     C:\Users\argenhsieh\AppData\Local\npm-cache\_logs\2022-05-31T02_14_57_937Z-debug.log
PS Y:\Nestjs\Push\push-unilife>


http://oracle.github.io/node-oracledb/INSTALL.html
https://www.oracle.com/database/technologies/instant-client.html


https://www.python.org/downloads/release/python-2718/
1. download python-2.7.18.amd64.msi & install on c:\Python27\
2. set c:\Python27\ to path environment varabiles

https://docs.microsoft.com/zh-tw/cpp/windows/latest-supported-vc-redist?view=msvc-170
Visual Studio Redistributable
3. install VC_redist.x64.exe

https://www.oracle.com/database/technologies/instant-client/microsoft-windows-32-downloads.html
3. install instantclient basic & sdk 32bit
4. unzip into C:\oracle\instantclient_21_3_x86\
5. set environment varabiles
   a. C:\oracle\instantclient_21_3_x86\ to path environment varabiles
   b. libDir = C:\oracle\instantclient_21_3_x86\
   c. OCI_INC_DIR = C:\oracle\instantclient_21_3_x86\sdk\include
   d. OCI_LIB_DIR = C:\oracle\instantclient_21_3_x86\sdk\lib\msvc
   e. TNS_ADMIN = C:\oracle\instantclient_21_3_x86\

6. npm
npm remove oracledb
npm install https://github.com/oracle/node-oracledb/releases/download/v5.3.0/oracledb-src-5.3.0.tgz

7. envset.bat
8. npm start
