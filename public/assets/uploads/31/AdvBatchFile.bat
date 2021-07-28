:: Source -> https://www.windowscentral.com/how-create-and-run-batch-file-windows-10


::Disables the display prompt to show only the message on a clean line. Usually, this line goes at the beginning of the file. (You can use this command without "@," but the symbol hides the command being executed for a cleaner return.)
@ECHO OFF 
:: This batch file details Windows 10, hardware, and networking configuration.

:: Displays a custom name in the title bar of the window.
TITLE My System Info

ECHO Please wait... Checking system information.

:: Section 1: Windows 10 information

ECHO ==========================

ECHO WINDOWS INFO

ECHO ============================

systeminfo | findstr /c:"OS Name"

systeminfo | findstr /c:"OS Version"

systeminfo | findstr /c:"System Type"

:: Section 2: Hardware information.

ECHO ============================

ECHO HARDWARE INFO

ECHO ============================

systeminfo | findstr /c:"Total Physical Memory"

wmic cpu get name

wmic diskdrive get name,model,size

wmic path win32_videocontroller get name

:: Section 3: Networking information.

ECHO ============================

ECHO NETWORK INFO

ECHO ============================

ipconfig | findstr IPv4

ipconfig | findstr IPv6

:: Lets you launch an app or website with the default web browser.
:: START https://support.microsoft.com/en-us/windows/windows-10-system-requirements-6d4e9a79-66bf-7950-467c-795cf0386715

:: Keeps the window open after executing the command. If you don't use this command, the window will close automatically as soon as the script finishes running. You can use this command at the end of the script or after a specific command when running multiple tasks, and you want to pause between them.
PAUSE