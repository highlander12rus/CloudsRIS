#
# Generated Makefile - do not edit!
#
# Edit the Makefile in the project folder instead (../Makefile). Each target
# has a -pre and a -post target defined where you can add customized code.
#
# This makefile implements configuration specific macros and targets.


# Environment
MKDIR=mkdir
CP=cp
GREP=grep
NM=nm
CCADMIN=CCadmin
RANLIB=ranlib
CC=gcc
CCC=g++
CXX=g++
FC=gfortran
AS=as

# Macros
CND_PLATFORM=GNU-Linux-x86
CND_DLIB_EXT=so
CND_CONF=Debug
CND_DISTDIR=dist
CND_BUILDDIR=build

# Include project Makefile
include Makefile

# Object Directory
OBJECTDIR=${CND_BUILDDIR}/${CND_CONF}/${CND_PLATFORM}

# Object Files
OBJECTFILES= \
	${OBJECTDIR}/DataBase/SingletoneConn.o \
	${OBJECTDIR}/DataBase/Tables/AddressBlocks.o \
	${OBJECTDIR}/DataBase/Tables/Blocks.o \
	${OBJECTDIR}/DataBase/Tables/SecurityMethod.o \
	${OBJECTDIR}/DataBase/Tables/ServerFiles.o \
	${OBJECTDIR}/Exception/ExceptionFileNotOpened.o \
	${OBJECTDIR}/Exception/MaxSearchPort.o \
	${OBJECTDIR}/FileSystem/AllocatedBlocks.o \
	${OBJECTDIR}/FileSystem/Block.o \
	${OBJECTDIR}/FileSystem/FileStream.o \
	${OBJECTDIR}/FileSystem/FileStreamRead.o \
	${OBJECTDIR}/FileSystem/FileStreamWrite.o \
	${OBJECTDIR}/Helper/Network.o \
	${OBJECTDIR}/Network/SearchServer.o \
	${OBJECTDIR}/Network/TcpServer.o \
	${OBJECTDIR}/Network/TcpSession.o \
	${OBJECTDIR}/Network/UdpBroatcast.o \
	${OBJECTDIR}/Network/UdpOnce.o \
	${OBJECTDIR}/main.o \
	${OBJECTDIR}/redis/RedisConnection.o \
	${OBJECTDIR}/redis/anet.o


# C Compiler Flags
CFLAGS=

# CC Compiler Flags
CCFLAGS=-lrt -lmysqlcppconn
CXXFLAGS=-lrt -lmysqlcppconn

# Fortran Compiler Flags
FFLAGS=

# Assembler Flags
ASFLAGS=

# Link Libraries and Options
LDLIBSOPTIONS=-L/home/vfs/CloudsRIS/server-linux/mysql-connector-c++-1.1.3-linux-debian6.0-x86-64bit/lib -L/usr/local/lib /usr/local/lib/libboost_date_time.a /usr/local/lib/libboost_filesystem.a /usr/local/lib/libboost_log.a /usr/local/lib/libboost_serialization.a /usr/local/lib/libboost_signals.a /usr/local/lib/libboost_system.a /usr/local/lib/libboost_thread.a -lpthread

