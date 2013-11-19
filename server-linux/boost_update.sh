sudo apt-get update
wget -c 'http://sourceforge.net/projects/boost/files/boost/1.55.0/boost_1_55_0.tar.bz2/download'
tar xf download
cd boost_1_55_0
./bootstrap.sh
./b2 install
