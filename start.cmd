ECHO Starting PHP FastCGI...
start c:\nginx\nginx.exe
set PATH=C:\PHP;%PATH%
c:\php\RunHiddenConsole.exe C:\PHP\php-cgi.exe -b 127.0.0.1:9123
