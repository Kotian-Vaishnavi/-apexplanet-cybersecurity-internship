# Reconnaissance Report

## Target IP
192.168.52.102

## Open Ports Found
- 21 FTP
- 22 SSH
- 23 Telnet
- 80 HTTP
- 445 SMB
- etc.

## Interesting Findings
- vsftpd 2.3.4 found (known vulnerable FTP)
- Samba service detected
- Web applications running
- Multiple weak services exposed

## Recommended Exploitation Targets
1. vsftpd 2.3.4
2. Samba
3. Telnet weak credentials
