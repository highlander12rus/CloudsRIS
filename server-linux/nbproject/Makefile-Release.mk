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
	${OBJECTDIR}/_ext/2024390085/Config.o \
	${OBJECTDIR}/_ext/2090994028/Files.o \
	${OBJECTDIR}/_ext/2090994028/Users.o \
	${OBJECTDIR}/_ext/2086375462/Blocks.o \
	${OBJECTDIR}/_ext/2086375462/Files.o \
	${OBJECTDIR}/_ext/1016391407/MongoDB.o \
	${OBJECTDIR}/_ext/1016391407/MongoGlobal.o \
	${OBJECTDIR}/_ext/1016391407/MongoLocal.o \
	${OBJECTDIR}/_ext/1008817829/ExceptionFileNotOpened.o \
	${OBJECTDIR}/_ext/1911983935/AllocatedBlocks.o \
	${OBJECTDIR}/_ext/1911983935/Block.o \
	${OBJECTDIR}/_ext/1911983935/FileStream.o \
	${OBJECTDIR}/_ext/1911983935/FileStreamRead.o \
	${OBJECTDIR}/_ext/1911983935/FileStreamWrite.o \
	${OBJECTDIR}/_ext/515591646/Crypto.o \
	${OBJECTDIR}/_ext/515591646/Network.o \
	${OBJECTDIR}/_ext/515591646/StringExtended.o \
	${OBJECTDIR}/_ext/685558945/Backup.o \
	${OBJECTDIR}/_ext/685558945/Bk.o \
	${OBJECTDIR}/_ext/685558945/Download.o \
	${OBJECTDIR}/_ext/685558945/Upload.o \
	${OBJECTDIR}/_ext/2060777926/SearchServer.o \
	${OBJECTDIR}/_ext/2060777926/TcpServerBk.o \
	${OBJECTDIR}/_ext/2060777926/TcpServerDownload.o \
	${OBJECTDIR}/_ext/2060777926/TcpServerUpload.o \
	${OBJECTDIR}/_ext/2060777926/UdpBroatcast.o \
	${OBJECTDIR}/_ext/2060777926/UdpOnce.o \
	${OBJECTDIR}/main.o


# C Compiler Flags
CFLAGS=

# CC Compiler Flags
CCFLAGS=-lrt -lcrypto -lmongoclient -lboost_thread-mt -lboost_filesystem -lboost_program_options
CXXFLAGS=-lrt -lcrypto -lmongoclient -lboost_thread-mt -lboost_filesystem -lboost_program_options

# Fortran Compiler Flags
FFLAGS=

# Assembler Flags
ASFLAGS=

# Link Libraries and Options
LDLIBSOPTIONS=

