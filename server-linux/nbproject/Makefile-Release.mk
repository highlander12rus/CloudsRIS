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
CND_CONF=Release
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
	${OBJECTDIR}/Helper/StringExtended.o \
	${OBJECTDIR}/Interface/CurrentBaseOperations/ICurrentBaseOperation.o \
	${OBJECTDIR}/Interface/CurrentBaseOperations/ICurrentBaseOperationEditor.o \
	${OBJECTDIR}/Network/SearchServer.o \
	${OBJECTDIR}/Network/SearchSpace.o \
	${OBJECTDIR}/Network/TcpServer.o \
	${OBJECTDIR}/Network/TcpSession.o \
	${OBJECTDIR}/Network/UdpBroatcast.o \
	${OBJECTDIR}/Network/UdpOnce.o \
	${OBJECTDIR}/main.o \
	${OBJECTDIR}/redis/RedisAdaptor.o \
	${OBJECTDIR}/redis/RedisConnection.o \
	${OBJECTDIR}/redis/anet.o


# C Compiler Flags
CFLAGS=

# CC Compiler Flags
CCFLAGS=
CXXFLAGS=

# Fortran Compiler Flags
FFLAGS=

# Assembler Flags
ASFLAGS=

# Link Libraries and Options
LDLIBSOPTIONS=

