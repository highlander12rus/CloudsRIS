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
	${OBJECTDIR}/FileSystem/AllocatedBlocks.o \
	${OBJECTDIR}/FileSystem/Block.o \
	${OBJECTDIR}/FileSystem/FileStream.o \
	${OBJECTDIR}/FileSystem/FileStreamRead.o \
	${OBJECTDIR}/FileSystem/FileStreamWrite.o \
	${OBJECTDIR}/Network/UdpBroatcast.o \
	${OBJECTDIR}/Network/UdpClient.o \
	${OBJECTDIR}/Network/UdpOnce.o \
	${OBJECTDIR}/Network/UdpServer.o \
	${OBJECTDIR}/main.o


# C Compiler Flags
CFLAGS=

# CC Compiler Flags
CCFLAGS=-lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem
CXXFLAGS=-lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem

# Fortran Compiler Flags
FFLAGS=

# Assembler Flags
ASFLAGS=

# Link Libraries and Options
LDLIBSOPTIONS=

# Build Targets
.build-conf: ${BUILD_SUBPROJECTS}
	"${MAKE}"  -f nbproject/Makefile-${CND_CONF}.mk ${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/cloudsris

${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/cloudsris: ${OBJECTFILES}
	${MKDIR} -p ${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}
	${LINK.cc} -o ${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/cloudsris ${OBJECTFILES} ${LDLIBSOPTIONS}

${OBJECTDIR}/DataBase/SingletoneConn.o: DataBase/SingletoneConn.cpp 
	${MKDIR} -p ${OBJECTDIR}/DataBase
	${RM} $@.d
	$(COMPILE.cc) -g -lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem -MMD -MP -MF $@.d -o ${OBJECTDIR}/DataBase/SingletoneConn.o DataBase/SingletoneConn.cpp

${OBJECTDIR}/DataBase/Tables/AddressBlocks.o: DataBase/Tables/AddressBlocks.cpp 
	${MKDIR} -p ${OBJECTDIR}/DataBase/Tables
	${RM} $@.d
	$(COMPILE.cc) -g -lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem -MMD -MP -MF $@.d -o ${OBJECTDIR}/DataBase/Tables/AddressBlocks.o DataBase/Tables/AddressBlocks.cpp

${OBJECTDIR}/DataBase/Tables/Blocks.o: DataBase/Tables/Blocks.cpp 
	${MKDIR} -p ${OBJECTDIR}/DataBase/Tables
	${RM} $@.d
	$(COMPILE.cc) -g -lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem -MMD -MP -MF $@.d -o ${OBJECTDIR}/DataBase/Tables/Blocks.o DataBase/Tables/Blocks.cpp

${OBJECTDIR}/DataBase/Tables/SecurityMethod.o: DataBase/Tables/SecurityMethod.cpp 
	${MKDIR} -p ${OBJECTDIR}/DataBase/Tables
	${RM} $@.d
	$(COMPILE.cc) -g -lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem -MMD -MP -MF $@.d -o ${OBJECTDIR}/DataBase/Tables/SecurityMethod.o DataBase/Tables/SecurityMethod.cpp

${OBJECTDIR}/DataBase/Tables/ServerFiles.o: DataBase/Tables/ServerFiles.cpp 
	${MKDIR} -p ${OBJECTDIR}/DataBase/Tables
	${RM} $@.d
	$(COMPILE.cc) -g -lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem -MMD -MP -MF $@.d -o ${OBJECTDIR}/DataBase/Tables/ServerFiles.o DataBase/Tables/ServerFiles.cpp

${OBJECTDIR}/Exception/ExceptionFileNotOpened.o: Exception/ExceptionFileNotOpened.cpp 
	${MKDIR} -p ${OBJECTDIR}/Exception
	${RM} $@.d
	$(COMPILE.cc) -g -lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem -MMD -MP -MF $@.d -o ${OBJECTDIR}/Exception/ExceptionFileNotOpened.o Exception/ExceptionFileNotOpened.cpp

${OBJECTDIR}/FileSystem/AllocatedBlocks.o: FileSystem/AllocatedBlocks.cpp 
	${MKDIR} -p ${OBJECTDIR}/FileSystem
	${RM} $@.d
	$(COMPILE.cc) -g -lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem -MMD -MP -MF $@.d -o ${OBJECTDIR}/FileSystem/AllocatedBlocks.o FileSystem/AllocatedBlocks.cpp

${OBJECTDIR}/FileSystem/Block.o: FileSystem/Block.cpp 
	${MKDIR} -p ${OBJECTDIR}/FileSystem
	${RM} $@.d
	$(COMPILE.cc) -g -lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem -MMD -MP -MF $@.d -o ${OBJECTDIR}/FileSystem/Block.o FileSystem/Block.cpp

${OBJECTDIR}/FileSystem/FileStream.o: FileSystem/FileStream.cpp 
	${MKDIR} -p ${OBJECTDIR}/FileSystem
	${RM} $@.d
	$(COMPILE.cc) -g -lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem -MMD -MP -MF $@.d -o ${OBJECTDIR}/FileSystem/FileStream.o FileSystem/FileStream.cpp

${OBJECTDIR}/FileSystem/FileStreamRead.o: FileSystem/FileStreamRead.cpp 
	${MKDIR} -p ${OBJECTDIR}/FileSystem
	${RM} $@.d
	$(COMPILE.cc) -g -lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem -MMD -MP -MF $@.d -o ${OBJECTDIR}/FileSystem/FileStreamRead.o FileSystem/FileStreamRead.cpp

${OBJECTDIR}/FileSystem/FileStreamWrite.o: FileSystem/FileStreamWrite.cpp 
	${MKDIR} -p ${OBJECTDIR}/FileSystem
	${RM} $@.d
	$(COMPILE.cc) -g -lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem -MMD -MP -MF $@.d -o ${OBJECTDIR}/FileSystem/FileStreamWrite.o FileSystem/FileStreamWrite.cpp

${OBJECTDIR}/Network/UdpBroatcast.o: Network/UdpBroatcast.cpp 
	${MKDIR} -p ${OBJECTDIR}/Network
	${RM} $@.d
	$(COMPILE.cc) -g -lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem -MMD -MP -MF $@.d -o ${OBJECTDIR}/Network/UdpBroatcast.o Network/UdpBroatcast.cpp

${OBJECTDIR}/Network/UdpClient.o: Network/UdpClient.cpp 
	${MKDIR} -p ${OBJECTDIR}/Network
	${RM} $@.d
	$(COMPILE.cc) -g -lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem -MMD -MP -MF $@.d -o ${OBJECTDIR}/Network/UdpClient.o Network/UdpClient.cpp

${OBJECTDIR}/Network/UdpOnce.o: Network/UdpOnce.cpp 
	${MKDIR} -p ${OBJECTDIR}/Network
	${RM} $@.d
	$(COMPILE.cc) -g -lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem -MMD -MP -MF $@.d -o ${OBJECTDIR}/Network/UdpOnce.o Network/UdpOnce.cpp

${OBJECTDIR}/Network/UdpServer.o: Network/UdpServer.cpp 
	${MKDIR} -p ${OBJECTDIR}/Network
	${RM} $@.d
	$(COMPILE.cc) -g -lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem -MMD -MP -MF $@.d -o ${OBJECTDIR}/Network/UdpServer.o Network/UdpServer.cpp

${OBJECTDIR}/main.o: main.cpp 
	${MKDIR} -p ${OBJECTDIR}
	${RM} $@.d
	$(COMPILE.cc) -g -lmysqlcppconn -lboost_system -lboost_thread -lboost_serialization -lboost_filesystem -MMD -MP -MF $@.d -o ${OBJECTDIR}/main.o main.cpp

# Subprojects
.build-subprojects:

# Clean Targets
.clean-conf: ${CLEAN_SUBPROJECTS}
	${RM} -r ${CND_BUILDDIR}/${CND_CONF}
	${RM} ${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/cloudsris

# Subprojects
.clean-subprojects:

# Enable dependency checking
.dep.inc: .depcheck-impl

include .dep.inc