# Build Targets
.build-conf: ${BUILD_SUBPROJECTS}
	"${MAKE}"  -f nbproject/Makefile-${CND_CONF}.mk ${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/cloudsrisdiplom

${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/cloudsrisdiplom: ${OBJECTFILES}
	${MKDIR} -p ${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}
	${LINK.cc} -o ${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/cloudsrisdiplom ${OBJECTFILES} ${LDLIBSOPTIONS}

${OBJECTDIR}/_ext/2024390085/Config.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Config.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/2024390085
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/2024390085/Config.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Config.cpp

${OBJECTDIR}/_ext/2090994028/Files.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Database/Collection/Gobal/Files.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/2090994028
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/2090994028/Files.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Database/Collection/Gobal/Files.cpp

${OBJECTDIR}/_ext/2090994028/Users.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Database/Collection/Gobal/Users.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/2090994028
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/2090994028/Users.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Database/Collection/Gobal/Users.cpp

${OBJECTDIR}/_ext/2086375462/Blocks.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Database/Collection/Local/Blocks.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/2086375462
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/2086375462/Blocks.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Database/Collection/Local/Blocks.cpp

${OBJECTDIR}/_ext/2086375462/Files.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Database/Collection/Local/Files.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/2086375462
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/2086375462/Files.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Database/Collection/Local/Files.cpp

${OBJECTDIR}/_ext/1016391407/MongoDB.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Database/MongoDB.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/1016391407
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/1016391407/MongoDB.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Database/MongoDB.cpp

${OBJECTDIR}/_ext/1016391407/MongoGlobal.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Database/MongoGlobal.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/1016391407
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/1016391407/MongoGlobal.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Database/MongoGlobal.cpp

${OBJECTDIR}/_ext/1016391407/MongoLocal.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Database/MongoLocal.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/1016391407
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/1016391407/MongoLocal.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Database/MongoLocal.cpp

${OBJECTDIR}/_ext/1008817829/ExceptionFileNotOpened.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Exception/ExceptionFileNotOpened.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/1008817829
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/1008817829/ExceptionFileNotOpened.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Exception/ExceptionFileNotOpened.cpp

${OBJECTDIR}/_ext/1911983935/AllocatedBlocks.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/FileSystem/AllocatedBlocks.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/1911983935
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/1911983935/AllocatedBlocks.o /home/vfs/NetBeansProjects/CloudsRisDiplom/FileSystem/AllocatedBlocks.cpp

${OBJECTDIR}/_ext/1911983935/Block.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/FileSystem/Block.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/1911983935
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/1911983935/Block.o /home/vfs/NetBeansProjects/CloudsRisDiplom/FileSystem/Block.cpp

${OBJECTDIR}/_ext/1911983935/FileStream.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/FileSystem/FileStream.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/1911983935
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/1911983935/FileStream.o /home/vfs/NetBeansProjects/CloudsRisDiplom/FileSystem/FileStream.cpp

${OBJECTDIR}/_ext/1911983935/FileStreamRead.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/FileSystem/FileStreamRead.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/1911983935
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/1911983935/FileStreamRead.o /home/vfs/NetBeansProjects/CloudsRisDiplom/FileSystem/FileStreamRead.cpp

${OBJECTDIR}/_ext/1911983935/FileStreamWrite.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/FileSystem/FileStreamWrite.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/1911983935
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/1911983935/FileStreamWrite.o /home/vfs/NetBeansProjects/CloudsRisDiplom/FileSystem/FileStreamWrite.cpp

${OBJECTDIR}/_ext/515591646/Crypto.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Helper/Crypto.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/515591646
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/515591646/Crypto.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Helper/Crypto.cpp

${OBJECTDIR}/_ext/515591646/Network.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Helper/Network.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/515591646
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/515591646/Network.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Helper/Network.cpp

${OBJECTDIR}/_ext/515591646/StringExtended.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Helper/StringExtended.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/515591646
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/515591646/StringExtended.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Helper/StringExtended.cpp

${OBJECTDIR}/_ext/685558945/Backup.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/Operatinos/Backup.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/685558945
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/685558945/Backup.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/Operatinos/Backup.cpp

${OBJECTDIR}/_ext/685558945/Bk.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/Operatinos/Bk.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/685558945
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/685558945/Bk.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/Operatinos/Bk.cpp

${OBJECTDIR}/_ext/685558945/Download.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/Operatinos/Download.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/685558945
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/685558945/Download.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/Operatinos/Download.cpp

${OBJECTDIR}/_ext/685558945/Upload.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/Operatinos/Upload.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/685558945
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/685558945/Upload.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/Operatinos/Upload.cpp

${OBJECTDIR}/_ext/2060777926/SearchServer.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/SearchServer.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/2060777926
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/2060777926/SearchServer.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/SearchServer.cpp

${OBJECTDIR}/_ext/2060777926/TcpServerBk.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/TcpServerBk.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/2060777926
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/2060777926/TcpServerBk.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/TcpServerBk.cpp

${OBJECTDIR}/_ext/2060777926/TcpServerDownload.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/TcpServerDownload.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/2060777926
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/2060777926/TcpServerDownload.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/TcpServerDownload.cpp

${OBJECTDIR}/_ext/2060777926/TcpServerUpload.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/TcpServerUpload.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/2060777926
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/2060777926/TcpServerUpload.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/TcpServerUpload.cpp

${OBJECTDIR}/_ext/2060777926/UdpBroatcast.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/UdpBroatcast.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/2060777926
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/2060777926/UdpBroatcast.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/UdpBroatcast.cpp

${OBJECTDIR}/_ext/2060777926/UdpOnce.o: /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/UdpOnce.cpp 
	${MKDIR} -p ${OBJECTDIR}/_ext/2060777926
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/_ext/2060777926/UdpOnce.o /home/vfs/NetBeansProjects/CloudsRisDiplom/Network/UdpOnce.cpp

${OBJECTDIR}/main.o: main.cpp 
	${MKDIR} -p ${OBJECTDIR}
	${RM} "$@.d"
	$(COMPILE.cc) -O2 -MMD -MP -MF "$@.d" -o ${OBJECTDIR}/main.o main.cpp

# Subprojects
.build-subprojects:

# Clean Targets
.clean-conf: ${CLEAN_SUBPROJECTS}
	${RM} -r ${CND_BUILDDIR}/${CND_CONF}
	${RM} ${CND_DISTDIR}/${CND_CONF}/${CND_PLATFORM}/cloudsrisdiplom

# Subprojects
.clean-subprojects:

# Enable dependency checking
.dep.inc: .depcheck-impl

include .dep.inc
