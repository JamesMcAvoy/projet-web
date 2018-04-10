k=$(ps aux | grep '[p]hp src/phpttpd' | awk '{print $2}')

if [ -z "$k" ]
then
	echo 'the server is not started'
else
	kill $k
	echo 'phpttpd server stopped'
fi