# Build Targets
.build-conf: ${BUILD_SUBPROJECTS}
	"${MAKE}"  -f nbproject/Makefile-${CND_CONF}.mk ${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/server-linux

${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/server-linux: /usr/local/lib/libboost_date_time.a

${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/server-linux: /usr/local/lib/libboost_filesystem.a

${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/server-linux: /usr/local/lib/libboost_log.a

${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/server-linux: /usr/local/lib/libboost_serialization.a

${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/server-linux: /usr/local/lib/libboost_signals.a

${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/server-linux: /usr/local/lib/libboost_system.a

${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/server-linux: /usr/local/lib/libboost_thread.a

${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/server-linux: ${OBJECTFILES}
	${MKDIR} -p ${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}
	${LINK.cc} -o ${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/server-linux ${OBJECTFILES} ${LDLIBSOPTIONS}

${OBJECTDIR}/DataBase/SingletoneConn.o: DataBase/SingletoneConn.cpp 
	${MKDIR} -p ${OBJECTDIR}/DataBase
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/DataBase/SingletoneConn.o DataBase/SingletoneConn.cpp

${OBJECTDIR}/DataBase/Tables/AddressBlocks.o: DataBase/Tables/AddressBlocks.cpp 
	${MKDIR} -p ${OBJECTDIR}/DataBase/Tables
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/DataBase/Tables/AddressBlocks.o DataBase/Tables/AddressBlocks.cpp

${OBJECTDIR}/DataBase/Tables/Blocks.o: DataBase/Tables/Blocks.cpp 
	${MKDIR} -p ${OBJECTDIR}/DataBase/Tables
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/DataBase/Tables/Blocks.o DataBase/Tables/Blocks.cpp

${OBJECTDIR}/DataBase/Tables/SecurityMethod.o: DataBase/Tables/SecurityMethod.cpp 
	${MKDIR} -p ${OBJECTDIR}/DataBase/Tables
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/DataBase/Tables/SecurityMethod.o DataBase/Tables/SecurityMethod.cpp

${OBJECTDIR}/DataBase/Tables/ServerFiles.o: DataBase/Tables/ServerFiles.cpp 
	${MKDIR} -p ${OBJECTDIR}/DataBase/Tables
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/DataBase/Tables/ServerFiles.o DataBase/Tables/ServerFiles.cpp

${OBJECTDIR}/Exception/ExceptionFileNotOpened.o: Exception/ExceptionFileNotOpened.cpp 
	${MKDIR} -p ${OBJECTDIR}/Exception
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/Exception/ExceptionFileNotOpened.o Exception/ExceptionFileNotOpened.cpp

${OBJECTDIR}/Exception/MaxSearchPort.o: Exception/MaxSearchPort.cpp 
	${MKDIR} -p ${OBJECTDIR}/Exception
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/Exception/MaxSearchPort.o Exception/MaxSearchPort.cpp

${OBJECTDIR}/FileSystem/AllocatedBlocks.o: FileSystem/AllocatedBlocks.cpp 
	${MKDIR} -p ${OBJECTDIR}/FileSystem
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/FileSystem/AllocatedBlocks.o FileSystem/AllocatedBlocks.cpp

${OBJECTDIR}/FileSystem/Block.o: FileSystem/Block.cpp 
	${MKDIR} -p ${OBJECTDIR}/FileSystem
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/FileSystem/Block.o FileSystem/Block.cpp

${OBJECTDIR}/FileSystem/FileStream.o: FileSystem/FileStream.cpp 
	${MKDIR} -p ${OBJECTDIR}/FileSystem
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/FileSystem/FileStream.o FileSystem/FileStream.cpp

${OBJECTDIR}/FileSystem/FileStreamRead.o: FileSystem/FileStreamRead.cpp 
	${MKDIR} -p ${OBJECTDIR}/FileSystem
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/FileSystem/FileStreamRead.o FileSystem/FileStreamRead.cpp

${OBJECTDIR}/FileSystem/FileStreamWrite.o: FileSystem/FileStreamWrite.cpp 
	${MKDIR} -p ${OBJECTDIR}/FileSystem
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/FileSystem/FileStreamWrite.o FileSystem/FileStreamWrite.cpp

${OBJECTDIR}/Helper/Network.o: Helper/Network.cpp 
	${MKDIR} -p ${OBJECTDIR}/Helper
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/Helper/Network.o Helper/Network.cpp

${OBJECTDIR}/Network/SearchServer.o: Network/SearchServer.cpp 
	${MKDIR} -p ${OBJECTDIR}/Network
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/Network/SearchServer.o Network/SearchServer.cpp

${OBJECTDIR}/Network/TcpServer.o: Network/TcpServer.cpp 
	${MKDIR} -p ${OBJECTDIR}/Network
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/Network/TcpServer.o Network/TcpServer.cpp

${OBJECTDIR}/Network/TcpSession.o: Network/TcpSession.cpp 
	${MKDIR} -p ${OBJECTDIR}/Network
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/Network/TcpSession.o Network/TcpSession.cpp

${OBJECTDIR}/Network/UdpBroatcast.o: Network/UdpBroatcast.cpp 
	${MKDIR} -p ${OBJECTDIR}/Network
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/Network/UdpBroatcast.o Network/UdpBroatcast.cpp

${OBJECTDIR}/Network/UdpOnce.o: Network/UdpOnce.cpp 
	${MKDIR} -p ${OBJECTDIR}/Network
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/Network/UdpOnce.o Network/UdpOnce.cpp

${OBJECTDIR}/main.o: main.cpp 
	${MKDIR} -p ${OBJECTDIR}
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/main.o main.cpp

${OBJECTDIR}/redis/RedisConnection.o: redis/RedisConnection.cpp 
	${MKDIR} -p ${OBJECTDIR}/redis
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/redis/RedisConnection.o redis/RedisConnection.cpp

${OBJECTDIR}/redis/anet.o: redis/anet.cpp 
	${MKDIR} -p ${OBJECTDIR}/redis
	$(COMPILE.cc) -g -I/usr/local/include -std=c++11 -lrt -lmysqlcppconn -o ${OBJECTDIR}/redis/anet.o redis/anet.cpp

# Subprojects
.build-subprojects:

# Clean Targets
.clean-conf: ${CLEAN_SUBPROJECTS}
	${RM} -r ${CND_BUILDDIR}/${CND_CONF}
	${RM} ${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/server-linux

# Subprojects
.clean-subprojects:
