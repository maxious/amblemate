sudo /etc/init.d/tomcat6 stop
sudo /etc/init.d/php-fpm stop
sudo /etc/init.d/lighttpd stop

sync; echo 3 > /proc/sys/vm/drop_caches

java  -Xmx512M -jar opentripplanner-graph-builder/target/graph-builder.jar ~/graph-config.xml 

sudo /etc/init.d/tomcat6 start
sudo /etc/init.d/php-fpm start
sudo /etc/init.d/lighttpd start
