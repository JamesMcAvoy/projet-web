file=${1:-logs}
nohup php src/phpttpd &> $file&
sleep 0.25
head -n 1 $file