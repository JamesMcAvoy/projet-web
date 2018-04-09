kill $(ps aux | grep '[p]hp src/phpttpd' | awk '{print $2}')
echo 'phpttpd server stopped'