# Build Targets
.build-conf: ${BUILD_SUBPROJECTS}
	"${MAKE}"  -f nbproject/Makefile-${CND_CONF}.mk ${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/server-linux

${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/server-linux: ${OBJECTFILES}
	${MKDIR} -p ${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}
	${LINK.cc} -o ${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/server-linux ${OBJECTFILES} ${LDLIBSOPTIONS}

${OBJECTDIR}/DataBase/SingletoneConn.o: DataBase/SingletoneConn.cpp 
	${MKDIR} -p ${OBJECTDIR}/DataBase
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/DataBase/SingletoneConn.o DataBase/SingletoneConn.cpp

${OBJECTDIR}/DataBase/Tables/AddressBlocks.o: DataBase/Tables/AddressBlocks.cpp 
	${MKDIR} -p ${OBJECTDIR}/DataBase/Tables
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/DataBase/Tables/AddressBlocks.o DataBase/Tables/AddressBlocks.cpp

${OBJECTDIR}/DataBase/Tables/Blocks.o: DataBase/Tables/Blocks.cpp 
	${MKDIR} -p ${OBJECTDIR}/DataBase/Tables
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/DataBase/Tables/Blocks.o DataBase/Tables/Blocks.cpp

${OBJECTDIR}/DataBase/Tables/SecurityMethod.o: DataBase/Tables/SecurityMethod.cpp 
	${MKDIR} -p ${OBJECTDIR}/DataBase/Tables
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/DataBase/Tables/SecurityMethod.o DataBase/Tables/SecurityMethod.cpp

${OBJECTDIR}/DataBase/Tables/ServerFiles.o: DataBase/Tables/ServerFiles.cpp 
	${MKDIR} -p ${OBJECTDIR}/DataBase/Tables
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/DataBase/Tables/ServerFiles.o DataBase/Tables/ServerFiles.cpp

${OBJECTDIR}/Exception/ExceptionFileNotOpened.o: Exception/ExceptionFileNotOpened.cpp 
	${MKDIR} -p ${OBJECTDIR}/Exception
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/Exception/ExceptionFileNotOpened.o Exception/ExceptionFileNotOpened.cpp

${OBJECTDIR}/Exception/MaxSearchPort.o: Exception/MaxSearchPort.cpp 
	${MKDIR} -p ${OBJECTDIR}/Exception
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/Exception/MaxSearchPort.o Exception/MaxSearchPort.cpp

${OBJECTDIR}/FileSystem/AllocatedBlocks.o: FileSystem/AllocatedBlocks.cpp 
	${MKDIR} -p ${OBJECTDIR}/FileSystem
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/FileSystem/AllocatedBlocks.o FileSystem/AllocatedBlocks.cpp

${OBJECTDIR}/FileSystem/Block.o: FileSystem/Block.cpp 
	${MKDIR} -p ${OBJECTDIR}/FileSystem
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/FileSystem/Block.o FileSystem/Block.cpp

${OBJECTDIR}/FileSystem/FileStream.o: FileSystem/FileStream.cpp 
	${MKDIR} -p ${OBJECTDIR}/FileSystem
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/FileSystem/FileStream.o FileSystem/FileStream.cpp

${OBJECTDIR}/FileSystem/FileStreamRead.o: FileSystem/FileStreamRead.cpp 
	${MKDIR} -p ${OBJECTDIR}/FileSystem
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/FileSystem/FileStreamRead.o FileSystem/FileStreamRead.cpp

${OBJECTDIR}/FileSystem/FileStreamWrite.o: FileSystem/FileStreamWrite.cpp 
	${MKDIR} -p ${OBJECTDIR}/FileSystem
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/FileSystem/FileStreamWrite.o FileSystem/FileStreamWrite.cpp

${OBJECTDIR}/Helper/Network.o: Helper/Network.cpp 
	${MKDIR} -p ${OBJECTDIR}/Helper
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/Helper/Network.o Helper/Network.cpp

${OBJECTDIR}/Helper/StringExtended.o: Helper/StringExtended.cpp 
	${MKDIR} -p ${OBJECTDIR}/Helper
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/Helper/StringExtended.o Helper/StringExtended.cpp

${OBJECTDIR}/Interface/CurrentBaseOperations/ICurrentBaseOperation.o: Interface/CurrentBaseOperations/ICurrentBaseOperation.cpp 
	${MKDIR} -p ${OBJECTDIR}/Interface/CurrentBaseOperations
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/Interface/CurrentBaseOperations/ICurrentBaseOperation.o Interface/CurrentBaseOperations/ICurrentBaseOperation.cpp

${OBJECTDIR}/Interface/CurrentBaseOperations/ICurrentBaseOperationEditor.o: Interface/CurrentBaseOperations/ICurrentBaseOperationEditor.cpp 
	${MKDIR} -p ${OBJECTDIR}/Interface/CurrentBaseOperations
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/Interface/CurrentBaseOperations/ICurrentBaseOperationEditor.o Interface/CurrentBaseOperations/ICurrentBaseOperationEditor.cpp

${OBJECTDIR}/Network/SearchServer.o: Network/SearchServer.cpp 
	${MKDIR} -p ${OBJECTDIR}/Network
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/Network/SearchServer.o Network/SearchServer.cpp

${OBJECTDIR}/Network/SearchSpace.o: Network/SearchSpace.cpp 
	${MKDIR} -p ${OBJECTDIR}/Network
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/Network/SearchSpace.o Network/SearchSpace.cpp

${OBJECTDIR}/Network/TcpServer.o: Network/TcpServer.cpp 
	${MKDIR} -p ${OBJECTDIR}/Network
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/Network/TcpServer.o Network/TcpServer.cpp

${OBJECTDIR}/Network/TcpSession.o: Network/TcpSession.cpp 
	${MKDIR} -p ${OBJECTDIR}/Network
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/Network/TcpSession.o Network/TcpSession.cpp

${OBJECTDIR}/Network/UdpBroatcast.o: Network/UdpBroatcast.cpp 
	${MKDIR} -p ${OBJECTDIR}/Network
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/Network/UdpBroatcast.o Network/UdpBroatcast.cpp

${OBJECTDIR}/Network/UdpOnce.o: Network/UdpOnce.cpp 
	${MKDIR} -p ${OBJECTDIR}/Network
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/Network/UdpOnce.o Network/UdpOnce.cpp

${OBJECTDIR}/main.o: main.cpp 
	${MKDIR} -p ${OBJECTDIR}
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/main.o main.cpp

${OBJECTDIR}/redis/RedisAdaptor.o: redis/RedisAdaptor.cpp 
	${MKDIR} -p ${OBJECTDIR}/redis
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/redis/RedisAdaptor.o redis/RedisAdaptor.cpp

${OBJECTDIR}/redis/RedisConnection.o: redis/RedisConnection.cpp 
	${MKDIR} -p ${OBJECTDIR}/redis
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/redis/RedisConnection.o redis/RedisConnection.cpp

${OBJECTDIR}/redis/anet.o: redis/anet.cpp 
	${MKDIR} -p ${OBJECTDIR}/redis
	${RM} $@.d
	$(COMPILE.cc) -O2 -MMD -MP -MF $@.d -o ${OBJECTDIR}/redis/anet.o redis/anet.cpp

# Subprojects
.build-subprojects:

# Clean Targets
.clean-conf: ${CLEAN_SUBPROJECTS}
	${RM} -r ${CND_BUILDDIR}/${CND_CONF}
	${RM} ${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/server-linux

# Subprojects
.clean-subprojects:

# Enable dependency checking
.dep.inc: .depcheck-impl

include .dep.inc
